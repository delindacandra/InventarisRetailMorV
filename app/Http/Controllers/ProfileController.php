<?php

namespace App\Http\Controllers;

use App\Models\FungsiModel;
use App\Models\KategoriModel;
use App\Models\SAModel;
use App\Models\StokModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Inventaris Barang Promosi Pt . Pertamina Patra Niaga',
            'list' => ['Home', 'Profile']
        ];
        $activeMenu = 'profile';
        $fungsi = FungsiModel::all();
        $kategori = KategoriModel::all();
        $sa = SAModel::all();
        return view('profile.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'fungsi' => $fungsi, 'kategori' => $kategori, 'sa' => $sa]);
    }

}