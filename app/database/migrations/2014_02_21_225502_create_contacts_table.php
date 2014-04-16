<?php

use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * Tablo alanları:
		 * id Otomatik Sayı
		 * meta text Farklı  tasarımlarda farklı  bilgiler girilebileceğinden array olarak bilgileri meta alanında tutuyoruö
		 * message text
		 * isRead boolean
		 * ...
		 */
		Schema::create('contacts',function($table){
			$table->increments('id');
			$table->text('meta');
			$table->text('message');
			$table->boolean('isRead');
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
		Schema::drop('contacts');
	}

}