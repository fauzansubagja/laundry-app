<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->role === 'Admin';
        });

        Gate::define('kasir', function ($user) {
            return $user->role === 'Kasir';
        });

        Gate::define('owner', function ($user) {
            return $user->role === 'Owner';
        });

        view()->composer('*', function($view) {
            $users = User::take(5)->get();
            $view->with('users', $users);
       });       
    }
}
