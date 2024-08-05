<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangKeluarModel extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';
    protected $primaryKey = 'barang_keluar_id';
    protected $fillable = ['barang_id', 'fungsi_id', 'jumlah', 'keterangan', 'tanggal_keluar'];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }

    public function fungsi(): BelongsTo
    {
        return $this->belongsTo(FungsiModel::class, 'fungsi_id', 'fungsi_id');
    }
}
