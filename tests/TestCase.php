<?php

namespace Tests;

use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;  // Використовується для очищення бази даних між тестами

    /**
     * Створення додатку
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    protected function postJson($uri, array $data = [], array $headers = [])
    {
        return $this->json('POST', $uri, $data, $headers);
    }

    public function actingAs($user, $driver = null)
    {
        Passport::actingAs($user); // Якщо використовуєте Passport
        $this->be($user, $driver);
        return $this;
    }
}
