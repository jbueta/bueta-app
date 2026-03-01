<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductService;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductService::class, function ($app){
            $products = [
                [
                    'id' => 1,
                    'name' => 'Apple Cider',
                    'category' => 'foods'
                ],
                [
                    'id' => 2,
                    'name' => 'Buzzer',
                    'category' => 'electronics'

                ],
                [
                    'id' => 3,
                    'name' => 'Ballpen',
                    'category' => 'School Supplies'
                ]
            ];

            return new ProductService($products);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->share('productKey','abc123');
    }
}