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
            $table->string('kode_invoice')->unique();
            $table->dateTime('tgl_transaksi');
            $table->integer('diskon')->nullable();
            $table->integer('total_biaya')->nullable();
            $table->enum('status', ['Baru', 'Proses', 'Selesai', 'Diambil', 'Dikirim']);
            $table->enum('dibayar', ['Dibayar', 'Belum Dibayar']);
            $table->softDeletes('deleted_at');
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
