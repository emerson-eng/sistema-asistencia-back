<?php

namespace Database\Factories;
use App\Models\Grado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grado>
 */
class GradoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_grado' => $this->faker->randomElement([
                'Primer Grado',
                'Segundo Grado',
                'Tercer Grado',
                'Cuarto Grado',
                'Quinto Grado',
                'Sexto Grado'
            ]),
            'nivel' => $this->faker->randomElement(['Primaria', 'Secundaria']),
        ];
    }
}
