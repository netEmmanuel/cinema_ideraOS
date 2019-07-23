<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Services\AuthService;
use App\Http\Requests\RegisterUser;
use App\Transformers\UserTransformer;
use App\Http\Controllers\ApiController;

use Auth;

class AuthController extends ApiController
{
    /**
     * AuthController constructor.
     *
     * @param \App\Transformers\UserTransformer $transformer
     */
    public function __construct(UserTransformer $transformer, AuthService $authService)
    {
        $this->transformer = $transformer;
        $this->service = $authService;
    }

    /**
     * Register a new user and return the user if successful.
     *
     * @param \App\Http\Requests\RegisterUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterUser $request)
    {
        $data = $this->service->createUser($request);

        return $this->respondWithTransformer($data);
    }
}
