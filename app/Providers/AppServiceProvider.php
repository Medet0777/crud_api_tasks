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
        // Привязка контрактов к реализациям
        $this->app->bind(
            TaskRepositoryContract::class,
            TaskRepository::class
        );

        $this->app->bind(
            TaskServiceContract::class,
            TaskService::class
        );

        // Регистрация фасада repository
        $this->app->singleton('repository', function ($app) {
            return new class {
                public function task()
                {
                    return app(TaskRepositoryContract::class);
                }
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
