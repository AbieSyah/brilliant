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
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#eventListModal">
                                        Lihat Data
                                    </a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Fasilitas Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card text-white h-100 shadow" style="background-color: #DC580599">
                                <div class="card-body py-4">
                                    <h4 class="card-title mb-0">Kelola Kamar</h4>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between py-3">
                                    <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#kamarListModal">
                                        Lihat Data
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
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="3">{{ $beranda->description ?? '' }}</textarea>
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
                    <!-- Update the form tag -->
                    <form id="eventForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.konten.aplikasi.event.store') }}">
                        @csrf
                        <input type="hidden" name="_method" id="eventMethod" value="POST">
                        <input type="hidden" name="event_id" id="event_id" value="">
                        <div class="mb-3">
                            <label class="form-label">Nama Event</label>
                            <input type="text" class="form-control" name="nama_event" id="edit_nama_event">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="datetime-local" class="form-control" name="tanggal_mulai" id="edit_tanggal_mulai">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="datetime-local" class="form-control" name="tanggal_selesai" id="edit_tanggal_selesai">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" id="edit_lokasi">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status" id="edit_status">
                                <option value="upcoming">Upcoming</option>
                                <option value="ongoing">Ongoing</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Event (Max 20MB)</label>
                            <input type="file" class="form-control" name="gambar" accept="image/*" onchange="previewImage(this, 'eventPreview')">
                            <img id="eventPreview" src="" class="preview-image" style="display: none;">
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
                    <h5 class="modal-title">Kelola Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="fasilitasForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="fasilitasMethod" value="POST">
                        <input type="hidden" name="fasilitas_id" id="fasilitas_id" value="">
                        
                        <div class="mb-3">
                            <label class="form-label">Nama Kamar</label>
                            <input type="text" class="form-control" name="nama_kamar" id="edit_nama_kamar" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-control" name="gender" id="edit_gender" required>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                                <option value="campur">Campur</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" id="edit_harga" min="0" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar (Max 20MB)</label>
                            <input type="file" class="form-control" name="gambar" accept="image/*" onchange="previewImage(this, 'fasilitasPreview')">
                            <img id="fasilitasPreview" src="" class="preview-image" style="display: none;">
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

    <!-- Event List Modal -->
    <div class="modal fade" id="eventListModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal" onclick="createEvent()">
                            <i class="fas fa-plus"></i> Tambah Event
                        </button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $index => $event)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $event->nama_event }}</td>
                                <td>{{ $event->tanggal_mulai }}</td>
                                <td>{{ $event->tanggal_selesai }}</td>
                                <td>{{ ucfirst($event->status) }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" onclick="editEventData({{ $event->id }})" data-id="{{ $event->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteEventData({{ $event->id }})">
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

    <!-- Kamar List Modal -->
    <div class="modal fade" id="kamarListModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fasilitasModal" onclick="createKamar()">
                            <i class="fas fa-plus"></i> Tambah Kamar
                        </button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kamar</th>
                                <th>Deskripsi</th>
                                <th>Gender</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fasilitas as $kamar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kamar->nama_kamar }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($kamar->deskripsi, 100) }}</td>
                                <td>{{ ucfirst($kamar->gender) }}</td>
                                <td>Rp {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" onclick="editKamarData({{ $kamar->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteKamarData({{ $kamar->id }})">
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

    <!-- Replace all script tags at the bottom of the file with this single unified script section -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('/admin/js/scripts.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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

        function showAlert(message, type = 'success') {
            alert(message); // You can replace this with a better alert library
        }

        function handleAjaxError(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                let errorMessage = 'Terdapat beberapa kesalahan:\n';
                Object.keys(errors).forEach(key => {
                    errorMessage += `- ${errors[key][0]}\n`;
                });
                showAlert(errorMessage, 'error');
            } else if (xhr.status === 404) {
                showAlert('Data tidak ditemukan', 'error');
            } else {
                showAlert(xhr.responseJSON?.message || 'Terjadi kesalahan pada server', 'error');
            }
        }

        // Event functions
        function createEvent() {
            $('#eventListModal').modal('hide');
            $('#eventForm').attr('action', "{{ route('admin.konten.aplikasi.event.store') }}");
            $('#eventMethod').val('POST');
            $('#event_id').val('');
            $('#eventForm')[0].reset();
            $('#eventPreview').attr('src', '').hide();
            setTimeout(() => {
                $('#eventModal').modal('show');
            }, 500);
        }

        function editEventData(id) {
            $('#eventListModal').modal('hide');
            $.get(`{{ url('admin/konten/aplikasi/event') }}/${id}/edit`, function(event) {
                $('#eventForm').attr('action', `{{ url('admin/konten/aplikasi/event') }}/${id}`);
                $('#eventMethod').val('PUT');
                $('#event_id').val(id);
                $('#edit_nama_event').val(event.nama_event);
                $('#edit_deskripsi').val(event.deskripsi);
                $('#edit_tanggal_mulai').val(event.tanggal_mulai);
                $('#edit_tanggal_selesai').val(event.tanggal_selesai);
                $('#edit_lokasi').val(event.lokasi);
                $('#edit_status').val(event.status);
                if (event.gambar) {
                    $('#eventPreview').attr('src', '/storage/' + event.gambar).show();
                }
                setTimeout(() => {
                    $('#eventModal').modal('show');
                }, 500);
            });
        }

        function deleteEventData(id) {
            if(confirm('Apakah Anda yakin ingin menghapus event ini?')) {
                $.ajax({
                    url: `{{ url('admin/konten/aplikasi/event') }}/${id}`,
                    type: 'DELETE',
                    data: { "_token": "{{ csrf_token() }}" },
                    success: function(response) {
                        showAlert(response.message || 'Event berhasil dihapus');
                        location.reload();
                    },
                    error: function(xhr) {
                        handleAjaxError(xhr);
                    }
                });
            }
        }

        // Initialize event handlers
        $(document).ready(function() {
            $('#eventForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                if ($('#eventMethod').val() === 'PUT') {
                    formData.append('_method', 'PUT');
                }

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        showAlert(response.message || 'Data berhasil disimpan');
                        $('#eventModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr) {
                        handleAjaxError(xhr);
                    }
                });
            });
        });

        @if(session('success'))
            showAlert('{{ session('success') }}');
        @endif

        @if(session('error'))
            showAlert('{{ session('error') }}', 'error');
        @endif

        // Kamar functions
        function createKamar() {
            $('#kamarListModal').modal('hide');
            $('#fasilitasForm').attr('action', "{{ route('admin.konten.aplikasi.fasilitas.store') }}");
            $('#fasilitasMethod').val('POST');
            $('#fasilitas_id').val('');
            $('#fasilitasForm')[0].reset();
            $('#fasilitasPreview').attr('src', '').hide();
            setTimeout(() => {
                $('#fasilitasModal').modal('show');
            }, 500);
        }

        function editKamarData(id) {
            $('#kamarListModal').modal('hide');
            $.get(`{{ url('admin/konten/aplikasi/fasilitas') }}/${id}/edit`, function(kamar) {
                $('#fasilitasForm').attr('action', `{{ url('admin/konten/aplikasi/fasilitas') }}/${id}`);
                $('#fasilitasMethod').val('PUT');
                $('#fasilitas_id').val(id);
                
                // Make sure IDs match your form fields
                $('#edit_nama_kamar').val(kamar.nama_kamar);
                $('#edit_deskripsi').val(kamar.deskripsi); // Make sure this ID matches your textarea
                $('#edit_gender').val(kamar.gender);
                $('#edit_harga').val(kamar.harga);
                
                if (kamar.gambar) {
                    $('#fasilitasPreview').attr('src', '/storage/' + kamar.gambar).show();
                }
                
                setTimeout(() => {
                    $('#fasilitasModal').modal('show');
                }, 500);
            });
        }

        // Initialize fasilitas form handling
        $(document).ready(function() {
            $('#fasilitasForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                if ($('#fasilitasMethod').val() === 'PUT') {
                    formData.append('_method', 'PUT');
                }

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        showAlert(response.message || 'Data berhasil disimpan');
                        $('#fasilitasModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr) {
                        handleAjaxError(xhr);
                    }
                });
            });
        });
    </script>
</body>

</html>