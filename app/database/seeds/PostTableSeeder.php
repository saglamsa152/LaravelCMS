<?php

class PostTableSeeder extends Seeder {
	public function  run() {
		//Tablo verilerini temizleyelim
		DB::table( 'posts' )->delete();
		// Konsol çıktısını verelim
		$this->command->info( 'posts tablosu temizlendi' );
		//Veri tabanına verilerimizi ekleyelim
		DB::table( 'posts' )->insert( array(
				array(
						'author'     => 'admin',
						'content'    => 'Bu  yazı Kurulum ile  örnek olarak  eklenmiştir',
						'title'      => 'Örnek  yazı',
						'status'     => 'publish',
						'type'       => 'news',
						'created_at' => date( 'Y-m-d H:i:s' ),
						'created_ip' => '127.0.0.1'
				)
		) );
		// Konsol çıktısını verelim
		$this->command->info( 'Örnek veriler eklendi' );
	}
}