<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriVideoVideo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_video_video', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('video_id')->unsigned();
            $table->bigInteger('kategori_video_id')->unsigned();
            $table->timestamps();
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
            $table->foreign('kategori_video_id')->references('id')->on('kategori_videos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_video_video');
    }
}
