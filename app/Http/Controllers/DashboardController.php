<?php

namespace App\Http\Controllers;

use App\Charts\PermintaanBarangChart;
use App\Charts\TheMostFungsiChart;
use App\Charts\Top5BarangChart;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Top5BarangChart $top5chart, PermintaanBarangChart $permintaanBarangChart, TheMostFungsiChart $fungsiChart)
    {
        $breadcrumb = (object)[
            'title' => 'Dashboard',
            'list' => ['Home', 'Dashboard']
        ];
        $activeMenu = 'dashboard';
        $totalBarang = DB::table('data_barang')->count();
        $totalBarangMasuk = DB::table('detail_barang_masuk')->sum('jumlah'); 
        $totalBarangKeluar = DB::table('detail_barang_keluar')->sum('jumlah');
        return view('dashboard', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'totalBarang'=>$totalBarang, 'totalBarangMasuk'=>$totalBarangMasuk, 'totalBarangKeluar'=>$totalBarangKeluar,
         'top5chart'=>$top5chart->build(), 'permintaanBarangChart'=>$permintaanBarangChart->build(), 'fungsiChart'=>$fungsiChart->build()]);
    }
}
