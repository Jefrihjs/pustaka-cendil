<?php

use Illuminate\Support\Facades\Route;
use App\Models\Member;
use App\Models\SurveiPemustaka;

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
        return view('admin.dashboard', [
            'totalMembers' => Member::count(),
            'activeMembers' => Member::where('status', 'aktif')->count(),
            'inactiveMembers' => Member::where('status', 'nonaktif')->count(),
            'totalSurvei' => SurveiPemustaka::count()
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

require __DIR__.'/auth.php';