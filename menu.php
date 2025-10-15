<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SI Klepon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
        }
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            background-color: #1e1f26;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            z-index: 1000;
        }
        .sidebar .brand {
            font-size: 20px;
            font-weight: 600;
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }
        .sidebar .menu {
            flex: 1;
            padding: 15px 0;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            color: #cfd3dc;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a i {
            font-size: 18px;
        }
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .logout {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 15px 20px;
        }
        .logout a {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: 600;
        }
        .main-content {
            margin-left: 240px;
            padding: 30px;
        }
        h2 {
            font-weight: bold;
            color: #333;
        }
        .welcome {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div>
        <div class="brand">
            <img src="uploads/kle.png" alt="Logo SI-KLEPON" 
                 style="width: 24px; height: 24px; vertical-align: middle; margin-right: 8px;">
            SI-KLEPON
        </div>
        <div class="menu">
            <a href="menu.php" class="active"><i class="bi bi-house-door"></i> Dashboard</a>
            <a href="klepon/klepon.php"><i class="bi bi-folder2-open"></i> Monitoring SPJ</a>
            <a href="anggaran/anggaran.php"><i class="bi bi-cash-coin"></i> Anggaran</a>
            <a href="pengaturan.php" 
                style="margin-top: 20px; border-top: 1px solid white; padding-top: 10px;">
                <i class="bi bi-gear"></i> Pengaturan
            </a>
        </div>
    </div>
    <div class="logout">
        <span class="d-block mb-2">👋 Halo, <?= $_SESSION['nama']; ?> (<?= $_SESSION['role']; ?>)</span>
        <a href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="welcome mb-4">
        <h2>Selamat Datang di SI-KLEPON</h2>
        <p>Gunakan menu untuk mengelola dokumen SPJ dan data anggaran.</p>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Card Monitoring SPJ -->
            <div class="col-md-5 col-lg-4 mb-4">
                <div class="card text-center shadow-sm border-0 hover-card" 
                     onclick="window.location.href='klepon/klepon.php'" 
                     style="cursor:pointer; transition: all 0.3s;">
                    <div class="card-body">
                        <i class="bi bi-clipboard-data" style="font-size: 36px; color:#007bff;"></i>
                        <h5 class="card-title mt-3">Monitoring SPJ</h5>
                        <p class="card-text text-muted">Lihat data SPJ dan progres monitoring</p>
                    </div>
                </div>
            </div>

            <!-- Card Anggaran -->
            <div class="col-md-5 col-lg-4 mb-4">
                <div class="card text-center shadow-sm border-0 hover-card" 
                     onclick="window.location.href='anggaran/anggaran.php'" 
                     style="cursor:pointer; transition: all 0.3s;">
                    <div class="card-body">
                        <i class="bi bi-cash-stack" style="font-size: 36px; color:#28a745;"></i>
                        <h5 class="card-title mt-3">Anggaran</h5>
                        <p class="card-text text-muted">Lihat dan kelola data anggaran kegiatan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
