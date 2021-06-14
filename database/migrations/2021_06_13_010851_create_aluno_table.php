<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pj_aluno', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idPessoa');
            $table->bigInteger('ra');
            $table->bigInteger('idCurso');
            $table->bigInteger('idResponsavel');
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
        Schema::dropIfExists('pj_aluno');
    }
}