<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'nama' => 'required|nama',
            'password' => 'required',
        ]);
        $credentials = $request->only('nama', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            Auth::login($user);

            session()->put('user.no_induk', $user->no_induk);
            session()->put('user.nama', $user->nama);
            return redirect('dashboard')->with('success', 'Berhasil Masuk!');
        }
        return redirect('login')->with('failed', 'Username dan Password Salah');
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
