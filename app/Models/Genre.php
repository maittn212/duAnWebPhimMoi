<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'status',
        'slug'
    ];

    // Một thể loại có nhiều phim
    public function movie(){
        return $this->belongsToMany(Movie::class);
    }
}
