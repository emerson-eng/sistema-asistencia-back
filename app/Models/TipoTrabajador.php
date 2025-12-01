<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoTrabajador extends Model
{
    use HasFactory;

    protected $table = 'tipo_trabajadores';

    protected $fillable = ['nombre_tipo', 'descripcion'];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'id_tipo');
    }
}
