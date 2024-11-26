@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit posts</h2>
    <form action="{{ route('posts.update', $posts->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $posts->judul }}" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ $kat->id == $posts->kategori_id ? 'selected' : '' }}>
                        {{ $kat->judul }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="5" required>{{ $posts->isi }}</textarea>
        </div>
        
        <div class="form-group">
            <label>Petugas</label>
            <select name="petugas_id" class="form-control" required>
                @foreach($petugas as $petugasItem)
                    <option value="{{ $petugasItem->id }}" {{ $petugasItem->id == $posts->petugas_id ? 'selected' : '' }}>
                        {{ $petugasItem->username }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="published" {{ $posts->status == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ $posts->status == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
