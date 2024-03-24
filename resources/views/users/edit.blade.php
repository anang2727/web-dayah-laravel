@extends('layouts.homeD')

@section('users')
<div class="card p-3">
    <div class="card-body col-6">
        <a class="btn btn-dark" href="{{ route('users.dashboard') }}"> <i class="bx bx-arrow-to-left btn-sm"></i></a>
        <form class="py-5" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="show_password" class="form-label">Confirm Password</label>
                <input type="text" class="form-control" id="show_password" name="show_password">
            </div>

            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Role</label>
                <select name="role" id="role" class="form-select">
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
                    <option value="santri" {{ $user->role === 'santri' ? 'selected' : '' }}>Santri</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var password = document.getElementById("password");
        var showPassword = document.getElementById("show_password");
        var form = document.getElementById("form");

        form.addEventListener("submit", function(event) {
            if (password.value !== showPassword.value) {
                event.preventDefault(); // Mencegah pengiriman formulir
                alert("Password dan konfirmasi password tidak sama.");
            }
        });
    });
</script>
@endsection