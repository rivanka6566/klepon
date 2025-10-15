<?php
session_start();
include '../db/koneksi.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

$role = $_SESSION['role'];
$data = mysqli_query($conn, "SELECT * FROM form_data ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring SPJ Klepon</title>
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
        .logout {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 15px 20px;
        }
        .logout a {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: 600;
        }

        /* Main content */
        .main-content {
            margin-left: 240px;
            padding: 30px;
        }

        /* Tabel */
        .table-responsive {
            background: none;
            border-radius: 0; /* sudut tajam */
            box-shadow: none;
        }
        .table {
            background-color: white;
            border-radius: 0; /* sudut tajam */
            overflow: hidden;
        }
        th, td {
            vertical-align: middle;
        }
        th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        a.file-link {
            color: #198754;
            text-decoration: none;
        }
        a.file-link:hover {
            text-decoration: underline;
            color: #0a5c2c;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div>
        <div class="brand">
            <img src="../uploads/kle.png" alt="Logo SI-KLEPON" style="width: 24px; height: 24px; vertical-align: middle; margin-right: 8px;">
            SI-KLEPON
        </div>
        <div class="menu">
            <a href="../menu.php"><i class="bi bi-house-door"></i> Dashboard</a>
            <a href="klepon.php" class="active"><i class="bi bi-folder2-open"></i> Monitoring SPJ</a>
            <a href="../anggaran/anggaran.php"><i class="bi bi-cash-coin"></i> Anggaran</a>
            <a href="../pengaturan.php" style="margin-top: 20px; border-top: 1px solid white; padding-top: 10px;">
                <i class="bi bi-gear"></i> Pengaturan
            </a>
        </div>
    </div>
    <div class="logout">
        <span class="d-block mb-2">👋 Halo, <?= $_SESSION['nama']; ?> (<?= $_SESSION['role']; ?>)</span>
        <a href="../logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <h3 class="mb-3 text-black">Monitoring SPJ Klepon</h3>

    <?php if ($role == 'subbagian_umum' || $role == 'user'): ?>
        <div class="mb-3 d-flex gap-2">
            <a href="../menu.php" class="btn btn-secondary">Kembali ke Dashboard</a>
            <a href="../klepon/klepon_form.php" class="btn btn-success">Buat Baru</a>
        </div>
    <?php endif; ?>

    <input type="text" id="search" class="form-control mb-3" placeholder="Cari Nama SPJ..." onkeyup="filterTable()">

    <div class="table-responsive">
        <table class="table table-bordered align-middle" id="spjTable">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama SPJ</th>
                    <th>Jenis SPJ</th>
                    <th>File</th>
                    <th>Tanggal Kirim</th>
                    <th>PPK</th>
                    <th>PPK Tanggal</th>
                    <th>PPK Keterangan</th>
                    <th>Bendahara</th>
                    <th>Bendahara Tanggal</th>
                    <th>Proses Bayar</th>
                    <th>PPSPM</th>
                    <th>PPSPM Tanggal</th>
                    <th>PPSPM Keterangan</th>
                    <th>Proses Akhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while ($d = mysqli_fetch_assoc($data)) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($d['nama_spj']); ?></td>
                        <td><?= htmlspecialchars($d['jenis_spj']); ?></td>
                        <td>
                            <?php
                                $files = json_decode($d['file_names']);
                                if ($files && is_array($files)) {
                                    foreach ($files as $f) {
                                        $filePath = "../uploads/" . basename($f);
                                        if (file_exists($filePath)) {
                                            echo "<a href='$filePath' target='_blank' class='file-link'>$f</a><br>";
                                        } else {
                                            echo "<span class='text-muted'>$f (tidak ditemukan)</span><br>";
                                        }
                                    }
                                } else {
                                    echo "-";
                                }
                            ?>
                        </td>
                        <td><?= $d['tgl_kirim'] ?: '-'; ?></td>
                        <td><?= $d['ppk_status'] ?: '-'; ?></td>
                        <td><?= $d['ppk_tanggal'] ?: '-'; ?></td>
                        <td><?= $d['ppk_keterangan'] ?: '-'; ?></td>
                        <td><?= $d['bendahara_status'] ?: '-'; ?></td>
                        <td><?= $d['bendahara_tanggal'] ?: '-'; ?></td>
                        <td><?= $d['proses_bayar'] ?: '-'; ?></td>
                        <td><?= $d['ppspm_status'] ?: '-'; ?></td>
                        <td><?= $d['ppspm_tanggal'] ?: '-'; ?></td>
                        <td><?= $d['ppspm_keterangan'] ?: '-'; ?></td>
                        <td><?= $d['proses_terakhir'] ?: '-'; ?></td>
                        <td class="text-center">
                            <a href="edit_monitoring.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="hapus_monitoring.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function filterTable() {
    const input = document.getElementById("search").value.toUpperCase();
    const rows = document.querySelectorAll("#spjTable tbody tr");
    rows.forEach(row => {
        const cell = row.querySelector("td:nth-child(2)");
        row.style.display = cell && cell.textContent.toUpperCase().includes(input) ? "" : "none";
    });
}
</script>

</body>
</html>
