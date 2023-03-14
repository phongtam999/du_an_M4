<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'User::class' => 'App\Policies\UserPolicy',
         'User::class' => 'App\Policies\ProductPolicy',
         'User::class' => 'App\Policies\CategoryPolicy',
         'User::class' => 'App\Policies\GroupPolicy',
         'User::class' => 'App\Policies\OrderPolicy',
         'User::class' => 'App\Policies\CustomerPolicy',
    ];
   


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
