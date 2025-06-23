<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\student;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
qokj58-codex/crear-y-documentar-50-pruebas-simples
    /**
     * Ejemplo básico de prueba.
     *
     * @return void
     */
    public function test_home_route_returns_success()
    {
        $response = $this->get('/');
        $response->assertStatus(200);


    /** @test */
    public function puede_crear_y_recuperar_un_estudiante()
    {
        // Crear un estudiante
        $student = student::factory()->create([
            'name' => 'Juan Perez',
            'email' => 'juan@example.com',
        ]);

        // Recuperar el estudiante de la base de datos
        $found = student::where('email', 'juan@example.com')->first();

        // Validar que los datos sean correctos
        $this->assertNotNull($found);
        $this->assertEquals('Juan Perez', $found->name);
main
    }
}
