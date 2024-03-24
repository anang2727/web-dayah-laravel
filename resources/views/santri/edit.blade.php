@extends('layouts.homeD')

@section('guru')
<div class="card p-3">
    <div class="card-body col-6">
        <a class="btn btn-dark" href="{{ route('guru.dashboard') }}"> <i class="bx bx-arrow-to-left btn-sm"></i></a>
        <form class="py-5" action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 d-flex flex-column col-3">
                @if ($guru->image)
                <img src="{{ asset('storage/' . $guru->image) }}" alt="Gambar guru">
                @endif
                <label for="image" class="my-2 form-label btn btn-primary"> <i class="bx bx-upload"></i></label>
                <input type="file" class="form-control d-none" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="nama_guru" class="form-label">Nama guru</label>
                <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}">
            </div>
            <div class="mb-3">
                <label for="no_ktp" class="form-label">No Ktp</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $guru->no_ktp }}">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $guru->alamat }}">
            </div>
            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $guru->pekerjaan }}">
            </div>
            <div class="mb-3">
                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ $guru->pendidikan_terakhir }}">
            </div>


            <!-- Tambahkan atribut name pada elemen input yang lainnya -->
            <!-- Sisipkan gambar yang sudah ada -->

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection