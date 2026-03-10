<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $customTmp = storage_path('framework/cache');

        // Cek dulu, kalau belum ada baru buat. Kalau gagal, abaikan saja (silently fail)
        if (!is_dir($customTmp)) {
            @mkdir($customTmp, 0777, true);
        }

        // Paksa PHP pakai jalur ini
        if (is_dir($customTmp) && is_writable($customTmp)) {
            putenv("TMPDIR={$customTmp}");
            ini_set('upload_tmp_dir', $customTmp);
        }

        // DAFTARKAN ATURAN SUPER ADMIN
        Gate::define('super-admin-only', function (User $user) {
        return $user->role === 'super_admin'; 
    });
    }
}
