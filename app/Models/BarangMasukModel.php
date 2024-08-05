<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangMasukModel extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';
    protected $primaryKey = 'barang_masuk_id';
    protected $fillable = ['barang_id', 'jumlah', 'keterangan', 'tanggal_diterima'];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
