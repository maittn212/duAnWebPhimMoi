<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    public $timestamps = false;
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
