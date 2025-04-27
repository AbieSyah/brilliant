<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Table CRUD</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Favicons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('/admin/css/styles.css') }}" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ url('/adminn') }}">Admin B IIN</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ url('/login') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">

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
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>

        </div>

        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid px-4">
                    <h1 class="mt-4">Employee data</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="adminn">Dashboard</a></li>
                        <li class="breadcrumb-item active">Employee data</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                            <a href="{{ route('datatable.create') }}" class="btn btn-success btn-sm float-end">Create Data</a>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead> 
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Age</th>
                                        <th>Office</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Start Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($datatable as $crud)
                                        <tr>
                                            <td>{{ $crud->name }}</td>
                                            <td>{{ $crud->position }}</td>
                                            <td>{{ $crud->age }}</td>
                                            <td>{{ $crud->office }}</td>
                                            <td>{{ $crud->jenis_kelamin }}</td>
                                            <td>{{ $crud->start_date }}</td>
                                            <td>
                                                <a href="{{ route('datatable.edit', $crud->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form id="delete-form-{{ $crud->id }}" 
                                                        action="{{ route('datatable.destroy', $crud->id) }}" 
                                                        method="POST" 
                                                        style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" 
                                                        class="btn btn-danger btn-sm" 
                                                        onclick="confirmDelete({{ $crud->id }})">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Brilliant English Course X POLITEKNIK NEGERI JEMBER 2025</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this data?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('/admin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/admin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('/admin/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>

</body>

</html>