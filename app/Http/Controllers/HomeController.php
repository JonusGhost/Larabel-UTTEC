<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consultorios;
use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\Paciente;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $citas = Cita::all();
        $especialidades = Especialidad::all();
        $pacientes = Paciente::all();
        $doctores = Doctor::all();
        $consultorios = Consultorios::all();
        return view('citas', compact('citas', 'especialidades', 'pacientes', 'doctores', 'consultorios'));
    }
}
