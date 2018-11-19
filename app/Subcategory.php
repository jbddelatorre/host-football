<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    public function fixtures()
    {
        return $this->hasMany('App\Fixture');
    }

    public function tournaments()
    {
        return $this->belongsToMany('App\Tournament', 'tournament_subcategories');
    }
}
