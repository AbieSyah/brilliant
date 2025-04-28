<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('website_beranda', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_subtext')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_beranda');
    }
};
