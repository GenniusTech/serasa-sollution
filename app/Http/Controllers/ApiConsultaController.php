<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class ApiConsultaController extends Controller
{
  

    public function descConsulta($id)
    {
        // Encontre o usuário pelo ID
        $usuario = User::find($id);
    
        // Verifique se o usuário foi encontrado
        if (!$usuario) {
            return response()->json(['mensagem' => 'Usuário não encontrado'], 404);
        }
    
        // Verifique se o saldo é suficiente
        if ($usuario->consultas > 0) {
            // Reduza 1 do campo "consultas"
            $usuario->consultas--;
    
            // Salve as alterações no banco de dados
            $usuario->save();
    
            // Retorne uma mensagem de sucesso
            return response()->json(['mensagem' => 'Consulta reduzida com sucesso']);
        } else {
            // Retorne uma mensagem de erro caso o saldo seja insuficiente
            return response()->json(['mensagem' => 'Saldo insuficiente'], 400);
        }
    }

    public function addConsultas(Request $request, $id)
    {
        // Encontre o usuário pelo ID
        $usuario = User::find($id);
    
        // Verifique se o usuário foi encontrado
        if (!$usuario) {
            return response()->json(['mensagem' => 'Usuário não encontrado'], 404);
        }
    
        // Obtenha a quantidade a ser adicionada das entradas do formulário
        $quantidade = $request->input('consulta_qtd');
    
        // Verifique se a quantidade é um número inteiro positivo
        if (!is_numeric($quantidade) || $quantidade <= 0) {
            return response()->json(['mensagem' => 'A quantidade deve ser um número inteiro positivo'], 400);
        }
    
        // Adicione a quantidade ao campo "consultas"
        $usuario->consultas += $quantidade;
    
        // Salve as alterações no banco de dados
        $usuario->save();
    
        // Retorne uma mensagem de sucesso
        return response()->json(['mensagem' => 'Consultas adicionadas com sucesso']);
    }
    
    


}

