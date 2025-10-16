<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
$role = $_SESSION['role'];
include '../db/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggaran - SI Klepon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
        }
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
<<<<<<< HEAD
        .table-scroll {
            max-height: 500px; /* atur tinggi area scroll */
            overflow-y: auto;  /* scroll vertikal */
            overflow-x: auto;  /* scroll horizontal jika kolom banyak */
        }
=======
>>>>>>> ca3ead8b8812baf1931442cd1e409aba9390593b
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div>
        <div class="brand">
            <img src="../uploads/kle.png" alt="Logo SI-KLEPON" 
                 style="width: 24px; height: 24px; vertical-align: middle; margin-right: 8px;">
            SI-KLEPON
        </div>
        <div class="menu">
            <a href="../menu.php"><i class="bi bi-house-door"></i> Dashboard</a>
<<<<<<< HEAD
            <a href="../klepon/klepon.php"><i class="bi bi-folder2-open"></i> Realisasi Anggaran</a>
            <a href="anggaran.php" class="active"><i class="bi bi-cash-coin"></i> Rencana Anggaran</a>
=======
            <a href="../klepon/klepon.php"><i class="bi bi-folder2-open"></i> Monitoring SPJ</a>
            <a href="anggaran.php" class="active"><i class="bi bi-cash-coin"></i> Anggaran</a>
>>>>>>> ca3ead8b8812baf1931442cd1e409aba9390593b
            <a href="../pengaturan.php" 
                style="margin-top: 20px; border-top: 1px solid white; padding-top: 10px;">
                <i class="bi bi-gear"></i> Pengaturan
            </a>
        </div>
    </div>
    <div class="logout">
<<<<<<< HEAD
        <span class="d-block mb-2">👋 Halo, <?= $_SESSION['nama']; ?></span>
=======
        <span class="d-block mb-2">👋 Halo, <?= $_SESSION['nama']; ?> (<?= $_SESSION['role']; ?>)</span>
>>>>>>> ca3ead8b8812baf1931442cd1e409aba9390593b
        <a href="../logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <h3 class="mb-3 text-black">Data Anggaran</h3>

<<<<<<< HEAD
    <?php if ($role == 'admin_utama' || $role == 'user'): ?>
        <div class="mb-3 d-flex gap-2">
            <a href="../menu.php" class="btn btn-secondary">Kembali ke Dashboard</a>
            <a href="../anggaran/anggaran_form.php" class="btn btn-success">Anggaran Baru</a>
=======
    <?php if ($role == 'subbagian_umum' || $role == 'user'): ?>
        <div class="mb-3 d-flex gap-2">
            <a href="../menu.php" class="btn btn-secondary">Kembali ke Dashboard</a>
>>>>>>> ca3ead8b8812baf1931442cd1e409aba9390593b
        </div>
    <?php endif; ?>

    <input type="text" id="search" class="form-control mb-3" placeholder="Cari data anggaran..." onkeyup="filterTable()">

    <div class="card shadow-sm">
        <div class="card-body">
<<<<<<< HEAD
            <div class="table-responsive table-scroll">
                <table class="table table-bordered table-hover align-middle mb-0">
=======
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
>>>>>>> ca3ead8b8812baf1931442cd1e409aba9390593b
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Kode Program</th>
                            <th>Program</th>
                            <th>Kode Kegiatan</th>
                            <th>Kegiatan</th>
                            <th>Kode KRO</th>
                            <th>KRO</th>
                            <th>Kode RO</th>
                            <th>RO</th>
                            <th>Kode Komponen</th>
                            <th>Komponen</th>
                            <th>Kode Subkomponen</th>
                            <th>Nama Subkomponen</th>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
<<<<<<< HEAD
                            <th>Pagu</th>
                            <th>Jumlah Pagu</th>
=======
>>>>>>> ca3ead8b8812baf1931442cd1e409aba9390593b
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($conn, "
                            SELECT 
                                `Kode Program` AS kode_program,
                                `Program` AS program,
                                `Kode Kegiatan` AS kode_kegiatan,
                                `Kegiatan` AS kegiatan,
                                `Kode KRO` AS kode_kro,
                                `KRO` AS kro,
                                `Kode RO` AS kode_ro,
                                `RO` AS ro,
                                `Kode Komponen` AS kode_komponen,
                                `Komponen` AS komponen,
                                `Kode Sub Komponen` AS kode_subkomponen,
                                `Nama Sub Komponen` AS nama_subkomponen,
                                `Kode Akun` AS kode_akun,
                                `Nama Akun` AS nama_akun
                            FROM anggaran
                        ");
                        
                        if ($query && mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                echo "<tr>
                                    <td class='text-center'>{$no}</td>
                                    <td>{$row['kode_program']}</td>
                                    <td>{$row['program']}</td>
                                    <td>{$row['kode_kegiatan']}</td>
                                    <td>{$row['kegiatan']}</td>
                                    <td>{$row['kode_kro']}</td>
                                    <td>{$row['kro']}</td>
                                    <td>{$row['kode_ro']}</td>
                                    <td>{$row['ro']}</td>
                                    <td>{$row['kode_komponen']}</td>
                                    <td>{$row['komponen']}</td>
                                    <td>{$row['kode_subkomponen']}</td>
                                    <td>{$row['nama_subkomponen']}</td>
                                    <td>{$row['kode_akun']}</td>
                                    <td>{$row['nama_akun']}</td>
<<<<<<< HEAD
                                    <td>    </td>
                                    <td>    </td>
                                    <td class='text-center'>
                                        <a href='?id={$no}' class='btn btn-sm btn-primary'> 
                                            <i class='bi bi-eye'></i>
                                        </a>
=======
                                    <td class='text-center'>
>>>>>>> ca3ead8b8812baf1931442cd1e409aba9390593b
                                        <a href='edit_anggaran.php?id={$no}' class='btn btn-sm btn-warning'>
                                            <i class='bi bi-pencil-square'></i>
                                        </a>
                                        <a href='hapus_anggaran.php?id={$no}' class='btn btn-sm btn-danger' onclick='return confirm(\"Hapus data ini?\");'>
                                            <i class='bi bi-trash'></i>
                                        </a>
                                    </td>
                                </tr>";
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='16' class='text-center text-muted'>Belum ada data anggaran</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
