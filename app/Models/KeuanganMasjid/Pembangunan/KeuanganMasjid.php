<?php

namespace App\Models\KeuanganMasjid\Pembangunan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganMasjid extends Model
{
    use HasFactory;
    public $table='keuangan_pembangunan_masjid';
    protected $guarded = [];
}
