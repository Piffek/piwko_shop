<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogondataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('logondata', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('firstname');
    		$table->string('lastname');
    		$table->string('email');
    		$table->string('street');
    		$table->string('city');
    		$table->string('postcode');
    		$table->string('firstnameonaccount');
    		$table->string('lastnameonaccount');
    		$table->integer('cardnumber');
    		$table->string('billingcity');
    		$table->string('billingstreet');
    		$table->string('billingpostcode');
    		$table->integer('phone');
    		$table->string('companyname');
    		$table->string('nip');
    		$table->string('product');
    		$table->integer('price');
    		$table->integer('amount');
    		$table->integer('id_transaction');
    		$table->string('paying');
    		$table->string('delivery_method');
    		$table->string('state');
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
    	Schema::dropIfExists('logondata');
    }
}
