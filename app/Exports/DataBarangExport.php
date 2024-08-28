<?php

namespace App\Exports;

use App\Models\BarangModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataBarangExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BarangModel::select('data_barang.barang_id', 'kode_barang', 'nama_barang', 'kategori_barang.nama_kategori as nama_kategori', 'harga', 'stok', 'image', 'data_barang.created_at', 'data_barang.updated_at')
        ->join('stok_barang', 'data_barang.barang_id', '=', 'stok_barang.barang_id')
        ->join('kategori_barang', 'data_barang.kategori_id', '=', 'kategori_barang.kategori_id')
        ->orderBy('barang_id', 'asc')
        ->get();
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'Id',
            'Kode Barang',
            'Nama Barang',
            'Nama Kategori', 
            'Harga Persatuan',
            'Stok',
            'Gambar',
            'Created At',
            'Update At',
            // Add more headers as needed
        ];
    }
}
