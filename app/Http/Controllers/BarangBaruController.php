<?php

namespace App\Http\Controllers;

use App\Models\BarangBaruModel;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangBaruController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Barang Baru',
            'list' => ['Home', 'Barang Baru']
        ];
        $activeMenu = 'barang_baru';
        $barang = BarangModel::all();
        return view('barang_baru.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'barang' => $barang]);
    }

    public function list(Request $request)
    {
        $newitems = BarangBaruModel::select('barang_baru_id', 'barang_id', 'jumlah', 'keterangan', 'tanggal_diterima')
            ->with('barang');

        if ($request->barang_id) {
            $newitems->where('barang_id', $request->barang_id);
        }

        return DataTables::of($newitems)
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Form Barang Baru',
            'list' => ['Home', 'Barang Baru', 'Form']
        ];

        $page = (object)[
            'title' => 'Tambah data baru'
        ];
        $kategori = KategoriModel::all(); 
        $activeMenu =  'barang_baru';

        return view('barang_baru.form', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
}
