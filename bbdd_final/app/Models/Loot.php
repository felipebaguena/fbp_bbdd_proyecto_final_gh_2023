<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loot extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_id',
        'item_id',
        'created_at',
        'updated_at',
    ];

    public function hero()
    {
        return $this->belongsTo(Hero::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
