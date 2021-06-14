<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_fatura;

class FaturaController extends Controller
{
    public function store(Request $request){
        try {
            pj_fatura::create([
                'idAluno' => $request->idAluno,
                'idResponsavel' => $request->idResponsavel,
                'valor' => $request->valor,
                'dataEmissao' => $request->dataEmissao,
                'parcelas' => $request->parcelas,
            ]);
            return response()->json("Criado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = pj_fatura::all();
        return response()->json($objeto, 200);
    }

    public function update(Request $request) {
        $objeto = pj_fatura::findOrFail($request->id);
        try {
            $objeto->update([
                'idAluno' => $request->idAluno,
                'idResponsavel' => $request->idResponsavel,
                'valor' => $request->valor,
                'dataEmissao' => $request->dataEmissao,
                'parcelas' => $request->parcelas,
            ]);
            return response()->json("Atualizado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}
