@extends('layouts.admin')


@section('title', 'Manajemen Admin')

@section('content')

<div class="container">
    <h2>Manajemen Admin</h2>
    <br>
    <a href="{{ route('manajemenadmin.create') }}" class="btn btn-primary">Tambah Petugas</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $p)
            <tr>
                <td>{{ $p->username }}</td>
                <td>
                    <a href="{{ route('manajemenadmin.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('manajemenadmin.destroy', $p->id) }}" method="POST" style="display:inline;">
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