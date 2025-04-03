<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'status',
        'slug'
    ];

    // 1 quốc gia có nhiều phim
    public function movies(){
        return $this->hasMany(Movie::class);
    }

}
