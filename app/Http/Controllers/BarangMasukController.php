<?php

namespace App\Http\Controllers;

use App\Exports\BarangMasukExport;
use App\Models\BarangMasukModel;
use App\Models\BarangModel;
use App\Models\DetailBarangMasukModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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
        $barangMasuks = DetailBarangMasukModel::select('barang_masuk_id', 'barang_id', 'jumlah', 'keterangan')->with('barang_masuk', 'barang');

        if ($request->has('start_date') && $request->start_date) {
            $barangMasuks->whereHas('barang_masuk', function ($query) use ($request) {
                $query->whereDate('tanggal_diterima', '>=', $request->start_date);
            });
        }

        if ($request->has('end_date') && $request->end_date) {
            $barangMasuks->whereHas('barang_masuk', function ($query) use ($request) {
                $query->whereDate('tanggal_diterima', '<=', $request->end_date);
            });
        }

        return DataTables::of($barangMasuks)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barangMasuks) {
                $btn = '<form class="d-inline-block" method="POST" action="' . url('/barang_masuk/' . $barangMasuks->barang_masuk_id) . '">'
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
            'title' => 'Form Barang Masuk',
            'list' => ['Home', 'Barang Masuk', 'Form']
        ];

        $page = (object)[
            'title' => 'Tambah stok'
        ];
        $barang = BarangModel::all();
        $kategori = KategoriModel::all();

        $lastItem = BarangMasukModel::latest()->first();

        if ($lastItem) {
            $lastKodeNumber = intval(substr($lastItem->kode_barang_masuk, 2));
            $newKodeBarang = 'BM' . sprintf('%03d', $lastKodeNumber + 1);
        } else {
            $newKodeBarang = 'BM001';
        }

        $activeMenu = 'barang_masuk';
        return view('barang_masuk.form', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang, 'kategori' => $kategori, 'newKodeBarang' => $newKodeBarang,]);
    }

    public function list_form(Request $request)
    {
        $barangs = BarangModel::with(['kategori', 'stok'])->orderBy('nama_barang', 'asc');

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
            'kode_barang_masuk' => 'required|string',
            'tanggal_diterima' => 'required|date',
            'keterangan' => 'required|string',
            'items' => 'required|string'
        ]);

        $items = json_decode($request->items, true);
        $barangMasuk = BarangMasukModel::create([
            'kode_barang_masuk' => $request->kode_barang_masuk,
            'tanggal_diterima' => $request->tanggal_diterima,
        ]);

        $lastKodeDetail = DetailBarangMasukModel::orderBy('kode_detail_barang_masuk', 'desc')->first();
        $lastKodeDetailNumber = $lastKodeDetail ? intval(substr($lastKodeDetail->kode_detail_barang_masuk, 3)) : 0;

        foreach ($items as $item) {
            $lastKodeDetailNumber++;
            $newKodeDetail = 'DBM' . sprintf('%03d', $lastKodeDetailNumber);

            DetailBarangMasukModel::create([
                'kode_detail_barang_masuk' => $newKodeDetail,
                'barang_masuk_id' => $barangMasuk->barang_masuk_id,
                'barang_id' => $item['barang_id'],
                'keterangan' => $request->keterangan,
                'jumlah' => $item['jumlah'],
            ]);

            $barang = BarangModel::find($item['barang_id']);
            if ($barang && $barang->vendor) {
                $barang->vendor = $item['vendor'];
                $barang->save();
            }

            if ($barang && $barang->stok) {
                $barang->stok->stok = (int)$barang->stok->stok + (int)$item['jumlah'];
                $barang->stok->save();
            }
        }

        return redirect('/barang_masuk')->with('success', 'Data barang masuk berhasil disimpan.');
    }

    public function show(string $id)
    {
        $detail_barang_masuk = DetailBarangMasukModel::where('barang_masuk_id', $id)->get();
        if (!$detail_barang_masuk) {
            return redirect('/')->with('error', 'Detail barang masuk tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Detail Barang Masuk',
            'list' => ['Home', 'Barang Masuk', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Transaksi Penjualan'
        ];


        $barang_masuk = BarangMasukModel::find($id);

        $activeMenu = 'barang_masuk';
        return view('barang_masuk.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'detail_barang_masuk' => $detail_barang_masuk, 'barang_masuk' => $barang_masuk, 'activeMenu' => $activeMenu]);
    }

    public function destroy(string $id)
    {
        $check = BarangMasukModel::find($id);
        if (!$check) {
            return redirect('/barang_masuk')->with('error', 'Data barang tidak ditemukan');
        }

        try {
            DetailBarangMasukModel::where('barang_masuk_id', $id)->delete();

            BarangMasukModel::destroy($id);
            return redirect('/barang_masuk')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang_masuk')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function export()
    {
        return Excel::download(new BarangMasukExport(), 'barang_masuk.xlsx');
    }
}
