<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCandidatosTable extends Migration
{
    public function up()
    {
        Schema::table('candidatos', function (Blueprint $table) {
            $table->unsignedBigInteger('vacante_a_la_que_se_postula_id')->nullable();
            $table->foreign('vacante_a_la_que_se_postula_id', 'vacante_a_la_que_se_postula_fk_5170062')->references('id')->on('empleos');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_5094585')->references('id')->on('users');
        });
    }
}
