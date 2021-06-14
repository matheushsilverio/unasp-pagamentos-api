<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pj_dividas extends Model
{
    protected  $table = "pj_dividas";
    protected $fillable = ['id','idFatura', 'juros', 'dataVencimento'];

}
