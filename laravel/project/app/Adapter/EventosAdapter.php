<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 22/5/2019
 * Time: 12:07
 */

namespace App\Adapter;

use App\Interfaces\EventosAdapterInterface;
use App\API\Eventos;
use App\User;


class EventosAdapter implements EventosAdapterInterface
{
   protected $eventos;

   public function __construct()
   {
       $this->eventos = new Eventos();
   }

   public function Disponibles()
   {
       return $this->eventos->eventosDisponibles();
   }

   public function Finalizados()
   {
       return $this->eventos->eventosFinalizados();
   }

   public function Asociadas($id)
   {
       return $this->eventos->tarjetasAsociadas($id);
   }

   public function FinalizadosAsArray()
   {
       // TODO: Implement FinalizadosAsArray() method.
       $eventos_finales = $this->eventos->eventosFinalizados();
       $collection = collect([]);

       foreach ($eventos_finales as $evento){
           for ($i = 0; $i < count($evento->tarjeta); $i++){
               $collection->push($evento->tarjeta[$i]);
           }
       }

       return $collection->toArray();
   }

   public function UpdateExistingPivot()
   {
       // TODO: Implement UpdateExistingPivot() method.
       $tarjetas_finalizadas = $this->FinalizadosAsArray();
       $usuarios = User::all();

       for($i = 0; $i < count($tarjetas_finalizadas); $i++){
           foreach ($usuarios as $item){
               $valor = $item->cards()->where('evento',$tarjetas_finalizadas[$i]->id)
                   ->where('numberCard',$tarjetas_finalizadas[$i]->numeroID)
                   ->get();


               $this->SavePivot($valor,$tarjetas_finalizadas[$i]);

           }

       }

   }

   public function SavePivot($item,$tarjeta_evento)
   {
       // TODO: Implement UpdatePivot() method.
       foreach ($item as $values){

           if($values->numberCard == $tarjeta_evento->numeroID && $values->evento == $tarjeta_evento->id){
               $values->pivot->status = $tarjeta_evento->estado;
               $values->pivot->save();
           }
       }
   }


}