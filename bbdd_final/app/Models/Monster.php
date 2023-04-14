<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'attack',
        'defense',
        'health',
        'description',
        'created_at',
        'updated_at',
    ];

    public function battles()
    {
        return $this->hasMany(Battle::class);
    }
}
