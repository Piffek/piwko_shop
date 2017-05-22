<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('buyings', function (Blueprint $table) {
    		$table->increments('id');
    		$table->integer('id_product');
    		$table->string('product');
    		$table->integer('price');
    		$table->integer('amount');
    		$table->integer('id_user');
    		$table->string('surname');
    		$table->string('street');
    		$table->string('city');
    		$table->integer('nip');
    		$table->string('companyname');
    		$table->string('delivery');
    		$table->string('paying');
    		$table->integer('id_adress_delivery');
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
    	Schema::dropIfExists('buyings');
    }
}
