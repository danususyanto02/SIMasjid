<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganDonasiMasjidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangan_donasi_masjid', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemasukan')->nullable()->index('fk_pemasukan_donasi'); 
            $table->foreignId('id_pengeluaran')->nullable()->index('fk_pengeluaran_donasi'); 
            $table->timestamps();
        });
        Schema::table('keuangan_donasi_masjid', function (Blueprint $table) {
            $table->foreign('id_pemasukan','fk_pemasukan_donasi')->references('id')
            ->on('pemasukan_donasi_masjid')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_pengeluaran','fk_pengeluaran_donasi')->references('id')
            ->on('pengeluaran_donasi_masjid')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keuangan_donasi_masjid');
        Schema::table('keuangan_donasi_masjid', function (Blueprint $table) {
            $table->dropForeign('fk_pemasukan_donasi');
        });
        Schema::table('keuangan_donasi_masjid', function (Blueprint $table) {
            $table->dropForeign('fk_pengeluaran_donasi');
        });
    }
}
