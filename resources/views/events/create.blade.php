@extends('layout')

@section('title',"Crear Evento")

@section('content')	
	<h1>Crear Evento</h1>
	@if($errors->any())
	 <div class="alert alert-danger" role="alert">
		<h6>¡Hay errores!</h6>
		<!--ul>
		{{--@foreach($errors->all() as $unError)--}}
			{{--<li>{{$unError}}</li>--}}
		{{--@endforeach--}}
		</ul-->
	 </div>
	@endif	
 <div class="bd-example"> 
 <form method="POST" action="{{url('/eventos')}}">
  <div class="form-group">
	{{csrf_field()}}
    <label for="name">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control {{ $errors->has('nombre') ? 'is-invalid' :'' }}" value="{{ old('nombre') }}"/>
	@if($errors->has('nombre')) 
	 <div class="invalid-feedback" style="display:block;">
        {{$errors->first('nombre')}}
     </div>
	@endif
   </div>
   <div class="form-group">
    <label for="aforo">Aforo</label>
    <input type="number" id="aforo" name="aforo" min="1" placeholder="" class="form-control {{ $errors->has('aforo') ? 'is-invalid' :'' }}" value="{{ old('aforo') }}"/>
	@if($errors->has('aforo')) 
	<div class="invalid-feedback" style="display:block;">
    {{$errors->first('aforo')}}    
    </div>
	@endif
   </div>  
   <button type="submit" class="btn btn-primary">Crear Evento</button>
</form>
<p><a href="{{route('events')}}">Volver</a></p>
</div>
@endsection

 
