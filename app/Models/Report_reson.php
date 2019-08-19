<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report_reson extends Model
{
    protected $table = 'report_resons';
    protected $fillable = [
        'title_ar', 'title_en'
    ];
}
