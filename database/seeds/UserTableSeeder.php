<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
	public function  run() {
		//Tablo verilerini temizleyelim
		DB::table( 'users' )->delete();
		// Konsol çıktısını verelim
		$this->command->info( 'users tablosu temizlendi' );
		$email= preg_replace('/^https?:\/\//','admin@',config('app.url') );
		//Veri tabanına verilerimizi ekleyelim
		$id=DB::table( 'users' )->insertGetId(
				array(
						'username'   => 'admin',
						'email'      => $email,
						'password'   => Hash::make( '123456' ),
						'created_at' => date( 'Y-m-d H:i:s' ),
						'created_ip' => '127.0.0.1',
						'role'       => 'admin'

		) );

		// Konsol çıktısını verelim
		$this->command->info('Örnek veriler eklendi');
	}
}