<?php

namespace App\Providers;

use App\Interfaces\Repositories\Basic\IUserRepository;
use App\Interfaces\Repositories\Sale\ICoinRepository;
use App\Interfaces\Repositories\Sale\IUserCoinRepository;
use App\Interfaces\Services\Sale\IUserCoinService;
use App\Repositories\Basic\UserRepository;
use App\Repositories\Sale\CoinRepository;
use App\Repositories\Sale\UserCoinRepository;
use App\Services\Sale\UserCoinService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerServices();
        $this->registerRepositories();
    }

    /**
     * @return void
     */
    public function registerServices(): void
    {
        $this->app->bind(IUserCoinService::class, UserCoinService::class);
    }

    /**
     * @return void
     */
    public function registerRepositories(): void
    {
        $this->app->singleton(IUserRepository::class, UserRepository::class);
        $this->app->singleton(ICoinRepository::class, CoinRepository::class);
        $this->app->singleton(IUserCoinRepository::class, UserCoinRepository::class);
    }
}
