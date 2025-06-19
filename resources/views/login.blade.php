<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Gudang - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #121212;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #fff;
        }
        .login-container {
            background: #1f1f1f;
            border-radius: 20px;
            padding: 50px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.8);
            animation: fadeIn 1.2s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #00b894;
        }
        .form-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: #ccc;
        }
        .form-control {
            background: #2d2d2d;
            color: #fff;
            border: 1px solid #444;
            border-radius: 8px;
            padding: 10px;
        }
        .form-control:focus {
            background: #333;
            border-color: #00b894;
            box-shadow: 0 0 6px rgba(0, 184, 148, 0.8);
        }
        .btn-submit {
            background: #00b894;
            border: none;
            color: #fff;
            font-weight: bold;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-size: 1rem;
        }
        .btn-submit:hover {
            background: #019374;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #777;
        }
    </style>
</head>
<body>
<div class="login-container">
    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif
    <div class="login-header">
        <h2>Selamat Datang</h2>
        <p>Masuk untuk mengelola sistem</p>
    </div>
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div class="mb-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
        </div>
        <button type="submit" class="btn-submit">Login</button>
    </form>
    <div class="footer">
        <small>&copy; 2024 Sistem Gudang. Semua hak cipta dilindungi.</small>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
