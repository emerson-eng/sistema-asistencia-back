<?php

namespace Database\Factories;

use App\Models\Trabajador;
use App\Models\TipoTrabajador;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrabajadorFactory extends Factory
{
    protected $model = Trabajador::class;

    public function definition(): array
    {
        return [
            'dni' => $this->faker->unique()->numerify('########'),
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'cargo' => $this->faker->randomElement(['Docente', 'Administrador', 'Director']),
            'telefono' => $this->faker->phoneNumber(),
            'direccion' => $this->faker->address(),
            'id_tipo' => TipoTrabajador::inRandomOrder()->first()->id_tipo,
        ];
    }
}
