@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="dashboard-container">
    <!-- Welcome Banner -->
    <div class="welcome-banner mb-4" data-aos="fade-up">
        <div class="card border-0 bg-primary text-white rounded-4 overflow-hidden">
            <div class="card-body p-4 position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h3 class="fw-bold mb-2">Selamat Datang, Admin!</h3>
                        <p class="mb-0 opacity-75">Kelola konten website SMK Negeri 4 Bogor dengan mudah dan efisien.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <i class="bi bi-shield-check display-1 text-white opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-4">
        <!-- Admin Count -->
        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card border-0 rounded-4 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                            <i class="bi bi-people fs-4"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-1 text-muted">Total Admin</h6>
                            <h4 class="mb-0 fw-bold">{{ $petugasCount ?? '0' }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Posts Count -->
        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card border-0 rounded-4 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-success bg-opacity-10 text-success rounded-3 p-3">
                            <i class="bi bi-file-text fs-4"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-1 text-muted">Total Posts</h6>
                            <h4 class="mb-0 fw-bold">{{ $postsCount ?? '0' }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Count -->
        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card border-0 rounded-4 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                            <i class="bi bi-tags fs-4"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-1 text-muted">Kategori</h6>
                            <h4 class="mb-0 fw-bold">{{ $kategoryCount ?? '0' }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Count -->
        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="card border-0 rounded-4 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-info bg-opacity-10 text-info rounded-3 p-3">
                            <i class="bi bi-images fs-4"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-1 text-muted">Gallery</h6>
                            <h4 class="mb-0 fw-bold">{{ $galleryCount ?? '0' }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-4">
        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="500">
            <div class="card border-0 rounded-4 shadow-sm">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="fw-bold mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="{{ route('posts.create') }}" class="card action-card border-0 rounded-3 bg-light h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="action-icon bg-primary text-white rounded-3 p-3">
                                            <i class="bi bi-plus-lg"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-1">Tambah Post Baru</h6>
                                            <p class="text-muted small mb-0">Buat post atau pengumuman baru</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('galleries.create') }}" class="card action-card border-0 rounded-3 bg-light h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="action-icon bg-success text-white rounded-3 p-3">
                                            <i class="bi bi-image"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-1">Upload Gallery</h6>
                                            <p class="text-muted small mb-0">Tambahkan foto ke gallery</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="600">
            <div class="card border-0 rounded-4 shadow-sm">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="fw-bold mb-0">System Info</h5>
                </div>
                <div class="card-body">
                    <div class="system-info">
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div class="ms-3">
                                <p class="text-muted small mb-0">Server Time</p>
                                <p class="mb-0 fw-medium">{{ now()->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center">
                            <div class="info-icon bg-success bg-opacity-10 text-success rounded-3 p-2">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="ms-3">
                                <p class="text-muted small mb-0">System Status</p>
                                <p class="mb-0 fw-medium">Active</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .dashboard-container {
        padding: 1.5rem;
    }

    .welcome-banner {
        position: relative;
        overflow: hidden;
    }

    .welcome-banner .bi {
        position: absolute;
        right: -20px;
        top: 50%;
        transform: translateY(-50%);
    }

    .stats-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .action-card {
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
    }

    .action-card:hover {
        transform: translateY(-5px);
        background-color: #f8f9fa !important;
    }

    .action-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .info-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .system-info .info-item:last-child {
        margin-bottom: 0;
    }
</style>
@endsection
