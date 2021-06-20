<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $aluno = pj_aluno::firstWhere('ra', $request->ra);

            return response()->json($aluno, 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = DB::table('pj_aluno')
            ->select('pj_aluno.id as idAluno', 'pj_aluno.idResponsavel as idResponsavel', 'pj_pessoa.idUsuario as idUsuario', 'pj_pessoa.id as idPessoa', 'pj_usuario.email as email', 'pj_aluno.ra as ra', 'pj_pessoa.nome as nome', 'pj_curso.nome as curso', 'pj_curso.id as idCurso')
            ->join('pj_pessoa', 'pj_aluno.idPessoa', '=', 'pj_pessoa.id')
            ->join('pj_curso', 'pj_aluno.idCurso', '=', 'pj_curso.id')
            ->join('pj_usuario', 'pj_pessoa.idUsuario', '=', 'pj_usuario.id')
            ->get();
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
