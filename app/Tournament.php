<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'participants_tournaments');
    }
}
