<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Website Management - BCamp Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('/admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .modal .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .preview-image {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <!-- Top Navigation -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">Selamat Datang !</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>
        <!-- Profile Navigation -->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown d-flex align-items-center">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    <span class="online-status"></span>
                    <span class="text-light ms-2">Admin BCamp</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Log Aktivitas</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ url('/login') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <!-- Side Navigation -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Statistik</div>
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Manajemen Antarmuka</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseInterface" aria-expanded="false" aria-controls="collapseInterface">
                            <div class="sb-nav-link-icon"><i class="fas fa-desktop"></i></div>
                            Konten
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseInterface" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('admin.konten.website') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                                    Website BCamp
                                </a>
                                <a class="nav-link" href="{{ route('admin.konten.aplikasi') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-mobile-alt"></i></div>
                                    Aplikasi BCamp
                                </a>
                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">Transaksi</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseTransaction" aria-expanded="false"
                            aria-controls="collapseTransaction">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Pesanan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseTransaction" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('admin.pesanan.main') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                                    Permintaan Pesanan
                                </a>
                                <a class="nav-link" href="{{ route('admin.pesanan.history') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                                    Riwayat Pesanan
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Website Management</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ url('adminn') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Website Content</li>
                    </ol>

                    <!-- First Row - 3 Cards -->
                    <div class="row mb-4">
                        <!-- Beranda Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card text-white h-100 shadow" style="background-color: #148BD499">
                                <div class="card-body py-4">
                                    <h4 class="card-title mb-0">Kelola Beranda</h4>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" 
                                        data-bs-target="#berandaModal">Edit Konten</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Galeri Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card text-white h-100 shadow" style="background-color: #08791999">
                                <div class="card-body py-4">
                                    <h4 class="card-title mb-0">Kelola Konten Galeri</h4>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" 
                                        data-bs-target="#galeriModal">Edit Konten</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Fasilitas Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card text-white h-100 shadow" style="background-color: #FCB40499">
                                <div class="card-body py-4">
                                    <h4 class="card-title mb-0">Kelola Konten Fasilitas</h4>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" 
                                        data-bs-target="#fasilitasModal">Edit Konten</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Row - 2 Cards -->
                    <div class="row justify-content-center">
                        <!-- Booking Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card text-white h-100 shadow" style="background-color: #A3D9D9">
                                <div class="card-body py-4">
                                    <h4 class="card-title mb-0">Kelola Booking</h4>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" 
                                        data-bs-target="#bookingModal">Edit Konten</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card text-white h-100 shadow" style="background-color: #7B9669">
                                <div class="card-body py-4">
                                    <h4 class="card-title mb-0">Kelola Footer</h4>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" 
                                        data-bs-target="#footerModal">Edit Konten</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Brilliant English Course X POLITEKNIK NEGERI JEMBER
                            2025</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('/admin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/admin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('/admin/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>

    <!-- Beranda Modal -->
    <div class="modal fade" id="berandaModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola Konten Beranda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.konten.website.beranda.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul Hero</label>
                            <input type="text" class="form-control" name="hero_title" 
                                value="{{ $beranda->hero_title ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subtitle Hero</label>
                            <input type="text" class="form-control" name="hero_subtitle" 
                                value="{{ $beranda->hero_subtitle ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero Button Text</label>
                            <input type="text" class="form-control" name="hero_button_text" 
                                value="{{ $beranda->hero_button_text ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero Subtext</label>
                            <input type="text" class="form-control" name="hero_subtext" 
                                value="{{ $beranda->hero_subtext ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero Image (Max 20MB)</label>
                            <input type="file" class="form-control @error('hero_image') is-invalid @enderror" 
                                   name="hero_image" 
                                   accept="image/*" 
                                   onchange="previewImage(this, 'heroPreview')">
                            <small class="text-muted">Format yang didukung: JPG, JPEG, PNG, GIF (Maksimal 20MB)</small>
                            @error('hero_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(isset($beranda->hero_image))
                                <img id="heroPreview" src="{{ asset('storage/' . $beranda->hero_image) }}" 
                                     class="preview-image">
                            @else
                                <img id="heroPreview" class="preview-image" style="display: none;">
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Galeri Modal -->
    <div class="modal fade" id="galeriModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola Konten Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.konten.website.galeri.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul Galeri</label>
                            <input type="text" class="form-control" name="galeri_title" 
                                value="{{ $galeri->galeri_title ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Galeri</label>
                            <textarea class="form-control" name="galeri_description" rows="3">{{ $galeri->galeri_description ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Galeri (Max 20MB)</label>
                            <input type="file" class="form-control" name="galeri_images[]" 
                                   accept="image/*" multiple>
                            <small class="text-muted">Format yang didukung: JPG, JPEG, PNG, GIF (Maksimal 20MB per gambar)</small>
                        </div>
                        <div id="galeriPreview" class="row mt-3">
                            @if(isset($galeri->images) && is_array($galeri->images))
                                @foreach($galeri->images as $image)
                                    <div class="col-md-4 mb-3">
                                        <img src="{{ asset('storage/galeri/' . $image) }}" class="img-fluid">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Fasilitas Modal -->
    <div class="modal fade" id="fasilitasModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola Konten Fasilitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.konten.website.fasilitas.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul Fasilitas</label>
                            <input type="text" class="form-control" name="fasilitas_title" 
                                value="{{ $fasilitas->fasilitas_title ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Fasilitas</label>
                            <textarea class="form-control" name="fasilitas_description" rows="3">{{ $fasilitas->fasilitas_description ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Icon Fasilitas</label>
                            <input type="text" class="form-control" name="fasilitas_icon" 
                                value="{{ $fasilitas->fasilitas_icon ?? '' }}"
                                placeholder="Contoh: fas fa-wifi">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola Konten Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.konten.website.booking.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul Booking</label>
                            <input type="text" class="form-control" name="booking_title" 
                                value="{{ $booking->booking_title ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Booking</label>
                            <textarea class="form-control" name="booking_description" rows="3">{{ $booking->booking_description ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Aplikasi (Max 20MB)</label>
                            <input type="file" class="form-control" name="booking_image" 
                                   accept="image/*" onchange="previewImage(this, 'bookingPreview')">
                            @if(isset($booking->booking_image))
                                <img id="bookingPreview" src="{{ asset('storage/' . $booking->booking_image) }}" 
                                     class="preview-image">
                            @else
                                <img id="bookingPreview" class="preview-image" style="display: none;">
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Modal -->
    <div class="modal fade" id="footerModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola Konten Footer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.konten.website.footer.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="footer_address" rows="2">{{ $footer->footer_address ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="footer_email" 
                                value="{{ $footer->footer_email ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" name="footer_phone" 
                                value="{{ $footer->footer_phone ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Media Sosial</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" name="footer_facebook" 
                                        placeholder="Facebook URL" value="{{ $footer->footer_facebook ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-2" name="footer_instagram" 
                                        placeholder="Instagram URL" value="{{ $footer->footer_instagram ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Keep only the image preview JavaScript -->
    <script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    preview.style.display = 'block';
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Show success message if exists
@if(session('success'))
    alert('{{ session('success') }}');
@endif

// Show error message if exists
@if(session('error'))
    alert('{{ session('error') }}');
@endif
</script>
</body>

</html>