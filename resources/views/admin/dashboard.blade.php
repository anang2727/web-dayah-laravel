@extends('layouts.homeD')

@section('admin')
<div>
    <h1>Hello {{ Auth::user()->name }} </h1>
</div>

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

<!-- Authentication -->