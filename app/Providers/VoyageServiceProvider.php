<?php

namespace App\Providers;

use App\Repositories\VoyageRepository;
use App\Repositories\VoyageRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class VoyageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(VoyageRepositoryInterface::class, VoyageRepository::class);
    }
}
