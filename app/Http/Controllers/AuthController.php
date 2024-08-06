<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate; // Para control de permisos

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $logPath = storage_path('logs/laravel.log');
        $perPage = 100; 
        $page = (int) $request->query('page', 1); 
        $skip = ($page - 1) * $perPage;

        if (!File::exists($logPath)) {
            return abort(404, 'Archivo de log no encontrado');
        }

        try {
            $lines = File::lines($logPath);
            $totalLines = $lines->count();
            $paginatedLines = $lines->skip($skip)->take($perPage)->map(function ($line) {
                return htmlspecialchars($line); 
            })->implode("\n");

            $totalPages = ceil($totalLines / $perPage);
        } catch (\Exception $e) {
            return abort(500, 'Error al leer el archivo de log');
        }

        return view('logs.index', [
            'logs' => $paginatedLines,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }
}