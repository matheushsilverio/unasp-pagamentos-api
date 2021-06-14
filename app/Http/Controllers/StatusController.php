<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pj_status;

class StatusController extends Controller
{
    public function store(Request $request){
        try {
            pj_status::create([
                'nome' => $request->nome,
            ]);
            return response()->json("Criado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function exibir(){
        $objeto = pj_status::all();
        return response()->json($objeto, 200);
    }

    public function update(Request $request) {
        $objeto = pj_status::findOrFail($request->id);
        try {
            $objeto->update([
                'nome' => $request->nome,
            ]);
            return response()->json("Atualizado com sucesso!", 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}
