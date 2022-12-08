<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Finance\FinanceService;
use App\Repositories\Basic\UserRepository;
use App\Interfaces\Services\Finance\IFinanceService;
use App\Interfaces\Repositories\Basic\IUserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
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
        $this->app->bind(IFinanceService::class, FinanceService::class);
    }

    /**
     * @return void
     */
    public function registerRepositories(): void
    {
        $this->app->singleton(IUserRepository::class, UserRepository::class);
    }
}
