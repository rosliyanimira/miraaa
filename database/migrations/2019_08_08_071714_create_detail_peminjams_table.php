<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPeminjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_peminjams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Date('detail_tanggal_kembali');
            $table->Double('detail_denda');
            $table->boolean('detail_status_kembali');
            $table->unsignedBigInteger('peminjam_kode');
            $table->foreign('peminjam_kode')->references('id')->on('peminjams')->ondelete('cascade');
            $table->unsignedBigInteger('buku_kode');
            $table->foreign('buku_kode')->references('id')->on('bukus')->ondelete('cascade');
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
        Schema::dropIfExists('detail_peminjams');
    }
}
