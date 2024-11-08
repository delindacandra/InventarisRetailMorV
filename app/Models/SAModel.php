<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SAModel extends Model
{
    use HasFactory;
    protected $table = 'sales_area';
    protected $primaryKey = 'sa_id';
    protected $fillable = ['kode_sa', 'nama_sa'];

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluarModel::class, 'sa_id', 'sa_id');
    }
}
