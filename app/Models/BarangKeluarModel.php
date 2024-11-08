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
    protected $fillable = ['kode_barang_keluar', 'fungsi_id', 'sa_id', 'tanggal_keluar'];

    public function salesArea(): BelongsTo
    {
        return $this->belongsTo(SAModel::class, 'sa_id', 'sa_id');
    }
    public function fungsi(): BelongsTo
    {
        return $this->belongsTo(FungsiModel::class, 'fungsi_id', 'fungsi_id');
    }

    public function detailBarangKeluar()
    {
        return $this->hasMany(DetailBarangKeluarModel::class, 'barang_keluar_id', 'barang_keluar_id');
    }
}
