<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

        
    public $table = 'pembayaran';

    protected $guarded = [];

    public function pemasukan(){
        return $this->hasOne('App\Models\Pemasukan', 'pembayaran_id');
    }

    public function pemasukan_masjid(){
        return $this->hasOne('App\Models\KeuanganMasjid\Pembangunan\PemasukanMasjid', 'id_bayaronline');
    }
    
    public function pemasukan_donasi_masjid(){
        return $this->hasOne('App\Models\KeuanganMasjid\Donasi\PemasukanDonasi', 'id_bayaronline');
    }

}
