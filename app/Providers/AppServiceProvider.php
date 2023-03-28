<?php

namespace App\Providers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
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

        Gate::define('member', function ($user) {
            return $user->role === 'Member';
        });

        view()->composer('*', function ($view) {
            $data = Transaksi::whereNull('deleted_at')->orderBy('created_at', 'desc')->take(5)->get();
            $count = Transaksi::whereNull('deleted_at')->count();
            $datas = DetailTransaksi::all();

            $view->with('data', $data)
                ->with('count', $count)
                ->with('datas', $datas);
        });
    }
}
