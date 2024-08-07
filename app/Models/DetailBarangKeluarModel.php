<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailBarangKeluarModel extends Model
{
    protected $table = 'detail_barang_keluar';
    protected $primaryKey = 'detail_barang_keluar_id';
    protected $fillable = ['kode_detail_barang_keluar', 'barang_keluar_id', 'barang_id',  'jumlah', 'keterangan' ,'tanggal_diterima'];

    public function barang_keluar(): BelongsTo
    {
        return $this->belongsTo(BarangKeluarModel::class, 'barang_keluar_id', 'barang_keluar_id');
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
