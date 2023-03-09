<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultasController extends Controller
{
    public function consultaSimples(Request $request) {
        $user = Auth::user();
        if ($user->tipo === 1) {
            $tipo = 1;
        } else {
            $tipo = 2;
        }
        return view('dashboard.consultaSimples',['tipo'=>$tipo]);
    }

    public function consultaCompleta(Request $request) {
        $user = Auth::user();
        if ($user->tipo === 1) {
            $tipo = 1;
        } else {
            $tipo = 2;
        }
        return view('dashboard.consultaCompleta',['tipo'=>$tipo]);
    }

}
