<?php

use Illuminate\Support\Facades\Route;
use App\Models\Member;
use App\Models\SurveiPemustaka;
use App\Models\Kunjungan;
use App\Models\Skm;

// CONTROLLER PUBLIC
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicMemberController;
use App\Http\Controllers\Public\PublicController;

// CONTROLLER ADMIN
use App\Http\Controllers\Admin\SkmController as AdminSkmController;
use App\Http\Controllers\Admin\SkmController as PublicSkmController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SurveiController as AdminSurveiController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\KunjunganController;

/*
|--------------------------------------------------------------------------
| BYPASS & REDIRECTS
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| 1. PUBLIC ROUTES (Warga)
|--------------------------------------------------------------------------
*/
Route::get('/hadir', [App\Http\Controllers\GuestBookController::class, 'index'])->name('buku.tamu');
Route::post('/hadir/simpan', [App\Http\Controllers\GuestBookController::class, 'store'])->name('buku.tamu.store');
Route::get('/kunjungan-digital', [App\Http\Controllers\GuestBookController::class, 'index'])->name('kunjungan.digital');
Route::post('/kunjungan-digital/store', [App\Http\Controllers\GuestBookController::class, 'store'])->name('kunjungan.digital.store');
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/berita', [PublicController::class, 'allPosts'])->name('public.posts.index');
Route::get('/berita/{slug}', [PublicController::class, 'showPost'])->name('public.posts.show');

Route::get('/profil', function () { return view('public.profil'); });
Route::get('/pegawai', function () { return view('public.pegawai'); });
Route::get('/koleksi', function () { return view('public.koleksi'); });
Route::get('/program', function () { return view('public.program'); });
Route::get('/kegiatan', function () { return view('public.kegiatan'); });
Route::get('/galeri', [PublicController::class, 'gallery'])->name('public.gallery');
Route::get('/kontak', function () { return view('public.kontak'); });

// SKM Public (Pakai PublicSkmController)
Route::get('/skm', [PublicSkmController::class, 'index'])->name('skm.index');
Route::post('/skm', [PublicSkmController::class, 'store'])->name('skm.store');
Route::get('/skm/hasil', [PublicSkmController::class, 'publicResult'])->name('skm.hasil');

// Survei Kebutuhan
Route::get('/isi-survei-kebutuhan', [AdminSurveiController::class, 'create'])->name('survei.kebutuhan.create');
Route::post('/simpan-survei-kebutuhan', [AdminSurveiController::class, 'store'])->name('survei.store');

// Pendaftaran Anggota
Route::get('/daftar-anggota', [PublicMemberController::class, 'create'])->name('public.members.create');
Route::post('/daftar-anggota', [PublicMemberController::class, 'store'])->name('public.members.store');
Route::get('/daftar-anggota/sukses', function () { return view('public.members.success'); })->name('public.members.success');

/*
|--------------------------------------------------------------------------
| 2. ADMIN ROUTES (Prefix: admin, Name: admin.)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

   // A. DASHBOARD
    Route::get('/', function () {
        // 1. Data untuk Grafik Kunjungan (7 Hari Terakhir)
        $chartData = \App\Models\Kunjungan::selectRaw('DATE(tanggal) as date, count(*) as total')
            ->where('tanggal', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // 2. Hitung SKM Berdasarkan 9 Unsur (u1 - u9)
        $skmRecords = \App\Models\Skm::all();
        $totalSkm = $skmRecords->count();
        $nilaiSkm = 0;

        if ($totalSkm > 0) {
            // Rumus SKM: Rata-rata dari (u1+u2+u3+u4+u5+u6+u7+u8+u9) dibagi 9
            $totalNilaiSeluruhResponden = $skmRecords->sum(function($record) {
                return ($record->u1 + $record->u2 + $record->u3 + $record->u4 + $record->u5 + 
                        $record->u6 + $record->u7 + $record->u8 + $record->u9) / 9;
            });

            $rataRataIndeks = $totalNilaiSeluruhResponden / $totalSkm;
            
            // Konversi ke Skala 100 (Nilai max 4, maka dikali 25)
            $nilaiSkm = number_format($rataRataIndeks * 25, 2);
        }

        return view('admin.dashboard', [
            'totalMembers'    => \App\Models\Member::count(),
            'activeMembers'   => \App\Models\Member::where('status', 'aktif')->count(),
            'inactiveMembers' => \App\Models\Member::where('status', 'nonaktif')->count(),
            'totalSurvei'     => \App\Models\SurveiPemustaka::count(),
            'totalSkm'        => $totalSkm,
            'nilaiSkm'        => $nilaiSkm,
            'totalKunjungan'  => \App\Models\Kunjungan::count(),
            'kunjunganHariIni'=> \App\Models\Kunjungan::whereDate('tanggal', today())->count(),
            'chartLabels'     => $chartData->pluck('date'), 
            'chartValues'     => $chartData->pluck('total'),
        ]);
    })->name('dashboard');

    // B. KHUSUS SUPER ADMIN
    Route::middleware(['can:super-admin-only'])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('banners', BannerController::class);
    });

    // C. DATA ANGGOTA
    Route::resource('members', MemberController::class);
    Route::patch('/members/{member}/activate', [MemberController::class, 'activate'])->name('members.activate');
    Route::get('/members/{member}/print', [MemberController::class, 'print'])->name('members.print');
    Route::get('/members/{member}/print-form', [MemberController::class, 'printForm'])->name('members.print-form');

    // D. KONTEN BERITA & MEDIA
    Route::resource('posts', PostController::class);
    Route::delete('/posts/image/{id}', [PostController::class, 'destroyImage'])->name('posts.image.destroy');
    Route::resource('galleries', GalleryController::class);
    Route::resource('videos', VideoController::class);

    // E. SURVEI & SKM (Pakai AdminSkmController)
    Route::get('/survei-data', [AdminSurveiController::class, 'index'])->name('survei.index');
    Route::delete('/survei-data/{id}', [AdminSurveiController::class, 'destroy'])->name('survei.destroy');
    
    Route::get('/skm-data', [AdminSkmController::class, 'adminIndex'])->name('skm.index');
    Route::delete('/skm-data/{id}', [AdminSkmController::class, 'destroy'])->name('skm.destroy');
    Route::get('/skm/cetak-pdf', [AdminSkmController::class, 'cetakPdf'])->name('skm.pdf');

    // Rute Statistik Pengunjung
    Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan.index');
    Route::post('/kunjungan', [KunjunganController::class, 'store'])->name('kunjungan.store');
});

/*
|--------------------------------------------------------------------------
| 3. ACCOUNT SETTINGS
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/kunjungan/cetak-qr', function () {
    return view('admin.kunjungan.cetak-qr');
})->name('admin.kunjungan.qr');

Route::get('/sitemap.xml', [App\Http\Controllers\Public\SitemapController::class, 'index']);

require __DIR__.'/auth.php';