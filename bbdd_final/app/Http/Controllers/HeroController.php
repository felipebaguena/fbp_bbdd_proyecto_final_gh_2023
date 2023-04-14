<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeroController extends Controller
{
    public function createHero(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'story' => 'required|string',
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
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Hero created successfully',
            'data' => $hero,
        ], 201);
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
