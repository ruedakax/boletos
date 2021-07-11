@extends('layout')

@section('title',"Evento {$event->id}")

@section('content')
	<h1>Evento #{{$event->id}}</h1>
	<p>Nombre del evento: {{$event->nombre}}</p>
	<p>Aforo: {{$event->aforo}}</p>	
	<p>Números de boleta asignados:</p>
	<ul class="list-group">
	@foreach($asignados as $key=>$asignado)
  		<li class="list-group-item">{{$asignado['email']}} : {{$asignado['boleta']}}</li>
	@endforeach			
	</ul>
	<p><a href="{{route('events')}}">Volver</a></p>
@endsection

 
