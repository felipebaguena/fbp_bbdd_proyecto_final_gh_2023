<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'attack_modifier',
        'defense_modifier',
        'health_modifier',
        'rare',
        'created_at',
        'updated_at',
    ];

    public function heroes()
    {
        return $this->belongsToMany(Hero::class, 'loots');
    }
}
