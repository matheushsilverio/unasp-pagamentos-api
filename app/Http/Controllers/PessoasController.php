<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_pessoa;
use App\pj_aluno;

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
            $pessoa = pj_pessoa::firstWhere('cpf', $request->cpf);
            return response()->json($pessoa, 201);
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

    public function getById(Request $request, $id) {
        $pessoa = pj_pessoa::findOrFail($id);

        if (!$pessoa) return response()->json('Pessoa não encontrada', 404);

        return response()->json($pessoa, 200);
    }

    public function getByUserId(Request $request, $idUsuario) {
        $pessoa = pj_pessoa::firstWhere('idUsuario', $idUsuario);

        if (!$pessoa) return response()->json('Pessoa não encontrada', 404);

        $aluno = pj_aluno::firstWhere('idPessoa', $pessoa->id);
        if (!$aluno) $aluno = null;

        $pessoa->aluno = $aluno;

        return response()->json($pessoa, 200);
    }
}
