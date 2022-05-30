<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLunasKolektifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lunas_kolektif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bayarkolektif')->index('fk_bayarkolektif'); 
            $table->timestamps();
        });

        Schema::table('lunas_kolektif', function (Blueprint $table) {
            $table->foreign('id_bayarkolektif','fk_bayarkolektif')->references('id')
            ->on('pembayaran_kolektif')->onUpdate('CASCADE')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lunas_kolektif');
        Schema::table('lunas_kolektif', function (Blueprint $table) {

            $table->dropForeign('fk_bayarkolektif');
        });
    }
}
