<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToImportarEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::table('importar_empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_5959572')->references('id')->on('users');
        });
    }
}
