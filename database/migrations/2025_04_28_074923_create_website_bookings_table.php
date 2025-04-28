<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('website_booking', function (Blueprint $table) {  // Changed from website_bookings
            $table->id();
            $table->string('booking_title')->nullable();
            $table->text('booking_description')->nullable();
            $table->string('booking_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_booking');  // Changed from website_bookings
    }
}
