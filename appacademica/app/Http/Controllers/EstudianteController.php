<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        $estudiante = new Estudiante();
        $estudiante->codigo = $request->input('codigo');
        $estudiante->nombre = $request->input('nombre');
        $estudiante->direccion = $request->input('direccion');
        $estudiante->municipio = $request->input('municipio');
        $estudiante->departamento = $request->input('departamento');
        $estudiante->telefono = $request->input('telefono');
        $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $estudiante->sexo = $request->input('sexo');
        $estudiante->save();

        return redirect('/estudiantes/create')->with('success', 'Estudiante guardado exitosamente');
    }
}

