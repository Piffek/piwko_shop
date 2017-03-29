<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToDoList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toDoList', function(Blueprint $table)
        {
        	$table->increments('id');
        	$table->string('what');
        	$table->date('when');
        	$table->integer('id_user')->unsigned();
        	$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        //
    }
}
