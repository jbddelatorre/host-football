<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
	public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function tournaments()
    {
        return $this->belongsTo('App\Tournament');
    }

    public function fixture_status()
    {
        return $this->belongsTo('App\FixtureStatus');
    }

    public function fixture_type()
    {
        return $this->belongsTo('App\FixtureType');
    }
}
