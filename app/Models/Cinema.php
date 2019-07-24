<?php

namespace App\Models;

use Models\Movie;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $fillable = [
        'name', 'location', 'address', 'created_by'
    ];

    public function movies()
    {
        return $this->hasMany('App\Models\Movie', 'cinema_id', 'id');
    }
}
