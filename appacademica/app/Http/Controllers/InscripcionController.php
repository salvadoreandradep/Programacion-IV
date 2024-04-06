<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\Inscripcion;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::all();
        return view('inscripciones.index', compact('inscripciones'));
    }

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

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción creada exitosamente');
    }

    public function edit(Inscripcion $inscripcion)
    {
        $estudiantes = Estudiante::all();
        $materias = Materia::all();
        return view('inscripciones.edit', compact('inscripcion', 'estudiantes', 'materias'));
    }

    public function update(Request $request, Inscripcion $inscripcion)
    {
        $request->validate([
            'estudiante_id' => 'required',
            'materia_id' => 'required',
            'ciclo' => 'required',
            'fecha_inscripcion' => 'required|date',
        ]);

        $inscripcion->update([
            'estudiante_id' => $request->estudiante_id,
            'materia_id' => $request->materia_id,
            'ciclo' => $request->ciclo,
            'fecha_inscripcion' => $request->fecha_inscripcion,
        ]);

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción actualizada exitosamente');
    }

    public function destroy(Inscripcion $inscripcion)
    {
        $inscripcion->delete();
        return redirect()->back()->with('success', 'Inscripción eliminada exitosamente');
    }
}
