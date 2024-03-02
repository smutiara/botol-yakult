@extends('master')
@section('konten')
<!DOCTYPE html>
<html>
<head>
<title>Tugas</title>
<style>
   body {
        background-image: url('https://wallpapercave.com/wp/wp5748371.jpg'); /* Gambar latar belakang */
        background-size: cover; /* Ukuran gambar menyesuaikan dengan ukuran container */
        background-repeat: no-repeat; /* Tidak mengulang gambar */
        background-attachment: fixed; /* Gambar tetap di posisi saat di-scroll */
        font-family: Arial, sans-serif; /* Pilihan font */
    }

    h2 {
        color: #333; /* Warna teks judul */
        text-align: center; /* Posisi teks ke tengah */
    }

    .table {
        background-color: #fff; /* Warna latar belakang tabel */
        border-radius: 10px; /* Sudut border membulat */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow untuk efek kedalaman */
    }

    th {
        background-color: #007bff; /* Warna latar belakang header kolom */
        color: #fff; /* Warna teks header kolom */
    }

    td {
        background-color: #f8f9fa; /* Warna latar belakang sel */
    }

    .btn-primary {
        background-color: #007bff; /* Warna latar belakang tombol biru */
        border-color: #007bff; /* Warna border tombol biru */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Warna latar belakang tombol biru saat hover */
        border-color: #0056b3; /* Warna border tombol biru saat hover */
    }

    .modal-content {
        background-color: #fff; /* Warna latar belakang modal */
        border-radius: 10px; /* Sudut border membulat */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow untuk efek kedalaman */
    }

    .modal-header {
        background-color: #007bff; /* Warna latar belakang header modal */
        color: #fff; /* Warna teks header modal */
        border-bottom: none; /* Hapus border bawah header modal */
    }

    .modal-title {
        font-weight: bold; /* Tebalkan teks judul modal */
    }

    .form-control {
        border-radius: 5px; /* Sudut border membulat pada input */
    }

    .modal-footer {
        border-top: none; /* Hapus border atas footer modal */
    }
</style>

</head>
<body>
<h2>Data Tugas</h2>
<br />
@if(Auth::user()->role=='admin')
<button class="btn btn-primary" data-toggle="modal" data-target="#TambahSoal">Tambah Tugas</button>
@endif
<br>
<br>
<table class="table table-striped table-hover">
    <tr>
        <th>ID Tugas</th>
        <th>Judul Materi</th>
        <th>Deskripsi Tugas</th>
        <th>Tenggat Waktu</th>
        <th>Opsi</th>
    </tr>
    @foreach ($soal as $s)
    <tr>
        <td> {{$s->idsoal}} </td>
        <td> {{$s->judulmateri}} </td>
        <td> {{$s->deskripsisoal}} </td>
        <td> {{$s->bataswaktu}} </td>
        <td>
            @if(Auth::user()->role=='admin')
            <button class="btn btn-success" data-toggle="modal" data-target="#EditSoal{{ $s->idsoal }}">Edit</button>

|
<button class="btn btn-danger" data-toggle="modal" data-target="#DelSoal{{ $s->idsoal }}">Delete</button>

|
@endif
@if(Auth::user()->role=='user')

<button class="btn btn-info" data-toggle="modal" data-target="#WorkSoal{{ $s->idsoal }}">Kerjakan</button>

@endif
</td>
</tr>
<!-- Ini tampil form update soal -->
<div class="modal fade" id="EditSoal{{ $s->idsoal }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5"id="exampleModalLabel">Update Tugas</h1>

</div>
<div class="modal-body">
<form action="/soal/storeupdate" method="post"class="form-floating">

@csrf
<input type="hidden" name="idsoal" id="kode"readonly class="form-control" value="{{ $s->idsoal }}">
<div class="form-floating">
<label for="floatingInputValue">JudulMateri</label>

<input type="text" name="judulmateri"required="required" class="form-control" value="{{ $s->judulmateri }}">

</div>
<div class="form-floating">
<label for="floatingInputValue">DeskripsiTugas</label>

<br>
<textarea name="deskripsisoal" id=""cols="50" rows="10">{{ $s->deskripsisoal }}</textarea>

</div>
<div class="form-floating">
<label for="floatingInputValue">TenggatWaktu</label>

<input type="date" name="bataswaktu"required="required" class="form-control" value="{{ $s->bataswaktu }}">

</div>
<div class="modal-footer">

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

<button type="submit" class="btn btn-primary">Save Updates</button>

</div>
</form>
</div>
</div>
</div>
</div>
<!-- Ini tampil form Kerjakan soal -->
<div class="modal fade" id="WorkSoal{{ $s->idsoal }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5"id="exampleModalLabel">Kerjakan Tugas</h1>

</div>
<div class="modal-body">
<form action="/nilai/storeinput" method="post"class="form-floating">

@csrf
<input type="hidden" name="idsoal" id="kode"readonly class="form-control" value="{{ $s->idsoal }}">
<div class="form-floating">
<p>Judul Materi : {{ $s->judulmateri}}</p>

</div>
<div class="form-floating">
<p>Deskripsi Tugas : {{ $s->deskripsisoal}}</p>

</div>
<div class="form-floating">

<p>Batas Waktu : {{ $s->bataswaktu }}</p>
</div>
<div class="form-floating">
<labelfor="floatingInputValue">Jawaban</label>
<br>
<textarea name="jawabansoal" id=""cols="70" rows="10"></textarea>
</div>
<div class="modal-footer">

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

<button type="submit" class="btn btn-primary">Simpan Jawaban</button>

</div>
</form>
</div>
</div>
</div>
</div>
<!-- Ini tampil form delete soal -->
<div class="modal fade" id="DelSoal{{$s->idsoal}}" tabindex="-1"aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5"id="exampleModalLabel">Hapus Tugas</h1>

</div>
<div class="modal-body">
<form action="/soal/delete/{{$s->idsoal}}"method="get" class="form-floating">
@csrf
<div>
<h3>Yakin mau menghapus data <b>{{$s->judulmateri}}</b> ?</h3>

</div>
<div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

<button type="submit" class="btn btn-primary">Yes</button>

</div>

</form>
</div>
</div>
</div>
</div>
@endforeach
</table>
<!-- Ini tampil form tambah produk -->

<div class="modal fade" id="TambahSoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5"id="exampleModalLabel">Tambah Tugas</h1>

</div>
<div class="modal-body">
<form action="/soal/storeinput" method="post"class="form-floating" enctype="multipart/form-data">

@csrf
<div class="form-floating">
<label for="floatingInputValue">JudulMateri</label>

<input type="text" name="judulmateri"required="required" class="form-control">

</div>
<div class="form-floating">
<label for="floatingInputValue">DeskripsiTugas</label>

<br>
<textarea name="deskripsisoal" id="" cols="50"rows="10"></textarea>

</div>
<div class="form-floating">
<label for="floatingInputValue">TenggatWaktu</label>

<input type="date" name="bataswaktu"required="required" class="form-control">

</div>

<div class="modal-footer">

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

<button type="submit" class="btn btn-primary">Save changes</button>

</div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
@endsection