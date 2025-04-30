<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Aplikasi Management - BCamp Admin</title>
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
                    <li><a class="dropdown-item" href="#!">Pengaturan</a></li>
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
        <!-- Side Navigation - Same as website.blade.php -->
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
                            data-bs-target="#collapseTransaction" aria-expanded="false" aria-controls="collapseTransaction">
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
                    <h1 class="mt-4">Aplikasi Management</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ url('adminn') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Aplikasi Content</li>
                    </ol>

                    <!-- Cards Section -->
                    <div class="row mb-4">
                        <!-- Beranda Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card text-white h-100 shadow" style="background-color: #527AA6">
                                <div class="card-body py-4">
                                    <h4 class="card-title mb-0">Kelola Beranda</h4>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#berandaModal">
                                        Edit Konten
                                    </a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Event Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card text-white h-100 shadow" style="background-color: #D4ACA2">
                                <div class="card-body py-4">
                                    <h4 class="card-title mb-0">Kelola Event</h4>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#eventModal">
                                        Edit Konten
                                    </a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Fasilitas Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card text-white h-100 shadow" style="background-color: #DC580599">
                                <div class="card-body py-4">
                                    <h4 class="card-title mb-0">Kelola Fasilitas</h4>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#fasilitasModal">
                                        Edit Konten
                                    </a>
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
                        <div class="text-muted">Copyright &copy; Brilliant English Course X POLITEKNIK NEGERI JEMBER 2025</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal Sections -->
    <!-- Beranda Modal -->
    <div class="modal fade" id="berandaModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola Konten Beranda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.konten.aplikasi.beranda.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="title" value="{{ $beranda->title ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="3">{{ $beranda->description ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Button Text</label>
                            <input type="text" class="form-control" name="button_text" value="{{ $beranda->button_text ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar (Max 20MB)</label>
                            <input type="file" class="form-control" name="image" accept="image/*" onchange="previewImage(this, 'berandaPreview')">
                            @if(isset($beranda->image))
                                <img id="berandaPreview" src="{{ asset('storage/' . $beranda->image) }}" class="preview-image">
                            @else
                                <img id="berandaPreview" class="preview-image" style="display: none;">
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

    <!-- Event Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.konten.aplikasi.event.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Event</label>
                            <input type="text" class="form-control" name="nama_event" value="{{ $event->nama_event ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="3">{{ $event->deskripsi ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="datetime-local" class="form-control" name="tanggal_mulai" value="{{ $event->tanggal_mulai ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="datetime-local" class="form-control" name="tanggal_selesai" value="{{ $event->tanggal_selesai ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" value="{{ $event->lokasi ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="upcoming" {{ ($event->status ?? '') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                <option value="ongoing" {{ ($event->status ?? '') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="completed" {{ ($event->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ ($event->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Event (Max 20MB)</label>
                            <input type="file" class="form-control" name="gambar" accept="image/*" onchange="previewImage(this, 'eventPreview')">
                            @if(isset($event->gambar))
                                <img id="eventPreview" src="{{ asset('storage/' . $event->gambar) }}" class="preview-image">
                            @else
                                <img id="eventPreview" class="preview-image" style="display: none;">
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
                    <h5 class="modal-title">Kelola Fasilitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.konten.aplikasi.fasilitas.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Fasilitas</label>
                            <input type="text" class="form-control" name="nama_fasilitas" value="{{ $fasilitas->nama_fasilitas ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="3">{{ $fasilitas->deskripsi ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Icon</label>
                            <input type="text" class="form-control" name="icon" value="{{ $fasilitas->icon ?? '' }}" placeholder="Contoh: fas fa-wifi">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar (Max 20MB)</label>
                            <input type="file" class="form-control" name="gambar" accept="image/*" onchange="previewImage(this, 'fasilitasPreview')">
                            @if(isset($fasilitas->gambar))
                                <img id="fasilitasPreview" src="{{ asset('storage/' . $fasilitas->gambar) }}" class="preview-image">
                            @else
                                <img id="fasilitasPreview" class="preview-image" style="display: none;">
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

    <!-- Scripts - Same as website.blade.php -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/admin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/admin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('/admin/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>

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

        @if(session('success'))
            alert('{{ session('success') }}');
        @endif

        @if(session('error'))
            alert('{{ session('error') }}');
        @endif
    </script>
</body>

</html>