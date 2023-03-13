<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outlet_id');
            $table->foreign('outlet_id')->references('id')->on('outlet');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('member');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('paket_id');
            $table->foreign('paket_id')->references('id')->on('paket');
            $table->string('kode_invoice');
            $table->dateTime('tgl_transaksi');
            $table->integer('diskon')->nullable();
            $table->integer('total_biaya');
            $table->enum('status', ['baru', 'proses', 'selesai', 'diambil']);
            $table->enum('dibayar', ['dibayar', 'belum_dibayar']);
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
        Schema::dropIfExists('transaksi');
    }
}
