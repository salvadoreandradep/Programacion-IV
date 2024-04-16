<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Estudiante;

class MatriculaController extends Controller
{
    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('matriculas.create', compact('estudiantes'));
    }
    
    
    public function index()
    {
        $matriculas = Matricula::all();
        return view('matriculas.index', compact('matriculas'));
    }
    

    

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'estudiante_id' => 'required',
            'ciclo' => 'required',
            'fecha_matricula' => 'required|date',
        ]);

        Matricula::create($request->all());

        return redirect()->route('matriculas.create')->with('success', 'Matrícula creada exitosamente');
    }



    public function destroy(Matricula $matricula)
    {
        $matricula->delete();
        return redirect()->back()->with('success', 'Matrícula eliminada exitosamente');
    }

    public function edit(Matricula $matricula)
    {
        return view('matriculas.edit', compact('matricula'));
    }

    public function update(Request $request, Matricula $matricula)
    {
        $request->validate([
            'codigo' => 'required',
            'estudiante_id' => 'required',
            'ciclo' => 'required',
            'fecha_matricula' => 'required|date',
        ]);

        $matricula->update($request->all());

        return redirect()->route('matriculas.index')->with('success', 'Matrícula actualizada exitosamente');
    }
}

