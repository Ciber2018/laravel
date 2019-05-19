<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 13/5/2019
 * Time: 23:29
 */

namespace App\Repositories;


use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('App\Repositories\UserRepositoryInterface',
                         'App\Repositories\UserRepository');

        $this->app->bind('App\Repositories\EventosInterface',
                         'App\Repositories\Eventos');

        $this->app->bind('App\Repositories\CardRepositoryInterface',
                         'App\Repositories\CardRepository');
    }
}