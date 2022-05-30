<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranDaringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_daring', function (Blueprint $table) {
            $table->id();
            $table->string('jenis')->nullable();
            $table->string('nama')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('gross_amount')->nullable();
            $table->string('transaction_id')->nullable();       
            $table->string('email')->nullable();
            $table->string('number')->nullable();
            $table->string('order_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_code')->nullable();
            $table->string('status')->nullable();
            $table->string('pdf_url')->nullable();
            $table->text('json_data')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_daring');
    }
}
