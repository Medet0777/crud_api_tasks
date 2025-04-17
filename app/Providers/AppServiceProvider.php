<?php

namespace App\Providers;

use App\Contracts\TaskRepositoryContract;
use App\Contracts\TaskServiceContract;
use App\Repositories\Eloquent\TaskRepository;
use App\Services\TaskService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            TaskRepositoryContract::class,
            TaskRepository::class,
        );
        $this->app->bind(
            TaskServiceContract::class,
            TaskService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
