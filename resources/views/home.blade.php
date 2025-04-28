<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brilliant</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="{{ asset('/landing-page/css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</head>

<body>
    <section class="hero-section" id="Beranda">
        <div class="container">
            <div class="hero-content">
                <h1>
                    <span class="highlight">Booking Camp <br>Pilihan Kamu Di</span><br> <span
                        class="camp-name">Brilliant Camp</span>
                </h1>
                <button class="hero-button">Selengkapnya</button>
                <p class="hero-subtext">By Brilliant English Course</p>
            </div>
        </div>
        <!-- Wave Transisi -->
        <div class="custom-shape-divider-bottom-1713946800">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M985.66,83.29C906.27,105.61,822.82,123,739.52,123c-77.87,0-154.6-15.94-231.49-29.9C432.61,78.37,346.26,63.67,263.1,52.06,183.81,41.24,101.58,33.49,20,35.64V0H1200V27.35C1112.79,50.24,1044.06,60.68,985.66,83.29Z"
                    opacity=".25" class="shape-fill"></path>
                <path
                    d="M985.66,94.78C906.27,117.1,822.82,134.5,739.52,134.5c-77.87,0-154.6-15.94-231.49-29.9C432.61,89.86,346.26,75.16,263.1,63.55,183.81,52.73,101.58,44.98,20,47.13V0H1200V38.84C1112.79,61.73,1044.06,72.17,985.66,94.78Z"
                    opacity=".5" class="shape-fill"></path>
                <path
                    d="M985.66,105.6C906.27,127.92,822.82,145.31,739.52,145.31c-77.87,0-154.6-15.94-231.49-29.9C432.61,100.69,346.26,86,263.1,74.39,183.81,63.57,101.58,55.82,20,57.97V0H1200V50.66C1112.79,73.55,1044.06,84,985.66,105.6Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('/landing-page/assets/img/logos/logo.svg') }}" alt="Logo" width="250" height="50"
                    class="me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#Beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#galeri">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#fasilitas">Fasilitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#booking">Booking</a>
                        </li>
                        <a class="pesan-logo" href="#">
                            <img src="{{ asset('/landing-page/assets/img/pesan.png') }}" alt="Logo" width="50"
                                height="50">
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section class="galeri-section py-5 position-relative" style="background-color: white; z-index: 2;" id="galeri">
        <div class="container">
            <div class="row align-items-center">
                <!-- Teks -->
                <div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0 d-flex flex-column justify-content-center"
                    style="margin-top: -50px;">
                    <p class="text-uppercase fw-bold mb-2" style="color: #AE9518; font-size: 1.1rem; margin-top: 30px;">
                        KENANGAN BERSAMA B-CAMP MU!
                    </p>
                    <h2 class="fw-bold mb-3" style="font-size: 3.3rem; line-height: 1.2;">
                        <span style="color: #AE9518;">Galeri</span> <span style="color: #000;">B-Camp</span>
                    </h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <button class="btn-gold">Lihat Lebih Banyak -></button>
                    </div>

                </div>
                <!-- Gambar -->
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="d-flex gap-3">
                        <!-- Gambar besar -->
                        <div class="rounded-4 overflow-hidden"
                            style="width: 330px; height: 525px; margin-left: -30px; margin-top: 50px;">
                            <iframe src="https://www.youtube.com/embed/zSSrQvpY9ow?rel=0&autoplay=0&showinfo=0"
                                title="YouTube video" width="100%" height="100%" style="border:0;" allowfullscreen
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                            </iframe>
                        </div>
                        <!-- Dua gambar kecil -->
                        <div class="d-flex flex-column gap-3">
                            <img src="{{ asset('/landing-page/assets/img/G1.png') }}" class="img-fluid rounded-4"
                                style="width: 180px; margin-top: 50px; margin-left: 20px;">
                            <img src="{{ asset('/landing-page/assets/img/G2.png') }}" class="img-fluid rounded-4"
                                style="width: 180px; margin-top: 15px; margin-left: 20px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="fasilitas-section" id="fasilitas">
        <div class="container text-center">
            <div style="text-align: center;">
                <h2
                    style="font-family: 'Montserrat', sans-serif; font-weight: 800; color: #4E6C50; font-size: 2.5rem; margin-bottom: 10px;">
                    Fasilitas
                </h2>
                <p
                    style="font-family: 'Montserrat', sans-serif; font-weight: 500; color: #000000; font-size: 1.1rem; margin: 0;">
                    Jelajahi Asrama dan Fasilitas lainnya di B-Camp!
                </p>
            </div>

            <div class="cards">
                <div class="card">
                    <img src="{{ asset('/landing-page/assets/img/logos/C2.png') }}" alt="Logo VIP" class="card-logo">
                    <h3>Reguler</h3>
                    <div class="image-container">
                        <img src="{{ asset('/landing-page/assets/img/F1.png') }}" alt="Reguler">
                        <button class="detail-button" onclick="openPopup('Reguler')">Detail</button>
                    </div>
                </div>

                <div class="card">
                    <img src="{{ asset('/landing-page/assets/img/logos/C1.png') }}" alt="Logo VIP" class="card-logo">
                    <h3>VIP</h3>
                    <div class="image-container">
                        <img src="{{ asset('/landing-page/assets/img/F1.png') }}" alt="VIP">
                        <button class="detail-button" onclick="openPopup('VIP')">Detail</button>
                    </div>
                </div>

                <div class="card">
                    <img src="{{ asset('/landing-page/assets/img/logos/C3.png') }}" alt="Logo VIP" class="card-logo">
                    <h3>Homestay</h3>
                    <div class="image-container">
                        <img src="{{ asset('/landing-page/assets/img/F1.png') }}" alt="Homestay">
                        <button class="detail-button" onclick="openPopup('Homestay')">Detail</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popup -->
        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <h2 id="popup-title"></h2>
                <p>Isi detail tentang camp akan ditampilkan di sini.</p>
            </div>
        </div>
    </section>
    <section class="booking-section" id="booking">
        <div class="text-center w-100 position-relative">
            <img src="{{ asset('/landing-page/assets/img/logos/hp.png') }}" class="img-fluid custom-hp-img" alt="Atas">
        </div>
        <div class="booking-text">
            <h2 class="text-booking">
                Booking Camp pilihanmu <br> sekarang juga!
            </h2>
            <p class="text-booking-desc">
                Nikmati pengalaman belajar Bahasa Inggris yang menyenangkan dan nyaman di B-Camp. Dengan fasilitas
                lengkap dan suasana yang mendukung, kamu bisa belajar sambil bersantai. Booking sekarang dan rasakan
                perbedaannya!
            </p>
            <div class="booking-button-wrapper">
                <a href="/download" class="btn-download">Download Sekarang</a>
            </div>

        </div>
    </section>
    <section class="ulasan-section">
        <div class="container text-center">
            <h2 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 2rem; margin-top: -350px;">
                <span style="color: #AE9518;">Gimana sih B-Camp</span><span style="color: #000000;"> menurut
                    mereka?</span>
            </h2>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('scroll', function () {
        const logo = document.querySelector('.pesan-logo');
        if (window.scrollY > 50) {
            logo.classList.add('scrolled');
        } else {
            logo.classList.remove('scrolled');
        }
    });
</script>
<script>
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });
</script>
<script>
    function openPopup(campName) {
        document.getElementById('popup').style.display = 'block';
        document.getElementById('popup-title').innerText = campName;
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }

</script>

</html>