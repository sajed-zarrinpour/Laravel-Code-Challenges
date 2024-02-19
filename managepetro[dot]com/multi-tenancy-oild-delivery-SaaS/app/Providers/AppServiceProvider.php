<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Models\User;
use Tenancy\Identification\Contracts\ResolvesTenants;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->resolving(ResolvesTenants::class, function (ResolvesTenants $resolver){
            $resolver->addModel(User::class);
            return $resolver;
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
