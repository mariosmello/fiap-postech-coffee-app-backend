<?php

namespace App\Providers;

use App\Adapters\Presenters;
use App\Domain;
use App\Domain\UseCases;
use App\Factories;
use App\Http\Controllers as HttpControllers;
use App\Repositories;
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
            Domain\Interfaces\ProductFactory::class,
            Factories\ProductModelFactory::class,
        );

        $this->app->bind(
            Domain\Interfaces\UserRepository::class,
            Repositories\UserDatabaseRepository::class,
        );

        $this->app->bind(
            Domain\Interfaces\ProductRepository::class,
            Repositories\ProductDatabaseRepository::class,
        );

        $this->app
            ->when(HttpControllers\CreateUserController::class)
            ->needs(UseCases\User\CreateUser\CreateUserInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\User\CreateUser\CreateUserInteractor::class, [
                    'output' => $app->make(Presenters\CreateUserJsonPresenter::class),
                ]);
            });

        $this->app
            ->when(HttpControllers\IndexUserController::class)
            ->needs(UseCases\User\FindUser\FindUserInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\User\FindUser\FindUserInteractor::class, [
                    'output' => $app->make(Presenters\FindUserJsonPresenter::class),
                ]);
            });

        $this->app
            ->when(HttpControllers\CreateProductController::class)
            ->needs(UseCases\Product\CreateProduct\CreateProductInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\Product\CreateProduct\CreateProductInteractor::class, [
                    'output' => $app->make(Presenters\CreateProductJsonPresenter::class),
                ]);
            });

        $this->app
            ->when(HttpControllers\DeleteProductController::class)
            ->needs(UseCases\Product\DeleteProduct\DeleteProductInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\Product\DeleteProduct\DeleteProductInteractor::class, [
                    'output' => $app->make(Presenters\DeleteProductJsonPresenter::class),
                ]);
            });

        $this->app
            ->when(HttpControllers\UpdateProductController::class)
            ->needs(UseCases\Product\UpdateProduct\UpdateProductInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\Product\UpdateProduct\UpdateProductInteractor::class, [
                    'output' => $app->make(Presenters\UpdateProductJsonPresenter::class),
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
