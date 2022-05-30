<?php

namespace App\Models\Pembayaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranDaring extends Model
{
    use HasFactory;

    public $table = 'pembayaran_daring';

    protected $guarded = [];

    public function pemasukan_donasi(){ 
        return $this->hasOne('App\Models\KeuanganMasjid\Donasi\PemasukanDonasi', 'id_bayardaring');
    }

    public function pemasukan_masjid(){
        return $this->hasOne('App\Models\KeuanganMasjid\Pembangunan\PemasukanMasjid', 'id_bayardaring');
    }


}
