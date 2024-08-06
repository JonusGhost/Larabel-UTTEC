<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\PacientesController;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;

Route::get('/', function () {
    return view('welcome');
    
});


Route::get('/hola',[HelloController::class,'index']);

Auth::routes();

//RUTA DE LOGS
Route::get('/logs', [LogController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('especialidad/nueva',[EspecialidadController::class, 'index'])->name('nueva.especialidad')->middleware('auth');

Route::get('especialidades',[EspecialidadController::class, 'list'])->name('especialidades')->middleware('auth');

Route::post('especialidad/guardar', [EspecialidadController::class,'save'])->name('guardar.especialidad')->middleware('auth');

Route::post('especialidad/borrar', [EspecialidadController::class,'delete'])->name('borrar.especialidad')->middleware('auth');
//Doctor
Route::get('doctor/nueva',[DoctorController::class, 'index'])->name('nueva.doctor')->middleware('auth');

Route::get('doctores',[DoctorController::class, 'list'])->name('doctores')->middleware('auth');

Route::post('doctor/guardar', [DoctorController::class,'save'])->name('guardar.doctor')->middleware('auth');

Route::post('doctor/borrar', [DoctorController::class,'delete'])->name('borrar.doctor')->middleware('auth');
//
Route::get('consultorio/nuevo',[ConsultoriosController::class, 'index'])->name('nuevo.consultorio')->middleware('auth');

Route::get('consultorios',[ConsultoriosController::class, 'list'])->name('consultorios')->middleware('auth');

Route::post('consultorio/guardar', [ConsultoriosController::class,'save'])->name('guardar.consultorio')->middleware('auth');

Route::post('consultorio/borrar', [ConsultoriosController::class,'delete'])->name('borrar.consultorio')->middleware('auth');
//
Route::get('paciente/nuevo',[PacientesController::class, 'index'])->name('nuevo.paciente')->middleware('auth');

Route::get('pacientes',[PacientesController::class, 'list'])->name('pacientes')->middleware('auth');

Route::post('paciente/guardar', [PacientesController::class,'save'])->name('guardar.paciente')->middleware('auth');

Route::post('paciente/borrar', [PacientesController::class,'delete'])->name('borrar.paciente')->middleware('auth');
//
Route::get('material/nuevo',[MaterialesController::class, 'index'])->name('nuevo.material')->middleware('auth');

Route::get('materiales',[MaterialesController::class, 'list'])->name('materiales')->middleware('auth');

Route::post('material/guardar', [MaterialesController::class,'save'])->name('guardar.material')->middleware('auth');

Route::post('material/borrar', [MaterialesController::class,'delete'])->name('borrar.material')->middleware('auth');
//
Route::get('medicamento/nuevo',[MedicamentosController::class, 'index'])->name('nuevo.medicamento')->middleware('auth');

Route::get('medicamentos',[MedicamentosController::class, 'list'])->name('medicamentos')->middleware('auth');

Route::post('medicamento/guardar', [MedicamentosController::class,'save'])->name('guardar.medicamento')->middleware('auth');

Route::post('medicamento/borrar', [MedicamentosController::class,'delete'])->name('borrar.medicamento')->middleware('auth');
//
Route::get('cita/nuevo',[CitaController::class, 'index'])->name('nuevo.cita')->middleware('auth');

Route::get('cita',[CitaController::class, 'list'])->name('citas')->middleware('auth');

Route::post('cita/guardar', [CitaController::class,'save'])->name('guardar.cita')->middleware('auth');

Route::post('cita/borrar', [CitaController::class,'delete'])->name('borrar.cita')->middleware('auth');

Route::post('cita/aceptar', [CitaController::class,'aceptar'])->name('aceptar.cita')->middleware('auth');

Route::post('cita/denegar', [CitaController::class,'denegar'])->name('denegar.cita')->middleware('auth');

Route::get('cita/asignar',[CitaController::class, 'index'])->name('asignar.cita')->middleware('auth');

Route::post('cita/doctor',[CitaController::class, 'asignar'])->name('doctor.cita')->middleware('auth');

Route::get('cita/atender',[CitaController::class, 'indatender'])->name('atender.cita')->middleware('auth');

Route::post('cita/atendida',[CitaController::class, 'atender'])->name('atendida.cita')->middleware('auth');

Route::get('/privacy', function () {return view('privacy');})->name('privacy');