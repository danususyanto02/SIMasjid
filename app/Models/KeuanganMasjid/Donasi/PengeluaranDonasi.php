<?php

namespace App\Models\KeuanganMasjid\Donasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranDonasi extends Model
{
    use HasFactory;
    public $table='pengeluaran_donasi_masjid';
    protected $guarded = [];
}
