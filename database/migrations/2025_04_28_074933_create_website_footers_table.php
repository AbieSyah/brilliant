<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteFootersTable extends Migration
{
    public function up()
    {

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gambar_profil')->nullable();
            $table->text('detail_review');
            $table->integer('rating');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
