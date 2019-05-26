<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 19/5/2019
 * Time: 12:26
 */

namespace App\Repositories;

//use App\Card;
use App\Card;
use App\User;
use Illuminate\Http\Request;
//use App\Repositories\UserRepositoryInterface;
use App\Interfaces\CardRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;


class CardRepository implements CardRepositoryInterface
{

    protected $users;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }


    public function adicionar(Request $request)
    {
          $numeros = $request->card;
          $evento = $request->evento;
          $id = auth()->user()->getAuthIdentifier();
          $actual_user = User::find($id);

          for ($i =0;$i < count($numeros); $i++)
          {
              $insertada =  Card::where('numberCard',$numeros[$i])->first();

              if($insertada != null){
                  $actual_user->cards()->attach($insertada->id);
              }else{
                  $tarjeta = new Card();
                  $tarjeta->numberCard= $numeros[$i];
                  $tarjeta->evento = $evento;
                  $tarjeta->save();

                  $insertada =  Card::where('numberCard',$numeros[$i])->first();
                  $actual_user->cards()->attach($insertada->id);
              }
          }
    }


}