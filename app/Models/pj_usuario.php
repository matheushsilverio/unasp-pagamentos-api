<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pj_usuario extends Model
{
    protected  $table = "pj_usuario";
    protected $fillable = ['id','email', 'senha', 'nivelAcesso'];

}
