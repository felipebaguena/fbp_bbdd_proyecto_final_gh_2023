<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function getItems()
    {
        $items = Item::all();
        return response()->json($items);
    }

    public function getItemById($id)
    {
        $item = Item::find($id);

        if ($item) {
            return response()->json(['status' => 'success', 'data' => $item]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Item not found']);
        }
    }

    public function createItem(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'attack_modifier' => 'required|integer',
            'defense_modifier' => 'required|integer',
            'health_modifier' => 'required|integer',
            'rare' => 'required|string',
        ]);

        $item = Item::create($request->all());

        return response()->json(['status' => 'success', 'message' => 'Item created', 'data' => $item]);
    }

    public function updateItem(Request $request, $id)
    {
        $item = Item::find($id);

        if ($item) {
            $request->validate([
                'name' => 'sometimes|required|string',
                'description' => 'sometimes|required|string',
                'attack_modifier' => 'sometimes|required|integer',
                'defense_modifier' => 'sometimes|required|integer',
                'health_modifier' => 'sometimes|required|integer',
                'rare' => 'sometimes|required|string',
            ]);

            $item->update($request->all());

            return response()->json(['status' => 'success', 'message' => 'Item updated', 'data' => $item]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Item not found']);
        }
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);

        if ($item) {
            $item->delete();
            return response()->json(['status' => 'success', 'message' => 'Item deleted']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Item not found']);
        }
    }

    public function assignRandomItemToSelectedHero()
    {
        $userId = Auth::id();
        $user = User::find($userId);

        if (!$user->selected_hero) {
            return response()->json(['status' => 'error', 'message' => 'No hero selected']);
        }

        $assignedItems = Loot::where('hero_id', $user->selected_hero_id)->pluck('item_id')->toArray();
        $availableItems = Item::whereNotIn('id', $assignedItems)->get();

        if ($availableItems->isEmpty()) {
            return response()->json(['status' => 'error', 'message' => 'No more items to assign']);
        }

        $item = $availableItems->random();

        $loot = Loot::create([
            'hero_id' => $user->selected_hero_id,
            'item_id' => $item->id,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Item assigned to hero', 'data' => $loot]);
    }
}
