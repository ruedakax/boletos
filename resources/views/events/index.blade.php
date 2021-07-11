@extends('layout')

@section('title','Listado')

@section('content')
	<h1>{{$title}}</h1>
	<p><a href="{{route('events.create')}}">Crear Evento</a></p>
	@if($events->isNotEmpty())
	<div class="table-responsive-md">
		<table class="table">
			<table class="table table-sm">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">Nombre</th>
				  <th scope="col">Aforo</th>
				  <th scope="col">&nbsp;</th>
				</tr>
			  </thead>
			  <tbody>
			  @foreach($events as $key=>$event)
				<tr>
				  <th scope="row">{{++$key}}</th>
				  <td><a href="{{route("events.show",$event)}}")> {{$event->nombre}} </a></td>
				  <td>{{$event->aforo}}</td>
				  <td> 
				  <a href="{{route("binds",$event)}}"><span class="oi oi-person"></span></a> 			
				  <a href="{{route("events.edit",$event)}}"><span class="oi oi-pencil"></span></a> 			
				  <meta name="csrf-token" content="{{ csrf_token() }}">
				  <a href="{{route("events.delete",$event)}}" data-method="DELETE" class="jquery-postback"><span class="oi oi-trash"></a>   
				 </td>
				</tr>
			   @endforeach			
			  </tbody>
			</table>
		</table>
	</div>	
	@else
		<p>No hay eventos Registrados</p>
	@endif			
@endsection