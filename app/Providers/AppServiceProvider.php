<?php

namespace App\Providers;

use App\Foo;
use App\FooContract;
use App\FooDecorator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FooContract::class, fn () => new Foo('any'));

        $decorator = new FooDecorator(
            $this->app->make(FooContract::class)
        );

        $this->app->instance(FooContract::class, $decorator);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
