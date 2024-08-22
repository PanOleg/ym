<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class PasswordRecoveryTest extends TestCase
{
    public function testUserCanRequestPasswordRecovery()
    {
        $user = User::factory()->create([
            'email' => 'john.doe@example.com',
        ]);

        $response = $this->postJson('/api/user/recover-password', [
            'email' => 'john.doe@example.com',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Password recovery link sent to your email.']);
    }
}
