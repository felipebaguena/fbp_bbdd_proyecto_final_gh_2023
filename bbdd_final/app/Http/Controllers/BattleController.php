<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Models\Hero;
use App\Models\Monster;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BattleController extends Controller
{
    public function createBattle(Request $request)
    {
        $userId = Auth::id();
        $user = User::find($userId);
    
        if (!$user->selected_hero) {
            return response()->json(['status' => 'error', 'message' => 'No hero selected']);
        }
    
        $monster = Monster::inRandomOrder()->first();
        $stage = Stage::inRandomOrder()->first();
    
        $battle = Battle::create([
            'hero_id' => $user->selected_hero_id,
            'monster_id' => $monster->id,
            'stage_id' => $stage->id,
        ]);

        $battle->load('hero', 'monster', 'stage');
    
        return response()->json(['status' => 'success', 'message' => 'Battle created', 'data' => $battle]);
    }    

    public function updateBattleResult(Request $request, $battle_id)
    {
        $battle = Battle::find($battle_id);
        if ($request->input('hero_victory') == true) {
            $battle->hero_victory = true;
        }
        $battle->save();

        return response()->json(['status' => 'success', 'message' => 'Battle result updated', 'data' => $battle]);
    }
    
    
}
