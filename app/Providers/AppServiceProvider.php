<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use \App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();

        // mmebuat gate/gerbang/akses tertentu yang boleh akses
        // disin akan membuat akses admin
        Gate::define('admin', function (User $user) {
            //lakukan negambil data role/cek data dari dolum role_id tabel users
            // kalau nilai 1 = true
            // kalau 0 = false
            return $user->role_id;
        });

        Gate::define('user', function (User $user) {
            return $user->role_id == 0;
        });
    }
}
