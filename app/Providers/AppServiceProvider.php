<?php

namespace App\Providers;

use App\Services\UserService;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Exercise 3
        $this->app->singleton(UserService::class,function ($app) {
            $users = [
                ['id' => 1, 'name' => 'John Doe'],
                ['id' => 2, 'name' => 'Jane Doe']
            ];
            return new UserService($users);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
