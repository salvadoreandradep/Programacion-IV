<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'estudiante_id', 'ciclo', 'fecha_matricula'];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}

