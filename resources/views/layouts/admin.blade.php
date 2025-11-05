<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Admin Panel</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.3/css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom Style -->
    <style>
        .sidebar {
            background-color: #d9f2d9 !important; 
        }

        .sidebar .nav-item .nav-link {
            color: #236426 !important;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar .nav-item .nav-link i {
            color: #236426 !important;
        }

        /* Hover dan aktif */
        .sidebar .nav-item .nav-link:hover {
            background-color: rgba(102, 187, 106, 0.2);
            color: #042907 !important;
        }

        .sidebar .nav-item.active .nav-link {
            font-weight: bold;
            background-color: rgba(102, 187, 106, 0.3);
            color: #042907 !important;
        }

        /* Tombol CTA hijau */
        .btn-cta {
            background-color: #66bb6a;
            color: #fff;
            font-weight: 600;
            border-radius: 10px;
            border: none;
            transition: 0.2s;
        }

        .btn-cta:hover {
            background-color: #57a35b;
            color: #fff;
        }

        footer {
            font-size: 14px;
        }

         #sidebarToggle {
            background-color: #4db554 !important; /* ijo tua */
            color: white;
            transition: 0.3s;
        }

        #sidebarToggle:hover {
            background-color: #459d4b !important; /* lebih tua sedikit waktu hover */
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion shadow-sm" id="accordionSidebar">

            <!-- Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center py-3" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-hospital-user" style="color:#436445;"></i>
                </div>
                <div class="sidebar-brand-text mx-2" style="color:#436445;">Sistem Admin</div>
            </a>

            <hr class="sidebar-divider my-0">

            <!-- Nav Items -->
            <li class="nav-item {{ request()->is('rumahsakit*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('rumahsakit.index') }}">
                    <i class="fas fa-hospital"></i>
                    <span>Rumah Sakit</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('pasien*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pasien.index') }}">
                    <i class="fas fa-user-injured"></i>
                    <span>Pasien</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Sidebar Toggle -->
            <div class="text-center d-none d-md-inline mt-3">
                <button class="rounded-circle border-0 shadow-sm" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column bg-light">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h6 class="m-0 font-weight-bold text-dark">@yield('title')</h6>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ Auth::user()->name ?? Auth::user()->username }}
                                </span>
                                <i class="fas fa-user-circle text-success"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End Topbar -->

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white shadow-sm">
                <div class="container my-auto py-2 text-center text-muted small">
                    &copy; {{ date('Y') }} Mochi BTS Admin Panel — All rights reserved.
                </div>
            </footer>
        </div>
    </div>

    <!-- Scroll to Top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.3/js/sb-admin-2.min.js"></script>
    
</body>
</html>
