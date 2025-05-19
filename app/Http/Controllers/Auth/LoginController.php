<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('login', ["titulo" => "Login"]);
}
    public function login(Request $request){
        $credentials = $request->only('usuario', 'password');

        if (Auth::attempt(['usuario' => $credentials['usuario'], 'password' => $credentials['password']])) {
            return redirect()->route('home'); 
        }
        return back()->withErrors(['usuario' => 'Credenciales inválidas'])->withInput(); 
    }
}