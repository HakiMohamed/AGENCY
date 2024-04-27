<?php

namespace App\Providers;

use App\Repositories\PropertyRepository;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\AuthInterface;
use App\Services\AuthService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CaracteristiqueRepository;
use App\Repositories\CaracteristiqueRepositoryInterface;
use App\Services\PropertyService;
use App\Services\PropertyServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, AuthService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PropertyRepositoryInterface::class, PropertyRepository::class);
        $this->app->bind(CaracteristiqueRepositoryInterface::class, CaracteristiqueRepository::class);
        $this->app->bind(PropertyServiceInterface::class,PropertyService::class);
    }

        

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
     Paginator::useBootstrap();
}
}
