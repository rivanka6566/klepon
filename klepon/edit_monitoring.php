<?php
session_start();
include '../db/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Pastikan ID dikirim
if (!isset($_GET['id'])) {
    header("Location: klepon.php");
    exit;
}

$id = intval($_GET['id']);

// Ambil data SPJ berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM form_data WHERE id = $id");
$d = mysqli_fetch_assoc($query);

if (!$d) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='klepon.php';</script>";
    exit;
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_spj = mysqli_real_escape_string($conn, $_POST['nama_spj']);
    $jenis_spj = mysqli_real_escape_string($conn, $_POST['jenis_spj']);
    $tgl_kirim = mysqli_real_escape_string($conn, $_POST['tgl_kirim']);

    // Cek apakah ada file baru diupload
    $uploaded_files = [];
    if (!empty($_FILES['file_upload']['name'][0])) {
        foreach ($_FILES['file_upload']['name'] as $index => $filename) {
            $tmp_name = $_FILES['file_upload']['tmp_name'][$index];
            $target_dir = "../uploads/";
            $safe_name = time() . "_" . basename($filename);
            $target_file = $target_dir . $safe_name;

            if (move_uploaded_file($tmp_name, $target_file)) {
                $uploaded_files[] = $safe_name;
            }
        }

        // Hapus file lama jika ada file baru
        if (!empty($d['file_names'])) {
            $old_files = json_decode($d['file_names']);
            foreach ($old_files as $old_file) {
                $old_path = "../uploads/" . basename($old_file);
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }
        }

        // Update file_names baru
        $file_names_json = json_encode($uploaded_files);
    } else {
        // Jika tidak upload file baru, tetap gunakan file lama
        $file_names_json = $d['file_names'];
    }

    // Update ke database
    $update = mysqli_query($conn, "
        UPDATE form_data 
        SET nama_spj='$nama_spj',
            jenis_spj='$jenis_spj',
            tgl_kirim='$tgl_kirim',
            file_names='$file_names_json'
        WHERE id=$id
    ");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='klepon.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit SPJ | SI-KLEPON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #a8db74 0%, #7ed957 50%, #38b000 100%);
            background-attachment: fixed;
        }
        .card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(56, 176, 0, 0.15);
            background: #fff;
        }
        h3 {
            color: #38b000;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .btn-success {
            background: #5eb639;
            border: none;
            color: #fff;
        }
        .btn-success:hover {
            background: #38b000;
        }
        .btn-secondary {
            border: none;
        }
        a.file-link {
            color: #198754;
            text-decoration: none;
        }
        a.file-link:hover {
            text-decoration: underline;
            color: #0a5c2c;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card p-4">
        <h3>Edit Data SPJ</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_spj" class="form-label">Nama SPJ</label>
                <input type="text" name="nama_spj" id="nama_spj" class="form-control" value="<?= htmlspecialchars($d['nama_spj']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="jenis_spj" class="form-label">Jenis SPJ</label>
                <select name="jenis_spj" id="jenis_spj" class="form-control" required>
                    <?php
                    $options = [
                        "Perlengkapan", "Konsumsi", "Belanja Bahan",
                        "Pembelian Paket Data / Pulsa", "Honor Instruktur Nasional / Daerah",
                        "Honor Petugas", "Honor Narasumber", "Transport Lokal",
                        "Perjalanan Dinas Luar Kota", "Honor Operasional Satuan Kerja"
                    ];
                    foreach ($options as $opt) {
                        $selected = ($d['jenis_spj'] == $opt) ? 'selected' : '';
                        echo "<option value='$opt' $selected>$opt</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="tgl_kirim" class="form-label">Tanggal Kirim</label>
                <input type="date" name="tgl_kirim" id="tgl_kirim" class="form-control" value="<?= htmlspecialchars($d['tgl_kirim']); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">File yang sudah diupload:</label><br>
                <?php
                $files = json_decode($d['file_names']);
                if ($files && is_array($files)) {
                    foreach ($files as $f) {
                        $path = "../uploads/" . basename($f);
                        echo "<a href='$path' target='_blank' class='file-link'>$f</a><br>";
                    }
                } else {
                    echo "<span class='text-muted'>Tidak ada file</span>";
                }
                ?>
            </div>

            <div class="mb-3">
                <label for="file_upload" class="form-label">Upload File Baru (opsional, bisa lebih dari satu)</label>
                <input type="file" name="file_upload[]" id="file_upload" class="form-control" multiple>
                <small class="text-muted">Jika upload file baru, file lama akan diganti.</small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="klepon.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
