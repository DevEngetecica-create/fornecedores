<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\FornecedorRepository;
use App\Repositories\Interfaces\FornecedorRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(FornecedorRepositoryInterface::class, FornecedorRepository::class);
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         //
         Schema::defaultStringLength(191);
    }
}
