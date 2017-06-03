<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('items', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('product');
    		$table->string('size');
    		$table->integer('price');
    		$table->string('kind');
    		$table->string('intended');
    		$table->string('general_size');
    		$table->integer('amount');
    		$table->string('promotion');
    		$table->string('desc');
    		$table->integer('percent_promotion');
    		$table->string('text_promotion');
    		$table->integer('buy_amount');
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
    	Schema::drop('items');
    }
}
