<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
<style>
    body {
        background-color: #f0f0f0; /* Warna latar belakang abu-abu muda */
    }

    .container {
        background-image: url('https://e0.pxfuel.com/wallpapers/70/1014/desktop-wallpaper-black-and-white-boat-minimal-stream-for-your-mobile-tablet-explore-white-minimalist-white-minimalist-minimalist-background-minimalist.jpg'); /* Gambar latar belakang dari Unsplash (random) */
        background-size: cover; /* Ukuran gambar menyesuaikan dengan ukuran container */
        background-repeat: no-repeat; /* Tidak mengulang gambar */
        background-attachment: fixed; /* Gambar tetap di posisi saat di-scroll */
        padding: 50px; /* Padding untuk konten */
        width: 100vw; 
        height: 300vh; /* Mengisi seluruh tinggi viewport */
    }

    .card {
        background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang transparan putih */
        padding: 20px; /* Padding untuk card */
        border-radius: 10px; /* Sudut border membulat */
    }

    .col-md-4 {
        background-color:  rgba(255, 255, 255, 0.3); /* Warna latar belakang transparan putih */
        padding: 20px; /* Padding untuk form */
        border-radius: 10px; /* Sudut border membulat */
    }

    h2 {
        color: #333; /* Warna teks hitam */
    }

    .btn-primary {
        background-color: #007bff; /* Warna latar belakang tombol biru */
        border-color: #007bff; /* Warna border tombol biru */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Warna latar belakang tombol biru saat hover */
        border-color: #0056b3; /* Warna border tombol biru saat hover */
    }
    .text-center {
        color: white; /* Ubah warna teks menjadi putih */
    }

    .text-center a {
        color: black; /* Ubah warna teks tautan menjadi putih */
    }

    .text-center a:hover {
        color: #333; /* Ubah warna teks tautan menjadi abu-abu muda saat hover */
    }

</style>
<div class="container" style="color: black;"><br>
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center" style="color: black;">FORM REGISTER USER</h3>
            <hr style="border-color: black;">
                @if (session('message'))
                    <div class="alert alert-success"> {{ session('message') }}
                </div>
                @endif
                <form action="{{ route('actionregister') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label><i class="fa fa-envelope"></i>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Email" required="">
                        </div>
                        <div class="form-group"> <label><i class="fa fa-user"></i> Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required="">
                        </div>

                    <div class="form-group"> <label><i class="fa fa-key"></i> Password</label>

                        <input type="password" name="password" class="form-control" placeholder="Password"required="">

                    </div>

                    <div class="form-group"> <label><i class="fa fa-address-book"></i> Role</label>
                        <input type="text" name="role" class="form-control" value="user" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="background-color: black; border-color: black; color: white;">
                    <i class="fa fa-user"></i> Register
                </button>
                <hr style="border-color: black;">
                        <p class="text-center" style="color: black;">Sudah punya akun? Silahkan <a href="/">Login Disini!</a></p>
                     </div>
                    </div>
                </body>

</html>