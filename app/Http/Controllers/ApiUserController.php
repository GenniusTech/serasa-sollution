<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    public function index()
    {
        // $users = User::get(['name', 'email','consultas','tipo']);
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome'      => 'required|max:100',
            'email'     => 'required|email|unique:users|max:100',
            'password'  => 'required|min:6|max:255',
            'tipo'      =>  'required'
        ]);

        $user = User::create([
            'nome'          => $validatedData['nome'],
            'email'         => $validatedData['email'],
            'password'      => Hash::make($validatedData['password']),
            'tipo'          => $validatedData['tipo'],
            'credito'       => '0',
            'created_at'    => now(),
        ]);

        return response()->json(['message' => 'Usuário criado com sucesso.'], 201);
    }


    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nome'      => 'sometimes|required|max:100',
            'email'     => 'sometimes|required|email|unique:users,email,'.$user->id.'|max:100',
            'password'  => 'sometimes|required|min:6|max:255',
            'tipo'      => 'sometimes|required|integer',
            'credito'   => 'sometimes|required|integer',
        ]);

        $user->update($validatedData);

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'Usuário deletado com sucesso.']);
    }
}

