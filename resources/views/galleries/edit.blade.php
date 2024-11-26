@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Galeri</h5>
        </div>
        
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="post_id">Judul Post</label>
                    <select name="post_id" id="post_id" class="form-control">
                        @foreach($posts as $post)
                            <option value="{{ $post->id }}" {{ $gallery->post_id == $post->id ? 'selected' : '' }}>
                                {{ $post->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="position">Posisi</label>
                    <input type="number" name="position" id="position" class="form-control" value="{{ $gallery->position }}">
                </div>

                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="aktif" {{ $gallery->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="non-aktif" {{ $gallery->status == 'non-aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="images">Tambah Foto</label>
                    <input type="file" name="images[]" multiple class="form-control" accept="image/*">
                    <small class="text-muted">Anda dapat memilih beberapa foto sekaligus</small>
                </div>

                <div class="current-images mt-4">
                    <h6>Foto Saat Ini:</h6>
                    <div class="row">
                        @foreach($gallery->images as $image)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="{{ asset('storage/' . $image->path) }}" class="card-img-top" alt="Gallery Image">
                                <div class="card-body p-2">
                                    <button type="button" class="btn btn-danger btn-sm delete-image" 
                                            data-image-id="{{ $image->id }}">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Galeri</button>
                    <a href="{{ route('galleries.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('.delete-image').forEach(button => {
        button.addEventListener('click', function() {
            const imageId = this.dataset.imageId;
            if(confirm('Apakah Anda yakin ingin menghapus foto ini?')) {
                fetch(`/galleries/delete-image/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        this.closest('.col-md-3').remove();
                    }
                });
            }
        });
    });
</script>
@endpush
@endsection