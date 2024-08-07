<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Especialidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido_paterno' => $this->faker->lastName,
            'apellido_materno' => $this->faker->lastName,
            'id_especialidad' => Especialidad::factory(), // Asume que tienes un factory para Especialidad
            'cedula' => $this->faker->unique()->numberBetween(10000000, 99999999),
            'telefono' => $this->faker->phoneNumber,
            'idusr' => \App\Models\User::factory(), // Asume que tienes un factory para User
        ];
    }
}
