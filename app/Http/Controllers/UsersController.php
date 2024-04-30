<?php

namespace App\Http\Controllers;

use App\Models\Casal;
use App\Models\Ciutat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function LogIn(Request $request)
    {
        $request->validate([
            'nick' => 'required',
            'password' => 'required',
        ]);

        $nick = $request->input("nick");
        $password = $request->get("password");

        $confUsu = User::loginUsuario($nick);

        if (!$confUsu) {
            return redirect()->back()->withErrors(['nick' => 'El nick no existe']);
        }

        if ($password === $confUsu->password) {
            // Guardar información del nick en la sesión
            session(['user_id' => $confUsu->id, 'user_name' => $confUsu->nick]);
            return redirect()->route('indexVista');
        } else {
            return redirect()->back()->withErrors(['password' => 'La passwordseña es incorrecta']);
        }
    }

    public function CerrarSesion(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('/');
    }
}
