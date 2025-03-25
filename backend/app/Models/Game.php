<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // metto in relazione con genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
