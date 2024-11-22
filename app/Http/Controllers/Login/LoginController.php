<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateLoginRequest;
use App\Models\Sesions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    
    public function __construct()
    {
        
    }
    
    public function index() 
    {
        return view('Login.login');
    }

    public function validateLogin(ValidateLoginRequest $request) 
    {
        
        $validated = $request->validated();
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {

            $session = new Sesions();
            $session->user_id    = Auth::user()->id;
            $session->start_date = date('Y-m-d H:i:s');
            $session->end_date   = null;
            $session->token      = Str::uuid();
            $session->state      = '1';
            $session->save();

            return redirect()->intended('home')->with('message', 'Usted acaba de ingresar de manera exitosa, bienvenido!!');
        }
        
        return redirect()->intended('/')->with('message', 'Algo fallo con sus credenciales de ingreso, por favor verifique e intentelo nuevamente');
    }



}
