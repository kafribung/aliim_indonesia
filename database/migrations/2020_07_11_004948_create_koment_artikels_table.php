<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koment_artikels', function (Blueprint $table) {
            $table->id();
            $table->text('description');

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->bigInteger('artikel_id')->unsigned();

            $table->timestamps();
            $table->foreign('artikel_id')->references('id')->on('artikels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koment_artikels');
    }
}
