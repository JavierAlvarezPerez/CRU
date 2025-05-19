<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        if (Auth::check()) {
        return redirect()->route('home');
    }
        return view('register',["titulo"=>"Registro"]);
    }
    
    public function register(Request $request) {
    $request->validate([
    'nombre' => 'required|string|min:4|max:255|regex:/^[a-zA-Z]+$/',
    'apellido_paterno' => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
    'apellido_materno' => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
    'usuario' => 'required|string|unique:persona|regex:/^[a-zA-Z0-9_]+$/',
    'password' => [
    'required',
    'confirmed',
    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/'
],
],[
    "nombre.required"=>"El campo Nombre es obligatorio",
    "nombre.regex"=>"El campo Nombre solo puede contener letras y espacios",

    "apellido_paterno.required"=>"El campo Apellido Paterno es obligatorio",
    "apellido_paterno.regex"=>"El campo Apellido Paterno solo puede contener letras y espacios",

    "apellido_materno.required"=>"El campo Apellido Materno es obligatorio",
    "apellido_materno.regex"=>"El campo Apellido Materno solo puede contener letras y espacios",

    "usuario.required"=>"El campo Usuario es obligatorio",
    "usuario.regex"=>"El campo Usuario solo puede contener letras, números y guiones bajos",

    "password.required"=>"El campo Password es obligatorio",
    "password.confirmed"=>"Debes confirmar el password",
    "password.regex"=>"La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial",
]);


    $persona = new Persona();
    $persona->nombre = $request->nombre;
    $persona->apellido_paterno = $request->apellido_paterno;
    $persona->apellido_materno = $request->apellido_materno;
    $persona->usuario = $request->usuario;
    $persona->password = Hash::make($request->password);
    $persona->save();

    return redirect('/login')->with('success', 'Usuario registrado correctamente.');
}

}