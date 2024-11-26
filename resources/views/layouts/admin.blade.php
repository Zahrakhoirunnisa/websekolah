<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            padding: 0.75rem 1.5rem;
            height: 70px;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #0d6efd !important;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .navbar-brand img {
            height: 35px;
            width: auto;
        }

        /* Sidebar Styling */
        .sidebar {
            background: #ffffff;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.05);
            min-height: calc(100vh - 70px);
            padding: 1.5rem;
            position: fixed;
            top: 70px;
            width: inherit;
            max-width: inherit;
        }

        .nav-pills .nav-link {
            color: #6c757d;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .nav-pills .nav-link:hover {
            background-color: #f8f9fa;
            color: #0d6efd;
            transform: translateX(5px);
        }

        .nav-pills .nav-link.active {
            background-color: #0d6efd;
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(13, 110, 253, 0.2);
        }

        .nav-pills .nav-link i {
            font-size: 1.25rem;
        }

        /* Content Area */
        .content-wrapper {
            padding: 1.5rem;
            margin-top: 0;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            padding: 1.25rem 1.5rem;
            border-radius: 15px 15px 0 0 !important;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Buttons */
        .btn {
            padding: 0.5rem 1.25rem;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            box-shadow: 0 4px 10px rgba(13, 110, 253, 0.2);
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(13, 110, 253, 0.3);
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 10px;
            padding: 1rem 1.5rem;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                position: fixed;
                left: -100%;
                top: 70px;
                width: 250px;
                z-index: 1000;
                transition: all 0.3s ease;
            }

            .sidebar.show {
                left: 0;
            }

            .content-wrapper {
                margin-left: 0;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Container untuk content */
        .main-container {
            margin-top: 70px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/icons/logok4.ico') }}" alt="Logo">
            <span>Admin Panel</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger rounded-pill">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid main-container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-2 px-0">
            <div class="sidebar">
                <div class="nav flex-column nav-pills">
                    <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}" 
                       href="{{ route('admin.index') }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                    <a class="nav-link {{ request()->routeIs('manajemenadmin.*') ? 'active' : '' }}" 
                       href="{{ route('manajemenadmin.index') }}">
                        <i class="bi bi-people"></i>
                        <span>Manajemen Admin</span>
                    </a>
                    <a class="nav-link {{ request()->routeIs('manajemenhalaman.*') ? 'active' : '' }}" 
                       href="{{ route('manajemenhalaman.index') }}">
                        <i class="bi bi-tags"></i>
                        <span>Kategori</span>
                    </a>
                    <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}" 
                       href="{{ route('posts.index')}}">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Posts</span>
                    </a>
                    <a class="nav-link {{ request()->routeIs('galleries.*') ? 'active' : '' }}" 
                       href="{{ route('galleries.index')}}">
                        <i class="bi bi-images"></i>
                        <span>Gallery</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Content -->
        <div class="col-lg-10 offset-lg-2">
            <div class="content-wrapper">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    feather.replace();

    // Toggle sidebar on mobile
    document.querySelector('.navbar-toggler').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('show');
    });

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        const sidebar = document.querySelector('.sidebar');
        const navbarToggler = document.querySelector('.navbar-toggler');
        
        if (!sidebar.contains(event.target) && !navbarToggler.contains(event.target)) {
            sidebar.classList.remove('show');
        }
    });
</script>
</body>
</html>
