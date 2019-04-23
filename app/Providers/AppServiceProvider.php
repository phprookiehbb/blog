<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\Nav;
use Illuminate\Support\Facades\Schema;
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
<<<<<<< HEAD
        Schema::defaultStringLength(191);
=======
     	 Schema::defaultStringLength(191);
>>>>>>> crasp
        view()->composer('home.layout.header', function ($view){
            $navbars = Nav::orderBy('sort','asc')->get()->toTree();
            $view->with('navbars', $navbars);
        });
        view()->composer('home.layout.footer', function ($view){
            $navbars = Nav::orderBy('sort','asc')->get()->toTree();
            $view->with('navbars', $navbars);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        //配置信息到前后台
//        view()->share('sys_config',Config::pluck('value','name')->toArray());
    }
}
