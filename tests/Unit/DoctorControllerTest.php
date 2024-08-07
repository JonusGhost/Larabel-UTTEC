<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DoctorControllerTest extends TestCase
{
    use RefreshDatabase;

   
    public function puede_crear_doctor()
    {
        $especialidad = Especialidad::factory()->create();
        $user = User::factory()->create();

        $datosDoctor = [
            'nombre' => 'Juan',
            'app_mat' =>'Perez',
            'app_pat' =>'Gomez',
            'id_especialidad' => $especialidad->id,
            'cedula' => '12345678',
            'telefono' => '5555555555',
            'email' => 'juan.perez@gmail.com',
            'password' => 'password',
        ];

        $response = $this->actingAs($user)->post(route('guardar.doctor'), $datosDoctor);

        $response->assertRedirect(); 
        $this->assertDatabaseHas('doctores', ['nombre' => 'Juan']);
    }
}
