<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\Inscripcion;

class InscripcionController extends Controller
{
    public function create()
    {
        $estudiantes = Estudiante::all();
        $materias = Materia::all();
        return view('inscripciones.create', compact('estudiantes', 'materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required',
            'materia_id' => 'required',
            'ciclo' => 'required',
            'fecha_inscripcion' => 'required|date',
        ]);

        Inscripcion::create([
            'estudiante_id' => $request->estudiante_id,
            'materia_id' => $request->materia_id,
            'ciclo' => $request->ciclo,
            'fecha_inscripcion' => $request->fecha_inscripcion,
        ]);

        return redirect()->route('inscripciones.create')->with('success', 'Inscripción creada exitosamente');
    }
}
