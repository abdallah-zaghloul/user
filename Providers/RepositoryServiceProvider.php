<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(\Modules\User\Repositories\UserRepository::class, \Modules\User\Repositories\UserRepositoryEloquent::class);
        //:end-bindings:
    }
}
