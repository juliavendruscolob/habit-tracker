<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

//Facedes: atalho estático para acessar funcionalidades complexas do laravel de forma simples e legível

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credentials)) {
            //usuário com dados corretos, atualiza sessão dele
            $request->session()->regenerate();

            //envia para home
            return redirect()->intended('/dashboard');
        }
        //early return: técnica de retornar o erro o mais cedo possível para evitar o uso de "else" e aninhamento desnecessário
        return back()->withErrors([
            'email' => 'Credenciais Inválidas',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
