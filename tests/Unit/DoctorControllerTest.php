<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\User;
use Tests\TestCase;

class DoctorControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test para verificar la creación de un doctor.
     *
     * @return void
     */
    public function test_puede_crear_doctor_mediante_api()
    {
        // Crear datos de prueba
        $especialidad = Especialidad::factory()->create();
        $user = User::factory()->create();

        $datosDoctor = [
            'nombre' => 'Juan',
            'app_mat' => 'Perez',
            'app_pat' => 'Gomez',
            'id_especialidad' => $especialidad->id,
            'cedula' => '12345678',
            'telefono' => '5555555555',
            'email' => 'juan.perez@gmail.com',
            'password' => 'password',
        ];

        // Enviar solicitud POST para crear un doctor
        $response = $this->actingAs($user)->post(route('guardar.doctor'), $datosDoctor);

        // Verificar redirección
        $response->assertRedirect(); 

        // Verificar que el doctor se ha guardado en la base de datos
        $this->assertDatabaseHas('doctores', ['nombre' => 'Juan']);
    }
}
