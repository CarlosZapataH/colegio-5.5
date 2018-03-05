<?php

namespace App\Providers;

use App\Asistencia;
use App\Grado;
use App\Http\Repositories\AsistenciaRepository;
use App\Http\Repositories\SeccionRepository;
use App\Seccion;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\NivelRepository;
use App\Http\Repositories\GradoRepository;
use App\Nivel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Http\Contracts\IAsistencia', function ($app) {
            return new AsistenciaRepository(new Asistencia);
        });

        $this->app->bind('App\Http\Contracts\INivel', function ($app) {
            return new NivelRepository(new Nivel);
        });

        $this->app->bind('App\Http\Contracts\IGrado', function ($app) {
            return new GradoRepository(new Grado);
        });

        $this->app->bind('App\Http\Contracts\Iseccion', function ($app) {
            return new SeccionRepository(new Seccion);
        });


    }
}
