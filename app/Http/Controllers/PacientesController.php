<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PacientesController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $paciente = Pacientes::find($req->id);
        }
        else
        {
            $paciente = new Pacientes();
        }

        return view('paciente', compact('paciente'));
    }

    public function list()
{
    $pacientes = Pacientes::all();

    return view('pacientes', compact('pacientes'));
}


    public function save (Request $req)
    {
        if($req->id != 0)
        {
            $paciente = Pacientes::find($req->id);
        }
        else
        {
            $paciente = new Pacientes();
            Log::info('Paciente agregado.');
        }

        $paciente->nombre = $req->nombre;
        $paciente->apellido_paterno = $req->app_pat;
        $paciente->apellido_materno = $req->app_mat;
        $paciente->telefono = $req->telefono;
        $paciente->save();
        return redirect()->route('pacientes');
    }

    public function delete (Request $req)
    {
        $paciente = Pacientes::find($req->id);
        Log::info('Paciente eliminado.');
        $paciente->delete();

        return redirect()->route('pacientes');
    }
}
