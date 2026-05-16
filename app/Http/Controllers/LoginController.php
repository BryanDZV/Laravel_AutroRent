<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) { //se verifica si el usuario ya está autenticado
            return redirect()->route('inicio');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        // 1. Validar
        $credentials = $request->validate([
            'login' => ['required', 'string'], // 'login' puede ser email o username o cualquier otro campo que se use para autenticar
            'password' => ['required', 'string'],
        ]);

        // 2. Intentar autenticar (usando 'login' en lugar de 'email')
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Seguridad contra fijación de sesión
            return redirect()->route('inicio'); //esto es el alias de la ruta que se definió en web.php para la página de inicio después de autenticarse
        }

        // 3. Fallo
        return back()->withErrors([
            'login' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput(); // Solo se vuelve a mostrar el campo 'login' para que el usuario no tenga que volver a escribirlo, pero no se muestra el password por seguridad
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login'); // Redirige al formulario de login después de cerrar sesión
    }

    public function index()
    {
        // Página de inicio después de autenticarse
        return view('index');
    }
}
