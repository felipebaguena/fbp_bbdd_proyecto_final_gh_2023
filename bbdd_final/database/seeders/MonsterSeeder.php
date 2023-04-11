<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonsterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('monsters')->insert([
            [
                'id' => 1,
                'name' => "Grimmhorn",
                'attack' => 15,
                'defense' => 12,
                'health' => 200,
                'description' => "A towering minotaur with razor-sharp horns and a fierce temper.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => "Necrotongue",
                'attack' => 7,
                'defense' => 8,
                'health' => 80,
                'description' => "A foul-mouthed zombie with a penchant for biting and a surprising amount of speed.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => "Gargoyle Shadowwing",
                'attack' => 18,
                'defense' => 16,
                'health' => 250,
                'description' => "A winged stone demon with glowing red eyes and talons that can tear through steel.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => "Frostbite",
                'attack' => 12,
                'defense' => 10,
                'health' => 150,
                'description' => "A frosty undead warrior with a sword made of ice and the ability to freeze enemies with a touch.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => "Chimera",
                'attack' => 20,
                'defense' => 18,
                'health' => 300,
                'description' => "A mythical beast with the head of a lion, body of a goat, and tail of a serpent, capable of spitting acid and breathing fire.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => "Basilisk",
                'attack' => 14,
                'defense' => 12,
                'health' => 180,
                'description' => "A serpentine monster with venomous breath and the ability to turn enemies to stone with a gaze.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => "Hellhound",
                'attack' => 10,
                'defense' => 8,
                'health' => 120,
                'description' => "A demonic canine with blazing eyes and a bite that can set foes on fire.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => "Wyvern",
                'attack' => 16,
                'defense' => 12,
                'health' => 120,
                'description' => "A winged dragon with a venomous tail and the ability to breathe blasts of fire.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
