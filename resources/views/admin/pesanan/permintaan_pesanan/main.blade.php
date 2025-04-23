<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pesanan Management - BCamp Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('/admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
                    <li><hr class="dropdown-divider" /></li>
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
                    <h1 class="mt-4">Daftar Pesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pesanan</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Pesanan
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengguna</th>
                                        <th>Type Kamar</th>
                                        <th>Status Pesanan</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Durasi Pesanan</th>
                                        <th>Total Harga</th> <!-- Added new column -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pesanans as $index => $pesanan)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $pesanan->nama_pengguna }}</td>
                                        <td>{{ $pesanan->tipe_kamar }}</td>
                                        <td>
                                            <span class="badge bg-{{ $pesanan->status_pesanan == 'Disetujui' ? 'success' : ($pesanan->status_pesanan == 'Ditolak' ? 'danger' : 'warning') }}">
                                                {{ $pesanan->status_pesanan }}
                                            </span>
                                        </td>
                                        <td>{{ $pesanan->keterangan }}</td>
                                        <td>{{ date('d/m/Y', strtotime($pesanan->tanggal_pesanan)) }}</td>
                                        <td>{{ $pesanan->durasi_pesanan }}</td>
                                        <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td> <!-- Added new column with formatted price -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/admin/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
</body>
</html>