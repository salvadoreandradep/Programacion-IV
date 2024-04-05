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
}

