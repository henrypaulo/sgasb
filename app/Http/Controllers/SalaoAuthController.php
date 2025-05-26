<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SalaoAuthController extends Controller
{
    
public function mostrarFormLogin() {
    return view('pages.loginSalao');
}

public function login(Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::guard('salao')->attempt($credentials)) {
        return redirect()->intended('dash_salao');
    }

    return back()->withErrors(['email' => 'Login inválido']);
}
}
