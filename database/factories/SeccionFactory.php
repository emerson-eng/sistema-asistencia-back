<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seccion>
 */
class SeccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
    'nombre_seccion' => $this->faker->randomElement(['A', 'B', 'C']),
    'capacidad' => $this->faker->numberBetween(20, 40),
    'anio_lectivo' => $this->faker->numberBetween(2023, 2025),
    'id_grado' => \App\Models\Grado::inRandomOrder()->value('id_grado'),
];

    }
}
