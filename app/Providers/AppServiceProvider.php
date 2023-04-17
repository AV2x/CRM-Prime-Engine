<?php

namespace App\Providers;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Services\Storage\ProductStorage;
use App\Services\Storage\Storage;
use App\Services\Storage\UserStorage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->when(UserController::class)
            ->needs(Storage::class)
            ->give(UserStorage::class);

        $this->app->when(ProductController::class)
            ->needs(Storage::class)
            ->give(ProductStorage::class);
    }
}
