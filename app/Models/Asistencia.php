<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Trabajador;

class Asistencia extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_asistencia';

    protected $fillable = [
        'id_estudiante',
        'id_trabajador',
        'fecha',
        'hora_entrada',
        'hora_salida',
        'estado',
        'observacion'

    ];

    // Relación con estudiantes
    public function estudiante()
    {
        return $this->belongsTo(Student::class, 'id_estudiante');
    }

    // Relación con trabajadores
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }
}
