<?php

namespace App\Models\KeuanganMasjid\Donasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukanDonasi extends Model
{
    use HasFactory;
    public $table='pemasukan_donasi_masjid';
    protected $guarded = [];

    public function pemasukan_donasi_daring(){
        return $this->belongsTo('App\Models\Pembayaran\PembayaranDaring', 'id_bayardaring','id');
    }

    public function pemasukan_donasi_luring(){
        return $this->belongsTo('App\Models\Pembayaran\PembayaranLuring', 'id_bayarluring','id');
    }
    
    public function keuangan_donasi_masjid(){
        return $this->hasOne('App\Models\KeuanganMasjid\Donasi\KeuanganDonasi', 'id_pemasukan');
    }
}
