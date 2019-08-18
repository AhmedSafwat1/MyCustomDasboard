<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = [
        'title', 'country_id'
    ];

    public function Country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }

    public function Neighborhoods()
    {
        return $this->hasMany('App\Models\Neighborhood', 'city_id', 'id');
    }
}
