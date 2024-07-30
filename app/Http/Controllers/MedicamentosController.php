<?php

namespace App\Http\Controllers;

use App\Models\Medicamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MedicamentosController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $medicamento = Medicamentos::find($req->id);
        }
        else
        {
            $medicamento = new Medicamentos();
        }

        return view('medicamento', compact('medicamento'));
    }

    public function list()
{
    $medicamentos = Medicamentos::all();

    return view('medicamentos', compact('medicamentos'));
}


    public function save (Request $req)
    {
        if($req->id != 0)
        {
            $medicamento = Medicamentos::find($req->id);
        }
        else
        {
            $medicamento = new Medicamentos();
        }

        $medicamento->codigo = $req->codigo;
        $medicamento->descripcion = $req->descripcion;
        $medicamento->precio = $req->precio;
        $medicamento->fecha_caducidad = $req->fecha_caducidad;
        $medicamento->existecia = $req->existencia;
        $medicamento->save();
        Log::info('Medicamentos agregados.');

        return redirect()->route('medicamentos');
    }

    public function delete (Request $req)
    {
        $medicamento = Medicamentos::find($req->id);
        $medicamento->delete();
        Log::info('Medicamentos eliminados.');

        return redirect()->route('medicamentos');
    }
}
