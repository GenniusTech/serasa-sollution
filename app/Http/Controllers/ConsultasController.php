<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

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

    public function consultaCompletaApi(Request $request)
    {
        $user = Auth::user();
        if ($user->tipo === 1) {
            $tipo = 1;
        } else {
            $tipo = 2;
        }

        $id = $request->input('id');

        // realizar a requisição à API e obter a imagem desejada
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://ec2-54-89-135-80.compute-1.amazonaws.com/initbotserver?id=' . $id);

        // verificar se a requisição foi bem-sucedida
        if ($response->getStatusCode() == 200) {
            $image = $response->getBody()->getContents();

            // converter a imagem em bytes para uma string em base64
            $base64Image = base64_encode($image);

            // retornar a view com a imagem em base64
            return view('dashboard.consultaCompleta', ['base64Image' => $base64Image, 'tipo'=>$tipo]);
        } else {
            // retornar a view com a mensagem de erro
            return view('dashboard.consultaCompleta', ['message' => 'Não foi possivel gerar essa consulta, tente novamente mais tarde!', 'tipo'=>$tipo]);
        }

    }

}
