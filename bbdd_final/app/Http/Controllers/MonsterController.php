<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;

class MonsterController extends Controller
{
    public function getMonsters()
    {
        $monsters = Monster::all();
        return response()->json($monsters);
    }

    public function createMonster(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'attack' => 'required|integer',
            'defense' => 'required|integer',
            'health' => 'required|integer',
            'description' => 'required|string',
        ]);

        $monster = Monster::create($request->all());

        return response()->json(['status' => 'success', 'message' => 'Monster created', 'data' => $monster]);
    }

    public function updateMonster(Request $request, $id)
    {
        $monster = Monster::find($id);

        if ($monster) {
            $request->validate([
                'name' => 'sometimes|required|string',
                'attack' => 'sometimes|required|integer',
                'defense' => 'sometimes|required|integer',
                'health' => 'sometimes|required|integer',
                'description' => 'sometimes|required|string',
            ]);

            $monster->update($request->all());

            return response()->json(['status' => 'success', 'message' => 'Monster updated', 'data' => $monster]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Monster not found']);
        }
    }

    public function deleteMonster($id)
    {
        $monster = Monster::find($id);

        if ($monster) {
            $monster->delete();
            return response()->json(['status' => 'success', 'message' => 'Monster deleted']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Monster not found']);
        }
    }
}
