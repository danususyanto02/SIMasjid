<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukanZakatMasjidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukan_zakat_masjid', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pembayaran')->nullable();
            $table->foreignId('id_bayardaring')->nullable()->index('fk_pemasukandaring_zakat_pembayaran'); 
            $table->foreignId('id_bayarluring')->nullable()->index('fk_pemasukanluring_zakat_pembayaran'); 
            $table->double('total')->nullable();
            $table->timestamps();
        }); 
        Schema::table('pemasukan_zakat_masjid', function (Blueprint $table) {
            $table->foreign('id_bayardaring','fk_pemasukandaring_zakat_pembayaran')->references('id')
            ->on('pembayaran_daring')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
        Schema::table('pemasukan_zakat_masjid', function (Blueprint $table) {
            $table->foreign('id_bayarluring','fk_pemasukanluring_zakat_pembayaran')->references('id')
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
        Schema::dropIfExists('pemasukan_zakat_masjid');
        Schema::table('pemasukan_zakat_masjid', function (Blueprint $table) {
            $table->dropForeign('fk_pemasukandaring_zakat_pembayaran');
        });
    }
}
