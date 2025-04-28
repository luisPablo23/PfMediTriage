<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * El mapa de políticas para la aplicación.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Registra los servicios de autenticación para la aplicación.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Definir el gate 'isAdmin'
        Gate::define('isAdmin', function ($user) {
            return $user->role === 'admin';
        });
    }
}
