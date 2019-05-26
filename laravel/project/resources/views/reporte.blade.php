<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 25/5/2019
 * Time: 22:22
 */
?>

@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="container">
                    <h2>Reporte</h2>
                    <br>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Evento</th>
                            <th>Tarjeta</th>
                            <th>Status del Juego</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($user_cards as $item)
                            <tr>
                                <td>{{ $item->evento}}</td>
                                <td>{{ $item->numberCard }}</td>
                                @if($item->pivot->status == "W")
                                <td><h5>Winner!!!</h5></td>
                                @elseif($item->pivot->status == "L")
                                <td><h5>Looser!!!</h5></td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('home') }}" role="button" class="btn btn-info">Inicio</a>
                    <br>
                </div>
        </div>
    </div>

@endsection

