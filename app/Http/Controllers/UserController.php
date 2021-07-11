<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\User;



class UserController extends Controller
{
    public function index(){			
		
		$users = User::all();			
		
		$title = 'Listado de Compradores';
		
		return view('users.index',compact('users','title'));
	}	
	
	public function show(User $user){ 
		
		return view('users.show',compact('user'));
	}
	
	public function edit(User $user){
		
		return view('users.edit',['user' => $user,]);
	}
	
	public function update(User $user){
		
		$data = request()->validate([
			'name' => 'required',
			'email'=>['required','email',Rule::unique('users','email')->ignore($user->id)],			
		],[
			'name.required' => 'El campo nombre es obligatorio.',
			'email.required' => 'El campo email es obligatorio.',			
		]);			
		
		$user->update($data);
		
		return redirect()->route("users.show",['user' => $user]);
	}
	
	public function create(){
		return view('users.create');
	}
	
	public function store(){
		
		//dd(request()->all());
		$data = request()->validate([
			'name' => 'required',
			'email'=>['required','email','unique:users,email'],			
		],[
			'name.required' => 'El campo nombre es obligatorio.',
			'email.required' => 'El campo email es obligatorio.',			
			'email.unique' => 'El email ya está registrado.',			
		]);			
			
		User::create([
			'name' => $data['name'],
			'email' => $data['email'],			
		]);			
		return redirect()->route('users');
	}
	
	public function destroy(User $user){		
		$user->delete();
		return redirect()->route('users');
	}
	
	public function login(Request $request){			
        $user = User::whereEmail($request->email)->first();		
        if (!is_null($user)) {
			$user->api_token = Str::random(100);            
			$user->save();
            return response()->json(['res' => true, 'token' =>$user->api_token, 'message' => "Bienvenido al sistema"],200);
        } else
            return response()->json(['res' => false, 'message' => "email incorrecto"],200);
    }

    public function logout(){
        $user = auth()->user();
        $user->tokens->each(function ($token, $key){
            $token->delete();
        });
        return response()->json(['res' => true, 'message' => "Adios"]);
    }
}
