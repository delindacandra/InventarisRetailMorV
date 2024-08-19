<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Inventaris Barang Promosi Pt . Pertamina Patra Niaga',
            'list' => ['Home', 'Profile']
        ];
        $activeMenu = 'profile';
        return view('profile.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
}
