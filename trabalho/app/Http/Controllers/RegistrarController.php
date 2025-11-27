<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    // Exibir formulário de cadastro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Registrar novo usuário
    public function register(Request $request)
    {
        // Validação simples
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:1|confirmed', // precisa de password_confirmation
        ]);

        // Criar usuário
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Redirecionar para login
        return redirect()->route('login')->with('success', 'Usuário registrado com sucesso!');
    }
}
