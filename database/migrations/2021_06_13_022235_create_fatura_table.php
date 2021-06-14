<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pj_fatura', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idAluno');
            $table->bigInteger('idResponsavel');
            $table->decimal('valor');
            $table->date('dataEmissao');
            $table->bigInteger('parcelas');
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
        Schema::dropIfExists('pj_fatura');
    }
}
