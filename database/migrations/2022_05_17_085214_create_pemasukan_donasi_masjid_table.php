<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukanDonasiMasjidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukan_donasi_masjid', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bayardaring')->nullable()->index('fk_pemasukandaring_donasi_dari_pembayaran'); 
            $table->foreignId('id_bayarluring')->nullable()->index('fk_pemasukanluring_donasi_dari_pembayaran'); 
            $table->double('total')->nullable();
            $table->timestamps();
        });
        Schema::table('pemasukan_donasi_masjid', function (Blueprint $table) {
            $table->foreign('id_bayardaring','fk_pemasukandaring_donasi_dari_pembayaran')->references('id')
            ->on('pembayaran_daring')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
        Schema::table('pemasukan_donasi_masjid', function (Blueprint $table) {
            $table->foreign('id_bayarluring','fk_pemasukanluring_donasi_dari_pembayaran')->references('id')
            ->on('pembayaran_luring')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemasukan_donasi_masjid');
        Schema::table('pemasukan_donasi_masjid', function (Blueprint $table) {
            $table->dropForeign('fk_pemasukandaring_donasi_dari_pembayaran');
        });
        Schema::table('pemasukan_donasi_masjid', function (Blueprint $table) {
            $table->dropForeign('fk_pemasukanluring_donasi_dari_pembayaran');
        });
    }
}
