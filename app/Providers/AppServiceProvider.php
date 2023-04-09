<?php

namespace App\Providers;

use App\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\DeveloperRepository;
use App\Contracts\Repositories\TaskRepositoryContract;
use App\Contracts\Repositories\DeveloperRepositoryContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(DeveloperRepositoryContract::class, DeveloperRepository::class);
        $this->app->singleton(TaskRepositoryContract::class, TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
