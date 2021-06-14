<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pj_fatura extends Model
{
    protected  $table = "pj_fatura";
    protected $fillable = ['id','idAluno','idResponsavel', 'valor', 'dataEmissao', 'parcelas']; //'updated_at', 'created_at'
    
}
