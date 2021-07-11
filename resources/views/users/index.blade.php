@extends('layout')

@section('title','Listado')

@section('content')
	<h1>{{$title}}</h1>
	<p><a href="{{route('users.create')}}">Crear Comprador</a></p>
	@if($users->isNotEmpty())
	<div class="table-responsive-md">
		<table class="table">
			<table class="table table-sm">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">Nombre</th>
				  <th scope="col">Correo</th>
				  <th scope="col">&nbsp;</th>
				</tr>
			  </thead>
			  <tbody>
			  @foreach($users as $key=>$user)
				<tr>
				  <th scope="row">{{++$key}}</th>
				  <td><a href="{{route("users.show",$user)}}")> {{$user->name}} </a></td>
				  <td>{{$user->email}}</td>
				  <td> 				  
				  <a href="{{route("users.edit",$user)}}"><span class="oi oi-pencil"></span></a> 			
				  <meta name="csrf-token" content="{{ csrf_token() }}">
				  <a href="{{route("users.delete",$user)}}" data-method="DELETE" class="jquery-postback"><span class="oi oi-trash"></a>   
				 </td>
				</tr>
			   @endforeach			
			  </tbody>
			</table>
		</table>
	</div>	
	@else
		<p>No hay usuarios Registrados</p>
	@endif			
@endsection