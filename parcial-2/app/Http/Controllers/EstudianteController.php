<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    public function create()
{
    $estudiantes = Estudiante::all();
    return view('estudiantes.index', compact('estudiantes'));
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

    public function destroy(Estudiante $estudiante)
{
    $estudiante->delete();
    return redirect('/estudiantes/create')->with('success', 'Estudiante eliminado exitosamente');
}

public function edit(Estudiante $estudiante)
{
    return view('estudiantes.edit', compact('estudiante'));
}

public function update(Request $request, Estudiante $estudiante)
{
    $estudiante->update($request->all());
    return redirect('/estudiantes/create')->with('success', 'Estudiante actualizado exitosamente');
}

}
