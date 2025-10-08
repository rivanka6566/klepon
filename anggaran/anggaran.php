<?php
session_start();
include 'db/koneksi.php'; // tetap di folder form_klepon/db

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// pastikan koneksi ke db_form
mysqli_select_db($conn, 'db_form');

$data = mysqli_query($conn, "SELECT * FROM anggaran");
if (!$data) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Anggaran - Klepon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #a8db74 0%, #7ed957 50%, #38b000 100%);
            background-attachment: fixed;
        }
        .table th, .table td { vertical-align: middle; }
        .btn-success { background: #5eb639; border: none; color: #fff; }
        .btn-success:hover { background: #38b000; color: #fff; }
        .card, .table-responsive { background: rgba(255,255,255,0.95); border-radius: 18px; }
        h3 { color: #2f8f00; font-weight: bold; letter-spacing: 1px; }
        input#search { border-radius: 12px; }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-3 text-black">Data Anggaran</h3>

    <div class="mb-3 d-flex gap-2">
        <a href="menu.php" class="btn btn-secondary">Kembali</a>
        <a href="anggaran_form.php" class="btn btn-success">Tambah Data</a>
    </div>

    <input type="text" id="search" class="form-control mb-3" placeholder="Cari Program..." onkeyup="filterTable()">

    <div class="table-responsive shadow">
        <table class="table table-bordered table-striped align-middle" id="anggaranTable">
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while ($d = mysqli_fetch_assoc($data)) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($d['kode_program'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['program'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['kode_kegiatan'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['kegiatan'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['kode_kro'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['kro'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['kode_ro'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['ro'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['kode_komponen'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['komponen'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['kode_subkomponen'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['nama_subkomponen'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['kode_akun'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($d['nama_akun'] ?? '-'); ?></td>
                        <td class="text-center">
                            <a href="edit_anggaran.php?kode_program=<?= urlencode($d['kode_program']); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="hapus_anggaran.php?kode_program=<?= urlencode($d['kode_program']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
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
    const rows = document.querySelectorAll("#anggaranTable tbody tr");
    rows.forEach(row => {
        const cell = row.querySelector("td:nth-child(3)");
        row.style.display = cell && cell.textContent.toUpperCase().includes(input) ? "" : "none";
    });
}
</script>

</body>
</html>
