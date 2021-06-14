<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_pagamentos;

class PagamentosController extends Controller
{
    public function store(Request $request){
        try {
            pj_pagamentos::create([
                'idDivida' => $request->idDivida,
                'dataPagamento' => $request->dataPagamento,
                'idStatus' => $request->idStatus,
            ]);
            return response()->json("Criado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = pj_pagamentos::all();
        return response()->json($objeto, 200);
    }

    public function update(Request $request) {
        $objeto = pj_pagamentos::findOrFail($request->id);
        try {
            $objeto->update([
                'idDivida' => $request->idDivida,
                'dataPagamento' => $request->dataPagamento,
                'idStatus' => $request->idStatus,
            ]);
            return response()->json("Atualizado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}

