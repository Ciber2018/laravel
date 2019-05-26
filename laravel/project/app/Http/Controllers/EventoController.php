<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Interfaces\CardRepositoryInterface;
use App\Interfaces\EventosAdapterInterface;


class EventoController extends Controller
{

    protected $eventos;
    protected $cards;
    protected $users;

    public function __construct(EventosAdapterInterface $eventos, CardRepositoryInterface $cards)
    {
        $this->middleware('auth');
        $this->eventos = $eventos;
        $this->cards = $cards;
    }

    public function index()
    {
        $eventos = $this->eventos->Disponibles();
        return view('evento.index',compact('eventos'));
    }

    public function show($id)
    {
        $tarjetas = $this->eventos->Asociadas($id);
        $evento_id = $id;
        return view('evento.show',compact('tarjetas','evento_id'));
    }

    public function seleccionados(Request $request)
    {
        $this->cards->adicionar($request);
        return view('succes',['msg' =>'Todo Bien']);
    }
}
