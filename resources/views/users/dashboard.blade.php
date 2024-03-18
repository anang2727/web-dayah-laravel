@extends('layouts.homeD')

@section('users')
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
                                <td class="fw-bold text-primary">{{ $item->role }}</td>
                                <td class="d-flex gap-2">
                                    <a href="" class="btn btn-warning"><i class="bx bxs-pencil"></i> </a>
                                    <form class="" action="" method="POST">
                                        <!-- @csrf -->
                                        <!-- @method('DELETE') -->
                                        <button type="submit" class="btn btn-danger"><i class="bx bxs-trash-alt"></i></button>
                                    </form>
                                    <a href="" class="btn btn-info"><i class="bx bxs-detail"></i></a>
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



<!--  -->



@endsection