<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashController extends Controller
{   
 

   
    public function dashboard(Request $request)
    {

        $user = Auth::user();
        if ($user->tipo === 1) {
            $tipo = 1;
        } else {
            $tipo = 2;
        }
        return view('dashboard.index',['tipo'=>$tipo]);
       
    }
    public function usuarios(Request $request)
    {
        $user = Auth::user();
        if ($user->tipo === 1) {
            $tipo = 1;
        } else {
            $tipo = 2;
        }
        return view('dashboard.usuario',['tipo'=>$tipo]);
       
    }
    
   
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

   
    
}