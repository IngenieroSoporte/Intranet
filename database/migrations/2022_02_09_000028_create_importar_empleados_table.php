<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportarEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('importar_empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->float('cedula', 15, 2)->nullable();
            $table->string('lugar_de_expedicion_de_la_cedula')->nullable();
            $table->string('cargo_actual')->nullable();
            $table->date('fecha_de_inicio_contrato_actual')->nullable();
            $table->float('salario', 15, 2)->nullable();
            $table->string('salario_en_letras')->nullable();
            $table->date('fecha_inicial_del_primero_contrato')->nullable();
            $table->date('fecha_final_del_primero_contrato')->nullable();
            $table->date('fecha_inicial_del_segundo_contrato')->nullable();
            $table->date('fecha_final_del_segundo_contrato')->nullable();
            $table->string('fecha_inicial_del_tercer_contrato')->nullable();
            $table->date('fecha_final_del_tercer_contrato')->nullable();
            $table->date('fecha_inicial_del_cuarto_contrato')->nullable();
            $table->date('fecha_final_del_cuarto_contrato')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
