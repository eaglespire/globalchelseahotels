<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Database\Eloquent\Relations\Relation;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\SalesChart::class
        ]);
        
        Schema::defaultStringLength(191);
        Relation::morphMap([
           'room_type' => 'App\Models\RoomType',
           'post' => 'App\Models\Post',
           'gallery' => 'App\Models\Gallery' 
        ]);
    }
}