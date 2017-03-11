<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('roles_has_user', function(Blueprint $table){
    		$table->integer('id');
    	
    		$table->integer('users_id')->unsigned();
    		$table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
    	
    		$table->integer('roles_id')->unsigned();
    		$table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');
    	
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
