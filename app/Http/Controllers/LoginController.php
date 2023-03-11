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

    public function auth(Request $request) {

        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email é um campo obrigatório!',
            'email.email' => 'Email não é válido!',
            'password.required' => 'Senha é um campo obrigatório!'
        ]);

        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }else{
         return redirect()->back()->with('erro', 'Email ou senha inválido.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }



}
