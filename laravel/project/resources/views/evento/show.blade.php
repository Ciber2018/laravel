<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 18/5/2019
 * Time: 12:38
 */
?>

@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('seleccion') }}">
                @csrf
                <div class="container">
                    <h2>Tarjetas Disponibles</h2>
                    <br>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Seleccion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tarjetas as $tarjeta)
                            <tr>
                                <td>{{ $tarjeta->numeroID}}</td>
                                <td><input type="checkbox" name="card[]" value="{{ $tarjeta->numeroID }}"></td>
                                <td><input type="text" name="evento" value="{{ $evento_id }}" hidden></td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-info">Seleccionar</button>
                    <a href="{{ route('evento_index') }}" role="button" class="btn btn-info"> Atras</a>
                    <br>
                </div>
            </form>
        </div>
    </div>

@endsection

