<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSucursal extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sucursal', function($table){
       $table->create();
       $table->increments('id');
       $table->string('nombre');
       $table->string('direccion');
       $table->string('telefono');
       $table->integer('id_distrito');
       $table->integer('id_provincia');
       $table->integer('id_region');
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
		Schema::drop('sucursal');
	}

}
