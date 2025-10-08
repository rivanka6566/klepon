<?php
session_start();
include '../db/koneksi.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$role = $_SESSION['role'];
$data = mysqli_query($conn, "SELECT * FROM form_data ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Monitoring SPJ Klepon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #a8db74 0%, #7ed957 50%, #38b000 100%);
            background-attachment: fixed;
        }
        .table th, .table td { vertical-align: middle; }
        .btn-secondary { border: none; }
        .btn-success { background: #5eb639; border: none; color: #fff; }
        .btn-success:hover { background: #38b000; color: #fff; }
        .btn-warning { color: #000; }
        .btn-danger { color: #fff; }
        .card, .table-responsive { background: rgba(255,255,255,0.95); border-radius: 18px; }
        h3 { color: #2f8f00; font-weight: bold; letter-spacing: 1px; }
        input#search { border-radius: 12px; }
        .table-responsive {
            background: rgba(255,255,255,0.95);
            border-radius: 18px;
            overflow: hidden;
            padding: 0;
        }
        .table {
            margin-bottom: 0;
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

<div class="container mt-4">
    <h3 class="mb-3 text-black">Monitoring SPJ Klepon</h3>

    <?php if ($role == 'admin_utama' || $role == 'user'): ?>
        <div class="mb-3 d-flex gap-2">
            <a href="../menu.php" class="btn btn-secondary">Kembali ke Dashboard</a>
            <a href="klepon_form.php" class="btn btn-success">Buat Baru</a>
        </div>
    <?php endif; ?>

    <input type="text" id="search" class="form-control mb-3" placeholder="Cari Nama SPJ..." onkeyup="filterTable()">

    <div class="table-responsive shadow">
        <table class="table table-bordered table-striped align-middle" id="spjTable">
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
