<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserRegistrationTest extends TestCase
{
    // Використовуйте RefreshDatabase для очищення бази даних між тестами (залежить від налаштувань).

    public function testUserCanRegister()
    {
        $response = $this->postJson('/api/user/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password123',
            'phone' => '1234567890',
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id',
            'first_name',
            'last_name',
            'email',
            'phone',
        ]);
    }

    public function testUserCannotRegisterWithExistingEmail()
    {
        $user = User::factory()->create([
            'email' => 'existing.email@example.com',
        ]);

        $response = $this->postJson('/api/user/register', [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'existing.email@example.com',
            'password' => 'password123',
            'phone' => '1234567890',
        ]);

        $response->assertStatus(422);
    }
}
