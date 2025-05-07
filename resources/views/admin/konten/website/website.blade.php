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

                    <!-- First Row - 2 Cards -->
                    <div class="row mb-4">
                        <!-- Beranda Card -->
                        <div class="col-xl-6 col-md-6">
                            <div class="card text-white shadow h-100" style="background-color: #148BD499">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h4 class="card-title mb-1">Kelola Beranda</h4>
                                            <p class="small mb-0">Atur konten halaman utama website</p>
                                        </div>
                                        <div class="card-icon">
                                            <i class="fas fa-home fa-2x text-white-50"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#berandaModal">Edit Konten</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Galeri Card -->
                        <div class="col-xl-6 col-md-6">
                            <div class="card text-white shadow h-100" style="background-color: #08791999">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h4 class="card-title mb-1">Kelola Galeri</h4>
                                            <p class="small mb-0">Kelola gambar dan video website</p>
                                        </div>
                                        <div class="card-icon">
                                            <i class="fas fa-images fa-2x text-white-50"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#galeriModal">Edit Konten</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Row - 2 Cards -->
                    <div class="row mb-4">
                        <!-- Fasilitas Card -->
                        <div class="col-xl-6 col-md-6">
                            <div class="card text-white shadow h-100" style="background-color: #FCB40499">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h4 class="card-title mb-1">Kelola Fasilitas</h4>
                                            <p class="small mb-0">Atur informasi fasilitas asrama</p>
                                        </div>
                                        <div class="card-icon">
                                            <i class="fas fa-building fa-2x text-white-50"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#fasilitasModal">Edit Konten</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Review Card -->
                        <div class="col-xl-6 col-md-6">
                            <div class="card text-white shadow h-100" style="background-color: #7B9669">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h4 class="card-title mb-1">Kelola Review</h4>
                                            <p class="small mb-0">Atur ulasan dan testimoni</p>
                                        </div>
                                        <div class="card-icon">
                                            <i class="fas fa-star fa-2x text-white-50"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#reviewModal">Lihat Data</a>
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

    <!-- Sebelum Bootstrap script, tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Scripts yang sudah ada -->
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
                            <label class="form-label">Teks Utama</label>
                            <input type="text" class="form-control" name="teks_utama" 
                                value="{{ $beranda->teks_utama ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konten Gambar (Max 20MB)</label>
                            <input type="file" class="form-control @error('konten_gambar') is-invalid @enderror" 
                                   name="konten_gambar" 
                                   accept="image/*" 
                                   onchange="previewImage(this, 'heroPreview')">
                            <small class="text-muted">Format yang didukung: JPG, JPEG, PNG, GIF (Maksimal 20MB)</small>
                            @error('konten_gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(isset($beranda->konten_gambar))
                                <img id="heroPreview" src="{{ asset('storage/' . $beranda->konten_gambar) }}" 
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Image Gallery -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0">Galeri Gambar</h6>
                            <button class="btn btn-primary" onclick="showUploadImageModal()">
                                <i class="fas fa-plus"></i> Tambah Gambar
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Preview</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($galeri->where('konten_gambar', '!=', null) as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/'.$item->konten_gambar) }}" alt="Gallery Image" style="max-width: 100px;">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteGaleriItem({{ $item->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Video Gallery -->
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-3">x
                            <h6 class="mb-0">Galeri Video</h6>
                            <button class="btn btn-primary" onclick="showUploadVideoModal()">
                                <i class="fas fa-plus"></i> Tambah Video
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Preview</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($galeri->where('konten_video', '!=', null) as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($item->video_type == 'youtube')
                                                <iframe width="150" height="100"
                                                        src="https://www.youtube.com/embed/{{ getYoutubeId($item->video_url) }}"
                                                        frameborder="0" allowfullscreen>
                                                </iframe>
                                            @elseif($item->video_type == 'other')
                                                <a href="{{ $item->video_url }}" target="_blank" class="btn btn-sm btn-info">
                                                    <i class="fas fa-play"></i> Play Video
                                                </a>
                                            @else
                                                <video width="150" controls>
                                                    <source src="{{ asset('storage/'.$item->konten_video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteGaleriItem({{ $item->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Image Modal -->
    <div class="modal fade" id="uploadImageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadImageForm" action="{{ route('admin.konten.website.galeri.store.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Pilih Gambar</label>
                            <input type="file" class="form-control" name="konten_gambar" accept="image/*" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Video Modal -->
    <div class="modal fade" id="uploadVideoModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#uploadTab">Upload Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#urlTab">Video URL</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Upload Video Tab -->
                        <div class="tab-pane fade show active" id="uploadTab">
                            <form id="uploadVideoForm" action="{{ route('admin.konten.website.galeri.store.video') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Pilih Video</label>
                                    <input type="file" class="form-control" name="konten_video" accept="video/*" required>
                                    <small class="text-muted">Max size: 100MB</small>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                        <!-- Video URL Tab -->
                        <div class="tab-pane fade" id="urlTab">
                            <form id="videoUrlForm" action="{{ route('admin.konten.website.galeri.store.video.url') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Tipe Video</label>
                                    <select class="form-select" name="video_type" required>
                                        <option value="youtube">YouTube</option>
                                        <option value="other">Platform Lain</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">URL Video</label>
                                    <input type="url" class="form-control" name="video_url" required 
                                           placeholder="https://www.youtube.com/watch?v=...">
                                    <small class="text-muted">Masukkan URL video dari YouTube atau platform lain</small>
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
        </div>
    </div>

    <!-- Review List Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-primary" onclick="showCreateReviewModal()">
                            <i class="fas fa-plus"></i> Tambah Review
                        </button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Gambar Profil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $review)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $review->nama }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($review->detail_review, 100) }}</td>
                                <td>{{ $review->rating }}/5</td>
                                <td>
                                    @if($review->gambar_profil)
                                        <img src="{{ asset('storage/'.$review->gambar_profil) }}" alt="Profile" style="max-width: 50px;">
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" onclick="showEditReviewModal({{ $review->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteReview({{ $review->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Review Modal -->
    <div class="modal fade" id="createReviewModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createReviewForm" action="{{ route('admin.konten.website.review.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Detail Review</label>
                            <textarea class="form-control" name="detail_review" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rating (1-5)</label>
                            <input type="number" class="form-control" name="rating" min="1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Profil</label>
                            <input type="file" class="form-control" name="gambar_profil" accept="image/*" onchange="previewImage(this, 'createProfilePreview')">
                            <img id="createProfilePreview" class="mt-2" style="max-width: 200px; display: none;">
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

    <!-- Edit Review Modal -->
    <div class="modal fade" id="editReviewModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editReviewForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_review_id">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="edit_nama" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Detail Review</label>
                            <textarea class="form-control" name="detail_review" id="edit_detail_review" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rating (1-5)</label>
                            <input type="number" class="form-control" name="rating" id="edit_rating" min="1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Profil</label>
                            <input type="file" class="form-control" name="gambar_profil" accept="image/*" onchange="previewImage(this, 'editProfilePreview')">
                            <img id="editProfilePreview" class="mt-2" style="max-width: 200px;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Fasilitas List Modal -->
    <div class="modal fade" id="fasilitasModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Fasilitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-primary" onclick="showCreateFasilitasModal()">
                            <i class="fas fa-plus"></i> Tambah Fasilitas
                        </button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Fasilitas</th>
                                <th>Deskripsi</th>
                                <th>Gambar Singkat</th>
                                <th>Gambar Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fasilitas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_fasilitas }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($item->deskripsi_detail, 100) }}</td>
                                <td>
                                    @if($item->gambar_singkat)
                                        <img src="{{ asset('storage/'.$item->gambar_singkat) }}" alt="Singkat" style="max-width: 50px;">
                                    @endif
                                </td>
                                <td>
                                    @if($item->gambar_detail)
                                        <img src="{{ asset('storage/'.$item->gambar_detail) }}" alt="Detail" style="max-width: 50px;">
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" onclick="showEditFasilitasModal({{ $item->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteFasilitas({{ $item->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Fasilitas Modal -->
    <div class="modal fade" id="createFasilitasModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Fasilitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createFasilitasForm" action="{{ route('admin.konten.website.fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Fasilitas</label>
                            <input type="text" class="form-control" name="nama_fasilitas" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Detail</label>
                            <textarea class="form-control" name="deskripsi_detail" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Singkat</label>
                            <input type="file" class="form-control" name="gambar_singkat" accept="image/*" onchange="previewImage(this, 'createSingkatPreview')">
                            <img id="createSingkatPreview" class="mt-2" style="max-width: 200px; display: none;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Detail</label>
                            <input type="file" class="form-control" name="gambar_detail" accept="image/*" onchange="previewImage(this, 'createDetailPreview')">
                            <img id="createDetailPreview" class="mt-2" style="max-width: 200px; display: none;">
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

    <!-- Edit Fasilitas Modal -->
    <div class="modal fade" id="editFasilitasModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Fasilitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editFasilitasForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_fasilitas_id">
                        <div class="mb-3">
                            <label class="form-label">Nama Fasilitas</label>
                            <input type="text" class="form-control" name="nama_fasilitas" id="edit_nama_fasilitas" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Detail</label>
                            <textarea class="form-control" name="deskripsi_detail" id="edit_deskripsi_detail" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Singkat</label>
                            <input type="file" class="form-control" name="gambar_singkat" accept="image/*" onchange="previewImage(this, 'editSingkatPreview')">
                            <img id="editSingkatPreview" class="mt-2" style="max-width: 200px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Detail</label>
                            <input type="file" class="form-control" name="gambar_detail" accept="image/*" onchange="previewImage(this, 'editDetailPreview')">
                            <img id="editDetailPreview" class="mt-2" style="max-width: 200px;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Update</button>
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

function showCreateReviewModal() {
    $('#reviewModal').modal('hide');
    setTimeout(() => {
        $('#createReviewForm')[0].reset();
        $('#createProfilePreview').hide();
        $('#createReviewModal').modal('show');
    }, 500);
}

function showEditReviewModal(id) {
    $('#reviewModal').modal('hide');
    $.ajax({
        url: `/admin/konten/website/review/${id}/edit`,
        method: 'GET',
        success: function(review) {
            $('#edit_review_id').val(id);
            $('#edit_nama').val(review.nama);
            $('#edit_detail_review').val(review.detail_review);
            $('#edit_rating').val(review.rating);
            if (review.gambar_profil) {
                $('#editProfilePreview').attr('src', '/storage/' + review.gambar_profil).show();
            } else {
                $('#editProfilePreview').hide();
            }
            $('#editReviewForm').attr('action', `/admin/konten/website/review/${id}`);
            setTimeout(() => {
                $('#editReviewModal').modal('show');
            }, 500);
        },
        error: function() {
            alert('Gagal mengambil data review');
        }
    });
}

$(document).ready(function() {
    // Create Review Form Submit
    $('#createReviewForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#createReviewModal').modal('hide');
                alert(response.message);
                location.reload();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });

    // Edit Review Form Submit
    $('#editReviewForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_method', 'PUT');
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editReviewModal').modal('hide');
                alert(response.message);
                location.reload();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });
});

function deleteReview(id) {
    if(confirm('Apakah Anda yakin ingin menghapus review ini?')) {
        $.ajax({
            url: `{{ url('admin/konten/website/review') }}/${id}`,
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(response) {
                alert(response.message);
                location.reload();
            },
            error: function(xhr) {
                alert('Terjadi kesalahan!');
            }
        });
    }
}

function showCreateFasilitasModal() {
    $('#fasilitasModal').modal('hide');
    setTimeout(() => {
        $('#createFasilitasForm')[0].reset();
        $('#createSingkatPreview').hide();
        $('#createDetailPreview').hide();
        $('#createFasilitasModal').modal('show');
    }, 500);
}

function showEditFasilitasModal(id) {
    $('#fasilitasModal').modal('hide');
    $.ajax({
        url: `/admin/konten/website/fasilitas/${id}/edit`,
        method: 'GET',
        success: function(fasilitas) {
            $('#edit_fasilitas_id').val(id);
            $('#edit_nama_fasilitas').val(fasilitas.nama_fasilitas);
            $('#edit_deskripsi_detail').val(fasilitas.deskripsi_detail);
            if (fasilitas.gambar_singkat) {
                $('#editSingkatPreview').attr('src', '/storage/' + fasilitas.gambar_singkat).show();
            }
            if (fasilitas.gambar_detail) {
                $('#editDetailPreview').attr('src', '/storage/' + fasilitas.gambar_detail).show();
            }
            $('#editFasilitasForm').attr('action', `/admin/konten/website/fasilitas/update`); // Changed this line
            setTimeout(() => {
                $('#editFasilitasModal').modal('show');
            }, 500);
        },
        error: function() {
            alert('Gagal mengambil data fasilitas');
        }
    });
}

function deleteFasilitas(id) {
    if(confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')) {
        $.ajax({
            url: `/admin/konten/website/fasilitas/${id}`,
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(response) {
                alert(response.message);
                location.reload();
            },
            error: function(xhr) {
                alert('Terjadi kesalahan!');
            }
        });
    }
}

$(document).ready(function() {
    // Create Fasilitas Form Submit
    $('#createFasilitasForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#createFasilitasModal').modal('hide');
                alert(response.message);
                location.reload();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });

    // Edit Fasilitas Form Submit
    $('#editFasilitasForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_method', 'PUT');
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editFasilitasModal').modal('hide');
                alert(response.message);
                location.reload();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });
});

function showUploadImageModal() {
    $('#galeriModal').modal('hide');
    setTimeout(() => {
        $('#uploadImageModal').modal('show');
    }, 500);
}

function showUploadVideoModal() {
    $('#galeriModal').modal('hide');
    setTimeout(() => {
        $('#uploadVideoModal').modal('show');
    }, 500);
}

function deleteGaleriItem(id) {
    if(confirm('Apakah Anda yakin ingin menghapus item ini?')) {
        $.ajax({
            url: `/admin/konten/website/galeri/${id}`,
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(response) {
                alert(response.message);
                location.reload();
            },
            error: function(xhr) {
                alert('Terjadi kesalahan!');
            }
        });
    }
}

$(document).ready(function() {
    $('#uploadImageForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#uploadImageModal').modal('hide');
                alert(response.message);
                location.reload();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });

    $('#uploadVideoForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#uploadVideoModal').modal('hide');
                alert(response.message);
                location.reload();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });

    $('#videoUrlForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#uploadVideoModal').modal('hide');
                alert(response.message);
                location.reload();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });
});
</script>
</body>
</html>