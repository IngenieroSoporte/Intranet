<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormacionAcademicaProfesionalsTable extends Migration
{
    public function up()
    {
        Schema::create('formacion_academica_profesionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo')->nullable();
            $table->integer('numero_de_semestres')->nullable();
            $table->string('graduado')->nullable();
            $table->date('fecha_de_graduacion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
