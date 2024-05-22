<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\BrigadaController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\BalanceDeCargaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clases', [ClaseController::class, 'index']);
Route::get('/clases/{clase}', [ClaseController::class, 'show']);
Route::post('/clases', [ClaseController::class, 'store']);
Route::put('/clases/{clase}', [ClaseController::class, 'update']);
Route::delete('/clases/{clase}', [ClaseController::class, 'destroy']);
Route::post('/clases/brigadas',[ClaseController::class, 'attach']);

Route::get('/profesores', [ProfesorController::class, 'index']);
Route::post('/profesores', [ProfesorController::class, 'store']);
Route::get('/profesores/{profesor}', [ProfesorController::class, 'show']);
Route::put('/profesores/{profesor}', [ProfesorController::class, 'update']);
Route::delete('/profesores/{profesor}', [ProfesorController::class, 'destroy']);

Route::get('/brigadas', [BrigadaController::class, 'index']);
Route::post('/brigadas', [BrigadaController::class, 'store']);
Route::get('/brigadas/{brigada}', [BrigadaController::class, 'show']);
Route::put('/brigadas/{brigada}', [BrigadaController::class, 'update']);
Route::delete('/brigadas/{brigada}', [BrigadaController::class, 'destroy']);

Route::get('/locales', [LocalController::class, 'index']);
Route::post('/locales', [LocalController::class, 'store']);
Route::get('/locales/{local}', [LocalController::class, 'show']);
Route::put('/locales/{local}', [LocalController::class, 'update']);
Route::delete('/locales/{local}', [LocalController::class, 'destroy']);

Route::get('/asignaturas', [AsignaturaController::class, 'index']);
Route::get('/asignaturas/create', [AsignaturaController::class, 'create']);
Route::post('/asignaturas', [AsignaturaController::class, 'store']);
Route::get('/asignaturas/{asignatura}', [AsignaturaController::class, 'show']);
Route::get('/asignaturas/{asignatura}/edit', [AsignaturaController::class, 'edit']);
Route::put('/asignaturas/{asignatura}', [AsignaturaController::class, 'update']);
Route::delete('/asignaturas/{asignatura}', [AsignaturaController::class, 'destroy']);

Route::controller(CursosController::class)->group(function () {
    Route::get('/cursos', 'index');
    Route::post('/cursos', 'store');
    Route::get('/cursos/{curso}', 'show');
    Route::put('/cursos/{curso}', 'update');
    Route::delete('/cursos/{curso}', 'destroy');
    Route::post('/cursos/clases', 'attach');
    Route::post('/cursos/upload','upload');
});


Route::controller(HorarioController::class)->group( function () {
    Route::get('/horarios','index');
    Route::post('/horarios','store');
    Route::get('/horarios/{horario}','show');
    Route::put('/horarios/{horario}','update');
    Route::delete('/horarios/{horario}','destroy');
    Route::post('/horarios/clases','attach');
    Route::get('/horarios/Getmatriz/{horario}/{clase}','Getmatriz');

});

/* Route::get('/balance_de_carga', [BalanceDeCargaController::class, 'index']);
Route::post('/balance_de_carga', [BalanceDeCargaController::class, 'store']);
Route::get('/balance_de_carga/{id}', [BalanceDeCargaController::class, 'show']);
Route::put('/balance_de_carga/{id}', [BalanceDeCargaController::class, 'update']);
Route::delete('/balance_de_carga/{id}', [BalanceDeCargaController::class, 'delete']);
 */
Route::controller(BalanceDeCargaController::class)->group(function () {
    Route::get('/balance_de_carga/{horario}', 'index');
    Route::post('/balance_de_carga', 'store');
    Route::get('/balance_de_carga/{balance}', 'show');
    Route::put('/balance_de_carga/{balance}', 'update');
    Route::delete('/balance_de_carga/{balance}', 'destroy');
    Route::post('/balance_de_carga/balance', 'attach');
});
