<?php

namespace App\Http\Controllers;

use App\Models\Hero;
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
}
