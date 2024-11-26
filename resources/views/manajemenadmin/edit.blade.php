@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Petugas</h2>
    <form action="{{ route('manajemenadmin.update', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="{{ $petugas->username }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="admin" {{ $petugas->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $petugas->role == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
