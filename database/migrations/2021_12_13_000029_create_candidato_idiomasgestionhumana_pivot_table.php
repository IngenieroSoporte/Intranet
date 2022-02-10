<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatoIdiomasgestionhumanaPivotTable extends Migration
{
    public function up()
    {
        Schema::create('candidato_idiomasgestionhumana', function (Blueprint $table) {
            $table->unsignedBigInteger('candidato_id');
            $table->foreign('candidato_id', 'candidato_id_fk_5195855')->references('id')->on('candidatos')->onDelete('cascade');
            $table->unsignedBigInteger('idiomasgestionhumana_id');
            $table->foreign('idiomasgestionhumana_id', 'idiomasgestionhumana_id_fk_5195855')->references('id')->on('idiomasgestionhumanas')->onDelete('cascade');
        });
    }
}
