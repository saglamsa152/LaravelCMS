<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function  run()
    {
        //Tablo verilerini temizleyelim
        DB::table('category')->delete();
        // Konsol çıktısını verelim
        $this->command->info('category tablosu temizlendi');
        //Veri tabanına verilerimizi ekleyelim
        DB::table('category')->insertGetId(
            array(
                'name' => 'Genel',
                'slug' => 'genel',
                'created_at' => date('Y-m-d H:i:s'),
                'description' => 'Genel  kategorisi'

            ));

        // Konsol çıktısını verelim
        $this->command->info('Örnek veriler eklendi');
    }
}