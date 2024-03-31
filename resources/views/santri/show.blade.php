@extends('layouts.homeD')

@section('santri')


<div class="card p-3">
    <div class="col-3 mb-5">
        <a class="btn btn-dark" href="{{ route('santri.dashboard') }}"> <i class="bx bx-arrow-to-left btn-sm"></i></a>
    </div>

    <div class="card-body" id="printableArea"> <!-- Tambahkan ID untuk area yang ingin dicetak -->
        <img src="{{ url('storage/' . $santri->image) }}" class="card-img-top" style="width: 200px;" alt="Foto Santri"> <!-- Menampilkan gambar santri -->
        <h5 class="card-title">Nama : {{ $santri->nama_santri }}</h5>
        <p class="card-text"><strong>NIK:</strong> {{ $santri->nik }}</p>
        <p class="card-text"><strong>Nomor KK:</strong> {{ $santri->no_kk }}</p>
        <p class="card-text"><strong>Alamat:</strong> {{ $santri->alamat }}</p>
        <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $santri->tgl_lahir }}</p>
        <p class="card-text"><strong>Nama Ayah:</strong> {{ $santri->nama_ayah }}</p>
        <p class="card-text"><strong>Nama Ibu:</strong> {{ $santri->nama_ibu }}</p>
        <p class="card-text"><strong>Tanggal Masuk:</strong> {{ $santri->tgl_masuk }}</p>
    </div>
</div>

<button class="btn btn-primary" onclick="printDiv()">Print</button> <!-- Memanggil fungsi JavaScript untuk mencetak -->

@endsection

@section('scripts')
<script>
    function printDiv() {
        var printContents = document.getElementById("printableArea").innerHTML; // Mendapatkan isi dari area yang ingin dicetak
        var originalContents = document.body.innerHTML; // Menyimpan isi asli halaman web
        document.body.innerHTML = printContents; // Menetapkan isi yang ingin dicetak ke tubuh dokumen

        window.print(); // Mencetak dokumen
        document.body.innerHTML = originalContents; // Mengembalikan isi asli halaman web
    }
</script>
@endsection