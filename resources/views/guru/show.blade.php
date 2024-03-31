@extends('layouts.homeD')

@section('guru')


<div class="card p-3">
    <div class="col-3 mb-5">
        <a class="btn btn-dark" href="{{ route('guru.dashboard') }}"> <i class="bx bx-arrow-to-left btn-sm"></i></a>
    </div>

    <div class="card-body" id="printableArea"> <!-- Tambahkan ID untuk area yang ingin dicetak -->
        <img src="{{ url('storage/' . $guru->image) }}" class="card-img-top" style="width: 200px;" alt="Foto guru"> <!-- Menampilkan gambar guru -->
        <h5 class="card-title">Nama : {{ $guru->nama_guru }}</h5>
        <p class="card-text"><strong>No KTP:</strong> {{ $guru->no_ktp }}</p>
        <p class="card-text"><strong>Nomor KK:</strong> {{ $guru->no_kk }}</p>
        <p class="card-text"><strong>Alamat:</strong> {{ $guru->alamat }}</p>
        <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $guru->tgl_lahir }}</p>
        <p class="card-text"><strong>Pekerjaan:</strong> {{ $guru->pekerjaan }}</p>
        <p class="card-text"><strong>Pendidikan Terakhir:</strong> {{ $guru->pendidikan_terakhir }}</p>
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