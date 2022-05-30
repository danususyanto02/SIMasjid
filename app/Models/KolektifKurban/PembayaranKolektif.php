<?php

namespace App\Models\KolektifKurban;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranKolektif extends Model
{
    use HasFactory;

    public $table='pembayaran_kolektif';
    protected $guarded = [];
}
