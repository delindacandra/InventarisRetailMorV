<?php

namespace App\Exports;

use App\Models\BarangMasukModel;
use App\Models\DetailBarangMasukModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithMapping;

class BarangMasukExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DetailBarangMasukModel::select(
            DB::raw("DATE_FORMAT(tanggal_diterima, '%Y-%m-%d') as tanggal_diterima"),
            'data_barang.nama_barang as nama_barang',
            'data_barang.vendor as vendor',
            'jumlah',
            'keterangan'
        )
            ->join('data_barang', 'detail_barang_masuk.barang_id', '=', 'data_barang.barang_id')
            ->join('barang_masuk', 'detail_barang_masuk.barang_masuk_id', '=', 'barang_masuk.barang_masuk_id')
            ->orderBy('detail_barang_masuk.barang_masuk_id', 'asc')
            ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Tanggal Masuk',
            'Nama Barang',
            'Vendor',
            'Jumlah',
            'Keterangan',
        ];
    }

    /**
    * @param mixed $barangMasuk
    * @return array
    */
    public function map($barangMasuk): array 
    {
        static $no = 1;
        return [
            $no++,
            $barangMasuk->tanggal_diterima,
            $barangMasuk->nama_barang,
            $barangMasuk->vendor,
            $barangMasuk->jumlah,
            $barangMasuk->keterangan,
        ];
    }
}
