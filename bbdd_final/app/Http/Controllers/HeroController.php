<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\HeroImage;
use App\Models\Item;
use App\Models\Monster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeroController extends Controller
{
    public function createHero(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'story' => 'required|string',
            'hero_image_id' => 'required|int',
        ]);

        $userId = Auth::id();

        $hero = Hero::create([
            'user_id' => $userId,
            'name' => $request['name'],
            'story' => $request['story'],
            'attack' => rand(15, 16),
            'defense' => rand(13, 16),
            'health' => rand(140, 160),
            'level' => 1,
            'hero_image_id' => $request['hero_image_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Hero created successfully',
            'data' => $hero,
        ], 201);
    }


    public function getImageById($imageId)
    {
        $heroImage = HeroImage::find($imageId);

        if ($heroImage) {
            $imageUrl = url($heroImage->image);
            return response()->json(['image_url' => $imageUrl]);
        }

        return response()->json(['error' => 'Image not found'], 404);
    }

    public function deleteHero($heroId)
    {
        $hero = Hero::find($heroId);

        if ($hero) {
            $hero->delete();
            return response()->json([
                'success' => true,
                'message' => 'Hero deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Hero not found',
            ], 404);
        }
    }

    public function levelUpHero($heroId)
    {
        $hero = Hero::find($heroId);

        if ($hero) {
            $hero->level += 1;
            $addedAttack = rand(2, 5);
            $addedDefense = rand(2, 5);
            $addedHealth = rand(5, 10);

            $hero->attack += $addedAttack;
            $hero->defense += $addedDefense;
            $hero->health += $addedHealth;
            $hero->save();

            return response()->json([
                'success' => true,
                'message' => 'Hero leveled up successfully',
                'data' => $hero,
                'addedValues' => [
                    'attack' => $addedAttack,
                    'defense' => $addedDefense,
                    'health' => $addedHealth,
                ],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Hero not found',
            ], 404);
        }
    }

    public function getHeroItems(Request $request, $hero_id)
    {
        $hero = Hero::with('heroImage')->find($hero_id);
        if (!$hero) {
            return response()->json(['message' => 'Hero not found'], 404);
        }

        $items = $hero->loots()->with('item')->get()->pluck('item');
        return response()->json(['status' => 'success', 'heroImage' => $hero->heroImage, 'data' => $items], 200);
    }



    public function addItemToHero($heroId, $itemId)
    {
        $hero = Hero::find($heroId);
        $item = Item::find($itemId);

        if ($hero && $item) {

            if ($hero->items->contains($item->id)) {
                return response()->json(['status' => 'error', 'message' => 'Item already assigned to the hero']);
            }

            $now = now();
            $hero->items()->attach($item->id, ['created_at' => $now, 'updated_at' => $now]);

            return response()->json(['status' => 'success', 'message' => 'Item added to hero']);
        } else {
            $message = '';
            if (!$hero) {
                $message .= 'Hero not found. ';
            }
            if (!$item) {
                $message .= 'Item not found.';
            }
            return response()->json(['status' => 'error', 'message' => $message]);
        }
    }

    public function getDefeatedMonsters($heroId)
    {
        $hero = Hero::find($heroId);

        if ($hero) {
            $battles = $hero->battles()
                ->where('hero_victory', true)
                ->distinct('monster_id')
                ->orderBy('monster_id')
                ->get(['monster_id']);
            $monsters = [];

            foreach ($battles as $battle) {
                $monster = Monster::find($battle->monster_id)->load('monsterImage');
                if ($monster) {
                    $monsterImageUrl = $monster->monsterImage ? url($monster->monsterImage->image) : null;
                    $monsterWithImage = $monster->toArray();
                    $monsterWithImage['imageUrl'] = $monsterImageUrl;
                    array_push($monsters, $monsterWithImage);
                }
            }

            return response()->json([
                'success' => true,
                'data' => $monsters,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Hero not found',
            ], 404);
        }
    }

    public function getTopHeroesByKills()
    {
        $heroes = Hero::withCount([
            'battles' => function ($query) {
                $query->where('hero_victory', true);
            }
        ])
            ->with('heroImage')
            ->orderBy('battles_count', 'desc')
            ->take(10)
            ->get();

        $topHeroes = [];

        foreach ($heroes as $hero) {
            $heroImageData = null;
            if ($hero->heroImage) {
                $imageUrl = url($hero->heroImage->image);
                $heroImageData = [
                    'id' => $hero->heroImage->id,
                    'image' => $imageUrl,
                ];
            }

            array_push($topHeroes, [
                'hero_id' => $hero->id,
                'hero_name' => $hero->name,
                'kills' => $hero->battles_count,
                'hero_image' => $heroImageData,
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $topHeroes,
        ]);
    }



    public function removeItemFromHero($heroId, $itemId)
    {
        $hero = Hero::find($heroId);
        $item = Item::find($itemId);

        if ($hero && $item) {

            if (!$hero->items->contains($item->id)) {
                return response()->json(['status' => 'error', 'message' => 'Item not assigned to the hero']);
            }

            $hero->items()->detach($item->id);

            return response()->json(['status' => 'success', 'message' => 'Item removed from hero']);
        } else {
            $message = '';
            if (!$hero) {
                $message .= 'Hero not found. ';
            }
            if (!$item) {
                $message .= 'Item not found.';
            }
            return response()->json(['status' => 'error', 'message' => $message]);
        }
    }
}
