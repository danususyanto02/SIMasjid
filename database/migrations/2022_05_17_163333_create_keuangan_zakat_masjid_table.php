<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganZakatMasjidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangan_zakat_masjid', function (Blueprint $table) {
            $table->id();
            $table->string('jenis')->nullable();
            $table->foreignId('id_pemasukan')->nullable()->index('fk_pemasukan_zakat'); 
            $table->foreignId('id_pengeluaran')->nullable()->index('fk_pengeluaran_zakat'); 
            $table->double('nominal')->nullable();
            $table->timestamps();
        });
        Schema::table('keuangan_zakat_masjid', function (Blueprint $table) {
            $table->foreign('id_pemasukan','fk_pemasukan_zakat')->references('id')
            ->on('pemasukan_zakat_masjid')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_pengeluaran','fk_pengeluaran_zakat')->references('id')
            ->on('pengeluaran_zakat_masjid')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keuangan_zakat_masjid');
        Schema::table('keuangan_zakat_masjid', function (Blueprint $table) {
            $table->dropForeign('fk_pemasukan_zakat');
        });
        Schema::table('keuangan_zakat_masjid', function (Blueprint $table) {
            $table->dropForeign('fk_pengeluaran_zakat');
        });
    }
}
