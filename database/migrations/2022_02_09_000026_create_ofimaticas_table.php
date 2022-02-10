<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfimaticasTable extends Migration
{
    public function up()
    {
        Schema::create('ofimaticas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nuevo');
            $table->string('nivel')->nullable();
            $table->string('cetificacion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
