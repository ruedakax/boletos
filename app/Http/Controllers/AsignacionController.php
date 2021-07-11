<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Asignacion;
use App\User;
use App\Evento;

class AsignacionController extends Controller
{

    public function create(Evento $event){
        //obtengo los usuarios
        $userItems = User::all(['id', 'email'])->pluck('email', 'id');
        //creo array con todo el aforo del evento
        $boletos = range(1, $event->aforo);
        //obtengo los boletos ya asignados
        $asignados = $event->asignaciones->toArray();

        $asignados = count($asignados) <= 0?[]:$this->getBoletas($asignados);
        
        $disponibles = array_diff($boletos,$asignados);
        //obtengo los numeros 
		return view('binds.create',compact('userItems','event','disponibles'));
	}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        
        $arrayFinal = Array();
        $asignaciones = Asignacion::all(['users_id','evento_id','boleta']);
        foreach ($asignaciones as $key => $value) {
            $comprador = User::find($value->users_id);
            $evento = Evento::find($value->evento_id);            
			$arrayFinal[$evento->nombre]['aforo'] = $evento->aforo;
			$arrayFinal[$evento->nombre]['nombre'] = $evento->nombre;
            $arrayFinal[$evento->nombre]['data'] = !isset($arrayFinal[$evento->nombre]['data'])?Array():$arrayFinal[$evento->nombre]['data'];
            //
            array_push($arrayFinal[$evento->nombre]['data'],[
                                                      "comprador"=>$comprador->email
                                                     ,"boleta"=>$value->boleta
                                                    ]
            );
        }
        return $arrayFinal;

        //return Asignacion::all(['users_id','evento_id','boleta']);
    }
    
    public function store(){
        
        $data = request()->validate([
			'users_id' => 'required',
            'evento_id' => 'required',
			'boletas'=>'required',
		],[
			'users_id.required' => 'Debe elegir un usuario',
            'evento_id.required' => 'No se obtuvo evento',
			'boletas.required' => 'Debe elegir mínimo una boleta',						
		]);
        //ciclo para asignar cada una de las boletas elegidas
        foreach ($data['boletas'] as $key => $value) {
            Asignacion::create([
                'users_id' => $data['users_id'],
                'evento_id' => $data['evento_id'],
                'boleta' => $value,
            ]);			            
        }		
		return redirect()->route('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /*obtiene las boeltas del array de asignaciones*/
    private function getBoletas($arrayBoletas){        
        $arrayFinal = [];
        foreach ($arrayBoletas as $key => $value) {
            array_push($arrayFinal,$value['boleta']);
        }
        return $arrayFinal;
    }
}
