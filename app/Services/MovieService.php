<?php
namespace App\Services;

use App\Repositories\MovieRepository;
use Illuminate\Http\Request;

class MovieService
{
    protected $movie;
    public function __construct(MovieRepository $movie)
    {
        $this->movie = $movie;
    }
    public function createMovie(Request $request)
    {
        $attributes = $request->all();
        $movie = $this->movie->create($attributes);
        return $movie;
    }
}
