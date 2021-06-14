<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_alunoDesconto;

class AlunoDescontoController extends Controller
{
    public function store(Request $request){
        try {
            pj_alunoDesconto::create([
                'idAluno' => $request->idAluno,
                'idDesconto' => $request->idDesconto,
            ]);
            return response()->json("Criado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = pj_alunoDesconto::all();
        return response()->json($objeto, 200);
    }

    public function update(Request $request) {
        $objeto = pj_alunoDesconto::findOrFail($request->id);
        try {
            $objeto->update([
                'idAluno' => $request->idAluno,
                'idDesconto' => $request->idDesconto,
            ]);
            return response()->json("Atualizado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}
