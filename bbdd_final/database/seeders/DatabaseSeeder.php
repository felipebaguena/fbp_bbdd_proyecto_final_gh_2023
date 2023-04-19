<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            RoleSeeder::class,
        ]);

        \App\Models\User::factory(10)->create();

        $this->call([

            HeroImageSeeder::class,
            HeroSeeder::class,
            ItemSeeder::class,
            LootSeeder::class,
            MonsterImageSeeder::class,
            MonsterSeeder::class,
            StageSeeder::class,
            BattleSeeder::class
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
