<?php

namespace App\Models\KeuanganMasjid\Pembangunan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukanMasjid extends Model
{
    use HasFactory;
    public $table='pemasukan_pembangunan_masjid';
    protected $guarded = [];

    public function pemasukan_masjid(){
        return $this->belongsTo('App\Models\Pembayaran', 'id_bayaronline','id');
    }
}
