<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogOutController extends Controller
{
    public function index(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        // dd($request->all());

        return redirect('login');
    }
}
