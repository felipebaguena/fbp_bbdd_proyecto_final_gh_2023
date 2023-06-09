<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'story',
        'attack',
        'defense',
        'health',
        'level',
        'hero_image_id',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'loots');
    }

    public function loots()
    {
        return $this->hasMany('App\Models\Loot');
    }

    public function battles()
    {
        return $this->hasMany(Battle::class);
    }

    public function heroImage()
    {
        return $this->belongsTo(HeroImage::class, 'hero_image_id');
    }
}
