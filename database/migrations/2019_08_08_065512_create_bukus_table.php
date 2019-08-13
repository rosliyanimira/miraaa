<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('buku_kode');
            $table->String('buku_judul');
            $table->String('buku_jumlah');
            $table->String('buku_deskripsi');
            $table->String('buku_pengarang');
            $table->String('buku_tahun_terbit');
            $table->unsignedBigInteger('kategori_kode');
            $table->foreign('kategori_kode')->references('id')->on('kategoris')->ondelete('cascade');
            $table->unsignedBigInteger('penerbit_kode');
            $table->foreign('penerbit_kode')->references('id')->on('penerbits')->ondelete('cascade');
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
        Schema::dropIfExists('bukus');
    }
}
