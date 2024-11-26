@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Tambah Gallery</h1>
        <form action="{{ route('galleries.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="post_id">Judul Post</label>
                <select name="post_id" class="form-control" id="post_id" required>
                    <option value="Pilih Post"></option>
                    @foreach ($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->judul }}</option>
                    @endforeach
                </select>
            </div>


            <div class="row">
                <div class="col-12 col-md-6">
                <div class="form-group">
                <label for="position">Posisi</label>
                <input type="number" class="form-control" id="position" name="position" required>
                <small>Nilai posisi berupa angka</small>
            </div>
                <div class="col-12 col-md-6">
                <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="status" required>
                    <option value="Pilih Status"></option>
                    <option value="aktif">Aktif</option>
                    <option value="non-aktif">Tidak Aktif</option>
                </select>
                </div>
                </div>
            
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('galleries.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
