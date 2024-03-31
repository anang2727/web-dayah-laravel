@extends('layouts.homeD')

@section('santri')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="m-3">
                <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#addItem"> <i class="bx bxs-plus-circle"></i>Tambah Data</button>
                <a href="{{ route('santri.export') }}" class="btn btn-success btn-sm">
                    <i class="ri-file-excel-2-line"></i>
                    <span>Excel</span>
                </a>
                <a href="{{ route('santri.export') }}" class="btn btn-success btn-sm">
                    <i class="ri-file-excel-2-line"></i>
                    <span>Import Excel</span>
                </a>
                <a data-bs-toggle="modal" data-bs-target="#verticalycentered" href="" class="btn btn-info btn-sm">
                    <i class="bi bi-file-earmark-word fw-bold "></i> Word
                </a>
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
                    <h5 class="card-title">Tabel Santri</h5>
                    <!-- Small tables -->
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($santris as $item)
                            <tr>
                                <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                <td class="text-center">
                                    <img src="{{ url('storage/' . $item->image) }}" class="card-img-top" style="width: 45px;">
                                </td>
                                <td>{{ $item->nama_santri }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td class="d-flex gap-2 mx-auto">
                                    <a href="{{ route('santri.edit', $item->id) }}" class="btn btn-warning"><i class="bx bxs-pencil"></i> </a>
                                    <form class="" action="{{ route('santri.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="bx bxs-trash-alt"></i></button>
                                    </form>
                                    <a href="{{ route('santri.show', $item->id) }}" class="btn btn-info"><i class="bx bxs-detail"></i></a>
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
                <h5 class="modal-title">Santri Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('santri.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image">Gambar</label>
                        <input required type="file" name="image" accept="image/*" id="image" class="form-control">
                        <img id="imagePreview" src="#" alt="Preview Gambar" style="max-width: 150px; display: block;">
                    </div>
                    <div class="mb-3">
                        <label for="nama_santri">Nama Santri</label>
                        <input required type="text" name="nama_santri" id="nama_santri" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nik">Nik</label>
                        <input type="text" name="nik" id="nik" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="no_kk">No KK</label>
                        <input type="text" name="no_kk" id="no_kk" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_lahir">Tgl Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" name="nama_ayah" id="nama_ayah" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_masuk">Tgl Masuk</label>
                        <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Vertically centered Modal -->

<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eksport atau Import Excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
            </div>
            <div class="modal-footer">
                <div class="btn-small btn btn-secondary" data-bs-dismiss="modal">Tutup</div>
                <div class="btn-small btn btn-primary">Selesai</div>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->


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