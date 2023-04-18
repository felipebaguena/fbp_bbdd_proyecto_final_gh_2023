<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'created_at',
        'updated_at',
    ];

    public function heroes()
    {
        return $this->hasMany(Hero::class);
    }
}
