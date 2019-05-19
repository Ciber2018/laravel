<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EventosInterface;
use App\Repositories\CardRepositoryInterface;


class EventoController extends Controller
{

    protected $eventos;
    protected $cards;

    public function __construct(EventosInterface $eventos, CardRepositoryInterface $cards)
    {
        $this->middleware('auth');
        $this->eventos = $eventos;
        $this->cards = $cards;
    }

    public function index()
    {
        $eventos = $this->eventos->eventosDisponibles();

        return view('evento.index',compact('eventos'));
    }

    public function show($id)
    {
        $tarjetas = $this->eventos->tarjetasAsociadas($id);

        return view('evento.show',compact('tarjetas'));
    }

    public function seleccionados(Request $request)
    {
        $this->cards->adicionar($request);
        return view('succes',['msg' =>'Todo Bien']);
    }
}
