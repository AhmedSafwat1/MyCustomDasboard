<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'title', 'message', 'file', 'seen', 'name', 'email'
    ];

    static function unReedMsgsId()
    {
        return Self::where('seen', '0')->orderBy('id', 'desc')->pluck('id')->toArray();
    }

    static function unReedMsgs()
    {
        return Self::where('seen', '0')->orderBy('id', 'desc')->get();
    }

    static function reedMsgs()
    {
        return Self::where('seen', '1')->orderBy('id', 'desc')->get();
    }
}
