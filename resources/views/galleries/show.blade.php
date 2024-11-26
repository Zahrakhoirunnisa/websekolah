@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Galeri</h5>
            <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-light btn-sm">Edit Galeri</a>
        </div>
        
        <div class="card-body">
            <!-- Informasi Galeri -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title mb-3">Informasi Galeri</h6>
                            <p class="mb-2"><strong>Post:</strong> {{ $gallery->posts->judul }}</p>
                            <p class="mb-2"><strong>Posisi:</strong> {{ $gallery->position }}</p>
                            <p class="mb-0"><strong>Status:</strong> 
                                <span class="badge {{ $gallery->status == 'aktif' ? 'bg-success' : 'bg-warning' }}">
                                    {{ ucfirst($gallery->status) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Upload Foto -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Upload Foto Baru</h6>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('galleries.upload', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="images" class="form-label">Pilih Foto</label>
                                <input type="file" class="form-control @error('images') is-invalid @enderror" 
                                       id="images" name="images[]" multiple accept="image/*" required>
                                <small class="text-muted">Format: JPG, PNG, GIF (Max: 2MB)</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="judul" class="form-label">Judul Foto</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                       id="judul" name="judul" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i data-feather="upload"></i> Upload Foto
                        </button>
                    </form>
                </div>
            </div>

            <!-- Daftar Foto -->
            <div class="card">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Foto-foto dalam Galeri</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @forelse($gallery->images as $image)
                            <div class="col-md-4 col-lg-3">
                                <div class="card h-100">
                                    <a href="{{ asset('storage/' . $image->file) }}" data-fancybox="gallery" 
                                       data-caption="{{ $image->judul }}">
                                        <img src="{{ asset('storage/' . $image->file) }}" 
                                             class="card-img-top" 
                                             alt="{{ $image->judul }}"
                                             style="height: 200px; object-fit: cover;">
                                    </a>
                                    <div class="card-body">
                                        <h6 class="card-title text-truncate">{{ $image->judul }}</h6>
                                        <form action="{{ route('galleries.deleteImage', $image->id) }}" 
                                              method="POST" class="mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm w-100" 
                                                    onclick="return confirm('Yakin ingin menghapus foto ini?')">
                                                <i data-feather="trash-2"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info mb-0">
                                    <i data-feather="info"></i> Belum ada foto dalam galeri ini.
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('galleries.index') }}" class="btn btn-secondary">
                    <i data-feather="arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
<style>
    .card-img-top {
        transition: transform 0.3s ease;
    }
    .card-img-top:hover {
        transform: scale(1.05);
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
        // Custom options
        Toolbar: {
            display: [
                { id: "prev", position: "center" },
                { id: "counter", position: "center" },
                { id: "next", position: "center" },
                "zoom",
                "slideshow",
                "fullscreen",
                "download",
                "close",
            ],
        },
    });
</script>
@endpush
@endsection
