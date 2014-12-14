<?php

class DuesTableSeeder extends Seeder {
	public function run() {
		//verileri temizleyelim
		DB::table( 'dues' )->delete();
		//temizleme çıktısını verelim
		$this->command->info( 'dues tablosu temizlendi' );
		//verileri ekleyelim
		DB::table( 'dues' )->insert(
				array(
						'userId' => 1,
						'year'   => date( 'Y' ),
						'month'  => serialize( array( date( 'n' ) => 20 )  ),
						'created_at'  => date( 'Y-m-d H:i:s' )
				)
		);
	}
}