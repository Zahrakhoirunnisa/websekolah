@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <h2 class="text-center mb-5">Galeri Kegiatan</h2>
    <div class="row g-4">
        @foreach($galleries as $gallery)
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    @if($gallery->images->isNotEmpty())
                        <img src="{{ asset($gallery->images->first()->file) }}" 
                             class="card-img-top" 
                             alt="{{ $gallery->images->first()->judul }}"
                             style="height: 250px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $gallery->posts->judul ?? 'Gallery Title' }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($gallery->posts->isi ?? ''), 100) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
