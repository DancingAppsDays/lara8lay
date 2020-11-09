<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Migrations\Migration;       //laravel 8.x DOC
use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;

//use \Market\Providers\Schema;           //??

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
        Schema::defaultStringLength(191);
        //
    }
}
