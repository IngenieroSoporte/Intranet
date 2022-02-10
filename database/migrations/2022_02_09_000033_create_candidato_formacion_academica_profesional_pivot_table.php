<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatoFormacionAcademicaProfesionalPivotTable extends Migration
{
    public function up()
    {
        Schema::create('candidato_formacion_academica_profesional', function (Blueprint $table) {
            $table->unsignedBigInteger('candidato_id');
            $table->foreign('candidato_id', 'candidato_id_fk_5426825')->references('id')->on('candidatos')->onDelete('cascade');
            $table->unsignedBigInteger('formacion_academica_profesional_id');
            $table->foreign('formacion_academica_profesional_id', 'formacion_academica_profesional_id_fk_5426825')->references('id')->on('formacion_academica_profesionals')->onDelete('cascade');
        });
    }
}
