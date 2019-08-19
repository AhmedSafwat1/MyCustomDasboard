<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = [
        'title_ar', 'title_en', 'flag', 'code'
    ];

    public function Cities()
    {
        return $this->hasMany('App\Models\City', 'country_id', 'id');
    }

    // public function Neighborhoods()
    // {
    //     return $this->hasMany('App\Models\Neighborhood', 'country_id', 'id');
    // }
}
