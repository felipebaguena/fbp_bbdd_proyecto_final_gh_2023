<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonsterImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [];

        for ($i = 1; $i <= 18; $i++) {
            $images[] = ['name' => "Dragon_$i", 'image' => "Dragon_$i.gif"];
        }
        $images[] = ['name' => 'Dragon_Big_1', 'image' => 'Dragon_Big_1.gif'];
        $images[] = ['name' => 'Dragon_Big_2', 'image' => 'Dragon_Big_2.gif'];

        for ($i = 1; $i <= 25; $i++) {
            $images[] = ['name' => "Humanoid_$i", 'image' => "Humanoid_$i.gif"];
        }
        for ($i = 1; $i <= 3; $i++) {
            $images[] = ['name' => "Humanoid_Big_$i", 'image' => "Humanoid_Big_$i.gif"];
        }

        for ($i = 1; $i <= 13; $i++) {
            $images[] = ['name' => "Magic_$i", 'image' => "Magic_$i.gif"];
        }
        $images[] = ['name' => 'Magic_Big_1', 'image' => 'Magic_Big_1.gif'];
        $images[] = ['name' => 'Magic_Big_2', 'image' => 'Magic_Big_2.gif'];

        for ($i = 1; $i <= 37; $i++) {
            $images[] = ['name' => "Monster_$i", 'image' => "Monster_$i.gif"];
        }
        for ($i = 1; $i <= 3; $i++) {
            $images[] = ['name' => "Monster_Big_$i", 'image' => "Monster_Big_$i.gif"];
        }

        for ($i = 1; $i <= 18; $i++) {
            $images[] = ['name' => "Undead_$i", 'image' => "Undead_$i.gif"];
        }
        for ($i = 1; $i <= 2; $i++) {
            $images[] = ['name' => "Undead_Big_$i", 'image' => "Undead_Big_$i.gif"];
        }

        foreach ($images as $imageData) {
            DB::table('monster_images')->insert([
                'name' => $imageData['name'],
                'image' => 'images/monsters/' . $imageData['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}