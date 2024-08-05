<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangBaruModel extends Model
{
    use HasFactory;

    protected $table = 'barang_baru';
    protected $primaryKey = 'barang_baru_id';
    protected $fillable = ['barang_id', 'jumlah', 'keterangan', 'tanggal_diterima'];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
