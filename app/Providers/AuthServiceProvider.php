<?php

namespace App\Providers;

use App\Policies\UserPolicy;
use Facade\FlareClient\Http\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */


    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('isAdmin', function ($user) {
        //     return $user->role == 'administrator';
        // });

        Gate::define('delete-permission', function($user) {
            return ($user->roles == 'administrator');
        });

        // Gate::define('isCustomer', function ($user) {
        //     return $user->role == 'customer';
        // });

        // Gate::define('isSeller', function ($user) {
        //     return $user->role == 'seller';
        // });
    }
}
