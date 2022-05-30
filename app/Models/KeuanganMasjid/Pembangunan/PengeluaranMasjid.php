<?php

namespace App\Models\KeuanganMasjid\Pembangunan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranMasjid extends Model
{
    use HasFactory;
    public $table='pengeluaran_pembangunan_masjid';
    protected $guarded = [];
}
