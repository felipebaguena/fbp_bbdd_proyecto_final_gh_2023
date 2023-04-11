<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'id' => 1,
                'name' => "Tranquility Stone",
                'description' => "A mystical gem imbued with the power to calm and soothe troubled minds, bringing peace and serenity to its bearer.",
                'attack_modifier' => 2,
                'defense_modifier' => 3,
                'health_modifier' => 20,
                'rare' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => "Chaos Cube",
                'description' => "A cursed artifact that is said to contain the chaotic energy of the ancient god of mischief. Legends tell of those who have dared to touch the Cube, only to be consumed by madness and chaos.",
                'attack_modifier' => 5,
                'defense_modifier' => 2,
                'health_modifier' => 10,
                'rare' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => "Sword of Prosperity",
                'description' => "A legendary weapon that shines with a golden glow and has a hilt adorned with intricate designs of prosperity and wealth. It is said that whoever wields this sword will always find success and prosperity in their endeavors, as the sword has the power to attract wealth and good fortune.",
                'attack_modifier' => 8,
                'defense_modifier' => 1,
                'health_modifier' => 10,
                'rare' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => "Boots of Chaos",
                'description' => "A mysterious and powerful artifact that grant their wearer unparalleled speed and agility, but at a great cost. The chaotic magic imbued in the boots can cause unpredictable and dangerous side effects, ranging from uncontrollable bursts of energy to temporary loss of sanity.",
                'attack_modifier' => 2,
                'defense_modifier' => 6,
                'health_modifier' => 30,
                'rare' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => "Elemental Bracelet",
                'description' => "This enchanted bracelet is made of a rare metal imbued with elemental magic, allowing the wearer to harness the powers of nature. When activated, the bracelet can summon elemental forces such as wind, water, fire, or earth to aid the wearer in battle or to perform various tasks.",
                'attack_modifier' => 2,
                'defense_modifier' => 2,
                'health_modifier' => 60,
                'rare' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => "Tiara of Mania",
                'description' => "A golden tiara adorned with shimmering gems that seems to enhance the wearer's confidence and energy, but also induces bouts of uncontrollable mania and recklessness.",
                'attack_modifier' => 1,
                'defense_modifier' => 8,
                'health_modifier' => 30,
                'rare' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => "Ice Disc",
                'description' => "The Ice Disc is a magical artifact made of frozen water imbued with ancient spells. When thrown, it releases a sharp, icy blast that can freeze enemies in their tracks, making it a powerful weapon for both offensive and defensive purposes.",
                'attack_modifier' => 8,
                'defense_modifier' => 4,
                'health_modifier' => 20,
                'rare' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => "Hero's Tome",
                'description' => "A weathered leather-bound book filled with tales of legendary heroes and their deeds. The pages seem to glow with a faint magic, and the words within are said to grant insight and guidance to those who read them. It is said that only those with a pure heart and noble intentions can unlock its true power.",
                'attack_modifier' => 2,
                'defense_modifier' => 8,
                'health_modifier' => 30,
                'rare' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => "Grail of Immunity",
                'description' => "A legendary grail that is said to grant immunity to all diseases and poisons to the one who drinks from it. It is also believed to provide eternal youth and life to its possessor. Many have searched for it throughout the ages, but few have ever found it.",
                'attack_modifier' => 2,
                'defense_modifier' => 12,
                'health_modifier' => 50,
                'rare' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => "Burning Seal",
                'description' => "A mystical seal imbued with fire magic that, when activated, creates a circle of flames around the user, providing protection and dealing damage to nearby enemies. Only a skilled fire mage can harness the power of the Burning Seal.",
                'attack_modifier' => 9,
                'defense_modifier' => 1,
                'health_modifier' => 40,
                'rare' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'name' => "Sword of the Titans",
                'description' => "The Sword of the Titans is a massive weapon, wielded only by those with immense strength and courage. Its blade is made of pure, shimmering steel and engraved with ancient symbols of power. Legend has it that this sword was crafted by the Titans themselves and imbued with their strength, making it nearly indestructible.",
                'attack_modifier' => 14,
                'defense_modifier' => 2,
                'health_modifier' => 10,
                'rare' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'name' => "Vengeance Hide",
                'description' => "A dark leather armor adorned with spikes and fangs, said to grant its wearer the power of vengeance against their enemies.",
                'attack_modifier' => 2,
                'defense_modifier' => 14,
                'health_modifier' => 110,
                'rare' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
