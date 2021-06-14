<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_curso;

class CursoController extends Controller
{
    public function create() {
        return view('pj_curso.create');
    }

    public function store(Request $request){
        try {
            pj_curso::create([
                'nome' => $request->nome,
                'idInstituicao' => $request->idInstituicao,
                'descricao' => $request->descricao,
                'mensalidade' => $request->mensalidade,
            ]);
            return response()->json("Criado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = pj_curso::all();
        return response()->json($objeto, 200);
    }

    public function update(Request $request) {
        $objeto = pj_curso::findOrFail($request->id);
        try {
            $objeto->update([
                'nome' => $request->nome,
                'idInstituicao' => $request->idInstituicao,
                'descricao' => $request->descricao,
                'mensalidade' => $request->mensalidade,
            ]);
            return response()->json("Atualizado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    // public function show(){
    //     $objeto = pj_curso::all();
    //     return view('pj_curso.show', ['objeto' => $objeto]);
    // }

    // public function edit($id) {
    //     $objeto = pj_curso::findOrFail($id);
    //     return view('pj_curso.edit', ['objeto' => $objeto]);
    // }

    // public function update(Request $request, $id) {
    //     try {
    //         $objeto = pj_curso::findOrFail($id);
    //         $objeto->update([
    //             'nome'=> $request->nome,
    //         ]);
    //         return "Atualizada com sucesso!";
    //     }catch(Exception $e){
    //         return $e->getMessage();
    //     }
    // }
}
