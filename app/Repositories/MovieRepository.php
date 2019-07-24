<?php
namespace App\Repositories;

use App\Models\Movie;

class MovieRepository
{
    protected $movie;
    public function __construct(movie $movie)
    {
        $this->movie = $movie;
    }
    public function create($data)
    {
        return $this->movie->create([
            'movie_title' => $data['movie_title'],
            'movie_banner' => $data['movie_banner'],
            'start_time'=>$data['start_time'],
            'end_time' => $data['end_time'],
            'cinema_id' => $data['cinema_id']
        ]);
    }
}
