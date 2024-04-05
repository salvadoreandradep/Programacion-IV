<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{
    public function create()
    {
        return view('materias.create');
    }

    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
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


    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->back()->with('success', 'Materia eliminada exitosamente');
    }

    public function edit(Materia $materia)
    {
        $materias = Materia::all();
        return view('materias.edit', compact('materia'));
    }
    

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'codigo' => 'required|unique:materias,codigo,'.$materia->id,
            'nombre' => 'required',
            'creditos' => 'required|integer',
        ]);

        $materia->update([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'creditos' => $request->creditos,
        ]);

        return redirect()->route('materias.index')->with('success', 'Materia actualizada exitosamente');
    }
}

