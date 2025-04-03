<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public $timestamps = false; // Tắt tự động cập nhật created_at và updated_at
    protected $fillable = [
        'movie_id',
        'link',
        'episode'
    ];
    public function movie(){
        return $this->belongsTo(Movie::class,);
    }
}
