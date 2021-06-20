<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_dividas;
use App\pj_pagamentos;

class DividasController extends Controller
{
    public function store(Request $request){
        try {
            pj_dividas::create([
                'idFatura' => $request->idFatura,
                'juros' => $request->juros,
                'dataVencimento' => $request->dataVencimento,
            ]);
            return response()->json("Criado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = pj_dividas::all();
        return response()->json($objeto, 200);
    }

    public function getByFatura(Request $request, $id){
        $objeto = pj_dividas::where('idFatura', $id)
            ->select('pj_dividas.*', 'pj_pagamentos.dataPagamento', 'pj_pagamentos.idStatus')
            ->leftJoin('pj_pagamentos', 'pj_pagamentos.idDivida', '=', 'pj_dividas.id')->get();

        return response()->json($objeto, 200);
    }

    public function update(Request $request) {
        $objeto = pj_dividas::findOrFail($request->id);
        try {
            $objeto->update([
                'idFatura' => $request->idFatura,
                'juros' => $request->juros,
                'dataVencimento' => $request->dataVencimento,
            ]);
            return response()->json("Atualizado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}
