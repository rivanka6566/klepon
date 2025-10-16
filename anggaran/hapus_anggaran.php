<?php
session_start();
// pastikan path include relatif ke lokasi file ini (anggaran/hapus_anggaran.php)
include '../db/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

// ambil param id (bisa berupa id PK atau nomor urut)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    echo "<script>alert('Parameter ID tidak valid.'); window.location='anggaran.php';</script>";
    exit;
}

// Cek apakah tabel anggaran punya kolom 'id'
$hasIdCol = false;
$cols = mysqli_query($conn, "SHOW COLUMNS FROM `anggaran` LIKE 'id'");
if ($cols && mysqli_num_rows($cols) > 0) {
    $hasIdCol = true;
}

if ($hasIdCol) {
    // Jika ada kolom id => hapus berdasarkan id
    $id_esc = mysqli_real_escape_string($conn, $id);
    $del = mysqli_query($conn, "DELETE FROM `anggaran` WHERE `id` = '$id_esc' LIMIT 1");
    if ($del) {
        echo "<script>alert('Data anggaran berhasil dihapus.'); window.location='anggaran.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($conn) . "'); window.location='anggaran.php';</script>";
    }
    exit;
}

// Dapatkan primary key kolom jika ada (nama PK)
$pkName = null;
$pkResult = mysqli_query($conn, "SHOW KEYS FROM `anggaran` WHERE Key_name = 'PRIMARY'");
if ($pkResult && mysqli_num_rows($pkResult) > 0) {
    $pkRow = mysqli_fetch_assoc($pkResult);
    $pkName = $pkRow['Column_name'];
}

if ($pkName) {
    // ambil nilai PK pada baris urutan $id (offset = $id-1)
    $offset = $id - 1;
    $sel = mysqli_query($conn, "SELECT `$pkName` FROM `anggaran` ORDER BY `$pkName` LIMIT $offset,1");
    if ($sel && mysqli_num_rows($sel) === 1) {
        $row = mysqli_fetch_assoc($sel);
        $pkValue = mysqli_real_escape_string($conn, $row[$pkName]);
        $del = mysqli_query($conn, "DELETE FROM `anggaran` WHERE `$pkName` = '$pkValue' LIMIT 1");
        if ($del) {
            echo "<script>alert('Data anggaran berhasil dihapus.'); window.location='anggaran.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data: " . mysqli_error($conn) . "'); window.location='anggaran.php';</script>";
        }
        exit;
    } else {
        echo "<script>alert('Baris tidak ditemukan.'); window.location='anggaran.php';</script>";
        exit;
    }
}

$offset = $id - 1;

// ambil kolom list
$colsRes = mysqli_query($conn, "SHOW COLUMNS FROM `anggaran`");
$colsArr = [];
while ($c = mysqli_fetch_assoc($colsRes)) {
    $colsArr[] = $c['Field'];
}

// buat SELECT string untuk compare
$select = "SELECT * FROM `anggaran` LIMIT $offset,1";
$res = mysqli_query($conn, $select);
if (!$res || mysqli_num_rows($res) === 0) {
    echo "<script>alert('Baris tidak ditemukan.'); window.location='anggaran.php';</script>";
    exit;
}
$row = mysqli_fetch_assoc($res);

// bangun kondisi WHERE dari semua kolom (escape!)
$whereParts = [];
foreach ($colsArr as $col) {
    $val = mysqli_real_escape_string($conn, $row[$col]);
    // gunakan IS NULL jika null
    if ($row[$col] === null) {
        $whereParts[] = "`$col` IS NULL";
    } else {
        $whereParts[] = "`$col` = '" . $val . "'";
    }
}
$where = implode(' AND ', $whereParts);

// lakukan delete dengan LIMIT 1
$delQuery = "DELETE FROM `anggaran` WHERE $where LIMIT 1";
$del = mysqli_query($conn, $delQuery);
if ($del) {
    echo "<script>alert('Data anggaran berhasil dihapus.'); window.location='anggaran.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data: " . mysqli_error($conn) . "'); window.location='anggaran.php';</script>";
}
