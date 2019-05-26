<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 13/5/2019
 * Time: 23:29
 */

namespace App\Repositories;


use App\Adapter\EventosAdapter;
use App\Interfaces\EventosAdapterInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('App\Interfaces\UserRepositoryInterface',
                         'App\Repositories\UserRepository');

        $this->app->bind('App\Interfaces\CardRepositoryInterface',
                         'App\Repositories\CardRepository');

        $this->app->singleton(EventosAdapterInterface::class,function($app){
            switch ($app->make('config')->get('services.api')){
                case 'guzzle':
                    return new EventosAdapter;
                default:
                    throw new \RuntimeException("Servicio API Desconocido");
            }
        });
    }
}