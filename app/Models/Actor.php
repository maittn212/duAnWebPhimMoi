<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'movie_id',
    ];
    protected $table = 'actors';

      // Một diễn viên thuộc về một phim
      public function movie()
      {
          return $this->belongsTo(Movie::class, 'movie_id');
      }
    
}
