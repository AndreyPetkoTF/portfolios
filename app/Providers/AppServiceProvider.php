<?php

namespace App\Providers;

use App\Repositories\Position\JsonPositionRepository;
use App\Repositories\Position\PositionRepository;
use App\Repositories\Summary\JsonSummaryRepository;
use App\Repositories\Summary\SummaryRepository;
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
        $this->app->bind(SummaryRepository::class, JsonSummaryRepository::class);
        $this->app->bind(PositionRepository::class, JsonPositionRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app
            ->when(JsonSummaryRepository::class)
            ->needs('$pathToFile')
            ->give($this->app['config']->get('filesystems.path_to_summaries'));

        $this->app
            ->when(JsonPositionRepository::class)
            ->needs('$pathToFile')
            ->give($this->app['config']->get('filesystems.path_to_positions'));
    }
}
