@extends('master')
@section('konten')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Nilai</title>
        <style>
    body {
        background-image: url('https://wallpapercave.com/wp/wp7982012.jpg'); /* Gambar latar belakang */
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
        <h2>Data Nilai</h2>
        <br />
        <table class="table table-dark table-hover m-lg-2">
            <tr>
                <th>ID Soal</th>
                <th>ID User</th>
                <th>Jawaban Tugas</th>
                <th>Nilai</th>
                <th>Status</th>
            </tr>
            @foreach ($nilai as $n)
                <tr>
                    <td> {{ $n->idsoal }} </td>
                    <td> {{ $n->name }} </td>
                    <td> {{ $n->jawabansoal }} </td>
                    <td> {{ $n->nilai }} </td>
                    <td>
                        @if (Auth::user()->role == 'admin')
                            @if ($n->status != 'selesai')
                                <button class="btn btn-danger" data-toggle="modal" data-
                                    target="#UpdateStatus{{ $n->idnilai }}">

                                    {{ $n->status }}
                                </button>
                            @elseif($n->status == 'selesai')
                                <button class="btn btn-success">
                                    {{ $n->status }}
                                </button>
                            @endif
                        @else
                            <button class="btn btn-primary">{{ $n->status }}</button>
                        @endif
                    </td>
                </tr>
                <!-- Ini tampil form update Status -->
                <div class="modal fade" id="UpdateStatus{{ $n->idnilai }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Status</h1>

                            </div>
                            <div class="modal-body">
                                <form action="/nilai/storeupdate" method="post" class="form-floating">

                                    @csrf
                                    <input type="hidden" name="idnilai" id="idnilai" readonly class="form-control"
                                        value="{{ $n->idnilai }}">

                                    <div class="form-floating">
                                        <label for="floatingInputValue">Nilai

                                            Tugas</label>

                                        <input type="text" name="nilai" required="required" class="form-control"
                                            value="{{ $n->nilai }}">

                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-
secondary"
                                            data-dismiss="modal">Close</button>

                                        <button type="submit" class="btn btn-
primary">Save Updates</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
        </div>
    </body>

    </html>
@endsection