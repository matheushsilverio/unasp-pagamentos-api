<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_aluno;


class AlunoController extends Controller
{
    public function store(Request $request){
        try {
            pj_aluno::create([
                'idPessoa' => $request->idPessoa,
                'ra' => $request->ra,
                'idCurso' => $request->idCurso,
                'idResponsavel' => $request->idResponsavel,
            ]);
            return response()->json("Criado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = pj_aluno::all();
        return response()->json($objeto, 200);
    }

    public function update(Request $request) {
        $objeto = pj_aluno::findOrFail($request->id);
        try {
            $objeto->update([
                'idPessoa' => $request->idPessoa,
                'ra' => $request->ra,
                'idCurso' => $request->idCurso,
                'idResponsavel' => $request->idResponsavel,
            ]);
            return response()->json("Atualizado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}