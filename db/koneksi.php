<?php
$host = "127.0.0.1";
$user = "root";
$pass = ""; // Kosong, karena kamu bisa login ke phpMyAdmin tanpa password
$db   = "db_form"; // Pastikan sesuai nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
