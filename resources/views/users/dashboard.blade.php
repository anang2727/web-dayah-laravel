@extends('layouts.homeD')

@section('users')
<!-- ============================ -->
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="col-2 m-2">
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addItem"> <i class="bx bxs-plus-circle"></i>Tambah Data</button>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tabel Users</h5>
                    <!-- Small tables -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($users as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->show_password }}</td>
                                <td>
                                    <span style="background-color: {{ $item->backgroundColor }}; color: white; padding: 5px 10px; border-radius: 5px; font-size: 0.8rem;">
                                        {{ $item->role }}
                                    </span>
                                </td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning"><i class="bx bxs-pencil"></i> </a>
                                    <form class="" action="{{ route('users.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="bx bxs-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End small tables -->
                </div>
            </div>


        </div>
    </div>
</div>

<div id="addItem" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_guru">Name</label>
                        <input required type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="show_password">Confirm Password</label>
                        <input type="text" name="show_password" id="show_password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option value="admin">Admin</option>
                            <option value="guru">Guru</option>
                            <option value="santri">Santri</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
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