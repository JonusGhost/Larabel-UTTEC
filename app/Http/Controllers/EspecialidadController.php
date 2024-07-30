<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class EspecialidadController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $especialidad = Especialidad::find($req->id);
        }
        else
        {
            $especialidad = new Especialidad();
        }

        return view('especialidad', compact('especialidad'));
    }

    public function list()
    {
        $especialidades = Especialidad::all();

        return view('especialidades', compact('especialidades'));
    }

    public function getAPI(Request $req){
        $especialidad = Especialidad::find($req->id);
        return $especialidad;
    }

    public function listAPI()
    {
        $especialidades = Especialidad::all();
        return $especialidades;
    }

    public function save (Request $req)
    {
        if($req->id != 0)
        {
            $especialidad = Especialidad::find($req->id);
        }
        else
        {
            $especialidad = new Especialidad();
        }
        
        $especialidad->nombre = $req->nombre;
        $especialidad->estado = true;
        $especialidad->save();

        return redirect()->route('especialidades');
    }

    public function saveAPI (Request $req)
    {
        if($req->id != 0)
        {
            $especialidad = Especialidad::find($req->id);
        }
        else
        {
            $especialidad = new Especialidad();
        }
        
        $especialidad->nombre = $req->nombre;
        $especialidad->estado = true;
        $especialidad->save();

        return 'Ok';
    }

    public function delete (Request $req)
    {
        $especialidad = Especialidad::find($req->id);
        $especialidad->delete();

        return redirect()->route('especialidades');
    }

    public function deleteAPI (Request $req)
    {
        $especialidad = Especialidad::find($req->id);
        $especialidad->delete();

        return 'Ok, Eliminada';
    }
}