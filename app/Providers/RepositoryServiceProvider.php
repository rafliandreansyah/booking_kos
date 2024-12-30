<?php

namespace App\Providers;

use App\Interface\Repository\BoardingHouseRepositoryInterface;
use App\Interface\Repository\CategoryRepositoryInterface;
use App\Interface\Repository\CityRepositoryInterface;
use App\Interface\Repository\TransactionRepositoryInterface;
use App\Repository\BoardingHouseRepository;
use App\Repository\CategoryRepository;
use App\Repository\CityRepository;
use App\Repository\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(BoardingHouseRepositoryInterface::class, BoardingHouseRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(CityRepositoryInterface::class, CityRepository::class);
        $this->app->singleton(TransactionRepositoryInterface::class, TransactionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
