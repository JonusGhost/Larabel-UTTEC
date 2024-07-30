<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PacienteController extends Controller
{
    public function index(Request $req)
    {
        $paciente = $req->id ? Paciente::findOrFail($req->id) : new Paciente();
        return view('paciente', compact('paciente'));
    }

    public function list()
    {
        $pacientes = Paciente::all();

        return view('pacientes', compact('pacientes'));
    }

    public function listAPI()
    {
        $pacientes = Paciente::all();
        return $pacientes;
    }

    public function saveAPI (Request $req)
    {
        $user = new User();
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->rol = 'paciente';
        $user->save();

        $paciente = new Paciente();
        $paciente->nombre = $req->nombre;
        $paciente->apellido_paterno = $req->app_pat;
        $paciente->apellido_materno = $req->app_mat;
        $paciente->telefono = $req->telefono;
        $paciente->idusr = $user->id;
        $paciente->save();
        
        return 'Ok';
    }

    public function getAPI(Request $req){
        $paciente = Paciente::find($req->id);
        return $paciente;
    }
}
