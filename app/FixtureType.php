<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixtureType extends Model
{
    protected $table = 'fixture_types';

    function fixtures() {
    	return $this->hasMany('App\Fixture');
    }
}
