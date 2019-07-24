<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'movie_title', 'movie_banner', 'start_time', 'end_time', 'cinema_id'
    ];
    public function cinema()
    {
        return $this->belongs('App\Models\Cinema');
    }
}
