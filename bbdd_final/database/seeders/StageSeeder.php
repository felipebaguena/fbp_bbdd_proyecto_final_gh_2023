<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stages')->insert([
            [
                'id' => 1,
                'name' => "Dragon's Lair",
                'attack_modifier' => 3,
                'defense_modifier' => 1,
                'health_modifier' => 20,
                'image' => "dragon_lair.jpg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => "Haunted Forest",
                'attack_modifier' => 2,
                'defense_modifier' => 3,
                'health_modifier' => 10,
                'image' => "haunted_forest.jpg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => "Enchanted Castle",
                'attack_modifier' => 1,
                'defense_modifier' => 2,
                'health_modifier' => 30,
                'image' => "enchanted_castle.jpg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => "Frosty Mountains",
                'attack_modifier' => 2,
                'defense_modifier' => 1,
                'health_modifier' => 30,
                'image' => "frosty_mountains.jpg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => "Forbidden Temple",
                'attack_modifier' => 3,
                'defense_modifier' => 2,
                'health_modifier' => 10,
                'image' => "forbidden_temple.jpg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => "Volcano Lair",
                'attack_modifier' => 1,
                'defense_modifier' => 3,
                'health_modifier' => 20,
                'image' => "volcano_lair.jpg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
