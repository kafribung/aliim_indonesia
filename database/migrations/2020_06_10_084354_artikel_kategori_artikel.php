<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArtikelKategoriArtikel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel_kategori_artikel', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('artikel_id')->unsigned();
            $table->bigInteger('kategori_artikel_id')->unsigned();
            $table->timestamps();

            $table->foreign('artikel_id')->references('id')->on('artikels')->onDelete('cascade');
            $table->foreign('kategori_artikel_id')->references('id')->on('kategori_artikels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel_kategori_artikel');
    }
}
