<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title',
        'image',
        'url',
        'status',
        'start_date',
        'end_date',
        'click_count',
        'position',
    ];

}
