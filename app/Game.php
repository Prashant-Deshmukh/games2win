<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'category',
        'paid',
        'status'
    ];

    public function game_requirement()
    {
        return $this->hasMany(GameRequirement::class,'game_id','id');
    }
}
