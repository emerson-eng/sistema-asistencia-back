<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => $this->faker->unique()->numerify('########'),
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'fecha_nacimiento' => $this->faker->date(),
            'genero' => $this->faker->randomElement(['masculino', 'femenino', 'otro']),
            'direccion' => $this->faker->address(),
            'telefono' => $this->faker->phoneNumber(),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'id_grado' => \App\Models\Grado::factory(),
            
        ];
    }
}
