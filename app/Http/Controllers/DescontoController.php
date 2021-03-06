<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_desconto;

class DescontoController extends Controller
{
    public function store(Request $request){
        try {
            pj_desconto::create([
                'descricao' => $request->descricao,
                'porcentagem' => $request->porcentagem,
            ]);
            return response()->json("Criado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = pj_desconto::all();
        return response()->json($objeto, 200);
    }

    public function update(Request $request) {
        $objeto = pj_desconto::findOrFail($request->id);
        try {
            $objeto->update([
                'descricao' => $request->descricao,
                'porcentagem' => $request->porcentagem,
            ]);
            return response()->json("Atualizado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}
