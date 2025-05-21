<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('datatables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->integer('age');
            $table->string('office');
            $table->string('jenis_kelamin');
            $table->date('start_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datatables');
    }
};