<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PacienteController;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class,'login']);
Route::post('paciente/guardar', [PacienteController::class,'saveAPI']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('especialidades', [EspecialidadController::class,'listAPI']);
Route::post('especialidad', [EspecialidadController::class,'getAPI']);
Route::post('especialidad/guardar', [EspecialidadController::class,'saveAPI']);
Route::post('especialidad/borrar', [EspecialidadController::class,'deleteAPI']);

Route::post('paciente', [PacienteController::class,'getAPI']);
Route::get('pacientes', [PacienteController::class,'listAPI']);

Route::get('citas', [CitaController::class,'listAPI']);
Route::post('cita', [CitaController::class,'getAPI']);
Route::post('cita/guardar', [CitaController::class,'saveAPI']);
Route::post('cita/borrar', [CitaController::class,'deleteAPI']);

Route::get('doctores', [DoctorController::class,'listAPI']);
Route::get('consultorios', [ConsultoriosController::class,'listAPI']);