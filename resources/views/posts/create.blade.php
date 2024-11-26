@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Post</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                <option value="">Pilih Kategori</option> <!-- Tambahkan opsi default -->
                @foreach($kategori as $kat) <!-- Mengganti nama variabel untuk menghindari bentrok -->
                    <option value="{{ $kat->id }}">{{ $kat->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label>Petugas</label>
            <select name="petugas_id" class="form-control" required>
                @foreach($petugas as $petugasItem)
                    <option value="{{ $petugasItem->id }}">{{ $petugasItem->username }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
