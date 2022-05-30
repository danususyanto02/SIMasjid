<?php

namespace App\Models\KeuanganMasjid\Donasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganDonasi extends Model
{
    use HasFactory;
    public $table='keuangan_donasi_masjid';
    protected $guarded = [];

    public function keuangan_donasi_masjid(){
        return $this->belongsTo('App\Models\KeuanganMasjid\Donasi\PemasukanDonasi', 'id_pemasukan','id');
    }
}
