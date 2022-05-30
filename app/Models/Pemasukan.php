<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    public $table='pemasukan';
    protected $guarded = [];

    public function pemasukan(){
        return $this->belongsTo('App\Models\Pembayaran', 'id_bayardaring','id');
    }
}
