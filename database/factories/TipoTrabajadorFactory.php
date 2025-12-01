<?php

namespace Database\Factories;

use App\Models\TipoTrabajador;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoTrabajadorFactory extends Factory
{
    protected $model = TipoTrabajador::class;

    public function definition(): array
    {
        return [
            'nombre_tipo' => $this->faker->randomElement([
                'Docente', 'Administrador', 'Director', 'Secretaria', 'Auxiliar'
            ]),
            'descripcion' => $this->faker->sentence(5),
        ];
    }
}
