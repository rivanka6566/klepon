<?php
session_start();
include '../db/koneksi.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
$role = $_SESSION['role'];

// Ambil data berdasarkan ID (atau nomor urut baris)
$id = $_GET['id'] ?? 0;

// Ambil data anggaran berdasarkan nomor urut (pakai LIMIT offset)
$query = mysqli_query($conn, "SELECT * FROM anggaran LIMIT " . ($id - 1) . ", 1");
$data = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_program = $_POST['kode_program'];
    $program = $_POST['program'];
    $kode_kegiatan = $_POST['kode_kegiatan'];
    $kegiatan = $_POST['kegiatan'];
    $kode_kro = $_POST['kode_kro'];
    $kro = $_POST['kro'];
    $kode_ro = $_POST['kode_ro'];
    $ro = $_POST['ro'];
    $kode_komponen = $_POST['kode_komponen'];
    $komponen = $_POST['komponen'];
    $kode_subkomponen = $_POST['kode_subkomponen'];
    $nama_subkomponen = $_POST['nama_subkomponen'];
    $kode_akun = $_POST['kode_akun'];
    $nama_akun = $_POST['nama_akun'];
    $pagu = $_POST['pagu'];
    $jumlah_pagu = $_POST['jumlah_pagu'];

    // Update data
    $update = mysqli_query($conn, "
        UPDATE anggaran SET
            `Kode Program`='$kode_program',
            `Program`='$program',
            `Kode Kegiatan`='$kode_kegiatan',
            `Kegiatan`='$kegiatan',
            `Kode KRO`='$kode_kro',
            `KRO`='$kro',
            `Kode RO`='$kode_ro',
            `RO`='$ro',
            `Kode Komponen`='$kode_komponen',
            `Komponen`='$komponen',
            `Kode Sub Komponen`='$kode_subkomponen',
            `Nama Sub Komponen`='$nama_subkomponen',
            `Kode Akun`='$kode_akun',
            `Nama Akun`='$nama_akun',
            `Pagu`='$pagu',
            `Jumlah Pagu`='$jumlah_pagu'
        LIMIT 1
    ");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='anggaran.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data Anggaran - SI Klepon</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card p-4">
        <h3>Edit Data Anggaran</h3>
        <form method="POST">
            <div class="row">
                <?php foreach ($data as $key => $value): ?>
                    <?php if (!is_numeric($key)): ?>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><?= $key ?></label>
                            <input type="text" name="<?= str_replace(' ', '_', strtolower($key)) ?>" value="<?= htmlspecialchars($value) ?>" class="form-control">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan Perubahan</button>
            <a href="anggaran.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </form>
    </div>
</div>
</body>
</html>
