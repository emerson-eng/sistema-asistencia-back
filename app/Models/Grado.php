<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grado extends Model
{
    use HasFactory;

    // PRIMARY KEY personalizada
    protected $primaryKey = 'id_grado';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nombre_grado', 'nivel'];

    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'id_grado');
    }
}
