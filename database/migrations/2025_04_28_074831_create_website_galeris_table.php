<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteGalerisTable extends Migration
{
    public function up()
    {
        Schema::create('website_galeri', function (Blueprint $table) {
            $table->id();
            $table->string('konten_gambar')->nullable();
            $table->string('konten_video')->nullable(); // For uploaded videos
            $table->string('video_url')->nullable();    // For online video links
            $table->enum('video_type', ['upload', 'youtube', 'other'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_galeri');
    }
}
