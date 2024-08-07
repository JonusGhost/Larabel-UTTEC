<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $doctor = Doctor::find($req->id);
        }
        else
        {
            $doctor = new Doctor();
            Log::info('Doctor editado.');
        }

        $users =  User::all();
        $especialidades = Especialidad::all();
        return view('doctor', compact('doctor','especialidades', 'users'));
    }

    public function list()
    {
        $doctores = Doctor::all();
        $especialidades = Especialidad::all();
        $usuarios =  User::all();
        return view('doctores', compact('doctores', 'especialidades', 'usuarios'));
    }

    public function listAPI()
    {
        $doctores = Doctor::all();
        $especialidades = Especialidad::all();
        $users =  User::all();
        return view('doctores', compact('doctores', 'especialidades', 'users'));
    }


    public function save(Request $req)
    {
        if ($req->id != 0) {
            $doctor = Doctor::find($req->id);
            if ($doctor) {
                $user = User::find($doctor->idusr);
            }
        } else {
            $doctor = new Doctor();
            $user = new User();
            $user->rol = 'doctor';
        }
    
        if (!$user) {
            $user = new User();
            $user->rol = 'doctor';
        }
    
        $user->name = $req->nombre;
        $user->email = $req->email;
        if ($req->id == 0 || ($req->password && !empty($req->password))) {
            $user->password = Hash::make($req->password);
        }
        $user->save();
    
        $doctor->nombre = $req->nombre;
        $doctor->apellido_paterno = $req->app_pat;
        $doctor->apellido_materno = $req->app_mat;
        $doctor->id_especialidad = $req->id_especialidad;
        $doctor->cedula = $req->cedula;
        $doctor->telefono = $req->telefono;
        $doctor->idusr = $user->id;
        $doctor->save();
    
        Log::info('Doctor ' . ($req->id != 0 ? 'actualizado' : 'agregado') . '.');
    
        return redirect()->route('doctores');
    }
    

    public function saveAPI (Request $req)
    {
        if($req->id != 0)
        {
            $doctor = Doctor::find($req->id);
        }
        else
        {
            $doctor = new Doctor();
            Log::info('Doctor agregado.');
        }
        
        $doctor->nombre = $req->nombre;
        $doctor->apellido_paterno = $req->app_pat;
        $doctor->apellido_materno = $req->app_mat;
        $especialidad = Especialidad::where('nombre', $req->id_especialidad)->first();
        if ($especialidad) {
            $doctor->id_especialidad = $especialidad->id;
        } else {
            return redirect()->route('doctores','especialidades');
        }
        $doctor->cedula = $req->cedula;
        $doctor->telefono = $req->telefono;
        $doctor->save();

        return 'Ok';
    }

    public function delete (Request $req)
    {
        $doctor = Doctor::find($req->id);
        Log::info('Doctor eliminado.');
        $doctor->delete();
       
        return redirect()->route('doctores');
    }

    public function deleteAPI (Request $req)
    {
        $doctor = Doctor::find($req->id);
        $doctor->delete();

        return 'Ok, Eliminado';
    }
}
