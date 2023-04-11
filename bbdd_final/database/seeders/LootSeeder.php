<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loots')->insert([
            [
                'id' => 1,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'hero_id' => rand(1, 12),
                'item_id' => rand(1, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
