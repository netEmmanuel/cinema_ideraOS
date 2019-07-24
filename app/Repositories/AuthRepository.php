<?php

namespace App\Repositories;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ApiController;

class AuthRepository
{
    protected $auth;

    public function __construct(User $user)
    {
        $this->auth = $user;
    }

    public function create($data)
    {
        return $this->auth->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
