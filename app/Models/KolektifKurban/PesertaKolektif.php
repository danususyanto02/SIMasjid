<?php

namespace App\Models\KolektifKurban;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaKolektif extends Model
{
    use HasFactory;
    public $table='peserta_kolektif';
    protected $guarded = [];
}
