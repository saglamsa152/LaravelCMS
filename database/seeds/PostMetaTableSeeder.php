<?php

use Illuminate\Database\Seeder;
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 23.02.2014
 * Time: 00:15
 */
class PostMetaTableSeeder extends Seeder {
	public function run() {
		//Tablo berilerini temizleyelim
		DB::table( 'postMeta' )->delete();
		//konsol bilgilendirme çıktısı
		$this->command->info( 'PostMeta tablosu temizlendi' );
		// verilerimizi ekleyelim
		DB::table( 'postMeta' )->insert( array(
				array(
						'postID'    => '2',
						'metaKey'   => 'image',
						'metaValue' => 'assets/images/img1.jpg',
						'created_at' => date( 'Y-m-d H:i:s' )
				),
				array(
						'postID'    => '3',
						'metaKey'   => 'image',
						'metaValue' => 'assets/images/img2.jpg',
						'created_at' => date( 'Y-m-d H:i:s' )
				),
				array(
						'postID'    => '4',
						'metaKey'   => 'image',
						'metaValue' => 'assets/images/img3.jpg',
						'created_at' => date( 'Y-m-d H:i:s' )
				),
				array(
						'postID'    => '5',
						'metaKey'   => 'image',
						'metaValue' => 'assets/images/img4.jpg',
						'created_at' => date( 'Y-m-d H:i:s' )
				)
		) );
	}
}