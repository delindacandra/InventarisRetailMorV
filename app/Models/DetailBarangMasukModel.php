<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailBarangMasukModel extends Model
{
    use HasFactory;

    protected $table = 'detail_barang_masuk';
    protected $primaryKey = 'detail_barang_masuk_id';
    protected $fillable = ['kode_detail_barang_masuk', 'barang_masuk_id', 'barang_id',  'jumlah', 'keterangan' ,'tanggal_diterima'];

    public function barang_keluar(): BelongsTo
    {
        return $this->belongsTo(BarangMasukModel::class, 'barang_masuk_id', 'barang_masuk_id');
    }

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
