@extends('layout')

@section('title',"Crear Comprador")

@section('content')	
	<h1>Editar Usuario</h1>
	@if($errors->any())
	 <div class="alert alert-danger" role="alert">
		<h6>¡Hay errores!</h6>		
	 </div>
	@endif	
 <div class="bd-example"> 
 <form method="POST" action="{{url("/usuarios/{$user->id}")}}">
  <div class="form-group">
	{{method_field('PUT')}}
	{{csrf_field()}}
    <label for="name">Nombre</label>
    <input type="text" id="name" name="name" placeholder="Nombre" class="form-control {{ $errors->has('name') ? 'is-invalid' :'' }}" value="{{ old('name',$user->name) }}"/>
	@if($errors->has('name')) 
	 <div class="invalid-feedback" style="display:block;">
        {{$errors->first('name')}}
     </div>
	@endif
   </div>
   <div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="email@email.co" class="form-control {{ $errors->has('email') ? 'is-invalid' :'' }}" value="{{ old('email',$user->email) }}"/>
	@if($errors->has('email')) 
	<div class="invalid-feedback" style="display:block;">
    {{$errors->first('email')}}    
    </div>
	@endif
   </div>  
   <button type="submit" class="btn btn-primary">Actualizar usuario</button>
</form>
<p><a href="{{route('users')}}">Volver</a></p>
</div>
@endsection

 
