<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;
    protected $table = 'secciones';
    protected $primaryKey = 'id_seccion';  // ← FALTABA

    protected $fillable = ['nombre_seccion', 'capacidad','anio_lectivo', 'id_grado'];

    // Relación con Grado
    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id_grado');
    }
}
