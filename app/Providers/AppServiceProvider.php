<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


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
        $username = 'nam';
        $menus = [
          'trang chu',
          'trang danh sach'
        ];
        View::share('menus', $menus);
        View::share('username', $username);
    }
}
