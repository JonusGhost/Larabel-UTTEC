<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consultorios;
use App\Models\Especialidad;
use App\Models\Paciente;
use App\Models\Doctor;
use App\Models\Medicamentos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class CitaController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $cita = Cita::find($req->id);
        }
        else
        {
            $cita = new Cita();
        }

        $doctor = Doctor::all();
        $consultorios = Consultorios::all();
        $especialidades = Especialidad::all();
        return view('cita', compact('cita', 'doctor', 'consultorios', 'especialidades'));
        Log::info('Cita agregada.');
    }

    public function indatender(Request $req)
    {
        if($req->id)
        {
            $cita = Cita::find($req->id);
        }
        else
        {
            $cita = new Cita();
        }

        $doctor = Doctor::all();
        $consultorios = Consultorios::all();
        $especialidades = Especialidad::all();
        $pacientes = Paciente::all();
        $medicamentos = Medicamentos::all();
        return view('atender', compact('cita', 'doctor', 'consultorios', 'especialidades', 'pacientes', 'medicamentos'));
    }

    public function getAPI(Request $req){
        $cita = Cita::find($req->id);
        return $cita;
    }

    public function list()
    {
        $citas = Cita::all();
        $especialidades = Especialidad::all();
        $pacientes = Paciente::all();
        $doctores = Doctor::all();
        $consultorios = Consultorios::all();
        return view('citas', compact('citas', 'especialidades', 'pacientes', 'doctores', 'consultorios'));
        Log::info('Citas mostradas.');
    }

    public function listAPI()
    {
        $cita = Cita::all();
        return $cita;
        Log::info('Citas mostradas.');
    }
    
    public function saveAPI (Request $req)
    {
        if($req->id != 0)
        {
            $cita = Cita::find($req->id);
        }
        else
        {
            $cita = new Cita();
        }
        
        $cita->id_paciente       = $req->pac_id;
        $cita->fecha             = $req->fecha;
        $cita->observaciones     = $req->obser;
        $cita->medicamentos      = $req->obser;
        $cita->estado            = $req->estad;
        $cita->id_consultorio    = $req->con_id;
        $cita->id_doctor         = $req->doc_id;
        $cita->id_especialidad   = $req->esp_id;
        $cita->save();
        Log::info('Cita agregada.');
        return 'Ok';
    }

    public function delete (Request $req)
    {
        $cita = Cita::find($req->id);
        $cita->delete();

        return redirect()->route('cita');
        Log::info('Cita eliminada.');
        
    }

    public function deleteAPI (Request $req)
    {
        $cita = Cita::find($req->id);
        $cita->delete();

        return 'Ok, Eliminada';
    }

    public function aceptar (Request $req)
    {
        if($req->id != 0)
        {
            $cita = Cita::find($req->id);
        }
        else
        {
            $cita = new Cita();
        }
        
        $cita->estado            = 'Aceptada';
        $cita->id_doctor         = NULL;
        $cita->id_consultorio    = NULL;
        $cita->save();

        return redirect()->route('citas');
    }

    public function denegar (Request $req)
    {
        if($req->id != 0)
        {
            $cita = Cita::find($req->id);
        }
        else
        {
            $cita = new Cita();
        }
        
        $cita->estado            = 'Denegada';
        $cita->id_doctor         = NULL;
        $cita->id_consultorio    = NULL;
        $cita->save();

        return redirect()->route('citas');
    }

    public function asignar (Request $req)
    {
        if($req->id != 0)
        {
            $cita = Cita::find($req->id);
        }
        else
        {
            $cita = new Cita();
        }
        
        $cita->id_doctor            = $req->id_doctor;
        $cita->id_consultorio       = $req->id_consultorio;
        $cita->save();

        return redirect()->route('citas');
    }

    public function atender (Request $req)
    {
        if($req->id != 0)
        {
            $cita = Cita::find($req->id);
        }
        else
        {
            $cita = new Cita();
        }
        
        $cita->observaciones = $req->observ;
        
        $req->validate([
            'opciones' => 'array'
        ]);
        $medicamentosTexto = implode(", ", $req->input('opciones', []));
        $cita->medicamentos = $medicamentosTexto;
        $cita->save();

        return redirect()->route('citas');
    }
}
