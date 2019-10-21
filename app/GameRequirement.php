<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameRequirement extends Model
{
    protected $fillable = [
        'game_id',
        'event_name',
        'event_type',
        'player_option',
        'dresses',
        'tops',
        'bottoms',
        'shoes',
        'bags',
        'jewellery',
        'accessories',
        'background',
        'hair',
        'props',
        'updated_by'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class,'game_id','id');
    }
}
