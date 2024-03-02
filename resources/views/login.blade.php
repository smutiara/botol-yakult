<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Login – E-Tugas Tamansiswa</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f0f0f0; /* Warna latar belakang abu-abu muda */
    }

    .container {
        background-image: url('https://images5.alphacoders.com/711/711093.jpg'); /* Gambar latar belakang dari Unsplash (random) */
        background-size: cover; /* Ukuran gambar menyesuaikan dengan ukuran container */
        background-repeat: no-repeat; /* Tidak mengulang gambar */
        background-attachment: fixed; /* Gambar tetap di posisi saat di-scroll */
        padding: 50px; /* Padding untuk konten */
        width: 100vw; 
        height: 300vh; /* Mengisi seluruh tinggi viewport */
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
</style>

</head>
<body>
     <div class="container"><br>
     <div class="col-md-4 col-md-offset-4">
        <h2 class="text-center"><b>Login</b><br>Classroom</h3>
        <hr>
        @if(session('error'))
        <div class="alert alert-danger"> <b>Opps!</b>
        {{session('error')}} </div>
        @endif
        <form action="{{ route('actionlogin') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"class="form-control" placeholder="Password" required="">
            </div>
            <button type="submit" class="btn btn-primary btn-block" style="background-color: black; border-color: black; color: white;">Login</button>
            <hr style="border-color: black;">
            <p class="text-center">Belum punya akun? <a href="/register">Register</a> sekarang!</p>
        </form>
    </div>
</div>
</body>
</html>
