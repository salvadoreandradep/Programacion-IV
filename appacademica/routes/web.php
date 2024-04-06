<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\InscripcionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/estudiantes/welcome');
});
Route::get('/inicio', function () {
    return view('/estudiantes/welcome');
});

Route::get('/estudiante', function () {
    return view('/estudiantes/create');
});



Route::get('/materias', function () {
    return view('/materias/create');
});

Route::get('/materia', function () {
    return view('/materias/create');
});

Route::get('/matricula', function () {
    return view('/matriculas/create');
});


Route::get('/mostrarN', function () {
    return view('/materias');
});

Route::get('/inscricion', function () {
    return view('/inscripciones/create');
});

Route::get('/inscriciones', function () {
    return view('/inscripciones/index');
});



Route::get('/inscripciones', [InscripcionController::class, 'index'])->name('inscripciones.index');
Route::get('/inscripciones/create', [InscripcionController::class, 'create'])->name('inscripciones.create');
Route::post('/inscripciones', [InscripcionController::class, 'store'])->name('inscripciones.store');
Route::get('/inscripciones/{inscripcion}/edit', [InscripcionController::class, 'edit'])->name('inscripciones.edit');
Route::put('/inscripciones/{inscripcion}', [InscripcionController::class, 'update'])->name('inscripciones.update');
Route::delete('/inscripciones/{inscripcion}', [InscripcionController::class, 'destroy'])->name('inscripciones.destroy');



Route::get('/materias/create', [MateriaController::class, 'create'])->name('materias.create');
Route::post('/materias', [MateriaController::class, 'store'])->name('materias.store');
Route::delete('/materias/{materia}', [MateriaController::class, 'destroy'])->name('materias.destroy');
Route::get('/materias/{materia}/edit', [MateriaController::class, 'edit'])->name('materias.edit');
Route::put('/materias/{materia}', [MateriaController::class, 'update'])->name('materias.update');



Route::get('/matriculas', [MatriculaController::class, 'index'])->name('matriculas.index');
Route::get('/matriculas/create', [MatriculaController::class, 'create'])->name('matriculas.create');
Route::post('/matriculas', [MatriculaController::class, 'store'])->name('matriculas.store');

// Rutas para editar y eliminar matrículas
Route::get('/matriculas/{matricula}/edit', [MatriculaController::class, 'edit'])->name('matriculas.edit');
Route::put('/matriculas/{matricula}', [MatriculaController::class, 'update'])->name('matriculas.update');
Route::delete('/matriculas/{matricula}', [MatriculaController::class, 'destroy'])->name('matriculas.destroy');





Route::get('/materias/create', [MateriaController::class, 'create'])->name('materias.create');
Route::post('/materias', [MateriaController::class, 'store'])->name('materias.store');

Route::get('/materias', [MateriaController::class, 'index'])->name('materias.index');
Route::delete('/materias/{materia}', [MateriaController::class, 'destroy'])->name('materias.destroy');
Route::get('/materias/{materia}/edit', [MateriaController::class, 'edit'])->name('materias.edit');
Route::put('/materias/{materia}', [MateriaController::class, 'update'])->name('materias.update');


Route::get('/estudiantes/create', [EstudianteController::class, 'create'])->name('estudiantes.create');
Route::get('/estudiantes/create', [EstudianteController::class, 'create']);
Route::post('/estudiantes', [EstudianteController::class, 'store']);
Route::delete('/estudiantes/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
Route::get('/estudiantes/{estudiante}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{estudiante}', [EstudianteController::class, 'update'])->name('estudiantes.update');
