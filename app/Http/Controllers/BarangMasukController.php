<?php

namespace App\Http\Controllers;

use App\Models\BarangMasukModel;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangMasukController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Barang Masuk',
            'list' => ['Home', 'Barang Masuk']
        ];
        $activeMenu = 'barang_masuk';
        $kategori = KategoriModel::all();
        return view('barang_masuk.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'kategori' => $kategori]);
    }

    public function list(Request $request)
    {
        $barangs = BarangMasukModel::select('barang_masuk_id', 'barang_id', 'jumlah', 'keterangan', 'tanggal_diterima')
            ->with('barang');

        if ($request->barang_id) {
            $barangs->where('barang_id', $request->barang_id);
        }

        return DataTables::of($barangs)
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Form Barang Masuk',
            'list' => ['Home', 'Barang Masuk', 'Form']
        ];

        $page = (object)[
            'title' => 'Tambah stok'
        ];
        $barang = BarangModel::all();
        $kategori = KategoriModel::all();
        $activeMenu = 'barang_masuk';
        return view('barang_masuk.form', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function list_form(Request $request)
    {
        $barangs = BarangModel::select('kode_barang', 'nama_barang', 'kategori_id', 'harga', 'jumlah', 'image', 'tanggal_diterima')
            ->with('kategori');

        if ($request->kategori_id) {
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
