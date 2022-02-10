<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIdiomasgestionhumanasTable extends Migration
{
    public function up()
    {
        Schema::table('idiomasgestionhumanas', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_5103161')->references('id')->on('users');
        });
    }
}
