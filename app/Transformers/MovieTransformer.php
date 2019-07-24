<?php

namespace App\Transformers;

use App\Models\Movie;

use League\Fractal\TransformerAbstract;

class MovieTransformer extends TransformerAbstract
{

    /**
     * @param \App\Models\Movie
     * @return array
    */
    public function transform(Movie $movie)
    {
        return [
            'movie_title' => (string) $movie->movie_title,
            'movie_banner' => (string) $movie->movie_banner,
            'start_time' => (string) $movie->start_time,
            'end_time' => (string) $movie->end_time,
            'cinema_id' => (string) $movie->cinema_id,
        ];
    }
}
