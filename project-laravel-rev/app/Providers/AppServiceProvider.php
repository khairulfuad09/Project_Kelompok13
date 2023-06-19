<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user->id_status === 'adm';
        });
        Gate::define('user', function (User $user) {
            return $user->id_status === 'usr';
        });
        Gate::define('penjual', function (User $user) {
            return $user->id_status === 'pnj';
        });
    }
}
