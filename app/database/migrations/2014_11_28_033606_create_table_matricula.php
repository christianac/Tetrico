<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMatricula extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('matricula', function($table){
       $table->create();
       $table->increments('id');
       $table->timestamps();
       $table->integer('id_estado');
       $table->integer('id_clase');
       $table->integer('id_usuario');
   		 });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('matricula');
	}

}
