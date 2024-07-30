<?php

namespace App\Http\Controllers;

use App\Models\Consultorios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConsultoriosController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $consultorio = Consultorios::find($req->id);
        }
        else
        {
            $consultorio = new Consultorios();
        }

        return view('consultorio', compact('consultorio'));
    }

    public function list()
{
    $consultorios = Consultorios::all();

    return view('consultorios', compact('consultorios'));
}

public function listAPI()
    {
        $consultorios = Consultorios::all();
        return $consultorios;
    }

    public function save (Request $req)
    {
        if($req->id != 0)
        {
            $consultorio = Consultorios::find($req->id);
        }
        else
        {
            $consultorio = new Consultorios();
        }

        $consultorio->numero = $req->numero;
        $consultorio->save();
        Log::info('Consultorio agregado.');
        

        return redirect()->route('consultorios');
    }

    public function delete (Request $req)
    {
        $consultorio = Consultorios::find($req->id);
        $consultorio->delete();

        return redirect()->route('consultorios');
        Log::info('Consultorio eliminado.');
    }
}
