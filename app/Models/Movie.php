<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'time',
        'description',
        'status',
        'image',
        'category_id',
        'genre_id',
        'country_id',
        'slug',
        'is_hot',
        'eng_name',
        'resolution',
        'language_type',
        'created_at',
        'updated_at',
        'year',
        'top_view',
        'season',
        'trailer',
        'episode_count',
        'movie_type',
        'count_views',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'movie_id', 'genre_id');
    }

    public function genre(){
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function movie_genre(){
        return $this->belongsToMany(Genre::class,'movie_genre','movie_id','genre_id');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class, 'movie_id', 'id');
    }
  // Một phim có nhiều diễn viên
  public function actors()
  {
      return $this->hasMany(Actor::class, 'movie_id');
  }
    
}
