@extends('layouts.admin') 

@section('content')
<div class="container">
    <h1>Daftar galleries</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('galleries.create') }}" class="btn btn-primary mb-3">Tambah galleries</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Post</th>
                <th>Posisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($galleries as $gallery)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gallery->posts->judul }}</td>
                    <td>{{ $gallery->position }}</td>
                    <td>
                                    @if ($gallery->status == 'aktif')
                                        <span class="badge bg-success text-light">{{ Str::ucfirst($gallery->status) }}</span>
                                    @else
                                        <span class="badge bg-warning text-light">{{ Str::ucfirst($gallery->status) }}</span>
                                    @endif
                                </td>   
                    <td>
                        
                        <a href="/galleries/{{ $gallery->id }}" class="btn btn-success me-2">
                        <i data-feather="info"></i> Detail
                        </a>
                        <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning me-2">
                        <i data-feather="edit"></i>Edit
                        </a>
                        <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">
                                <i data-feather="trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
