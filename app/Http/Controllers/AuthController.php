<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_process(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            session()->put('user.email', $user->email);
            session()->put('user.name', $user->name);

            return redirect('dashboard')->with('success', 'Berhasil Masuk!');
        }
        return redirect('login')->with('failed', 'Username atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        // dd($request->all());

        return redirect('login');
    }
}
