<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 17/5/2019
 * Time: 09:04
 */
?>

@extends('layouts.app')

@section('content')
<div id="mensaje"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-6">
            <ul class="list-group">
                @foreach($eventos as $evento)
                <li class="list-group-item list-group-item-light"><a href="{{ route ('disponibles',['id' => $evento->id]) }}">{{ $evento->id }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


@endsection
