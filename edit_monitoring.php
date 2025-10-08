<?php
session_start();
include 'db/koneksi.php';

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$role = $_SESSION['role']; // Get the current user's role

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM form_data WHERE id = $id"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Start building the update query
    $updateFields = [];

    // PPK (Ppk- mengubah status tanggal dan ket)
    if ($role == 'admin_tabel' || $role == 'ppk') { // Assuming 'ppk' is the role for PPK
        $ppk_status = mysqli_real_escape_string($conn, $_POST['ppk_status']);
        $ppk_tanggal = mysqli_real_escape_string($conn, $_POST['ppk_tanggal']);
        $ppk_keterangan = mysqli_real_escape_string($conn, $_POST['ppk_keterangan']);
        $updateFields[] = "ppk_status = '$ppk_status'";
        $updateFields[] = "ppk_tanggal = '$ppk_tanggal'";
        $updateFields[] = "ppk_keterangan = '$ppk_keterangan'";
    }

    // Bendahara (Bendahara - status tanggal pembayaran)
    if ($role == 'admin_tabel' || $role == 'bendahara') { // Assuming 'bendahara' is the role for Bendahara
        $bendahara_status = mysqli_real_escape_string($conn, $_POST['bendahara_status']);
        $bendahara_tanggal = mysqli_real_escape_string($conn, $_POST['bendahara_tanggal']);
        // The original request only mentioned status and tanggal for Bendahara, not keterangan.
        // So, 'bendahara_keterangan' is not included in the update based on the request.
        $updateFields[] = "bendahara_status = '$bendahara_status'";
        $updateFields[] = "bendahara_tanggal = '$bendahara_tanggal'";
    }

    // PPSPM (PPSM -status tanggal keterang proses akhir)
    if ($role == 'admin_tabel' || $role == 'ppspm') { // Assuming 'ppspm' is the role for PPSPM
        $ppspm_status = mysqli_real_escape_string($conn, $_POST['ppspm_status']);
        $ppspm_tanggal = mysqli_real_escape_string($conn, $_POST['ppspm_tanggal']);
        $ppspm_keterangan = mysqli_real_escape_string($conn, $_POST['ppspm_keterangan']);
        $proses_terakhir = mysqli_real_escape_string($conn, $_POST['proses_terakhir']); // "proses_terakhir" is also controlled by PPSPM
        $updateFields[] = "ppspm_status = '$ppspm_status'";
        $updateFields[] = "ppspm_tanggal = '$ppspm_tanggal'";
        $updateFields[] = "ppspm_keterangan = '$ppspm_keterangan'";
        $updateFields[] = "proses_terakhir = '$proses_terakhir'";
    }

    // The 'proses_bayar' field seems to be a general status, let's allow 'admin_tabel' to modify it.
    // If it should also be controlled by Bendahara, add || $role == 'bendahara'
    if ($role == 'admin_tabel') {
        $proses_bayar = mysqli_real_escape_string($conn, $_POST['proses_bayar']);
        $updateFields[] = "proses_bayar = '$proses_bayar'";
    }


    if (!empty($updateFields)) {
        $updateQuery = "UPDATE form_data SET " . implode(", ", $updateFields) . " WHERE id = $id";
        mysqli_query($conn, $updateQuery);
    }

    header("Location: klepon.php");
    exit;
}

// Contoh dropdown
$dropdown = [
    "Setuju", "UP", "Perbaiki", "Ditunda", "Tidak Lengkap, Upload Ulang"
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Monitoring</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h3>Edit Monitoring SPJ</h3>
    <form method="POST">
        <div class="row">
            <?php if ($role == 'admin_tabel' || $role == 'ppk'): // PPK fields ?>
                <div class="col-md-4 mb-3">
                    <label>PPK Status</label>
                    <select name="ppk_status" class="form-control"><?php foreach($dropdown as $d) echo "<option".($data['ppk_status']==$d?" selected":"").">$d</option>"; ?></select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>PPK Tanggal</label>
                    <input type="date" name="ppk_tanggal" class="form-control" value="<?= $data['ppk_tanggal'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>PPK Keterangan</label>
                    <input type="text" name="ppk_keterangan" class="form-control" value="<?= $data['ppk_keterangan'] ?>">
                </div>
            <?php endif; ?>

            <?php if ($role == 'admin_tabel' || $role == 'bendahara'): // Bendahara fields ?>
                <div class="col-md-4 mb-3">
                    <label>Bendahara Status</label>
                    <select name="bendahara_status" class="form-control"><?php foreach($dropdown as $d) echo "<option".($data['bendahara_status']==$d?" selected":"").">$d</option>"; ?></select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Bendahara Tanggal</label>
                    <input type="date" name="bendahara_tanggal" class="form-control" value="<?= $data['bendahara_tanggal'] ?>">
                </div>
            <?php endif; ?>

            <?php if ($role == 'admin_tabel'): // 'Proses Bayar' field, assuming only admin_tabel can modify it ?>
                <div class="col-md-4 mb-3">
                    <label>Proses Bayar</label>
                    <select name="proses_bayar" class="form-control"><?php foreach($dropdown as $d) echo "<option".($data['proses_bayar']==$d?" selected":"").">$d</option>"; ?></select>
                </div>
            <?php endif; ?>

            <?php if ($role == 'admin_tabel' || $role == 'ppspm'): // PPSPM fields ?>
                <div class="col-md-4 mb-3">
                    <label>PPSPM Status</label>
                    <select name="ppspm_status" class="form-control"><?php foreach($dropdown as $d) echo "<option".($data['ppspm_status']==$d?" selected":"").">$d</option>"; ?></select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>PPSPM Tanggal</label>
                    <input type="date" name="ppspm_tanggal" class="form-control" value="<?= $data['ppspm_tanggal'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>PPSPM Keterangan</label>
                    <input type="text" name="ppspm_keterangan" class="form-control" value="<?= $data['ppspm_keterangan'] ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Proses Terakhir</label>
                    <select name="proses_terakhir" class="form-control"><?php foreach($dropdown as $d) echo "<option".($data['proses_terakhir']==$d?" selected":"").">$d</option>"; ?></select>
                </div>
            <?php endif; ?>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="klepon.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>