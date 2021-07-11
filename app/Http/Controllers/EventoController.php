<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Evento;
use App\Asignacion;
use App\User;


class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Evento::all();			
		
		$title = 'Listado de Eventos';
		
		return view('events.index',compact('events','title'));
    }    

    public function show(Evento $event){ 
		$asignados = $event->asignaciones->toArray();		
		$asignados = count($asignados) <= 0?[]:$this->getAsignados($asignados);		
		return view('events.show',compact('event','asignados'));
	}
	
	public function edit(Evento $event){
		
		return view('events.edit',['event' => $event,]);
	}
	
	public function update(Evento $event){
		
		$data = request()->validate([
			'nombre' => 'required',
			'aforo'=>['required','numeric','min:1'],			
		],[
			'nombre.required' => 'El campo nombre es obligatorio.',
			'aforo.required' => 'El campo aforo es obligatorio.',			
			'aforo.numeric' => 'El aforo debe ser un valor numérico',
            'aforo.min' => 'El aforo no puede ser negativo',
		]);			
		
		$event->update($data);
		
		return redirect()->route("events.show",['event' => $event]);
	}
	
	public function create(){
		return view('events.create');
	}
	
	public function store(){
		
		//dd(request()->all());
		$data = request()->validate([
			'nombre' => 'required',
			'aforo'=>['required','numeric','min:1'],
		],[
			'name.required' => 'El campo nombre es obligatorio.',
			'aforo.required' => 'El campo aforo es obligatorio.',			
			'aforo.numeric' => 'El aforo debe ser un valor numérico',
            'aforo.min' => 'El aforo no puede ser negativo',
		]);			
			
		Evento::create([
			'nombre' => $data['nombre'],
			'aforo' => $data['aforo'],			
		]);			
		return redirect()->route('events');
	}
	
	public function destroy(Evento $event){		
		$event->delete();
		return redirect()->route('events');
	}	

	/*obtiene las boeltas del array de asignaciones*/
    private function getAsignados($arrayBoletas){		
        $arrayFinal = [];
        foreach ($arrayBoletas as $key => $value) {			
			$usuario = User::find($value['users_id']);
            array_push($arrayFinal,array("boleta"=>$value['boleta'],
										 "email"=>$usuario->email	
										));
        }
        return $arrayFinal;
    }

    
}
