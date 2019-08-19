<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'title_ar', 'title_en', 'desc_ar', 'desc_en'
    ];
}
