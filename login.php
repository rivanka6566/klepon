<?php
session_start();
include 'db/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u = $_POST['username'];
    $p = $_POST['password'];

    // JOIN antar tabel berdasarkan username = nip
    $sql = "
        SELECT u.username, u.role, p.nama 
        FROM users u
        JOIN pegawai_bps_bogor p ON u.username = p.nip
        WHERE u.username='$u' AND u.password='$p'
    ";

    $res = mysqli_query($conn, $sql);

    if (!$res) {
        die('Query error: ' . mysqli_error($conn));
    }

    $data = mysqli_fetch_assoc($res);

    if ($data) {
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['username'] = $data['username'];

        header('Location: menu.php');
        exit;
    } else {
        echo "<script>alert('Username atau password salah!'); window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SI Klepon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background-color: #0f172a; /* navy gelap */
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #e2e8f0;
        }

        .login-card {
            background-color: #1e293b; /* biru gelap lembut */
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
            width: 360px;
        }

        .login-title {
            font-weight: 700;
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #f1f5f9;
        }

        .form-control {
            background-color: #334155;
            border: 1px solid #475569;
            border-radius: 10px;
            color: #f8fafc;
        }

        .form-control:focus {
            background-color: #334155;
            border-color: #38bdf8;
            box-shadow: 0 0 0 0.2rem rgba(56, 189, 248, 0.25);
            color: #f8fafc;
        }

        .btn-login {
            background: linear-gradient(90deg, #2563eb, #38bdf8);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-weight: 600;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(90deg, #1e40af, #0ea5e9);
            transform: scale(1.02);
        }

        .footer-text {
            text-align: center;
            font-size: 0.85rem;
            color: #94a3b8;
            margin-top: 1.5rem;
        }

        .footer-text span {
            color: #38bdf8;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h3 class="login-title">Login ke SI-Klepon</h3>
    <form method="POST">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-login w-100">Masuk</button>
    </form>
    <div class="footer-text mt-3">
        © 2025 <span>SI-KLEPON</span> | BPS Kota Bogor
    </div>
</div>

</body>
</html>
