<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders',function($table){
			$table->increments('id');
			$table->integer('userId')->unsigned();
			$table->string('type',15);
			$table->integer('price');
			$table->text('description');
			$table->text('meta');
			$table->timestamps();
			$table->string('created_ip', 15);
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
		Schema::drop('orders');
	}

}
