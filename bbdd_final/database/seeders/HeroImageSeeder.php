<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            ['name' => 'Caballero', 'image' => 'Caballero.gif'],
            ['name' => 'Druida', 'image' => 'Druida.gif'],
            ['name' => 'Enano', 'image' => 'Enano.gif'],
            ['name' => 'Guerrero Pesado', 'image' => 'GuerreroPesado.gif'],
            ['name' => 'Hechicera', 'image' => 'Hechicera.gif'],
            ['name' => 'Mago', 'image' => 'Mago.gif'],
            ['name' => 'Mago de Batalla', 'image' => 'MagoBatalla.gif'],
            ['name' => 'Paladín', 'image' => 'Paladin.gif'],
        ];

        foreach ($images as $imageData) {
            DB::table('hero_images')->insert([
                'name' => $imageData['name'],
                'image' => 'images/heroes/' . $imageData['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
