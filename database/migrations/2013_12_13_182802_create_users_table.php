<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table){
			$table->increments('id');
			$table->string('username',64)->unique();
			$table->string('email',128)->uniuqe();
			$table->string('password');
			$table->string('name');
			$table->string('lastName');
			$table->date('birthday')->default('0000.00.00');
			$table->string('role');
			$table->timestamps();
			$table->softDeletes();
			$table->string('created_ip', 15);
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}