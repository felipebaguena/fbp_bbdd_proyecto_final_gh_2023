<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_id',
        'monster_id',
        'stage_id',
        'created_at',
        'updated_at',
    ];

    public function hero()
    {
        return $this->belongsTo(Hero::class);
    }

    public function monster()
    {
        return $this->belongsTo(Monster::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
