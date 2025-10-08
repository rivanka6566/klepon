<?php
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
    }
}
?>

<!DOCTYPE html>
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
</div>
</body>
</html>
