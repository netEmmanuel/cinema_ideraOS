<?php

namespace App\Services;

use App\Repositories\AuthRepository;

use Illuminate\Http\Request;

class AuthService
{
    protected $auth;

    public function __construct(AuthRepository $auth)
    {
        $this->auth = $auth;
    }

    public function createUser(Request $request)
    {
        $attributes = $request->all();

        $user = $this->auth->create($attributes);

        // Generate token
        $user->token = $user->createToken('token')->accessToken;

        return $user;
    }
    
    public function authenticate(Request $request)
    {
        $attributes = $request->all();

        $user = $this->auth->login($attributes);

        return $user;
    }
}
