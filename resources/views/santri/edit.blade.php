@extends('layouts.homeD')

@section('santri')
<div class="card p-3">
    <div class="card-body col-6">
        <a class="btn btn-dark" href="{{ route('santri.dashboard') }}"> <i class="bx bx-arrow-to-left btn-sm"></i></a>
        <form class="py-5" action="{{ route('santri.update', $santri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 d-flex flex-column col-3">
                @if ($santri->image)
                <img src="{{ asset('storage/' . $santri->image) }}" alt="Gambar Santri">
                @endif
                <label for="image" class="my-2 form-label btn btn-primary"> <i class="bx bx-upload"></i></label>
                <input type="file" class="form-control d-none" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="nama_santri" class="form-label">Nama Santri</label>
                <input type="text" class="form-control" id="nama_santri" name="nama_santri" value="{{ $santri->nama_santri }}">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">Nik</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ $santri->nik }}">
            </div>
            <div class="mb-3">
                <label for="no_kk" class="form-label">No KK</label>
                <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $santri->no_kk }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $santri->alamat }}">
            </div>
            <div class="mb-3">
                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ $santri->nama_ayah }}">
            </div>
            <div class="mb-3">
                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $santri->nama_ibu }}">
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tgl Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $santri->tgl_lahir }}">
            </div>
            <div class="mb-3">
                <label for="tgl_masuk" class="form-label">Tgl Masuk</label>
                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="{{ $santri->tgl_masuk }}">
            </div>
            <!-- Tambahkan atribut name pada elemen input yang lainnya -->
            <!-- Sisipkan gambar yang sudah ada -->

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection