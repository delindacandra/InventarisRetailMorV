<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    protected $table = 'kategori_barang';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['kode_kategori', 'nama_kategori'];
}
