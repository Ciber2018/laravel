<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/15/2019
 * Time: 10:47 AM
 */
?>

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2>Ingrese el nuevo o nuevos valores</h2>
                <hr/>
                <form method="POST" action="{{ route('edit_data') }}">
                    @csrf

                    <div class="form-group" >
                        <label for="nombre">Cambiar Usuario</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>

                    <div class="form-group" >
                        <label for="nombre">Cambiar Contraseña</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('password') }}</strong>
                             </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary" id="buttonE">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>


@endsection

