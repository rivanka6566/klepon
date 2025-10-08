<?php
session_start();
include 'db/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$message = '';
$edit_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$data_cuti = null;

if ($edit_id > 0) {
    // Mengambil data cuti yang akan diedit dari database
    $stmt = mysqli_prepare($conn, "SELECT * FROM tbl_cuti WHERE id_cuti = ?");
    mysqli_stmt_bind_param($stmt, "i", $edit_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data_cuti = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if (!$data_cuti) {
        $message = "Data cuti tidak ditemukan.";
    }
} else {
    $message = "ID cuti tidak valid.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_cuti'])) {
    $id_cuti_post = intval($_POST['id_cuti']);
    $jenis_cuti = $_POST['jenis_cuti'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $jumlah_cuti_hari = floatval($_POST['jumlah_cuti']); // Menggunakan floatval untuk mendukung 0.5
    $tanggal_selesai = date('Y-m-d', strtotime($tanggal_mulai . ' + ' . ($jumlah_cuti_hari - 1) . ' days'));
    $updated_at = date('Y-m-d H:i:s');
    $nama_file_surat_lama = $_POST['nama_file_surat_lama'];
    $nama_file_surat_baru = $nama_file_surat_lama;

    // Logika upload file baru (jika ada)
    if (isset($_FILES['file_surat']) && $_FILES['file_surat']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }
        
        $filename = basename($_FILES['file_surat']['name']);
        $target_file = $target_dir . $filename;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = array("pdf", "doc", "docx", "jpg", "jpeg", "png");

        if (!in_array($file_type, $allowed_types)) {
            $message = "Maaf, hanya file PDF, DOC, DOCX, JPG, JPEG, & PNG yang diizinkan.";
        } elseif ($_FILES["file_surat"]["size"] > 5000000) {
            $message = "Maaf, ukuran file terlalu besar.";
        } else {
            if (move_uploaded_file($_FILES["file_surat"]["tmp_name"], $target_file)) {
                $nama_file_surat_baru = $filename;
                // Hapus file lama jika ada
                if (!empty($nama_file_surat_lama) && file_exists($target_dir . $nama_file_surat_lama)) {
                    unlink($target_dir . $nama_file_surat_lama);
                }
            } else {
                $message = "Maaf, terjadi kesalahan saat mengunggah file.";
            }
        }
    }

    if (empty($message)) {
        // Perintah UPDATE untuk menyimpan perubahan
        $query = "UPDATE tbl_cuti SET jenis_cuti = ?, tanggal_mulai = ?, tanggal_selesai = ?, jumlah_cuti = ?, nama_file_surat = ?, updated_at = ? WHERE id_cuti = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssdsss", $jenis_cuti, $tanggal_mulai, $tanggal_selesai, $jumlah_cuti_hari, $nama_file_surat_baru, $updated_at, $id_cuti_post);
        
        if (mysqli_stmt_execute($stmt)) {
            header("Location: detail_berkas.php?nip=" . urlencode($data_cuti['nip_pegawai']) . "&status=edited");
            exit;
        } else {
            $message = "Error saat menyimpan perubahan: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Berkas Cuti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h3 class="mb-2">Edit Berkas Cuti</h3>
        
        <?php if (!empty($message)) { ?>
            <div class="alert alert-info"><?= $message; ?></div>
        <?php } ?>

        <?php if ($data_cuti): ?>
        <p class="mb-3">
            Untuk pegawai: <strong><?= htmlspecialchars($data_cuti['nama_pegawai']); ?></strong> (NIP: <?= htmlspecialchars($data_cuti['nip_pegawai']); ?>)
        </p>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_cuti" value="<?= htmlspecialchars($data_cuti['id_cuti']); ?>">
            <input type="hidden" name="nip_pegawai" value="<?= htmlspecialchars($data_cuti['nip_pegawai']); ?>">
            <input type="hidden" name="nama_file_surat_lama" value="<?= htmlspecialchars($data_cuti['nama_file_surat']); ?>">

            <div class="mb-3">
                <label for="jenis_cuti" class="form-label">Jenis Cuti:</label>
                <select name="jenis_cuti" id="jenis_cuti" class="form-control" required>
                    <option value="">-- Pilih Jenis Cuti --</option>
                    <option value="Cuti Tahunan" <?= ($data_cuti['jenis_cuti'] == 'Cuti Tahunan') ? 'selected' : ''; ?>>1. Cuti Tahunan</option>
                    <option value="Cuti Besar" <?= ($data_cuti['jenis_cuti'] == 'Cuti Besar') ? 'selected' : ''; ?>>2. Cuti Besar</option>
                    <option value="Cuti Sakit" <?= ($data_cuti['jenis_cuti'] == 'Cuti Sakit') ? 'selected' : ''; ?>>3. Cuti Sakit</option>
                    <option value="Cuti Alasan Penting" <?= ($data_cuti['jenis_cuti'] == 'Cuti Alasan Penting') ? 'selected' : ''; ?>>4. Cuti Alasan Penting</option>
                    <option value="Cuti Melahirkan" <?= ($data_cuti['jenis_cuti'] == 'Cuti Melahirkan') ? 'selected' : ''; ?>>5. Cuti Melahirkan</option>
                    <option value="Cuti Luar Tanggungan Negara" <?= ($data_cuti['jenis_cuti'] == 'Cuti Luar Tanggungan Negara') ? 'selected' : ''; ?>>6. Cuti Luar Tanggungan Negara</option>
                    <option value="Cuti Tahunan (Harian)" <?= ($data_cuti['jenis_cuti'] == 'Cuti Tahunan (Harian)') ? 'selected' : ''; ?>>7. Cuti Tahunan (Harian)</option>
                    <option value="Cuti Tahunan (1/2 Hari)" <?= ($data_cuti['jenis_cuti'] == 'Cuti Tahunan (1/2 Hari)') ? 'selected' : ''; ?>>8. Cuti Tahunan (1/2 Hari)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai Cuti:</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?= htmlspecialchars($data_cuti['tanggal_mulai']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_cuti" class="form-label">Jumlah Cuti (Hari):</label>
                <input type="number" class="form-control" id="jumlah_cuti" name="jumlah_cuti" value="<?= htmlspecialchars($data_cuti['jumlah_cuti']); ?>" step="0.5" required>
            </div>
            <div class="mb-3">
                <label for="file_surat" class="form-label">Unggah Berkas Cuti:</label>
                <?php if (!empty($data_cuti['nama_file_surat'])): ?>
                    <p>Berkas saat ini: <a href="uploads/<?= htmlspecialchars($data_cuti['nama_file_surat']); ?>" target="_blank"><?= htmlspecialchars($data_cuti['nama_file_surat']); ?></a></p>
                    <p class="form-text">Biarkan kosong jika tidak ingin mengubah berkas.</p>
                <?php endif; ?>
                <input type="file" class="form-control" id="file_surat" name="file_surat">
                <div class="form-text">Maks. 5MB, format PDF, DOC, DOCX, JPG, JPEG, PNG.</div>
            </div>

            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
            <a href="detail_berkas.php?nip=<?= htmlspecialchars($data_cuti['nip_pegawai']); ?>" class="btn btn-secondary">Batal</a>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>