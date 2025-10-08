<?php
include '../db/koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Hapus file yang terkait (jika ada)
    $query = mysqli_query($conn, "SELECT file_names FROM form_data WHERE id = $id");
    $data = mysqli_fetch_assoc($query);
    if ($data && !empty($data['file_names'])) {
        $files = json_decode($data['file_names']);
        if ($files && is_array($files)) {
            foreach ($files as $file) {
                $path = "../uploads/" . basename($file);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
    }

    // Hapus data dari database
    mysqli_query($conn, "DELETE FROM form_data WHERE id = $id");

    header("Location: klepon.php");
    exit;
} else {
    header("Location: klepon.php");
    exit;
}
?>
