<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->integer('role');
            $table->integer('creator_id');
            $table->string('creator_name');
            $table->string('name'); 
            $table->string('title'); 
            $table->string('date'); 
            $table->string('priority'); 
            $table->string('desc1'); 
            $table->string('desc2')->nullable(); 
            $table->string('file')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
