<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pj_pagamentos extends Model
{
    protected  $table = "pj_pagamentos";
    protected $fillable = ['id','idDivida', 'dataPagamento', 'idStatus'];

}
