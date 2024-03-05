<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\CursoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('universidades', [UniversidadController::class, 'index']);
Route::get('universidades/{id}', [UniversidadController::class, 'show']);
Route::post('universidades', [UniversidadController::class, 'store']);
Route::patch('universidades/{id}', [UniversidadController::class, 'update']);
Route::delete('universidades/{id}', [UniversidadController::class, 'destroy']);

Route::get('facultades', [FacultadController::class, 'index']);
Route::get('facultades/{id}', [FacultadController::class, 'show']);
Route::post('facultades', [FacultadController::class, 'store']);
Route::patch('facultades/{id}', [FacultadController::class, 'update']);
Route::delete('facultades/{id}', [FacultadController::class, 'destroy']);

Route::get('departamentos', [DepartamentoController::class, 'index']);
Route::get('departamentos/{id}', [DepartamentoController::class, 'show']);
Route::post('departamentos', [DepartamentoController::class, 'store']);
Route::patch('departamentos/{id}', [DepartamentoController::class, 'update']);
Route::delete('departamentos/{id}', [DepartamentoController::class, 'destroy']);

Route::get('cursos', [CursoController::class, 'index']);
Route::get('cursos/{id}', [CursoController::class, 'show']);
Route::post('cursos', [CursoController::class, 'store']);
Route::patch('cursos/{id}', [CursoController::class, 'update']);
Route::delete('cursos/{id}', [CursoController::class, 'destroy']);
