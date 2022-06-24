<?php

namespace App\Providers;

use App\Services\DefaultSortition;
use App\Services\SimpleTextEntry;
use App\Services\Interfaces\DrawSortitionInterface;
use App\Services\Interfaces\SortitionEntryInterface;
use App\Services\Interfaces\SortitionInterface;
use App\Services\SingleEntryDrawSortition;
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
        $this->app->bind(SortitionInterface::class, function($app) {
            return new DefaultSortition();
        });

        $this->app->bind(SortitionEntryInterface::class, function($app) {
            return new SimpleTextEntry();
        });

        $this->app->bind(DrawSortitionInterface::class, function($app) {
            return new SingleEntryDrawSortition();
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
    }
}
