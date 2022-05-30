<?php

namespace App\Models\KolektifKurban;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kolektif extends Model
{
    use HasFactory;

    public $table='kolektif_kurban';
    protected $guarded = [];
}
