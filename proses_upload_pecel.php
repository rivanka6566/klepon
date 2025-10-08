<?php
session_start();
include 'db/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$nama_pegawai = $_POST['nama_pegawai'];
$jenis_cuti = $_POST['jenis_cuti'];
$tanggal_mulai_cuti = $_POST['tanggal_mulai_cuti'];
$tanggal_selesai_cuti = $_POST['tanggal_selesai_cuti'];
$tanggal_upload = date('d-m-Y');

$uploaded_files = [];
$target_dir = "uploads/";

// Function to handle file upload
function uploadFile($file_input_name, $target_dir, &$uploaded_files) {
    if (isset($_FILES[$file_input_name]) && $_FILES[$file_input_name]['error'] == UPLOAD_ERR_OK) {
        $filename = basename($_FILES[$file_input_name]["name"]);
        $target_file = $target_dir . $filename;
        
        if (move_uploaded_file($_FILES[$file_input_name]["tmp_name"], $target_file)) {
            $uploaded_files[] = $filename;
            return true;
        } else {
            error_log("Gagal memindahkan file: " . $_FILES[$file_input_name]["tmp_name"] . " ke " . $target_file);
            return false;
        }
    } elseif (isset($_FILES[$file_input_name]) && $_FILES[$file_input_name]['error'] != UPLOAD_ERR_NO_FILE) {
        error_log("Upload error for " . $file_input_name . ": " . $_FILES[$file_input_name]['error']);
        return false;
    }
    return false;
}

$nama_file_surat = null; // Variabel untuk menyimpan nama file yang akan masuk ke DB

if (uploadFile('nama_file_surat', $target_dir, $uploaded_files)) {
    $nama_file_surat = end($uploaded_files); 
} else {
    echo "Peringatan: Gagal mengunggah surat cuti atau tidak ada surat cuti yang diunggah.<br>";
}

$query = "INSERT INTO tbl_cuti (nama_pegawai, jenis_cuti, nama_file_surat, tanggal_upload, tanggal_mulai, tanggal_selesai)
          VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);

if ($stmt === false) {
    die("Error mempersiapkan query: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssssss", $nama_pegawai, $jenis_cuti, $nama_file_surat, $tanggal_upload, $tanggal_mulai_cuti, $tanggal_selesai_cuti);

if (mysqli_stmt_execute($stmt)) {
    header("Location: pecel.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>