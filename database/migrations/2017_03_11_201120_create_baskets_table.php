<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('baskets', function(Blueprint $table){
    		$table->integer('id');
    		
    		$table->integer('id_product')->unsigned()->nullable();
    		$table->foreign('id_product')->references('id')->on('items')->onDelete('cascade');
    		
    		$table->string('product');
    		$table->integer('price');
    		$table->integer('amount');
    		
    		$table->integer('id_user')->unsigned()->nullable();
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
