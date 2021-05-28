<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\UsersRepositoryInterface',
            'App\Http\Eloquent\UsersRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\AdminRepositoryInterface',
            'App\Http\Eloquent\AdminRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
