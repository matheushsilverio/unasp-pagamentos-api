<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pj_aluno extends Model
{
    protected  $table = "pj_aluno";
    protected $fillable = ['id','idPessoa','ra', 'idCurso', 'idResponsavel']; //'updated_at', 'created_at'
    
}
