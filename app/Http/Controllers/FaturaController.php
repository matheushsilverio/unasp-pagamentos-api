<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use App\pj_fatura;
use App\pj_dividas;
use App\pj_pagamentos;

class FaturaController extends Controller
{
    public function store(Request $request){
        try {
            $data = pj_fatura::create([
                'idAluno' => $request->idAluno,
                'idResponsavel' => $request->idResponsavel,
                'valor' => $request->valor,
                'dataEmissao' => $request->dataEmissao,
                'parcelas' => $request->parcelas,
            ]);

            $divida = [];

            for ($i = 1; $i <= $request->parcelas; $i++) {

                $date = new DateTime();
                $date->modify('+'.$i.' month');


                $div = pj_dividas::create([
                    'idFatura' => $data->id,
                    'juros' => 1,
                    'dataVencimento' => $date->format('Y-m-d'),
                ]);

                $divida[$i - 1] = $div;
            }



            $data->divida = $divida;

            return response()->json($data, 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = pj_fatura::all();
        return response()->json($objeto, 200);
    }

    public function getAluno(Request $request, $id){
        $objeto = pj_fatura::where('idAluno', $id)->get();

        foreach ($objeto as $fatura) {
            $dividas = pj_dividas::where('idFatura', $fatura->id)->join('pj_pagamentos', 'pj_pagamentos.idDivida', '=', 'pj_dividas.id')->get();
            $fatura->dividas = $dividas;
        }
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
