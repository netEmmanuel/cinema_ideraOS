<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\User;
use App\Services\AuthService;
use App\Http\Requests\LoginUser;
use App\Http\Requests\RegisterUser;

use Illuminate\Support\Facades\Hash;
use App\Transformers\UserTransformer;
use App\Http\Controllers\ApiController;

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

    /**
     * Login .
     *
     * @param \App\Http\Requests\Login $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginUser $request)
    {
        $data = $request->all();
        
        $email = array_get($data, 'email');
        $password = array_get($data, 'password');

        /** @var user $user */
        $user = User::where('email', $email)->first();

        if ($user) {
            if (Hash::check($password, $user->password)) {
                $token = $user->createToken('token')->accessToken;
                return $this->success($token, 200);
            } else {
                $response = "Incorrect Password";
                return $this->respondError($response, 422);
            }
        } else {
            $response = "User Doesn't Exists";
            return $this->respondError($response, 422);
        }
    }
}
