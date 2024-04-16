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
    return view('/abogados/welcome');
});
Route::get('/inicio', function () {
    return view('/abogados/welcome');
});

Route::get('/abogado', function () {
    return view('/abogados/create');
});

Route::get('/tabla', function () {
    return view('/abogados/intex');
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


Route::get('/abogados/create', [EstudianteController::class, 'create'])->name('estudiantes.create');
Route::get('/abogados/create', [EstudianteController::class, 'create']);
Route::post('/abogados', [EstudianteController::class, 'store']);
Route::delete('/abogados/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
Route::get('/abogados/{estudiante}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
Route::put('/abogados/{estudiante}', [EstudianteController::class, 'update'])->name('estudiantes.update');
