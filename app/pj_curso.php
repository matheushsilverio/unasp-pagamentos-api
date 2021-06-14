<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pj_curso extends Model
{
    protected  $table = "pj_curso";
    protected $fillable = ['id','nome','idInstituicao', 'descricao', 'mensalidade']; //'updated_at', 'created_at'
    
}
