<?php

namespace App\Providers;

use App\Adapters\Presenters;
use App\Domain;
use App\Factories;
use App\Http\Controllers as HttpControllers;
use App\Repositories;
use App\Domain\UseCases;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            Domain\Interfaces\UserFactory::class,
            Factories\UserModelFactory::class,
        );

        $this->app->bind(
            Domain\Interfaces\UserRepository::class,
            Repositories\UserDatabaseRepository::class,
        );

        $this->app
            ->when(HttpControllers\CreateUserController::class)
            ->needs(UseCases\CreateUser\CreateUserInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\CreateUser\CreateUserInteractor::class, [
                    'output' => $app->make(Presenters\CreateUserJsonPresenter::class),
                ]);
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
