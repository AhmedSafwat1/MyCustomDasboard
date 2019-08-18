<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    protected $table = 'neighborhoods';
    protected $fillable = [
        'title', 'country_id', 'city_id'
    ];

    public function Country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }

    public function City()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }
}
