<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_usuario;

class UsuarioController extends Controller
{
    public function store(Request $request){
        try {
            pj_usuario::create([
                'email' => $request->email,
                'senha' => $request->senha,
                'nivelAcesso' => $request->nivelAcesso,
            ]);
            $user = pj_usuario::firstWhere('email', $request->email);

            return response()->json($user, 201);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = pj_usuario::all();
        return response()->json($objeto, 200);
    }

    public function update(Request $request) {
        $objeto = pj_usuario::findOrFail($request->id);
        try {
            $objeto->update([
                'email' => $request->email,
                'senha' => $request->senha,
                'nivelAcesso' => $request->nivelAcesso,
            ]);
            return response()->json("Atualizado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function login(Request $request) {
        $user = pj_usuario::firstWhere('email', $request->email);
        if (!$user) {
            return response()->json('Usuário não identificado', 404);
        }

        if ($user->senha == $request->senha) {
            return response()->json($user, 200);
        } else {
            return response()->json('Dados inválidos', 400);
        }
    }
}
