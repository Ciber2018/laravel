<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 15/5/2019
 * Time: 22:20
 */
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-success">
                <strong>Success!</strong> {{ $msg }} <a href="{{ route('home') }}" class="alert-link">Atras</a>
            </div>
        </div>
    </div>

</div>



@endsection