<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengguna');
            $table->enum('tipe_kamar', ['Reguler', 'VIP', 'Homestay']);
            $table->enum('status_pesanan', ['Pending', 'Disetujui', 'Ditolak']);
            $table->text('keterangan')->nullable();
            $table->date('tanggal_pesanan');
            $table->enum('durasi_pesanan', ['7 hari', '14 hari', '30 hari', '6 bulan', '1 tahun']);
            $table->decimal('total_harga', 10, 2); // Added total_harga column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};
