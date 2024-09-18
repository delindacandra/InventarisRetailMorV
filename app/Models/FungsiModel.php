<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FungsiModel extends Model
{
    use HasFactory;
    protected $table = 'fungsi_jatimbalinus';
    protected $primaryKey = 'fungsi_id';
    protected $fillable = ['kode_fungsi', 'nama_fungsi'];

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluarModel::class, 'fungsi_id', 'fungsi_id');
    }
}
