<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'status',
        'slug'
    ];

    // Một danh mục có nhiều phim
    public function movies()
    {
        return $this->hasMany(Movie::class, 'category_id');
    }
}
