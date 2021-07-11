<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/usuarios');
});

Route::get('/usuarios','UserController@index')
	->name('users');

Route::get('/eventos','EventoController@index')
	->name('events');

Route::get('usuarios/nuevo','UserController@create')
    ->name('users.create');

Route::get('eventos/nuevo','EventoController@create')
    ->name('events.create');

Route::post('/usuarios','UserController@store');

Route::post('/eventos','EventoController@store');

Route::get('usuarios/{user}','UserController@show')
	->where('user','[0-9]*')
	->name('users.show');

Route::get('eventos/{event}','EventoController@show')
	->where('event','[0-9]*')
	->name('events.show');

Route::get('usuarios/{user}/edit','UserController@edit')
	->name('users.edit')
	->where('user','[0-9]*');

Route::get('eventos/{event}/edit','EventoController@edit')
	->name('events.edit')
	->where('evento','[0-9]*');

Route::put('usuarios/{user}','UserController@update');
Route::put('eventos/{event}','EventoController@update');

Route::delete('usuarios/{user}','UserController@destroy')->name('users.delete');
Route::delete('eventos/{event}','EventoController@destroy')->name('events.delete');

Route::get('/asignaciones/{event}/bind','AsignacionController@create')
	->name('binds');

Route::post('/asignaciones','AsignacionController@store');