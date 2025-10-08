<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #ffb347 0%, #ffcc33 50%, #ff7e5f 100%);
            background-attachment: fixed;
        }
        .navbar {
            background: linear-gradient(90deg, #ff9800 0%, #ffb347 100%) !important;
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
            letter-spacing: 2px;
        }
        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(255, 152, 0, 0.15);
            transition: transform 0.2s, box-shadow 0.2s;
            background: linear-gradient(135deg, #fffbe6 60%, #ffe0b2 100%);
        }
        .card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px rgba(255, 152, 0, 0.25);
        }
        .btn-primary, .btn-primary:focus {
            background: linear-gradient(90deg, #ff9800 0%, #ffb347 100%);
            border: none;
            color: #fff;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #ffb347 0%, #ff9800 100%);
            color: #fff;
        }
        .btn-danger {
            background: #ff7043;
            border: none;
        }
        .btn-danger:hover {
            background: #ff5722;
        }
        .card-title {
            color: #ff9800;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .navbar .me-3, .navbar .btn-danger {
            color: #fff !important;
        }
        .dashboard-title {
            color: #fff;
            font-weight: bold;
            letter-spacing: 2px;
            text-shadow: 0 2px 8px rgba(255, 152, 0, 0.2);
        }
        @media (max-width: 767px) {
            .card img {
                max-height: 120px !important;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">DASHBOARD</a>
        <div class="d-flex align-items-center">
            <span class="me-3">Halo, <?= $_SESSION['username']; ?> (<?= $_SESSION['role']; ?>)</span>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="dashboard-title text-center mb-5">Selamat Datang di Sistem Monitoring</h2>
    <div class="row g-4 justify-content-center">
        <!-- Klepon -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">SI-Klepon</h5>
                    <img src="uploads/kle.png" class="img-fluid my-3" alt="Klepon" style="max-height: 180px;">
                    <p class="card-text">Sistem Kelola SPJ Online</p>
                    <a href="klepon/klepon.php" class="btn btn-primary w-75">Pilih</a>
                </div>
            </div>
        </div>
        <!-- Anggaran -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Anggaran</h5>
                    <img src="uploads/anggaran.jpg" class="img-fluid my-3" alt="ANGGARAN" style="max-height: 180px;">
                    <p class="card-text">Form Anggaran SPJ</p>
                    <a href="anggaran.php" class="btn btn-primary w-75">Pilih</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>