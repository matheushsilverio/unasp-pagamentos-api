<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_pessoa;

class PessoasController extends Controller
{
    public function store(Request $request){
        try {
            pj_pessoa::create([
                'idUsuario' => $request->idUsuario,
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'logradouro' => $request->logradouro,
                'cep' => $request->cep,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
            ]);
            return response()->json("Criado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = pj_pessoa::all();
        return response()->json($objeto, 200);
    }

    public function update(Request $request) {
        $objeto = pj_pessoa::findOrFail($request->id);
        try {
            $objeto->update([
                'idUsuario' => $request->idUsuario,
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'logradouro' => $request->logradouro,
                'cep' => $request->cep,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
            ]);
            return response()->json("Atualizado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}
