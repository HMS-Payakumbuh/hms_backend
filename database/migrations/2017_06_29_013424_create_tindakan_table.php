<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTindakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindakan', function (Blueprint $table) {
            $table->integer('no_transaksi');
            $table->integer('no_tindakan');
            $table->decimal('harga', 65, 2);
            $table->binary('dokumen_penunjang')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('id_pembayaran')->nullable();
            $table->string('kode_tindakan');
            $table->dateTime('tanggal_waktu')->nullable();
            $table->string('np_tenaga_medis')->nullable();
            $table->string('nama_poli')->nullable();
            $table->string('nama_lab')->nullable();
            $table->string('nama_ambulans')->nullable();
            $table->timestamps();

            $table->primary(['no_transaksi', 'no_tindakan']);
            $table->foreign('no_transaksi')->references('id')->on('transaksi')->onDelete('restrict');
            $table->foreign('id_pembayaran')->references('id')->on('pembayaran')->onDelete('restrict');
            $table->foreign('kode_tindakan')->references('kode')->on('daftar_tindakan')->onDelete('restrict');
            $table->foreign('tanggal_waktu')->references('tanggal_waktu')->on('rekam_medis')->onDelete('restrict');
            $table->foreign('np_tenaga_medis')->references('no_pegawai')->on('tenaga_medis')->onDelete('restrict');
            $table->foreign('nama_poli')->references('nama')->on('poliklinik')->onDelete('restrict');
            $table->foreign('nama_lab')->references('nama')->on('laboratorium')->onDelete('restrict');
            $table->foreign('nama_ambulans')->references('nama')->on('ambulans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tindakan', function (Blueprint $table) {
            $table->dropForeign(['no_transaksi']);
            $table->dropForeign(['id_pembayaran']);
            $table->dropForeign(['kode_tindakan']);
            $table->dropForeign(['tanggal_waktu']);
            $table->dropForeign(['np_tenaga_medis']);
            $table->dropForeign(['nama_poli']);
            $table->dropForeign(['nama_lab']);
            $table->dropForeign(['nama_ambulans']);
        });
        Schema::dropIfExists('tindakan');
    }
}