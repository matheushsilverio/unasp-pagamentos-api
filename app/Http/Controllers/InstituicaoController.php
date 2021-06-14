<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_instituicao;

class InstituicaoController extends Controller
{
    public function create() {
        return view('pj_instituicao.create');
    }

    public function store(Request $request){
        try {
            pj_instituicao::create([
                'nome' => $request->nome,
            ]);
            return response()->json("Criado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    // public function show(){
    //     $objeto = pj_instituicao::all();
    //     return view('pj_instituicao.show', ['objeto' => $objeto]);
    // }

    public function showJson(){
        $objeto = pj_instituicao::all();
        return response()->json($objeto, 200);
    }

    // public function edit($id) {
    //     $objeto = pj_instituicao::findOrFail($id);
    //     return view('pj_instituicao.edit', ['objeto' => $objeto]);
    // }

    public function update(Request $request) {
        $objeto = pj_instituicao::findOrFail($request->id);
        try {
            $objeto->update([
                'nome'=> $request->nome,
            ]);
            return response()->json("Atualizado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}
