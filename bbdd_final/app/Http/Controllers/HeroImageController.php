<?php

namespace App\Http\Controllers;

use App\Models\HeroImage;
use Illuminate\Http\Request;

class HeroImageController extends Controller
{
    public function getAllHeroImages()
    {
        $heroImages = HeroImage::all();
    
        $imageData = $heroImages->map(function ($image) {
            $imageUrl = url($image->image);
            return [
                'id' => $image->id,
                'name' => $image->name,
                'image_url' => $imageUrl,
                'created_at' => $image->created_at,
                'updated_at' => $image->updated_at,
            ];
        });
    
        return response()->json(['data' => $imageData]);
    }
    
}
