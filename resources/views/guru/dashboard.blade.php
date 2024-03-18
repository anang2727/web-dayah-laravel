@extends('layouts.homeD')

@section('guru')
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
                    <h5 class="card-title">Tabel guru</h5>
                    <!-- Small tables -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>No Ktp</th>
                                <th>Alamat</th>
                                <th>Tgl Lahir</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($gurus as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <img src="{{ url('storage/' . $item->image) }}" class="card-img-top" style="width: 80px;">
                                </td>
                                <td>{{ $item->nama_guru }}</td>
                                <td>{{ $item->no_ktp }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->tgl_lahir }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning"><i class="bx bxs-pencil"></i> </a>
                                    <form class="" action="{{ route('guru.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="bx bxs-trash-alt"></i></button>
                                    </form>
                                    <a href="{{ route('guru.show', $item->id) }}" class="btn btn-info"><i class="bx bxs-detail"></i></a>
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


<div id="addItem" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">guru Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image">Gambar</label>
                        <input required type="file" name="image" id="image" class="form-control">
                        <img id="imagePreview" src="#" alt="Preview Gambar" style="max-width: 200px; display: block;">
                    </div>
                    <div class="mb-3">
                        <label for="nama_guru">Nama guru</label>
                        <input required type="text" name="nama_guru" id="nama_guru" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="no_ktp">No Ktp</label>
                        <input required type="text" name="no_ktp" id="no_ktp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="no_kk">No KK</label>
                        <input required type="text" name="no_kk" id="no_kk" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <input required type="text" name="alamat" id="alamat" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_lahir">Tgl Lahir</label>
                        <input required type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input required type="text" name="pekerjaan" id="pekerjaan" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                        <input required type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control">
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
    function previewImage(input) {
        var preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById('image').addEventListener('change', function() {
        previewImage(this);
    });
</script>




@endsection