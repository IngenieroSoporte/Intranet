<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('nombres');
            $table->string('documento_de_identidad');
            $table->float('no_de_identificacion', 15, 1);
            $table->date('fecha_de_expedicion_del_documento');
            $table->date('fecha_de_nacimiento');
            $table->string('departamento_de_nacimiento');
            $table->string('ciudad_de_nacimiento');
            $table->string('direccion');
            $table->string('telefono_personal');
            $table->string('celular_personal');
            $table->string('email_personal');
            $table->string('telefono_familiar');
            $table->string('celular_familiar');
            $table->string('email_familiar');
            $table->string('secundaria')->nullable();
            $table->string('media')->nullable();
            $table->string('titulo_obtenido')->nullable();
            $table->date('fecha_de_graduacion')->nullable();
            $table->timestamps();
        });
    }
}
