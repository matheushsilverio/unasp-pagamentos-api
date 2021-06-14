<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pj_instituicao extends Model
{
    protected  $table = "pj_instituicao";
    protected $fillable = ['id','nome'];

}
