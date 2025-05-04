<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserAplikasi;
use App\Models\AplikasiEvent;
use App\Models\ModelKamarforAPI;
use App\Models\AplikasiFasilitas;
use App\Models\Pesanan;
use App\Models\WebsiteBeranda;
use App\Models\WebsiteBooking;
use App\Models\WebsiteFasilitas;
use App\Models\WebsiteReview;
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
        $kamar1 = AplikasiFasilitas::create([
            'nama_kamar' => 'Kamar Regular A1',
            'deskripsi' => 'Kamar standar untuk 4 orang',
            'gender' => 'pria',
            'type_kamar' => 'regular',
            'kategori' => 'bieplus',
            'harga' => 750000.00
        ]);

        $kamar2 = AplikasiFasilitas::create([
            'nama_kamar' => 'Kamar VIP P1',
            'deskripsi' => 'Kamar premium untuk 2 orang dengan AC',
            'gender' => 'wanita',
            'type_kamar' => 'vip',
            'kategori' => 'brilliant_selatan',
            'harga' => 1250000.00
        ]);

        // Seed Website Beranda
        WebsiteBeranda::create([
            'teks_utama' => 'Selamat Datang di Asrama Kami',
            'konten_gambar' => 'beranda/hero-image.jpg'
        ]);

        // Seed Website Fasilitas
        $fasilitas = [
            [
                'nama_fasilitas' => 'WiFi Berkecepatan Tinggi',
                'deskripsi_detail' => 'Akses internet berkecepatan tinggi 24/7 dengan bandwidth dedicated untuk setiap lantai. Mendukung kegiatan belajar online dan entertainment.',
                'gambar_singkat' => 'fasilitas/wifi-singkat.jpg',
                'gambar_detail' => 'fasilitas/wifi-detail.jpg'
            ],
            [
                'nama_fasilitas' => 'Ruang Belajar Modern',
                'deskripsi_detail' => 'Ruang belajar yang nyaman dilengkapi dengan meja, kursi ergonomis, dan papan tulis. Tersedia area diskusi dan ruang private study.',
                'gambar_singkat' => 'fasilitas/study-singkat.jpg',
                'gambar_detail' => 'fasilitas/study-detail.jpg'
            ],
            [
                'nama_fasilitas' => 'Laundry Service',
                'deskripsi_detail' => 'Layanan laundry profesional dengan sistem antar-jemput ke kamar. Menjamin kebersihan dan kerapian pakaian penghuni.',
                'gambar_singkat' => 'fasilitas/laundry-singkat.jpg',
                'gambar_detail' => 'fasilitas/laundry-detail.jpg'
            ],
            [
                'nama_fasilitas' => 'Kantin & Cafe',
                'deskripsi_detail' => 'Area makan yang bersih dan nyaman dengan berbagai pilihan menu sehat. Buka dari pagi hingga malam untuk memenuhi kebutuhan penghuni.',
                'gambar_singkat' => 'fasilitas/kantin-singkat.jpg',
                'gambar_detail' => 'fasilitas/kantin-detail.jpg'
            ]
        ];

        foreach ($fasilitas as $f) {
            WebsiteFasilitas::create($f);
        }

        // Seed Website Review
        $reviews = [
            [
                'nama' => 'John Doe',
                'gambar_profil' => 'profile1.jpg',
                'detail_review' => 'Asrama yang sangat nyaman dengan fasilitas lengkap. Pelayanan ramah dan lokasi strategis.',
                'rating' => 5
            ],
            [
                'nama' => 'Jane Smith',
                'gambar_profil' => 'profile2.jpg',
                'detail_review' => 'Kamar bersih dan rapi. WiFi cepat dan stabil. Sangat cocok untuk mahasiswa.',
                'rating' => 4
            ],
            [
                'nama' => 'Mike Johnson',
                'gambar_profil' => 'profile3.jpg',
                'detail_review' => 'Lingkungan yang kondusif untuk belajar. Staff sangat membantu.',
                'rating' => 5
            ]
        ];

        foreach ($reviews as $review) {
            WebsiteReview::create($review);
        }
        // Seed Website Galeri
        $galeri = [
            // Images
            [
                'konten_gambar' => 'galeri/kamar-standard.jpg',
                'konten_video' => null,
                'video_url' => null,
                'video_type' => null
            ],
            [
                'konten_gambar' => 'galeri/ruang-belajar.jpg',
                'konten_video' => null,
                'video_url' => null,
                'video_type' => null
            ],
            [
                'konten_gambar' => 'galeri/kantin.jpg',
                'konten_video' => null,
                'video_url' => null,
                'video_type' => null
            ],
            // YouTube Videos
            [
                'konten_gambar' => null,
                'konten_video' => null,
                'video_url' => 'https://www.youtube.com/watch?v=example1',
                'video_type' => 'youtube'
            ],
            [
                'konten_gambar' => null,
                'konten_video' => null,
                'video_url' => 'https://www.youtube.com/watch?v=example2',
                'video_type' => 'youtube'
            ],
            // Uploaded Video
            [
                'konten_gambar' => null,
                'konten_video' => 'galeri/video/tour-asrama.mp4',
                'video_url' => null,
                'video_type' => 'upload'
            ]
        ];

        foreach ($galeri as $item) {
            WebsiteGaleri::create($item);
        }

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
