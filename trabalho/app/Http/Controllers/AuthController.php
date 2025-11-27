<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Exibe o formulário de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Realiza o login
    public function login(Request $request)
    {
        // Validação simples
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Tenta autenticar
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $request->session()->put('chave', 'valor');

            return redirect()->intended('/')->with('success', 'Usuário logado com sucesso!'); // Página inicial
        }

        // Se falhar
        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    // Logout do usuário
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Usuário deslogado com sucesso!');
    }
}
