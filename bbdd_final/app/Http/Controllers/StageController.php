<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    public function getStages()
    {
        $stages = Stage::all();
        return response()->json($stages);
    }

    public function createStage(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'attack_modifier' => 'required|integer',
            'defense_modifier' => 'required|integer',
            'health_modifier' => 'required|integer',
            'image' => 'nullable|string',
        ]);

        $stage = Stage::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Stage created', 'data' => $stage], 201);
    }

    public function updateStage(Request $request, $id)
    {
        $stage = Stage::find($id);

        if ($stage) {
            $request->validate([
                'name' => 'required|string',
                'attack_modifier' => 'required|integer',
                'defense_modifier' => 'required|integer',
                'health_modifier' => 'required|integer',
                'image' => 'nullable|string',
            ]);

            $stage->update($request->all());
            return response()->json(['status' => 'success', 'message' => 'Stage updated', 'data' => $stage]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Stage not found'],);
        }
    }

    public function deleteStage($id)
    {
        $stage = Stage::find($id);

        if ($stage) {
            $stage->delete();
            return response()->json(['status' => 'success', 'message' => 'Stage deleted']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Stage not found']);
        }
    }
}
