<?php

namespace Tests\Feature;

use App\Models\Especialidad;
use App\Models\User; 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EspeViewTest extends TestCase
{
    use RefreshDatabase;

    
    public function una_sola_especialidad_se_visualiza()
    {
        $user = User::factory()->create(); 
        $especialidad = Especialidad::factory()->create();

        $response = $this->actingAs($user)->get(route('nueva.especialidad', ['id' => $especialidad->id]));

        $response->assertStatus(200)
                 ->assertViewIs('especialidad')
                 ->assertViewHas('especialidad', $especialidad);
    }


    public function todas_las_especialidades_se_visualizan()
    {
        $user = User::factory()->create(); 
        $especialidades = Especialidad::factory()->count(3)->create();

        $response = $this->actingAs($user)->get(route('especialidades'));

        $response->assertStatus(200)
                 ->assertViewIs('especialidades')
                 ->assertViewHas('especialidades', $especialidades);
    }
}
