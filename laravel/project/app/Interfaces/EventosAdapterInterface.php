<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 18/5/2019
 * Time: 17:41
 */

namespace App\Interfaces;


interface EventosAdapterInterface
{
    public function Disponibles();
    public function Asociadas($id);
    public function Finalizados();
    public function FinalizadosAsArray();
    public function UpdateExistingPivot();
    public function SavePivot($item,$tarjeta_evento);
}