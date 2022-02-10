<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatoOfimaticaPivotTable extends Migration
{
    public function up()
    {
        Schema::create('candidato_ofimatica', function (Blueprint $table) {
            $table->unsignedBigInteger('candidato_id');
            $table->foreign('candidato_id', 'candidato_id_fk_5395054')->references('id')->on('candidatos')->onDelete('cascade');
            $table->unsignedBigInteger('ofimatica_id');
            $table->foreign('ofimatica_id', 'ofimatica_id_fk_5395054')->references('id')->on('ofimaticas')->onDelete('cascade');
        });
    }
}
