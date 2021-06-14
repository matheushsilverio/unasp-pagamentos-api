<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pj_pessoa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idUsuario');
            $table->string('nome');
            $table->bigInteger('cpf');
            $table->string('logradouro');
            $table->bigInteger('cep');
            $table->bigInteger('numero');
            $table->string('complemento');
            $table->string('cidade');
            $table->string('uf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pj_pessoa');
    }
}
