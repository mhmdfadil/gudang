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
        <li><a class="nav-link" href="{{ route('beranda') }}"><i class="bi bi-house-door"></i> Beranda</a></li>
        <li><a class="nav-link  active" href="{{ route('kategori') }}"><i class="bi bi-people"></i> Kategori</a></li>
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
    <h2>Data Kategori</h2>
    <!-- Tombol Tambah Data -->
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
        <i class="bi bi-plus-circle"></i> Tambah Data
    </button>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataLabel">Tambah Data Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Tabel Data Kategori -->
    <table id="tabel" class="table table-striped table-bordered">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $key => $data)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->nama }}</td>
                <td>
                    <!-- Tombol hapus dengan form -->
                    <form action="{{ route('kategori.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
  
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024 Sistem Gudang. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
        $(document).ready(function() {
            $('#tabel').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/id.json"  // URL untuk indonesia.json
                }
            });
        });
</script>

</body>
</html>
