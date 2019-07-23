<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_user_with_token_on_valid_registration()
    {
        $data = [
            'first_name' => 'test',
            'last_name' => 'test',
            'email' => 'test@test.com',
            'password' => 'secret',
            'phone' => '08123456789'
        ];

        $response = $this->postJson('/api/users', $data);

        $response
            // ->assertStatus(200)
            ->assertJsonFragment([
                'first_name' => 'test',
                'last_name' => 'test',
                'email' => 'test@test.com',
                'phone' => '08123456789',
            ]);

        $this->assertArrayHasKey('token', $response->json()['data'], 'Token not found');
    }

    /** @test */
    public function it_returns_field_required_validation_errors_on_invalid_registration()
    {
        $data = [];

        $response = $this->postJson('/api/users', $data);

        $response->assertStatus(422)
            ->assertJson([
                'errors' => [
                    'first_name' => ['The first name field is required.'],
                    'last_name' => ['The last name field is required.'],
                    'phone' => ['The phone field is required.'],
                    'email' => ['The email field is required.'],
                    'password' => ['The password field is required.'],
                ]
            ]);
    }

    /** @test */
    public function it_returns_appropriate_field_validation_errors_on_invalid_registration()
    {
        $data = [
            'first_name0' => 'First Name',
            'last_name' => 'last name',
            'email' => 'invalid email',
            'password' => '1',
            'phone' => '12345',
        ];

        $response = $this->postJson('/api/users', $data);

        $response->assertStatus(422)
            ->assertJson([
                'errors' => [
                    'email' => ['The email must be a valid email address.'],
                    'password' => ['The password must be at least 6 characters.'],
                    'phone' => ['The phone must be 11 digits.'],
                ]
            ]);
    }
}
