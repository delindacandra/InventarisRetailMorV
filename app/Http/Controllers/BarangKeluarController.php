<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
use App\Models\FungsiModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Barang Keluar',
            'list' => ['Home', 'Barang Keluar']
        ];
        $activeMenu = 'barang_keluar';
        $fungsi = FungsiModel::all();
        return view('barang_keluar.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'fungsi' => $fungsi]);
    }

    public function list(Request $request)
    {
        $barangs = BarangKeluarModel::select('barang_keluar_id', 'barang_id', 'fungsi_id','jumlah', 'keterangan', 'tanggal_keluar')
            ->with('barang','fungsi');

        if ($request->barang) {
            $barangs->where('barang_id', $request->barang_id);
        }

        return DataTables::of($barangs)
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Form Barang Keluar',
            'list' => ['Home', 'Barang Keluar']
        ];
        $activeMenu = 'barang_keluar';
        $kategori = KategoriModel::all();
        $fungsi = FungsiModel::all();
        return view('barang_keluar.form', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'kategori' => $kategori, 'fungsi' => $fungsi]);
    }

    public function list_form(Request $request){
        $barangs = BarangKeluarModel::select('barang_keluar_id', 'barang_id', 'fungsi_id','jumlah', 'keterangan', 'tanggal_keluar')
            ->with('barang', 'fungsi');

        if ($request->kategori) {
            $barangs->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($barangs)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barang) {
                $btn = '<a href="' . url('/barang/' . $barang->barang_id) . '" class="btn btn-info btn-sm">Tambah</a> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
