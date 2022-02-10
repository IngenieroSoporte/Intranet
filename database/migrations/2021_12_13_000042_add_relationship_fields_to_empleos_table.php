<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmpleosTable extends Migration
{
    public function up()
    {
        Schema::table('empleos', function (Blueprint $table) {
            $table->unsignedBigInteger('salario_id');
            $table->foreign('salario_id', 'salario_fk_5352491')->references('id')->on('salarios');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_5050590')->references('id')->on('users');
        });
    }
}
