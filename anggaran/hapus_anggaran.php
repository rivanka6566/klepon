<?php
include 'db/koneksi.php';
mysqli_select_db($conn, 'db_form');

if (!isset($_GET['kode_program'])) {
    die("Error: kode_program tidak ditemukan.");
}

$kode_program = $_GET['kode_program'];

$hapus = mysqli_query($conn, "DELETE FROM anggaran WHERE kode_program = '$kode_program'");

if ($hapus) {
    echo "<script>alert('Data berhasil dihapus!');window.location='anggaran.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!');window.location='anggaran.php';</script>";
}
?>
