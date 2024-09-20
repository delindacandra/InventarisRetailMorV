<?php

namespace App\Exports;

use App\Models\BarangModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataBarangExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return BarangModel::select(
            'nama_barang',
            'kategori_barang.nama_kategori as nama_kategori',
            'vendor',
            'harga',
            'stok',
            'image'
        )
            ->join('stok_barang', 'data_barang.barang_id', '=', 'stok_barang.barang_id')
            ->join('kategori_barang', 'data_barang.kategori_id', '=', 'kategori_barang.kategori_id')
            ->orderBy('data_barang.barang_id', 'asc')
            ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Nama Barang',
            'Kategori',
            'Informasi Vendor',
            'Harga Satuan',
            'Stok',
            'Gambar'
        ];
    }

    /**
     * @param mixed $barang
     * @return array
     */
    public function map($barang): array
    {
        static $no = 1;
        return [
            $no++,
            $barang->nama_barang,
            $barang->nama_kategori,
            $barang->vendor,
            $barang->harga,
            $barang->stok,
            $barang->image,
        ];
    }
}
