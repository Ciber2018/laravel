<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 19/5/2019
 * Time: 12:26
 */

namespace App\Repositories;

use App\Card;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;


class CardRepository implements CardRepositoryInterface
{


    public function adicionar(Request $request)
    {
          $numeros = $request->card;

          for ($i =0;$i < count($numeros); $i++)
          {
              $usuario = auth()->user()->getAuthIdentifier();
              $tarjeta = new Card();
              $tarjeta->user_id = $usuario;
              $tarjeta->numero = $numeros[$i];
              $tarjeta->save();
          }
    }

}