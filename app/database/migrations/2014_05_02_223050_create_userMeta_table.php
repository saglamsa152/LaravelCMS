<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userMeta',function($table){
			$table->increments('id');
			$table->integer('userId')->unsigned();
			$table->text('metaKey');
			$table->text('metaValue');
			$table->timestamps();
			$table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userMeta');
	}

}