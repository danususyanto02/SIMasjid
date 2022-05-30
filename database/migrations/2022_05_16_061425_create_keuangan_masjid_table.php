<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganMasjidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangan_pembangunan_masjid', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan')->nullable();
            $table->double('pemasukan')->nullable();
            $table->double('pengeluaran')->nullable();
            $table->foreignId('id_pemasukan')->nullable()->index('fk_pemasukan_masjid'); 
            $table->foreignId('id_pengeluaran')->nullable()->index('fk_pengeluaran_masjid'); 
            $table->timestamps();
        });
        Schema::table('keuangan_pembangunan_masjid', function (Blueprint $table) {
            $table->foreign('id_pemasukan','fk_pemasukan_masjid')->references('id')
            ->on('pemasukan_pembangunan_masjid')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_pengeluaran','fk_pengeluaran_masjid')->references('id')
            ->on('pengeluaran_pembangunan_masjid')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keuangan_pembangunan_masjid');
        Schema::table('keuangan_pembangunan_masjid', function (Blueprint $table) {
            $table->dropForeign('fk_pemasukan_masjid');
        });
        Schema::table('keuangan_pembangunan_masjid', function (Blueprint $table) {
            $table->dropForeign('fk_pengeluaran_masjid');
        });
    }
}
