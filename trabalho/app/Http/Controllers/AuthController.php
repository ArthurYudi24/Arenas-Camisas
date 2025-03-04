<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do usuário
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Autenticar o usuário
        Auth::login($user);

        // Redirecionar ou retornar uma resposta
        return view("admin_layout.login");
    }
    public function login(Request $request)
{
    // Validação dos dados
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Verificar as credenciais e autenticar o usuário
    if (Auth::attempt($credentials)) {
        // Login bem-sucedido
        $request->session()->regenerate();

        return redirect()->intended('home')->with('success', 'Login bem-sucedido!');
    }

    // Se as credenciais estiverem erradas
    return back()->withErrors([
        'email' => 'As credenciais fornecidas estão incorretas.',
    ]);
}

    
}