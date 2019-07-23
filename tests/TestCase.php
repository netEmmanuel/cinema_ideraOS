<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $loggedInUser;

    protected $user;

    protected $headers;

    public function setUp()
    {
        parent::setUp();

        $this->artisan('passport:install');

        $users = factory(\App\Models\User::class)->times(2)->create();

        $this->loggedInUser = $users[0];
        $token = $this->loggedInUser->createToken('token')->accessToken;

        $this->user = $users[1];

        $this->headers = [
            'Authorization' => "Bearer {$token}"
        ];
    }
}
