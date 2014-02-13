<?php

use Illuminate\Database\Migrations\Migration;

class PostsCreateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts',function($table){
			$table->increments('id');
			$table->integer('author')->unique();
			$table->text('content');
			$table->text('title');
			$table->text('excerpt');
			$table->string('status',15);
			$table->string('type',30);
			$table->timestamps();
			$table->string('created_ip', 15);
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