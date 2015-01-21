<?php

class UserTableSeeder extends Seeder {
	public function  run() {
		//Tablo verilerini temizleyelim
		DB::table( 'users' )->delete();
		// Konsol çıktısını verelim
		$this->command->info( 'users tablosu temizlendi' );
		//Veri tabanına verilerimizi ekleyelim
		$id=DB::table( 'users' )->insertGetId(
				array(
						'username'   => 'admin',
						'email'      => 'admin@test.com',
						'password'   => Hash::make( '123456' ),
						'created_at' => date( 'Y-m-d H:i:s' ),
						'created_ip' => '127.0.0.1',
						'role'       => 'admin'

		) );

		/**
		 * Kullanıcı  aidat bilgilerini oluşturalım
		 */
		$memberSince     = \Carbon\Carbon::now();
		$lastPayableDues = \Carbon\Carbon::now()->addMonths( 6 );
		$dues            = array();
		do {
			$dues[$memberSince->year][]=$memberSince->month;
			$memberSince->addMonth();
		} while ( $memberSince->diffInMonths( $lastPayableDues ) != 0 );
		// aidat bilgilerini  meta tablosuna ekleyelim
		UserMeta::setMeta( $id, 'dues', serialize( $dues ) );

		// Konsol çıktısını verelim
		$this->command->info('Örnek veriler eklendi');
	}
}