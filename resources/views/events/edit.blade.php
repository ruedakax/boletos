@extends('layout')

@section('title',"Crear Comprador")

@section('content')	
	<h1>Editar Evento</h1>
	@if($errors->any())
	 <div class="alert alert-danger" role="alert">
		<h6>¡Hay errores!</h6>		
	 </div>
	@endif	
 <div class="bd-example"> 
 <form method="POST" action="{{url("/eventos/{$event->id}")}}">
  <div class="form-group">
	{{method_field('PUT')}}
	{{csrf_field()}}
    <label for="name">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control {{ $errors->has('name') ? 'is-invalid' :'' }}" value="{{ old('name',$event->nombre) }}"/>
	@if($errors->has('nombre')) 
	 <div class="invalid-feedback" style="display:block;">
        {{$errors->first('nombre')}}
     </div>
	@endif
   </div>
   <div class="form-group">
    <label for="aforo">Aforo</label>
    <input type="number" id="aforo" name="aforo" min="1" placeholder="" class="form-control {{ $errors->has('aforo') ? 'is-invalid' :'' }}" value="{{ old('aforo',$event->aforo) }}"/>
	@if($errors->has('aforo')) 
	<div class="invalid-feedback" style="display:block;">
    {{$errors->first('aforo')}}    
    </div>
	@endif
   </div>  
   <button type="submit" class="btn btn-primary">Actualizar Evento</button>
</form>
<p><a href="{{route('events')}}">Volver</a></p>
</div>
@endsection

 
