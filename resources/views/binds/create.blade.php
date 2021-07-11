@extends('layout')

@section('title',"Crear Asignación")

@section('content')	
	<h1>Crear Asignación</h1>
	@if($errors->any())
	 <div class="alert alert-danger" role="alert">
		<h6>¡Hay errores!</h6>		
	 </div>
	@endif	
 <div class="bd-example"> 
 <form method="POST" action="{{url('/asignaciones')}}">
  <div class="form-group">
  	<label for="users_id">Usuario</label>
	<select class="form-control" name="users_id" id="users_id">
		<option value="">Seleccione Usuario</option>
		@foreach ($userItems as $key => $value)
			<option value="{{ $key }}"> 
				{{ $value }} 
			</option>
		@endforeach		
	</select>
	@if($errors->has('users_id')) 
	<div class="invalid-feedback" style="display:block;">
    	{{$errors->first('users_id')}}    
    </div>
	@endif    
  </div>
  <div class="form-group">
  <label for="boletas">Boletas disponibles:</label>
	{{csrf_field()}}
	<select class="form-control" size="10" multiple  name="boletas[]" id="boletas">
		@foreach ($disponibles as $key => $value)
			<option value="{{ $value }}"> 
				{{ $value }} 
			</option>
		@endforeach      		
	</select>
	@if($errors->has('boletas')) 
	<div class="invalid-feedback" style="display:block;">
    	{{$errors->first('boletas')}}    
    </div>
	@endif        
	<input type="hidden" name="evento_id" id="evento_id" value="{{$event->id}}"/>
  </div>
  <div class="form-group">
    
  </div>  
  <button type="submit" class="btn btn-primary">Crear Asignación</button>
</form>
<p><a href="{{route('events')}}">Volver</a></p>
</div>
@endsection

 
