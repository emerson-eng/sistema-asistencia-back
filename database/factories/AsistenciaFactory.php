<?php

namespace Database\Factories;

use App\Models\Asistencia;
use App\Models\Student;
use App\Models\Trabajador;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsistenciaFactory extends Factory
{
    protected $model = Asistencia::class;

    public function definition(): array
    {
        return [
            'id_estudiante' => Student::factory(),
            'id_trabajador' => Trabajador::factory(),
            'fecha' => now(),
            'hora_entrada' => $this->faker->time(),
            'hora_salida' => null,
            'estado' => $this->faker->randomElement(['asistió', 'tardanza', 'faltó']),
            'observacion' => $this->faker->sentence(),
        ];
    }
}
