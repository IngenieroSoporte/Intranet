<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('correo');
            $table->string('area');
            $table->longText('comentenos_mas_sobre_su_incidencia')->nullable();
            $table->longText('solucion')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
