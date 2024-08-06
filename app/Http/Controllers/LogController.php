<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class LogController extends Controller
{
    public function index()
    {
        // Ruta del archivo de logs, por defecto en storage/logs
        $logPath = storage_path('logs/laravel.log');

        // Leer el contenido del archivo de logs
        $logs = File::get($logPath);

        // Pasar los logs a la vista
        return view('logs.index', ['logs' => $logs]);
    }
}
