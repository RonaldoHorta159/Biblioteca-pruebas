<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Ejemplo básico de prueba.
     *
     * @return void
     */
    public function test_home_route_returns_success()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
