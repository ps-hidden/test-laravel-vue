<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Model\User;

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

        \Gate::define('isAdmin', function (User $user) {
            return $user->role == User::ROLE_ADMIN;
        });
        \Gate::define('isModerator', function (User $user) {
            return in_array($user->role, [User::ROLE_ADMIN, User::ROLE_MODERATOR]);
        });
        \Gate::define('isMember', function (User $user) {
            return $user->role == User::ROLE_MEMBER;
        });
    }
}
