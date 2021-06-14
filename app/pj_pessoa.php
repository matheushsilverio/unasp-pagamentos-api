<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pj_pessoa extends Model
{
    protected  $table = "pj_pessoa";
    protected $fillable = ['id','idUsuario', 'nome', 'cpf', 'logradouro', 'cep', 'numero', 'complemento', 'cidade', 'uf'];

}
