<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteGalerisTable extends Migration
{
    public function up()
    {
        Schema::create('website_galeri', function (Blueprint $table) {  // Changed from website_galeris
            $table->id();
            $table->string('galeri_title')->nullable();
            $table->text('galeri_description')->nullable();
            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_galeri');  // Changed from website_galeris
    }
}
