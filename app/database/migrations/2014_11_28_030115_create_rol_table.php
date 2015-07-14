<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rol', function($table){
       $table->create();
       $table->increments('id');
       $table->string('nombre');
       $table->string('sigla');
       $table->string('estado');
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
		Schema::drop('rol');
	}

}
