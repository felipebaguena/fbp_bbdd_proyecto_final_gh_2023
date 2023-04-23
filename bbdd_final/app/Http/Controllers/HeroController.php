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
            'image_id' => 'required|int',
        ]);

        $userId = Auth::id();

        $hero = Hero::create([
            'user_id' => $userId,
            'name' => $request['name'],
            'story' => $request['story'],
            'attack' => rand(5, 15),
            'defense' => rand(5, 15),
            'health' => rand(70, 160),
            'level' => 1,
            'hero_image_id' => $request['image_id'],
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
            $addedAttack = rand(3, 6);
            $addedDefense = rand(3, 6);
            $addedHealth = rand(10, 30);

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
        $hero = Hero::find($hero_id);
        if (!$hero) {
            return response()->json(['message' => 'Hero not found'], 404);
        }

        $items = $hero->loots()->with('item')->get()->pluck('item');
        return response()->json(['status' => 'success', 'data' => $items], 200);
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
            $battles = $hero->battles()->distinct('monster_id')->orderBy('monster_id')->get(['monster_id']);
            $monsters = [];
    
            foreach ($battles as $battle) {
                $monster = Monster::find($battle->monster_id);
                if ($monster) {
                    $monsterImageUrl = $monster->monsterImage ? $monster->monsterImage->image_url : null;
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
