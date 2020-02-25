<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //define our gates here 

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin', 'author']);   //manage users are they admin or author
    });

    //if in future you want author to edit also
    Gate::define('edit-users', function($user){
        return $user->hasAnyRoles(['admin', 'author']);
    });

        // Gate::define('edit-users', function($user){
        //         return $user->hasRole('admin');
        // });

        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
      });


    }
}
