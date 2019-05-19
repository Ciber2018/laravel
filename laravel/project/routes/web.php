<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/editar', 'HomeController@editar')->name('editar');

Route::post('/home/editar_datos', 'HomeController@editar_datos')->name('edit_data');

Route::get('/evento', 'EventoController@index')->name('evento_index');

Route::get('evento/{id}', 'EventoController@show')->name('disponibles');

Route::post('evento/seleccionados','EventoController@seleccionados')->name('seleccion');

Route::get('/atras',function (){
    return redirect()->back();
})->name('back');
