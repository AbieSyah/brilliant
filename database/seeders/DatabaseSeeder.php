<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserAplikasi;
use App\Models\AplikasiEvent;
use App\Models\ModelKamarforAPI;
use App\Models\Pesanan;
use App\Models\WebsiteBeranda;
use App\Models\WebsiteBooking;
use App\Models\WebsiteFasilitas;
use App\Models\WebsiteFooter;
use App\Models\WebsiteGaleri;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed User Aplikasi
        $user1 = UserAplikasi::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password123'),
                'phone_number' => '081234567891',
                'address' => 'Jl. User No. 1',
                'role' => 'user'
            ]
        );

        $user2 = UserAplikasi::firstOrCreate(
            ['email' => 'member@example.com'],
            [
                'name' => 'Member User',
                'password' => Hash::make('password1234'),
                'phone_number' => '081235247891',
                'address' => 'Jl. User No. 2',
                'role' => 'member'
            ]
        );
        // Seed Events
        AplikasiEvent::create([
            'nama_event' => 'Open House 2025',
            'deskripsi' => 'Acara pembukaan asrama tahun 2025',
            'tanggal_mulai' => '2025-08-01 09:00:00',
            'tanggal_selesai' => '2025-08-01 17:00:00',
            'lokasi' => 'Aula Utama',
            'status' => 'upcoming'
        ]);

        AplikasiEvent::create([
            'nama_event' => 'Seminar Kepemimpinan',
            'deskripsi' => 'Seminar pengembangan leadership',
            'tanggal_mulai' => '2025-09-15 13:00:00',
            'tanggal_selesai' => '2025-09-15 16:00:00',
            'lokasi' => 'Ruang Seminar',
            'status' => 'upcoming'
        ]);

        // Seed Kamar
        $kamar1 = ModelKamarforAPI::create([
            'nama_kamar' => 'Kamar Reguler A1',
            'deskripsi' => 'Kamar standar untuk 4 orang',
            'gender' => 'pria',
            'harga' => 750000.00
        ]);

        $kamar2 = ModelKamarforAPI::create([
            'nama_kamar' => 'Kamar Premium P1',
            'deskripsi' => 'Kamar premium untuk 2 orang dengan AC',
            'gender' => 'wanita',
            'harga' => 1250000.00
        ]);

        // Seed Website Beranda
        WebsiteBeranda::create([
            'hero_title' => 'Selamat Datang di Asrama Kami',
            'hero_subtitle' => 'Tempat Tinggal Nyaman untuk Mahasiswa',
            'hero_image' => 'hero-image.jpg',
            'hero_button_text' => 'Pesan Sekarang',
            'hero_subtext' => 'Fasilitas Lengkap dan Lokasi Strategis'
        ]);

        // Seed Website Booking
        WebsiteBooking::create([
            'booking_title' => 'Cara Pemesanan Kamar',
            'booking_description' => 'Pemesanan kamar dapat dilakukan melalui aplikasi atau website kami',
            'booking_image' => 'booking-guide.jpg'
        ]);

        // Seed Website Fasilitas
        $fasilitas = [
            [
                'fasilitas_title' => 'WiFi Gratis',
                'fasilitas_description' => 'Internet cepat 24 jam',
                'fasilitas_icon' => 'wifi-icon'
            ],
            [
                'fasilitas_title' => 'Ruang Belajar',
                'fasilitas_description' => 'Tersedia ruang belajar bersama',
                'fasilitas_icon' => 'study-icon'
            ],
            [
                'fasilitas_title' => 'Laundry',
                'fasilitas_description' => 'Layanan laundry tersedia',
                'fasilitas_icon' => 'laundry-icon'
            ]
        ];

        foreach ($fasilitas as $f) {
            WebsiteFasilitas::create($f);
        }

        // Seed Website Footer
        WebsiteFooter::create([
            'footer_address' => 'Jl. Contoh No. 123, Kota, Negara',
            'footer_email' => 'info@asrama.com',
            'footer_phone' => '081234567890',
            'footer_facebook' => 'https://facebook.com/asrama',
            'footer_instagram' => 'https://instagram.com/asrama'
        ]);

        // Seed Website Galeri
        WebsiteGaleri::create([
            'galeri_title' => 'Galeri Asrama',
            'galeri_description' => 'Dokumentasi fasilitas dan kegiatan asrama',
            'images' => [
                'kamar-1.jpg',
            ]
        ]);

        // Seed Pesanan
        $pesanan = [
            [
                'nama_pengguna' => 'John Doe',
                'tipe_kamar' => 'Reguler',
                'status_pesanan' => 'Pending',
                'keterangan' => 'Pemesanan kamar reguler untuk 6 bulan',
                'tanggal_pesanan' => '2025-08-01',
                'durasi_pesanan' => '6 bulan',
                'total_harga' => 4500000.00
            ],
            [
                'nama_pengguna' => 'Jane Smith',
                'tipe_kamar' => 'VIP',
                'status_pesanan' => 'Disetujui',
                'keterangan' => 'Pemesanan kamar VIP untuk 1 tahun',
                'tanggal_pesanan' => '2025-09-01',
                'durasi_pesanan' => '1 tahun',
                'total_harga' => 12000000.00
            ],
            [
                'nama_pengguna' => 'Mike Johnson',
                'tipe_kamar' => 'Homestay',
                'status_pesanan' => 'Pending',
                'keterangan' => 'Pemesanan homestay untuk 1 bulan',
                'tanggal_pesanan' => '2025-07-15',
                'durasi_pesanan' => '30 hari',
                'total_harga' => 2000000.00
            ]
        ];

        foreach ($pesanan as $p) {
            Pesanan::create($p);
        }
    }
}
