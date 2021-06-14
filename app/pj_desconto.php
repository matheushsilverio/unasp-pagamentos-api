<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pj_desconto extends Model
{
    protected  $table = "pj_desconto";
    protected $fillable = ['id','descricao','porcentagem']; //'updated_at', 'created_at'
    
}
