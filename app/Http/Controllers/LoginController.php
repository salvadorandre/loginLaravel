<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function show() { 
        if(Auth::check()) {
            return redirect("/h");
        }
        return view("auth.login"); 
    }

    public function login(LoginRequest $request) {
        $credencials  = $request->getCredentials();

        if(!Auth::validate($credencials)) {
            return redirect()->to('/login')->withErrors('auth.failed');
        }

        $usuario  = Auth::getProvider()->retrieveByCredentials($credencials);
        Auth::login($usuario); 

        return $this->authenticated($request, $usuario);
    }

    public function authenticated(Request $request, $user) {
        return redirect('/')->with('success', 'Bienvenido ' . $user->username); 
    }
}
