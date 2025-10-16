<?php
<<<<<<< HEAD
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
=======
include 'db/koneksi.php';
mysqli_select_db($conn, 'db_form');

if (!isset($_GET['kode_program'])) {
    die("Error: kode_program tidak ditemukan.");
}

$kode_program = $_GET['kode_program'];

// Ambil data berdasarkan kode_program
$query = mysqli_query($conn, "SELECT * FROM anggaran WHERE kode_program = '$kode_program'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
>>>>>>> ca3ead8b8812baf1931442cd1e409aba9390593b
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
<<<<<<< HEAD
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
=======

    $update = mysqli_query($conn, "
        UPDATE anggaran SET 
            program='$program',
            kode_kegiatan='$kode_kegiatan',
            kegiatan='$kegiatan',
            kode_kro='$kode_kro',
            kro='$kro',
            kode_ro='$kode_ro',
            ro='$ro',
            kode_komponen='$kode_komponen',
            komponen='$komponen',
            kode_subkomponen='$kode_subkomponen',
            nama_subkomponen='$nama_subkomponen',
            kode_akun='$kode_akun',
            nama_akun='$nama_akun'
        WHERE kode_program='$kode_program'
    ");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui!');window.location='anggaran.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
>>>>>>> ca3ead8b8812baf1931442cd1e409aba9390593b
    }
}
?>

<!DOCTYPE html>
<<<<<<< HEAD
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
=======
<html>
<head>
    <title>Edit Anggaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="mb-4">Edit Data Anggaran</h3>
    <form method="POST">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Kode Program</label>
                <input type="text" name="kode_program" value="<?= htmlspecialchars($data['kode_program']); ?>" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label class="form-label">Program</label>
                <input type="text" name="program" value="<?= htmlspecialchars($data['program']); ?>" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Kode Kegiatan</label>
                <input type="text" name="kode_kegiatan" value="<?= htmlspecialchars($data['kode_kegiatan']); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Kegiatan</label>
                <input type="text" name="kegiatan" value="<?= htmlspecialchars($data['kegiatan']); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Kode KRO</label>
                <input type="text" name="kode_kro" value="<?= htmlspecialchars($data['kode_kro']); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">KRO</label>
                <input type="text" name="kro" value="<?= htmlspecialchars($data['kro']); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Kode RO</label>
                <input type="text" name="kode_ro" value="<?= htmlspecialchars($data['kode_ro']); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">RO</label>
                <input type="text" name="ro" value="<?= htmlspecialchars($data['ro']); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Kode Komponen</label>
                <input type="text" name="kode_komponen" value="<?= htmlspecialchars($data['kode_komponen']); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Komponen</label>
                <input type="text" name="komponen" value="<?= htmlspecialchars($data['komponen']); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Kode Subkomponen</label>
                <input type="text" name="kode_subkomponen" value="<?= htmlspecialchars($data['kode_subkomponen']); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama Subkomponen</label>
                <input type="text" name="nama_subkomponen" value="<?= htmlspecialchars($data['nama_subkomponen']); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Kode Akun</label>
                <input type="text" name="kode_akun" value="<?= htmlspecialchars($data['kode_akun']); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama Akun</label>
                <input type="text" name="nama_akun" value="<?= htmlspecialchars($data['nama_akun']); ?>" class="form-control">
            </div>
        </div>
        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="anggaran.php" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
>>>>>>> ca3ead8b8812baf1931442cd1e409aba9390593b
</div>
</body>
</html>
