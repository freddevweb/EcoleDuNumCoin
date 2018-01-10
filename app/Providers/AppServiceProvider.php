<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\InterfaceRepository;
use App\Repositories\CryptoCoinRepository;
use App\Repositories\AdressRepository;

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
		Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		//
		$this->app->singleton( InterfaceRepository::class, AdressRepository::class );
		$this->app->singleton( InterfaceRepository::class, CryptoCoinRepository::class );
    }
}
