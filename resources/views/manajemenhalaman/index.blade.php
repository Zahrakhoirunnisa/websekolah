@extends('layouts.admin')

@section('title', 'Manajemen Halaman')

@section('content')

<div class="container">
    <h2>Manajemen Halaman</h2>
    <br>
    <h4>Menu</h4>
    <ul class="list-group">
    <li class="list-group-item">
        <button type="button" class="btn btn-warning" onclick="window.location='{{ route('kategori.index') }}'">Kategori</button>
    </li>
</ul>

    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

</div>
@endsection
