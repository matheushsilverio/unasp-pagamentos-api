<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pj_alunoDesconto extends Model
{
    protected  $table = "pj_alunoDesconto";
    protected $fillable = ['id','idAluno','idDesconto']; //'updated_at', 'created_at'
    
}
