<?php

namespace App\Models\Pembayaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranLuring extends Model
{
    use HasFactory;

    public $table = 'pembayaran_luring';

    protected $guarded = [];

    public function pemasukan_donasi(){ 
        return $this->hasOne('App\Models\KeuanganMasjid\Donasi\PemasukanDonasi', 'id_bayarluring');
    }
}
