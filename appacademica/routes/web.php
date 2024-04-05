<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
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


Route::get('/estudiantes/create', [EstudianteController::class, 'create']);
Route::post('/estudiantes', [EstudianteController::class, 'store']);