@extends('layout')

@section('title',"Evento {$event->id}")

@section('content')
	<h1>Evento #{{$event->id}}</h1>
	<p>Nombre del evento: {{$event->nombre}}</p>
	<p>Aforo: {{$event->aforo}}</p>
	<!--p><a href="{{url("/usuarios")}}">Volver</a></p-->
	<!--p><a href="{{action('UserController@index')}}">Volver</a></p-->
	<p><a href="{{route('events')}}">Volver</a></p>
@endsection

 
