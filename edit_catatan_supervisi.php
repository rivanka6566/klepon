<?php
session_start();
include 'db/koneksi.php'; // Pastikan path ini benar

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Pastikan hanya role 'supervisi' yang bisa mengakses halaman ini
if ($_SESSION['role'] != 'supervisi' && $_SESSION['role'] != 'admin_utama') {
    echo "Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.";
    exit;
}

$id_cuti = isset($_GET['id']) ? intval($_GET['id']) : 0;
$catatan_lama = '';
$nip_pegawai_for_redirect = ''; // Variabel baru untuk menyimpan NIP pegawai

// Ambil data cuti, catatan yang sudah ada, dan NIP pegawai
if ($id_cuti > 0) {
    $stmt = mysqli_prepare($conn, "SELECT nip_pegawai, nama_pegawai, jenis_cuti, tanggal_mulai, tanggal_selesai, catatan_supervisi FROM tbl_cuti WHERE id_cuti = ?");
    if ($stmt === false) {
        die("Error mempersiapkan query: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $id_cuti);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data_cuti = mysqli_fetch_assoc($result);

    if ($data_cuti) {
        $nip_pegawai_for_redirect = $data_cuti['nip_pegawai']; // Ambil NIP pegawai di sini
        $catatan_lama = $data_cuti['catatan_supervisi'];
    } else {
        echo "Data cuti tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Cuti tidak valid.";
    exit;
}

// Logika untuk menyimpan catatan baru/update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_catatan = $_POST['catatan_supervisi'];

    $stmt_update = mysqli_prepare($conn, "UPDATE tbl_cuti SET catatan_supervisi = ? WHERE id_cuti = ?");
    if ($stmt_update === false) {
        die("Error mempersiapkan update query: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt_update, "si", $new_catatan, $id_cuti);

    if (mysqli_stmt_execute($stmt_update)) {
        // !!! REDIRECT KEMBALI KE DETAIL BERKAS UNTUK NIP YANG BERSANGKUTAN !!!
        header("Location: detail_berkas.php?nip=" . urlencode($nip_pegawai_for_redirect) . "&status=catatan_saved");
        exit;
    } else {
        echo "Error saat menyimpan catatan: " . mysqli_error($conn);
    }
}

// Fungsi format tanggal
function formatStandardDate($date_string) {
    if (empty($date_string) || $date_string == '0000-00-00') {
        return '-';
    }
    $timestamp = strtotime($date_string);
    if ($timestamp === false) {
        return $date_string;
    }
    return date('d-m-Y', $timestamp);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Catatan Supervisi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h3>Edit Catatan Supervisi untuk Cuti ID: <?= htmlspecialchars($id_cuti); ?></h3>
        <p>Nama Pegawai: <strong><?= htmlspecialchars($data_cuti['nama_pegawai']); ?></strong></p>
        <p>Jenis Cuti: <strong><?= htmlspecialchars($data_cuti['jenis_cuti']); ?></strong></p>
        <p>Periode Cuti: <strong><?= formatStandardDate($data_cuti['tanggal_mulai']); ?></strong> s/d <strong><?= formatStandardDate($data_cuti['tanggal_selesai']); ?></strong></p>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="catatan_supervisi" class="form-label">Catatan Supervisi:</label>
                <textarea class="form-control" id="catatan_supervisi" name="catatan_supervisi" rows="5"><?= htmlspecialchars($catatan_lama); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Catatan</button>
            <a href="detail_berkas.php?nip=<?= urlencode($nip_pegawai_for_redirect); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>