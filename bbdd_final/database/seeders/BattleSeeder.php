<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BattleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroes = DB::table('heroes')->pluck('id');
        $monsters = DB::table('monsters')->pluck('id');
        $stages = DB::table('stages')->pluck('id');

        for ($i = 1; $i <= 18; $i++) {
            DB::table('battles')->insert([
                'hero_id' => $heroes->random(),
                'monster_id' => $monsters->random(),
                'stage_id' => $stages->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}