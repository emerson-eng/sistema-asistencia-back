<?php
namespace App\Http\Controllers\Api;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GradoController;
use App\Http\Controllers\Api\AsistenciaController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SeccionController;
use App\Http\Controllers\Api\TrabajdorController;
use App\Http\Controllers\Api\TipoTrabajadorController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|--------------------------------------------------------------------------
*/
Route::apiResource('asistencias', AsistenciaController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('seccions',SeccionController::class);
Route::apiResource('trabajadores', TrabajdorController::class);
Route::apiResource('tipo_trabajadors', TipoTrabajadorController::class);
Route::apiResource('grados', GradoController::class);

