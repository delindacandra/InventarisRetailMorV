<?php

namespace App\Http\Controllers;

use App\Exports\BarangKeluarExport;
use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
use App\Models\DetailBarangKeluarModel;
use App\Models\FungsiModel;
use App\Models\SAModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
    
        return view('barang_keluar.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $barangKeluars = DetailBarangKeluarModel::select('barang_keluar_id', 'barang_id', 'jumlah', 'keterangan')
            ->with('barang', 'barang_keluar', 'barang_keluar.fungsi', 'barang_keluar.sa');
        
        if ($request->has('start_date') && $request->start_date) {
            $barangKeluars->whereHas('barang_keluar', function ($query) use ($request) {
                $query->whereDate('tanggal_keluar', '>=', $request->start_date);
            });
        }

        if ($request->has('end_date') && $request->end_date) {
            $barangKeluars->whereHas('barang_keluar', function ($query) use ($request) {
                $query->whereDate('tanggal_keluar', '<=', $request->end_date);
            });
        }

        return DataTables::of($barangKeluars)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barangKeluars) {
                $btn = '<form class="d-inline-block" method="POST" action="' . url('/barang_keluar/' . $barangKeluars->barang_keluar_id) . '">'
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
        $fungsi = FungsiModel::all()->sortBy('nama_fungsi');
        $sa = SAModel::all();

        $lastKode = BarangKeluarModel::latest()->first();
        if ($lastKode) {
            $lastKodeNumber = intval(substr($lastKode->kode_barang_keluar, 2));
            $newKodeBarang = 'BK' . sprintf('%03d', $lastKodeNumber + 1);
        } else {
            $newKodeBarang = 'BK001';
        }

        $activeMenu = 'barang_keluar';
        return view('barang_keluar.form', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'fungsi' => $fungsi, 'barang' => $barang, 'newKodeBarang' => $newKodeBarang, 'sa' => $sa]);
    }

    public function list_form()
    {
        $barangs = BarangModel::with('stok')->orderBy('nama_barang', 'asc');

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
            'sa_id' => 'required|integer',
            'keterangan' => 'required|string',
            'tanggal_keluar' => 'required|date',
            'items' => 'required|string',
        ]);

        $items = json_decode($request->items, true);

        foreach($items as $item){
            $barang =BarangModel::find($item['barang_id']);
            if($barang && $barang->stok && $barang->stok->stok <$item['jumlah']){
                return redirect()->back()->with('error', 'Jumlah barang melebihi stok yang tersedia');
            }
        }

        $barangKeluar = BarangKeluarModel::create([
            'kode_barang_keluar' => $request->kode_barang_keluar,
            'fungsi_id' => $request->fungsi_id,
            'sa_id' => $request->sa_id,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

        $lastKodeDetail = DetailBarangKeluarModel::orderBy('kode_detail_barang_keluar', 'desc')->first();
        $lastKodeDetailNumber = $lastKodeDetail ? intval(substr($lastKodeDetail->kode_detail_barang_keluar, 3)) : 0;

        foreach ($items as $item) {
            $lastKodeDetailNumber++;
            $newKodeDetailBarang = 'DBK' . sprintf('%03d', $lastKodeDetailNumber);


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

    public function destroy(string $id)
    {
        $check = BarangKeluarModel::find($id);
        if (!$check) {
            return redirect('/barang_keluar')->with('error', 'Data barang keluar tidak ditemukan');
        }

        try {
            DetailBarangKeluarModel::where('barang_keluar_id', $id)->delete();

            BarangKeluarModel::destroy($id);
            return redirect('/barang_keluar')->with('success', 'Data barang keluar berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang_keluar')->with('error', 'Data barang keluar gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function export()
    {
        return Excel::download(new BarangKeluarExport(), "barang keluar.xlsx");
    }
}
