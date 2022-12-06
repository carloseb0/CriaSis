<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Auth\Access\Response;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {

            if ($user->IDPERFIL === 1) {
                return Response::allow();
            } else {
                return Response::deny('ACESSO NEGADO!! Você não possui Permissão');
            }
        });

        Gate::define('veterinario', function (User $user) {

            if ($user->IDPERFIL === 2) {
                return Response::allow();
            } else {
                return Response::deny('ACESSO NEGADO!! Você não possui Permissão');
            }
        });

        Gate::define('veterinario-admin', function (User $user) {

            if ($user->IDPERFIL === 2 or $user->IDPERFIL === 1) {
                return Response::allow();
            } else {
                return Response::deny('ACESSO NEGADO!! Você não possui Permissão');
            }
        });
    }

}
