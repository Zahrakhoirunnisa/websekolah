@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <h2 class="text-center mb-5">Agenda Sekolah</h2>
    <div class="row g-4">
        @foreach($agendas as $agenda)
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="calendar-icon bg-primary text-white p-3 rounded-3 me-3">
                            <h4 class="mb-0">{{ \Carbon\Carbon::parse($agenda->created_at)->format('d') }}</h4>
                            <small>{{ \Carbon\Carbon::parse($agenda->created_at)->format('M') }}</small>
                        </div>
                        <div>
                            <h5 class="card-title mb-0">{{ $agenda->judul }}</h5>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($agenda->created_at)->format('H:i') }} WIB</small>
                        </div>
                    </div>
                    <p class="card-text">{{ Str::limit(strip_tags($agenda->isi), 100) }}</p>
                    @if(isset($agenda->lokasi))
                    <div class="d-flex align-items-center">
                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                        <small>{{ $agenda->lokasi }}</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection 