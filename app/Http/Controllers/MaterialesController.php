<?php

namespace App\Http\Controllers;

use App\Models\Materiales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MaterialesController extends Controller
{
    public function index(Request $req)
    {
        if($req->id)
        {
            $material = Materiales::find($req->id);
        }
        else
        {
            $material = new Materiales();
        }

        return view('material', compact('material'));
    }

    public function list()
{
    $materiales = Materiales::all();

    return view('materiales', compact('materiales'));
}


    public function save (Request $req)
    {
        if($req->id != 0)
        {
            $material = Materiales::find($req->id);
        }
        else
        {
            $material = new Materiales();
        }

        $material->codigo = $req->codigo;
        $material->descripcion = $req->descripcion;
        $material->precio = $req->precio;
        $material->fecha_caducidad = $req->fecha_caducidad;
        $material->existecia = $req->existencia;
        $material->save();
        Log::info('Materiales agregados.');

        return redirect()->route('materiales');
    }

    public function delete (Request $req)
    {
        $material = Materiales::find($req->id);
        $material->delete();
        Log::info('Materiales eliminados.');

        return redirect()->route('materiales');
    }
}
