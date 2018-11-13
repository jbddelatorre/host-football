<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function subcategory()
    {
        return $this->belongsTo('App\TournamentSubcategory');
    }
}
