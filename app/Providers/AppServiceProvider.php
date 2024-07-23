<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view.especialidades', function (User $user){
            return $user->rol == '';
        });

        Gate::define('view.doctores', function (User $user){
            return $user->rol == '';
        });

        Gate::define('view.consultorios', function (User $user){
            return $user->rol == '';
        });

        Gate::define('view.pacientes', function (User $user){
            return $user->rol == '';
        });

        Gate::define('view.medicamentos', function (User $user){
            return $user->rol == 'doctor' || $user->rol == '';
        });

        Gate::define('view.material', function (User $user){
            return $user->rol == 'doctor' || $user->rol == '';
        });

        Gate::define('view.cita', function (User $user){
            return $user->rol == 'doctor' || $user->rol == '';
        });
    }
}
