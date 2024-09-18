<?php

namespace App\Exports;

use App\Models\BarangMasukModel;
use App\Models\DetailBarangMasukModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangMasukExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DetailBarangMasukModel::select('tanggal_diterima', 'kode_detail_barang_masuk', 'detail_barang_masuk.barang_masuk_id', 'data_barang.nama_barang as nama_barang', 'jumlah', 'keterangan', 'tanggal_diterima')
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
           'Tanggal Masuk',
            'Kode Detail',
            'ID Barang Masuk', 
            'Nama Barang',
            'Jumlah', 
            'Keterangan', 
        ];
    }
}
