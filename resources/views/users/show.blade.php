@extends('layout')

@section('title',"Usuario {$user->id}")

@section('content')
	<h1>Usuario #{{$user->id}}</h1>
	<p>Nombre del usuario: {{$user->name}}</p>
	<p>Email: {{$user->email}}</p>
	<!--p><a href="{{url("/usuarios")}}">Volver</a></p-->
	<!--p><a href="{{action('UserController@index')}}">Volver</a></p-->
	<p><a href="{{route('users')}}">Volver</a></p>
@endsection

 
