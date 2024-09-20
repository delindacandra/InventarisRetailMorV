<?php

namespace App\Exports;

use App\Models\BarangKeluarModel;
use App\Models\DetailBarangKeluarModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BarangKeluarExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DetailBarangKeluarModel::select(
            DB::raw("DATE_FORMAT(tanggal_keluar, '%Y-%m-%d') as tanggal_keluar"),
            'barang_keluar.barang_keluar_id as barang_keluar_id',
            'data_barang.nama_barang as nama_barang',
            'jumlah',
            'keterangan',
        )
            ->join('data_barang', 'detail_barang_keluar.barang_id', '=', 'data_barang.barang_id')
            ->join('barang_keluar', 'detail_barang_keluar.barang_keluar_id', '=', 'barang_keluar.barang_keluar_id')
            ->orderBy('detail_barang_keluar.barang_keluar_id', 'asc')
            ->get();
    }


    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Tanggal Barang Keluar',
            'Id Barang Keluar',
            'Nama Barang',
            'Jumlah',
            'Keterangan',
        ];
    }

    /**
     * @param mixed $barangKeluar
     * @return array
     */
    public function map($barangKeluar): array
    {
        static $no = 1;
        return [
            $no++,
            $barangKeluar->tanggal_keluar,
            $barangKeluar->barang_keluar_id,
            $barangKeluar->nama_barang,
            $barangKeluar->jumlah,
            $barangKeluar->keterangan,
        ];
    }
}
