<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{
    public function create()
    {
        return view('estudiantes.materia');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:materias',
            'nombre' => 'required',
            'creditos' => 'required|integer',
        ]);

        Materia::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'creditos' => $request->creditos,
        ]);

        return redirect()->route('materias.create')->with('success', 'Materia creada exitosamente');
    }
}

