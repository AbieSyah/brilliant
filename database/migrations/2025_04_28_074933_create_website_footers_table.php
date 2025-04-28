<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteFootersTable extends Migration
{
    public function up()
    {
        Schema::create('website_footer', function (Blueprint $table) {  // Changed from website_footers
            $table->id();
            $table->text('footer_address')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('footer_phone', 20)->nullable();
            $table->string('footer_facebook')->nullable();
            $table->string('footer_instagram')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_footer');  // Changed from website_footers
    }
}
