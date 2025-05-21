<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteFasilitasTable extends Migration
{
    public function up()
    {
        Schema::create('website_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fasilitas');
            $table->text('deskripsi_detail');
            $table->string('gambar_singkat')->nullable();
            $table->string('gambar_detail')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_fasilitas');
    }
}
