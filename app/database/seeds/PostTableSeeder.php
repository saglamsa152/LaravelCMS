<?php

class PostTableSeeder extends Seeder {
	public function  run() {
		//Tablo verilerini temizleyelim
		DB::table( 'posts' )->delete();
		// Konsol çıktısını verelim
		$this->command->info( 'posts tablosu temizlendi' );
		//Veri tabanına verilerimizi ekleyelim
		$content = '<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ut metus vitae metus varius luctus eu vitae odio. Nam dapibus ante condimentum, tincidunt libero sit amet, consequat dolor. Integer quis eleifend arcu. Vestibulum eget tristique mi, vel dictum arcu. Nam elementum ut neque nec accumsan. Pellentesque tincidunt blandit risus, eget imperdiet nulla sagittis eu. Phasellus elementum nisl sollicitudin, eleifend metus id, fermentum eros. Nam tortor nisl, accumsan in porttitor sed, tempus pellentesque felis. </p>
<p> Mauris congue pretium lacus sit amet vulputate. Morbi non ipsum ut tellus lacinia consectetur. Suspendisse potenti. Suspendisse sit amet aliquam elit, et pellentesque diam. Donec non dapibus massa, in dapibus urna. Vivamus in lectus nisi. Fusce a tristique elit. Mauris posuere elementum nulla in vestibulum. Fusce et lacus ullamcorper, condimentum dolor non, tempus odio. Vivamus et cursus nisl, in pellentesque massa. Nulla sollicitudin at elit sed interdum. Aenean justo nisl, feugiat sit amet tortor non, varius posuere turpis. Cras vel nisl eu eros pretium imperdiet eget sollicitudin nisi. Fusce dignissim, risus scelerisque interdum iaculis, nisl orci faucibus urna, vel pulvinar ipsum leo vitae dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut id neque eget nisi viverra sodales. </p>
<p> Morbi purus sapien, fermentum sit amet porta ac, rhoncus eget diam. Phasellus hendrerit aliquet justo, ut hendrerit magna ornare in. Nullam mollis ante a magna eleifend aliquet. Sed enim ipsum, lacinia a turpis malesuada, aliquam vestibulum augue. Nunc nec eros quis dui vulputate tincidunt ut non dui. Duis pretium, mi vel sagittis pharetra, leo dui pellentesque metus, sed luctus augue lorem non turpis. Praesent pellentesque pretium gravida. </p>';
		$excerpt = mb_substr( strip_tags( $content ), 0, 450, 'UTF-8' );
		DB::table( 'posts' )->insert( array(
				array(
						'author'     => '1',
						'content'    => $content,
						'excerpt'    => $excerpt,
						'title'      => 'Lorem ipsum dolor sit amet - News',
						'status'     => 'publish',
						'type'       => 'news',
						'url'        => 'lorem-ipsum-dolor-sit-amet-news',
						'created_at' => date( 'Y-m-d H:i:s' ),
						'created_ip' => '127.0.0.1'
				),
				array(
						'author'     => '1',
						'content'    => 'Slider Açıklaması',
						'excerpt'    => 'Slider resmi alt özelliği',
						'title'      => 'Slider-1',
						'status'     => 'publish',
						'type'       => 'slider',
						'url'        => '',
						'created_at' => date( 'Y-m-d H:i:s' ),
						'created_ip' => '127.0.0.1'
				),
				array(
						'author'     => '1',
						'content'    => 'Slider Açıklaması',
						'excerpt'    => 'Slider resmi alt özelliği',
						'title'      => 'Slider-2',
						'status'     => 'publish',
						'type'       => 'slider',
						'url'        => '',
						'created_at' => date( 'Y-m-d H:i:s' ),
						'created_ip' => '127.0.0.1'
				),
				array(
						'author'     => '1',
						'content'    => 'Slider Açıklaması',
						'excerpt'    => 'Slider resmi alt özelliği',
						'title'      => 'Slider-3',
						'status'     => 'publish',
						'type'       => 'slider',
						'url'        => '',
						'created_at' => date( 'Y-m-d H:i:s' ),
						'created_ip' => '127.0.0.1'
				),
				array(
						'author'     => '1',
						'content'    => 'Slider Açıklaması',
						'excerpt'    => 'Slider resmi alt özelliği',
						'title'      => 'Slider-4',
						'status'     => 'publish',
						'type'       => 'slider',
						'url'        => '',
						'created_at' => date( 'Y-m-d H:i:s' ),
						'created_ip' => '127.0.0.1'
				),
				array(
						'author'     => '1',
						'content'    => $content,
						'excerpt'    => $excerpt,
						'title'      => 'Lorem ipsum dolor sit amet - Service',
						'status'     => 'publish',
						'type'       => 'service',
						'url'        => 'lorem-ipsum-dolor-sit-amet-service',
						'created_at' => date( 'Y-m-d H:i:s' ),
						'created_ip' => '127.0.0.1'
				),
				array(
						'author'     => '1',
						'content'    => $content,
						'excerpt'    => $excerpt,
						'title'      => 'Lorem ipsum dolor sit amet - Product',
						'status'     => 'publish',
						'type'       => 'service',
						'url'        => 'lorem-ipsum-dolor-sit-amet-service-product',
						'created_at' => date( 'Y-m-d H:i:s' ),
						'created_ip' => '127.0.0.1'
				)
		) );
		// Konsol çıktısını verelim
		$this->command->info( 'Örnek veriler eklendi' );
	}
}