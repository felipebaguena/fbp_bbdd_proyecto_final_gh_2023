<?php

namespace App\Http\Controllers;

use App\Models\Villager;
use Illuminate\Http\Request;

class VillagerController extends Controller
{
    public function getVillagerImageById($imageId)
    {
        $villager = Villager::find($imageId);
    
        if ($villager) {
            $imageUrl = url($villager->route);
            $name = $villager->name;
            return response()->json([
                'image_url' => $imageUrl,
                'name' => $name
            ]);
        }

        return response()->json(['error' => 'Image not found'], 404);
    }
}
