<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class UserSignInTest extends TestCase
{
    public function testUserCanSignIn()
    {
        $user = User::factory()->create([
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->postJson('/api/user/sign-in', [
            'email' => 'john.doe@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'token',
        ]);
    }

    public function testUserCannotSignInWithInvalidCredentials()
    {
        $response = $this->postJson('/api/user/sign-in', [
            'email' => 'invalid@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401);
    }
}
