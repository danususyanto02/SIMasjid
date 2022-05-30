<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranKolektifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_kolektif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_peserta')->index('fk_pembayaran_peserta'); 
            $table->double('nominal')->nullable();
            $table->double('total')->nullable();
            $table->timestamps();
        });
        Schema::table('pembayaran_kolektif', function (Blueprint $table) {
            $table->foreign('id_peserta','fk_pembayaran_peserta')->references('id')
            ->on('peserta_kolektif')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_kolektif');
        Schema::table('pembayaran_kolektif', function (Blueprint $table) {
            $table->dropForeign('fk_pembayaran_peserta');
        });
    }
}
