<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('data_barang.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'kategori' => $kategori]);
    }

    public function list(Request $request)
    {
        $barangs = BarangModel::select('barang_id', 'kode_barang', 'nama_barang', 'kategori_id', 'jumlah', 'harga', 'image', 'tanggal_diterima')
            ->with('kategori');

        if ($request->kategori_id) {
            $barangs->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($barangs)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barang) {
                $btn = '<a href="' . url('/barang/' . $barang->barang_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang/' . $barang->barang_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
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
        $activeMenu =  'data_barang';

        return view('data_barang.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string',
            'nama_barang' => 'required|string',
            'kategori_id' => 'required|integer',
            'jumlah' => 'required|integer',
            'image' => 'required|mimes:png,jpg,jpeg',
            'harga' => 'required|integer',
            'tanggal_diterima' => 'required|date',
        ]);

        $image = $request->file('image');
        $fileName = date('Y-m-d') . $image->getClientOriginalExtension();
        $path = 'barang/' . $fileName;

        Storage::disk('public')->put($path, file_get_contents($image));

        // dd($request->all());

        BarangModel::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'jumlah' => $request->jumlah,
            'image' => $fileName,
            'harga' => $request->harga,
            'tanggal_diterima' => $request->tanggal_diterima,
        ]);
        return redirect('/barang')->with('success', 'Data Barang berhasil ditambahkan');
    }
    
    public function edit(string $barang_id)
    {
        $barang = BarangModel::find($barang_id);
        $kategori = KategoriModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit Data Barang',
            'list' => ['Data Barang', 'Edit']
        ];
        $page = (object)[
            'title' => ' Form Edit'
        ];;
        $activeMenu = 'data_barang';
        return view('data_barang.edit', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'barang' => $barang, 'kategori' => $kategori, 'page' => $page]);
    }

    public function update(Request $request, string $barang_id)
    {
        $request->validate([
            'kode_barang' => 'required|string|unique:data_barang,barang_id,' . $barang_id . ',barang_id',
            'nama_barang' => 'required|string',
            'jumlah' => 'required|integer',
            'harga' => 'required|integer',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'kategori_id' => 'required|integer'
        ]);

        $barang = BarangModel::find($barang_id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('Y-m-d') . '-' . $image->getClientOriginalName();
            $path = 'barang/' . $fileName;
            Storage::disk('public')->put($path, file_get_contents($image));

            if ($barang->image) {
                Storage::disk('public')->delete('barang/' . $barang->image);
            }
            $barang->image = $fileName;
        }
        // dd($request->all());
        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
        ]);
        return redirect('/barang')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $barang_id)
    {
        $check = BarangModel::find($barang_id);
        if (!$check) {
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }

        try {
            BarangModel::destroy($barang_id);
            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
