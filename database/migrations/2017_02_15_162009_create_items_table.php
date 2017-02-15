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
    		$table->string('produkt');
    		$table->string('wymiary');
    		$table->integer('cena');
    		$table->string('rodzaj');
    		$table->string('przeznaczenie');
    		$table->string('wymiary_ogolne');
    		$table->integer('ilosc');
    		$table->string('opis');
    		$table->string('promocja');
    		$table->integer('procent_promocji');
    		$table->string('tekst_promocji');
    		$table->integer('zakupienia');
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
