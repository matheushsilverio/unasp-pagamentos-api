<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pj_status extends Model
{
    protected  $table = "pj_status";
    protected $fillable = ['id','nome'];

}
