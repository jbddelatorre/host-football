<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentSubcategory extends Model
{
    protected $table = 'tournament_subcategories';

    public function teams()
    {
        return $this->hasMany('App\Team');
    }
}
