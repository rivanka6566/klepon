<?php
session_start();
include '../db/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

// Pastikan ID dikirim
if (!isset($_GET['id'])) {
    header("Location: klepon.php");
    exit;
}

$id = intval($_GET['id']);

// Ambil data SPJ berdasarkan ID (cek kesalahan query)
$query = mysqli_query($conn, "SELECT * FROM form_data WHERE id = $id");
if (!$query) {
    die("Query error: " . mysqli_error($conn));
}
$d = mysqli_fetch_assoc($query);

if (!$d) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='klepon.php';</script>";
    exit;
}

/**
 * Helper: parse file_names field menjadi array nama file
 * Menerima:
 * - JSON array: '["a.pdf","b.jpg"]'
 * - single filename: 'a.pdf'
 * - comma/semicolon/pipe separated: 'a.pdf,b.pdf' atau 'a.pdf; b.pdf'
 */
function parse_file_names($raw) {
    $raw = trim((string)$raw);
    if ($raw === '') return [];

    // Try JSON
    $j = json_decode($raw, true);
    if (is_array($j)) {
        // filter empty and reindex
        return array_values(array_filter(array_map('trim', $j), function($v){ return $v !== ''; }));
    }

    // If contains separators
    foreach ([',',';','|'] as $sep) {
        if (strpos($raw, $sep) !== false) {
            $parts = array_map('trim', explode($sep, $raw));
            $parts = array_values(array_filter($parts, function($v){ return $v !== ''; }));
            if (!empty($parts)) return $parts;
        }
    }

    // Fallback: single non-empty string
    return [$raw];
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ambil input aman (fallback ke nilai lama jika tidak dikirim)
    $nama_spj = mysqli_real_escape_string($conn, $_POST['nama_spj'] ?? $d['nama_spj'] ?? '');
    $jenis_spj = mysqli_real_escape_string($conn, $_POST['jenis_spj'] ?? $d['jenis_spj'] ?? '');
    $program = mysqli_real_escape_string($conn, $_POST['program'] ?? $d['program'] ?? '');
    $output = mysqli_real_escape_string($conn, $_POST['output'] ?? $d['output'] ?? '');
    $komponen = mysqli_real_escape_string($conn, $_POST['komponen'] ?? $d['komponen'] ?? '');
    $akun = mysqli_real_escape_string($conn, $_POST['akun'] ?? $d['akun'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? $d['email'] ?? '');
    // gunakan tanggal yang dikirim user jika ada, kalau tidak gunakan nilai lama
    $tgl_kirim = mysqli_real_escape_string($conn, $_POST['tgl_kirim'] ?? $d['tgl_kirim'] ?? '');

    // Deteksi apakah ada file baru diupload (cek jika ada nama file non-empty)
    $hasNewFiles = false;
    if (isset($_FILES['file_upload']) && isset($_FILES['file_upload']['name']) && is_array($_FILES['file_upload']['name'])) {
        foreach ($_FILES['file_upload']['name'] as $nm) {
            if (trim((string)$nm) !== '') { $hasNewFiles = true; break; }
        }
    }

    $file_names_json = $d['file_names']; // default: tetap pakai lama

    if ($hasNewFiles) {
        $uploaded_files = [];
        $target_dir = "../uploads/";
        // pastikan folder ada
        if (!is_dir($target_dir)) mkdir($target_dir, 0755, true);

        foreach ($_FILES['file_upload']['name'] as $index => $filename) {
            $filename = trim((string)$filename);
            if ($filename === '') continue;
            $tmp_name = $_FILES['file_upload']['tmp_name'][$index];
            // buat nama file aman: timestamp + uniq + basename
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $safe_base = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', pathinfo($filename, PATHINFO_FILENAME));
            $safe_name = time() . "_" . uniqid() . "_" . $safe_base . ($ext ? ".".$ext : "");
            $target_file = $target_dir . $safe_name;

            if (is_uploaded_file($tmp_name) && move_uploaded_file($tmp_name, $target_file)) {
                $uploaded_files[] = $safe_name;
            }
        }

        // jika ada file baru dan file lama ada, hapus file lama
        if (!empty($uploaded_files)) {
            if (!empty($d['file_names'])) {
                $old_files = parse_file_names($d['file_names']);
                foreach ($old_files as $old_file) {
                    $old_path = "../uploads/" . basename($old_file);
                    if (file_exists($old_path)) {
                        @unlink($old_path);
                    }
                }
            }
            $file_names_json = json_encode($uploaded_files);
        } else {
            // jika proses upload gagal, tetap gunakan file lama (atau bisa beri pesan)
            $file_names_json = $d['file_names'];
        }
    }

    // Update ke database (gunakan escaping sederhana)
    $update_sql = "
        UPDATE form_data 
        SET nama_spj = '{$nama_spj}',
            jenis_spj = '{$jenis_spj}',
            program = '{$program}',
            output = '{$output}',
            komponen = '{$komponen}',
            akun = '{$akun}',
            email = '{$email}',
            tgl_kirim = '{$tgl_kirim}',
            file_names = '". mysqli_real_escape_string($conn, $file_names_json) ."'
        WHERE id = $id
    ";

    $update = mysqli_query($conn, $update_sql);

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='klepon.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}

// Ambil lagi data yang terbaru (untuk menampilkan di form)
$d = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM form_data WHERE id = $id"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data SPJ | SI-KLEPON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
        }
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            background-color: #1e1f26;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar .brand { font-size: 20px; font-weight: 600; padding: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); text-align: center; }
        .sidebar .menu { flex: 1; padding: 15px 0; }
        .sidebar a { display:flex; align-items:center; gap:12px; padding:12px 24px; color:#cfd3dc; text-decoration:none; font-weight:500; transition:0.2s; }
        .sidebar a:hover, .sidebar a.active { background-color:#343a40; color:#fff; }
        .logout { border-top:1px solid rgba(255,255,255,0.1); padding:15px 20px; }
        .logout a { color:#ff6b6b; text-decoration:none; font-weight:600; }

        /* Main content */
        .main-content { margin-left: 240px; padding: 30px; }
        .card, .form-control, .btn { border-radius: 0 !important; }
        .card { background-color: transparent !important; box-shadow: none !important; border: none !important; }
        .btn-success { background-color: #5eb639; border: none; }
        .btn-success:hover { background-color: #38b000; }
        .btn-secondary { border: none; }
        a.file-link { color: #198754; text-decoration: none; }
        a.file-link:hover { text-decoration: underline; color: #0a5c2c; }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div>
        <div class="brand">
<<<<<<< HEAD
            <img src="uploads/kle.png" alt="Logo SI-KLEPON" 
                 style="width: 24px; height: 24px; vertical-align: middle; margin-right: 8px;">
            SI-KLEPON
        </div>
        <div class="menu">
            <a href="menu.php" class="active"><i class="bi bi-house-door"></i> Dashboard</a>
            <a href="klepon/klepon.php"><i class="bi bi-folder2-open"></i> Realisasi </a>
            <a href="anggaran/anggaran.php"><i class="bi bi-cash-coin"></i> Rencana Anggaran </a>
            <a href="pengaturan.php" 
                style="margin-top: 20px; border-top: 1px solid white; padding-top: 10px;">
                <i class="bi bi-gear"></i> Pengaturan
            </a>
        </div>
    </div>
    <div class="logout">
        <span class="d-block mb-2">👋 Halo, <?= $_SESSION['nama']; ?></span>
        <a href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
=======
            <img src="../uploads/kle.png" alt="Logo SI-KLEPON" style="width:24px;height:24px;vertical-align:middle;margin-right:8px;">
            SI-KLEPON
        </div>
        <div class="menu">
            <a href="../menu.php"><i class="bi bi-house-door"></i> Dashboard</a>
            <a href="klepon.php" class="active"><i class="bi bi-folder2-open"></i> Monitoring SPJ</a>
            <a href="klepon_form.php"><i class="bi bi-upload"></i> Upload SPJ</a>
            <a href="../anggaran/anggaran.php"><i class="bi bi-cash-coin"></i> Anggaran</a>
            <a href="../pengaturan.php" style="margin-top:20px;border-top:1px solid white;padding-top:10px;"><i class="bi bi-gear"></i> Pengaturan</a>
        </div>
    </div>
    <div class="logout">
        <span class="d-block mb-2">👋 Halo, <?= htmlspecialchars($_SESSION['nama'] ?? $_SESSION['username']); ?> (<?= htmlspecialchars($_SESSION['role'] ?? '') ?>)</span>
        <a href="../logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
>>>>>>> ca3ead8b8812baf1931442cd1e409aba9390593b
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container mt-4">
        <div class="card p-4">
            <h3>Edit Data SPJ</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_spj" class="form-label">Nama SPJ</label>
                    <input type="text" name="nama_spj" id="nama_spj" class="form-control" value="<?= htmlspecialchars($d['nama_spj'] ?? '') ?>" required>
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
                            $sel = (isset($d['jenis_spj']) && $d['jenis_spj'] === $opt) ? 'selected' : '';
                            echo "<option value=\"" . htmlspecialchars($opt) . "\" $sel>" . htmlspecialchars($opt) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="program" class="form-label">Program</label>
                    <input type="text" name="program" id="program" class="form-control" value="<?= htmlspecialchars($d['program'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="output" class="form-label">Output</label>
                    <input type="text" name="output" id="output" class="form-control" value="<?= htmlspecialchars($d['output'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="komponen" class="form-label">Komponen</label>
                    <input type="text" name="komponen" id="komponen" class="form-control" value="<?= htmlspecialchars($d['komponen'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="akun" class="form-label">Akun</label>
                    <input type="text" name="akun" id="akun" class="form-control" value="<?= htmlspecialchars($d['akun'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($d['email'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">File yang sudah diupload:</label><br>
                    <?php
                    $files = parse_file_names($d['file_names'] ?? '');
                    if (!empty($files)) {
                        foreach ($files as $f) {
                            $path = "../uploads/" . basename($f);
                            if (file_exists($path)) {
                                echo "<a href='$path' target='_blank' class='file-link'>" . htmlspecialchars($f) . "</a><br>";
                            } else {
                                echo "<span class='text-muted'>" . htmlspecialchars($f) . " (tidak ditemukan)</span><br>";
                            }
                        }
                    } else {
                        echo "<span class='text-muted'>Tidak ada file</span>";
                    }
                    ?>
                </div>

                <div class="mb-3">
                    <label for="file_upload" class="form-label">Upload File Baru (opsional)</label>
                    <input type="file" name="file_upload[]" id="file_upload" class="form-control" multiple>
                    <small class="text-muted">Jika upload file baru, file lama akan diganti.</small>
                </div>

                <div class="mb-3">
                    <label for="tgl_kirim" class="form-label">Tanggal Kirim</label>
                    <input type="date" name="tgl_kirim" id="tgl_kirim" class="form-control" value="<?= htmlspecialchars(substr(($d['tgl_kirim'] ?? ''),0,10)) ?>">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="klepon.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>
