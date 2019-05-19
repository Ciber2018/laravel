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
 <form method="POST" action="{{ route('seleccion') }}">
     @csrf
    <div class="container">
        <h2>Tarjetas Disponibles</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Numero</th>
                <th>Seleccion</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @forelse($tarjetas as $tarjeta)
                <td>{{ $tarjeta-> numeroID}}</td>
                <td><input type="checkbox" name="card[]" value="{{ $tarjeta-> numeroID }}"></td>
                @empty
                @endforelse
            </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-info">Seleccionar</button>
    </div>

</form>
@endsection

