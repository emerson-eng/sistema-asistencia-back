<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Grado;
use App\Models\Seccion;
use App\Models\Student;
use App\Models\Trabajador;
use App\Models\TipoTrabajador;
use App\Models\Asistencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Grado::factory(5)->create();
        Seccion::factory(10)->create();
        TipoTrabajador::factory(5)->create();
        Trabajador::factory(20)->create();
        Student::factory(50)->create();
        Asistencia::factory(100)->create();

    }
}
