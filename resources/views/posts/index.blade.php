@extends('layouts.admin')

@section('title', 'Posts')

@section('content')

<div class="container">
    <h2>Posts</h2>
    <br>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Post</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Petugas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->judul }}</td>
                <td>{{ $post->kategori->judul }}</td> <!-- Menggunakan relasi kategori -->
                <td>{{ $post->petugas->username }}</td> <!-- Menggunakan relasi petugas -->
                <td>{{ $post->status }}</td>
                <td>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Anda yakin ingin menghapus post ini?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
