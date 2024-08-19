<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
use App\Models\DetailBarangKeluarModel;
use App\Models\FungsiModel;
use App\Models\KategoriModel;
use App\Models\StokModel;
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
        $barangKeluars = BarangKeluarModel::select('barang_keluar_id', 'kode_barang_keluar', 'fungsi_id', 'tanggal_keluar')
            ->with('fungsi');

        if ($request->has('start_date') && $request->start_date) {
            $barangKeluars->whereDate('tanggal_keluar', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date) {
            $barangKeluars->whereDate('tanggal_keluar', '<=', $request->end_date);
        }

        return DataTables::of($barangKeluars)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barangKeluars) {
                $btn = '<a href="' . url('/barang_keluar/' . $barangKeluars->barang_keluar_id . '/') . '" class="btn btn-warning btn-sm">Detail</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang_keluar/' . $barangKeluars->barang_keluar_id) . '">'
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
            'title' => 'Form Barang Keluar',
            'list' => ['Home', 'Barang Keluar', 'Form']
        ];

        $page = (object)[
            'title' => 'Kurangi stok'
        ];

        $barang = BarangModel::all();
        $kategori = KategoriModel::all();
        $fungsi = FungsiModel::all();

        $lastKode = BarangKeluarModel::latest()->first();
        if ($lastKode) {
            $lastKodeNumber = intval(substr($lastKode->kode_barang_keluar, 2));
            $newKodeBarang = 'BK' . sprintf('%03d', $lastKodeNumber + 1);
        } else {
            $newKodeBarang = 'BK001';
        }

        $activeMenu = 'barang_keluar';
        return view('barang_keluar.form', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'kategori' => $kategori, 'fungsi' => $fungsi, 'barang' => $barang, 'newKodeBarang' => $newKodeBarang]);
    }

    public function list_form(Request $request)
    {
        $barangs = BarangModel::with(['kategori', 'stok']);

        if ($request->kategori_id) {
            $barangs->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($barangs)
            ->addIndexColumn()
            ->addColumn('stok', function ($barang) {
                return $barang->stok ? $barang->stok->stok : 'N/A';
            })
            ->addColumn('aksi', function ($barang) {
                $btn = '<a href="' . url('/barang/' . $barang->barang_id) . '" class="btn btn-info btn-sm">Tambah</a> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang_keluar' => 'required|string',
            'fungsi_id' => 'required|integer',
            'keterangan' => 'required|string',
            'tanggal_keluar' => 'required|date',
            'items' => 'required|string',
        ]);

        $barangKeluar = BarangKeluarModel::create([
            'kode_barang_keluar' => $request->kode_barang_keluar,
            'fungsi_id' => $request->fungsi_id,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

        $items = json_decode($request->items, true);
        foreach ($items as $index => $item) {
            // Generate unique kode_detail_barang_keluar for each item
            $lastKodeDetail = DetailBarangKeluarModel::latest()->first();
            if ($lastKodeDetail) {
                $lastKodeDetailNumber = intval(substr($lastKodeDetail->kode_detail_barang_keluar, 3));
                $newKodeDetailBarang = 'KDB' . sprintf('%03d', $lastKodeDetailNumber + $index + 1);
            } else {
                $newKodeDetailBarang = 'KDB' . sprintf('%03d', $index + 1);
            }

            DetailBarangKeluarModel::create([
                'kode_detail_barang_keluar' => $newKodeDetailBarang,
                'barang_keluar_id' => $barangKeluar->barang_keluar_id,
                'barang_id' => $item['barang_id'],
                'keterangan' => $request->keterangan,
                'jumlah' => $item['jumlah'],
            ]);

            $barang = BarangModel::find($item['barang_id']);
            if ($barang && $barang->stok) {
                $barang->stok->stok = (int)$barang->stok->stok - (int)$item['jumlah'];
                $barang->stok->save();
            }
        }
        return redirect('/barang_keluar')->with('success', 'Data barang keluar berhasil disimpan');
    }

    public function show(string $id)
    {
        $detail_barang_keluar = DetailBarangKeluarModel::where('barang_keluar_id', $id)->get();
        if (!$detail_barang_keluar) {
            return redirect('/')->with('error', 'Detail barang masuk tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Detail Barang Masuk',
            'list' => ['Home', 'Barang Masuk', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Transaksi Penjualan'
        ];


        $barang_keluar = BarangKeluarModel::find($id);

        $activeMenu = 'barang_keluar';
        return view('barang_keluar.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'detail_barang_keluar' => $detail_barang_keluar, 'barang_keluar' => $barang_keluar, 'activeMenu' => $activeMenu]);
    }

    public function destroy(string $id)
    {
        $check = BarangKeluarModel::find($id);
        if (!$check) {
            return redirect('/barang_keluar')->with('error', 'Data barang tidak ditemukan');
        }

        try {
            DetailBarangKeluarModel::where('barang_keluar_id', $id)->delete();

            BarangKeluarModel::destroy($id);
            return redirect('/barang_keluar')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang_keluar')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
