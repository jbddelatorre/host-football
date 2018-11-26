<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixtureStatus extends Model
{
    protected $table = 'fixture_statuses';

    function fixtures() {
    	return $this->hasMany('App\Fixture');
    }
}
