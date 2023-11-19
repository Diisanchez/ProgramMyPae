<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


use function PHPUnit\Framework\returnValue;

class AuthenticationSessionController extends Controller
{
    public function create()
    {
        return view('auth.Login');
    }
    public function store(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|string|email|max: 255|min: 8|',
                'password' => 'required|string'
            ]
        );

        if (Auth::attempt($credentials)){
            throw ValidationException::withMessages([
                'email'=> 'Autenticación incorrecta'
            ]);
        }

        $request->session()->regenerate();
        return redirect()->route('welcome');
    }
    public function destroy(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');

    }
}
