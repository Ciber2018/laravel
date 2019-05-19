<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 18/5/2019
 * Time: 17:41
 */

namespace App\Repositories;


interface EventosInterface
{
    public function eventosDisponibles();
    public function tarjetasAsociadas($id);
    public function eventosFinalizados();

}