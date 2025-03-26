<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    // metto in relazione con games
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
