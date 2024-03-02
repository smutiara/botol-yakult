@extends('master')
@section('konten')
    <!DOCTYPE html>
    <html>
        <head>
        <title>User</title>
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
        <h2>Data User</h2>
        <br />
        <table class="table table-striped table-hover">
            <tr>
                <th>ID User</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Opsi</th>
            </tr>
            @foreach ($user as $u)
                <tr>
                    <td> {{ $u->id }} </td>
                    <td> {{ $u->name }} </td>
                    <td> {{ $u->email }} </td>
                    <td> {{ $u->role }} </td>
                    <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#DelUser{{ $u->id }}">Delete</button>
                     </td>
                </tr>
                <!-- Ini tampil form delete user -->

                <div class="modal fade" id="DelUser{{ $u->id }}" tabindex="-1" aria- labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>

                            </div>
                            <div class="modal-body">
                                <form action="/user/delete/{{ $u->id }}" method="get" class="form-floating">
                                    @csrf
                                    <div>
                                        <h3>Yakin mau menghapus data <b>{{ $u->name }}</b> ?</h3>

                                    </div>
                                    <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                                         <button type="submit" class="btn btn-primary">Yes</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </body>
</html>
@endsection