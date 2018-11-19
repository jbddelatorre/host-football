<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'participants_tournaments');
    }

    public function subcategories()
    {
        return $this->belongsToMany('App\Subcategory', 'tournament_subcategories');
    }
}
