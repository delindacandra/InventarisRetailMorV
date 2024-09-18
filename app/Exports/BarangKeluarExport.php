<?php

namespace App\Exports;

use App\Models\BarangKeluarModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangKeluarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BarangKeluarModel::select('barang_keluar_id', 'kode_barang_keluar', 'fungsi_id', 'tanggal_keluar')
        ->get();
    }

    
    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'Id',
            'Kode Barang Keluar',
            'Fungsi',
            'Tanggal Barang Keluar',
        ];
    }
}
