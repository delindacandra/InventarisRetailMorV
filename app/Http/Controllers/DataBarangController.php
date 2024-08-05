<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataBarangController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Data Barang',
            'list' => ['Home', 'Data Barang']
        ];
        $activeMenu = 'data_barang';
        $kategori = KategoriModel::all();
        return view('data_barang', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'kategori' => $kategori]);
    }

    public function list(Request $request)
    {
        $barangs = BarangModel::select('kode_barang', 'nama_barang', 'kategori_id', 'jumlah', 'harga', 'image', 'tanggal_diterima')
            ->with('kategori');

            if($request->kategori_id){
                $barangs->where('kategori_id', $request->kategori_id);
            }

        return DataTables::of($barangs)
            ->addIndexColumn()
            //AKSI BELUM DIATUR DAN DITAMBAHKAN PAGESNYA
            ->addColumn('aksi', function ($barang) { 
                $btn = '<a href="' . url('/barang/' . $barang->barang_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/barang/' . $barang->barang_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang/' . $barang->barang_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
