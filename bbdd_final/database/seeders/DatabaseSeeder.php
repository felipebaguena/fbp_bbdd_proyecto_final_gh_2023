<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Clavefalsa.1'),
            'role_id' => 2,
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
            BattleSeeder::class,
            VillagerSeeder::class
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
