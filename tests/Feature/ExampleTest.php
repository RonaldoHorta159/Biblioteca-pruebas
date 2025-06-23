<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\student;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

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
    }
}
