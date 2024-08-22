<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;

class CompanyCreationTest extends TestCase
{
    public function testUserCanCreateCompany()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $response = $this->postJson('/api/user/companies', [
            'title' => 'Test Company',
            'phone' => '1234567890',
            'description' => 'This is a test company',
        ]);

        $response->assertStatus(201);
        $response->assertJsonFragment([
            'title' => 'Test Company',
        ]);
    }
}
