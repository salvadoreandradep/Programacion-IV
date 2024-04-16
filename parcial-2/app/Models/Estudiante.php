<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'direccion',
        'municipio',
        'departamento',
        'telefono',
        'fecha_nacimiento',
        'sexo'
    ];
}

