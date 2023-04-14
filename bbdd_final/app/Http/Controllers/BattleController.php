<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Models\Hero;
use App\Models\Monster;
use App\Models\Stage;
use Illuminate\Http\Request;

class BattleController extends Controller
{
    public function createBattle(Request $request)
    {
        $request->validate([
            'hero_id' => 'required|integer',
            'monster_id' => 'required|integer',
            'stage_id' => 'required|integer',
        ]);

        $hero = Hero::find($request->input('hero_id'));
        $monster = Monster::find($request->input('monster_id'));
        $stage = Stage::find($request->input('stage_id'));

        if ($hero && $monster && $stage) {
            $battle = Battle::create([
                'hero_id' => $hero->id,
                'monster_id' => $monster->id,
                'stage_id' => $stage->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Battle created successfully',
                'data' => $battle,
            ], 201);
        } else {
            $message = '';
            if (!$hero) {
                $message .= 'Hero not found. ';
            }
            if (!$monster) {
                $message .= 'Monster not found. ';
            }
            if (!$stage) {
                $message .= 'Stage not found.';
            }
            return response()->json([
                'success' => false,
                'message' => $message,
            ], 404);
        }
    }
}
