<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CinemaService;
use App\Http\Requests\CreateCinema;
use App\Http\Controllers\ApiController;
use App\Transformers\CinemaTransformer;

class CinemaController extends ApiController
{
    /**
     * CinemaController constructor.
     *
     * @param \App\Transformers\CinemaTransformer $transformer
     */
    public function __construct(CinemaTransformer $transformer, CinemaService $cinemaService)
    {
        $this->transformer = $transformer;
        $this->service = $cinemaService;
    }

    /**
     * Register a new cinema object and return if success
     *
     * @param \App\Http\Requests\CreateCinema $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateCinema $request)
    {
        $data = $this->service->createCinema($request);

        return $this->respondCreated($data);
    }

    /**
     * Retrieve cinema
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCinemas()
    {
        $data = $this->service->getAll();

        return $this->respondCreated($data);
    }
}
