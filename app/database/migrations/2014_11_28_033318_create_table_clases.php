<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClases extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clases', function($table){
       $table->create();
       $table->increments('id');
       $table->string('nombre_clase');
       $table->string('descripcion');
       $table->integer('id_sucursal');
   		 });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clases');
	}

}
