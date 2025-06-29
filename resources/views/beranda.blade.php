<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Gudang</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
            color: #333;
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background: linear-gradient(45deg, #343a40, #495057);
            color: white;
            padding: 2rem 1.5rem;
            position: fixed;
        }

        .sidebar h4 {
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .sidebar .nav-link {
            color: white;
            margin: 0.5rem 0;
            padding: 0.8rem 1rem;
            border-radius: 5px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link i {
            margin-right: 0.8rem;
        }

        .sidebar .nav-link.active, 
        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .main-content {
            margin-left: 260px;
            padding: 2rem;
            flex: 1;
        }

        .navbar {
            margin-left: 260px;
            background: #28a745;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
        }

        footer {
            background: #343a40;
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: auto;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .icon-box {
            font-size: 4rem;
            margin-right: 1.5rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .navbar {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4>Menu</h4>
    <ul class="nav flex-column">
        <li><a class="nav-link active" href="{{ route('beranda') }}"><i class="bi bi-house-door"></i> Beranda</a></li>
        <li><a class="nav-link" href="{{ route('kategori')}}"><i class="bi bi-people"></i> Kategori</a></li>
        <li><a class="nav-link" href="{{ route('barang') }}"><i class="bi bi-box"></i> Barang</a></li>
        <li><a class="nav-link" href="{{ route('supplier') }}"><i class="bi bi-truck"></i> Supplier</a></li>
        <li><a class="nav-link" href="{{ route('pembelian') }}"><i class="bi bi-cart"></i> Pembelian</a></li>
    </ul>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistem Gudang</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">{{ $user->nama}}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('logout')}}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="main-content">
    <h2>Dashboard</h2>
    <p>Selamat datang di sistem gudang kami.</p>

    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-bookmark-fill icon-box"></i>
                    <div>
                        <h5>Kategori</h5>
                        <h3 id="jumlah-kategori">{{ $kategoriC }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-people-fill icon-box"></i>
                    <div>
                        <h5>Pengguna</h5>
                        <h3 id="jumlah-pengguna">{{ $userC }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-people-fill icon-box"></i>
                    <div>
                        <h5>Barang</h5>
                        <h3 id="jumlah-barang">{{ $barangC }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-danger text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-people-fill icon-box"></i>
                    <div>
                        <h5>Supplier</h5>
                        <h3 id="jumlah-supplier">{{ $supplierC }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-people-fill icon-box"></i>
                    <div>
                        <h5>Barang</h5>
                        <h3 id="jumlah-pembelian">{{ $pembelianC }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024 Sistem Gudang. All Rights Reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
