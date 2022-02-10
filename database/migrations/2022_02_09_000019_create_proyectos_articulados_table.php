<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosArticuladosTable extends Migration
{
    public function up()
    {
        Schema::create('proyectos_articulados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo_del_trabajo');
            $table->string('nombres_y_apellidos_de_los_autores_de_la_investigacion');
            $table->string('nombres_y_apellidos_del_asesor_del_trabajo');
            $table->date('ano_en_que_se_realizo_la_investigacion');
            $table->string('linea_de_investigacion');
            $table->longText('abstract_resumen_documental');
            $table->string('palabras_clave');
            $table->string('publicar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
