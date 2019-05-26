<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 18/5/2019
 * Time: 17:44
 */

namespace App\API;

use GuzzleHttp\Client;


class Eventos
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:27807/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }

    public function eventosDisponibles()
    {
        return $this->get('api/Values/GetEventosDisponibles');
    }

    public function tarjetasAsociadas($id)
    {
        return $this->get("api/Values/GetTarjetasAsociadas/{$id}");

    }

    public function eventosFinalizados()
    {
        // TODO: Implement eventosFinalizados() method.
        return $this->get('api/values/GetEventosFinalizados');
    }

    public function get($url)
    {
        $response = $this->client->request('GET',$url);

        return json_decode($response->getBody()->getContents());
    }

}