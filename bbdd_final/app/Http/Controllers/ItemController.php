<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function getItems()
    {
        $items = Item::all();
        return response()->json($items);
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
}