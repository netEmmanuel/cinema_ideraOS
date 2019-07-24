<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\MovieService;
use App\Http\Requests\CreateMovie;
use App\Transformers\MovieTransformer;
use App\Http\Controllers\ApiController;

class MovieController extends ApiController
{
    /**
         * CinemaController constructor.
         *
         * @param \App\Transformers\MovieTransformer $transformer
         */
    public function __construct(MovieTransformer $transformer, MovieService $movieService)
    {
        $this->transformer = $transformer;
        $this->service = $movieService;
    }

    /**
     * Create a new movie object and return if success
     *
     * @param \App\Http\Requests\CreateMovie $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateMovie $request)
    {
        $data = $this->service->createMovie($request);

        return $this->respondCreated($data);
    }
}
