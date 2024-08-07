<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();
            $token = $user->createToken('app')->plainTextToken;
            Log::info('Inicio de sesión exitoso.');
            $arr = array('acceso' => "Ok", 'error' => "", 'token' => $token, 'idUsuario' => $user->id, 'nombreUsuario' => $user->name);
            
            return json_encode($arr);
        }
        else{
            $arr = array('acceso' => "", 'token' => "", 'error' => "No existe el usuario o contraseña", 'idUsuario' => 0, 'nombreUsuario' => '');
            Log::info('Intento de inicio de sesión fallido.');
            return json_encode($arr);
        }
    }
}
