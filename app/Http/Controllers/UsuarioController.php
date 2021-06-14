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
            return response()->json("Criado com sucesso!", 200);
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
}
