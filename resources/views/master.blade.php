<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Awesome Website</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* Background */
        body {
            background-color: #f2f2f2; /* Warna latar belakang */
        }

        /* Mengatur gaya navbar */
        .navbar {
            background-color: #3498db; /* Warna latar belakang */
            border-color: #3498db; /* Warna border (jika ada) */
            color: #ffffff; /* Warna teks */
        }

        /* Mengubah gaya navbar-brand */
        .navbar-brand {
            color: #ffffff !important; /* Warna teks */
            font-size: 24px; /* Ukuran teks */
        }

        /* Mengubah gaya tombol navbar-toggle */
        .navbar-togglecollapsed {
            border-color: #ffffff; /* Warna garis tombol */
        }

        /* Mengatur gaya navbar-link */
        .navbar-nav li a {
            color: #ffffff !important; /* Warna teks */
        }

        /* Menambah efek hover pada tombol navigasi */
        .navbar-nav li a:hover {
            background-color: #2980b9 !important; /* Warna latar belakang saat hover */
        }

        /* Menambah efek hover pada dropdown menu */
        .dropdown-menu li a:hover {
            background-color: #2980b9 !important; /* Warna latar belakang saat hover */
        }

        /* Mengatur gaya dropdown menu */
        .dropdown-menu {
            background-color: #3498db; /* Warna latar belakang */
        }

        /* Mengatur gaya teks dalam dropdown menu */
        .dropdown-menu li a {
            color: #ffffff !important; /* Warna teks */
        }

        /* Mengatur footer */
        .footer {
            background-color: #34495e; /* Warna latar belakang */
            color: #ffffff; /* Warna teks */
            padding: 20px; /* Padding */
            text-align: center; /* Rata tengah teks */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-togglecollapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('dashboard') }}">E-Tugas Tamansiswa</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item"><a class="nav-link" href="/user">User</a></li>
                            @endif
                            <li class="nav-item"><a class="nav-link" href="/soal">Tugas</a></li>
                            <li class="nav-item"><a class="nav-link" href="/nilai">Nilai</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"></i>
                                    {{ Auth::user()->email }}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a>Level: {{ Auth::user()->role }}</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('actionlogout') }}"><i class="fa fa-power-off"></i> LogOut</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            <!-- Your content here -->
            @yield('konten')
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>