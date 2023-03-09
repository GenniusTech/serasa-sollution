<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{   
 

    public function index(Request $request)
    {
        //----
        if(Auth::user()){
            $user = Auth::user();
            if ($user->tipo === 1) {
                $tipo = 1;
            } else {
                $tipo = 2;
            }
            return view('dashboard.index',['tipo'=>$tipo]);
        }
            return view('index');
       
    }

    public function login_action(Request $request){
        
        $credentials = $request->only(['email', 'senha']);
        $auth = [
            'email'=> $credentials['email'],
            'password' => $credentials['senha']
        ];

        if (Auth::guard('web')->attempt($auth)) {
            // Autenticação bem-sucedida
            return redirect()->route('dashboard');
        } else {
            // Autenticação falha
            return redirect()->back()->withInput()->withErrors(['email' => 'As credenciais fornecidas são inválidas.']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

   
    
}