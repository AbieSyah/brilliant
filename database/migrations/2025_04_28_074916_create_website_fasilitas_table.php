<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteFasilitasTable extends Migration
{
    public function up()
    {
        Schema::create('website_fasilitas', function (Blueprint $table) {  // Already correct
            $table->id();
            $table->string('fasilitas_title')->nullable();
            $table->text('fasilitas_description')->nullable();
            $table->string('fasilitas_icon', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_fasilitas');  // Already correct
    }
}
