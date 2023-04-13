<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'attack_modifier',
        'defense_modifier',
        'health_modifier',
        'image',
        'created_at',
        'updated_at',
    ];

}
