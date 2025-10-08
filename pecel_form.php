<?php
session_start();
include 'db/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role'] != 'admin_utama' && $_SESSION['role'] != 'supervisi' && $_SESSION['role'] != 'pegawai' && $_SESSION['role'] != 'user') {
    echo "Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.";
    exit;
}

$message = '';
$role = $_SESSION['role'];
$status = isset($_GET['status']) ? $_GET['status'] : '';
if ($status == 'success_add') {
    $message = "Pengajuan cuti berhasil disimpan!";
} elseif ($status == 'approval_success') {
    $message = "Approval jumlah berkas cuti berhasil disimpan!";
}

$is_approval_mode = false;
$pegawai_nip = '';
$pegawai_nama = '';
$jumlah_berkas_diminta_existing = 0;

$bulan_filter = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');
$tahun_filter = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');

if (isset($_GET['action']) && $_GET['action'] == 'approval' && ($role == 'admin_utama' || $role == 'supervisi')) {
    $is_approval_mode = true;
    $pegawai_nip = isset($_GET['nip']) ? $_GET['nip'] : '';
    if (empty($pegawai_nip)) {
        $message = "NIP pegawai tidak ditemukan.";
    }
} else {
    $pegawai_nip = isset($_GET['nip']) ? $_GET['nip'] : $_SESSION['username'];
}

$stmt_pegawai = mysqli_prepare($conn, "SELECT nama FROM pegawai_bps_bogor WHERE nip = ?");
if ($stmt_pegawai) {
    mysqli_stmt_bind_param($stmt_pegawai, "s", $pegawai_nip);
    mysqli_stmt_execute($stmt_pegawai);
    $result_pegawai = mysqli_stmt_get_result($stmt_pegawai);
    $pegawai_data = mysqli_fetch_assoc($result_pegawai);
    if ($pegawai_data) {
        $pegawai_nama = $pegawai_data['nama'];
    }
    mysqli_stmt_close($stmt_pegawai);
}

// Mengambil jumlah berkas yang sudah diapprove dari tabel tbl_approval
$stmt_approval = mysqli_prepare($conn, "SELECT jumlah_berkas_diminta FROM tbl_approval WHERE nip_pegawai = ? AND bulan = ? AND tahun = ? LIMIT 1");
if ($stmt_approval) {
    mysqli_stmt_bind_param($stmt_approval, "sii", $pegawai_nip, $bulan_filter, $tahun_filter);
    mysqli_stmt_execute($stmt_approval);
    $result_approval = mysqli_stmt_get_result($stmt_approval);
    $approval_data = mysqli_fetch_assoc($result_approval);
    if ($approval_data) {
        $jumlah_berkas_diminta_existing = $approval_data['jumlah_berkas_diminta'] ?? 0;
    }
    mysqli_stmt_close($stmt_approval);
}

// Menghitung jumlah berkas yang sudah diunggah oleh pegawai
$jumlah_berkas_diunggah = 0;
if ($jumlah_berkas_diminta_existing > 0) {
    $stmt_uploaded_count = mysqli_prepare($conn, "SELECT COUNT(id_cuti) as total FROM tbl_cuti WHERE nip_pegawai = ? AND MONTH(tanggal_mulai) = ? AND YEAR(tanggal_mulai) = ?");
    if ($stmt_uploaded_count) {
        mysqli_stmt_bind_param($stmt_uploaded_count, "sii", $pegawai_nip, $bulan_filter, $tahun_filter);
        mysqli_stmt_execute($stmt_uploaded_count);
        $result_uploaded_count = mysqli_stmt_get_result($stmt_uploaded_count);
        $uploaded_count_data = mysqli_fetch_assoc($result_uploaded_count);
        $jumlah_berkas_diunggah = $uploaded_count_data['total'];
        mysqli_stmt_close($stmt_uploaded_count);
    }
}

$jumlah_berkas_tersisa = max(0, $jumlah_berkas_diminta_existing - $jumlah_berkas_diunggah);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($is_approval_mode) {
        $nip_pegawai = $_POST['nip_pegawai_approval'];
        $jumlah_berkas_diminta = isset($_POST['jumlah_berkas_diminta']) ? intval($_POST['jumlah_berkas_diminta']) : 0;
        $bulan_post = $_POST['bulan_approval'];
        $tahun_post = $_POST['tahun_approval'];
        
        $stmt_check = mysqli_prepare($conn, "SELECT id FROM tbl_approval WHERE nip_pegawai = ? AND bulan = ? AND tahun = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt_check, "sii", $nip_pegawai, $bulan_post, $tahun_post);
        mysqli_stmt_execute($stmt_check);
        $result_check = mysqli_stmt_get_result($stmt_check);
        $existing_entry = mysqli_fetch_assoc($result_check);
        mysqli_stmt_close($stmt_check);

        if ($existing_entry) {
            $query = "UPDATE tbl_approval SET jumlah_berkas_diminta = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ii", $jumlah_berkas_diminta, $existing_entry['id']);
        } else {
            $query = "INSERT INTO tbl_approval (nip_pegawai, bulan, tahun, jumlah_berkas_diminta) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "siii", $nip_pegawai, $bulan_post, $tahun_post, $jumlah_berkas_diminta);
        }

        if (mysqli_stmt_execute($stmt)) {
            header("Location: pecel.php?status=approval_success");
            exit;
        } else {
            $message .= "Error saat menyimpan data approval: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);

    } else {
        $nip_pegawai = $_POST['nip_pegawai'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $created_at = date('Y-m-d H:i:s');
        
        $jumlah_berkas_diminta_final = $_POST['jumlah_berkas_diminta_final'] ?? 0;
        
        $upload_error = false;
        $files_to_upload = [];
        
        if ($jumlah_berkas_diminta_final > 0) {
            $jumlah_file_diupload_saat_ini = isset($_FILES['file_surat']) ? count($_FILES['file_surat']['name']) : 0;
            if ($jumlah_file_diupload_saat_ini > 0 && empty($_FILES['file_surat']['name'][0])) {
                $jumlah_file_diupload_saat_ini = 0;
            }
            
            $jumlah_berkas_sebelumnya = 0;
            $stmt_uploaded_count = mysqli_prepare($conn, "SELECT COUNT(id_cuti) as total FROM tbl_cuti WHERE nip_pegawai = ? AND MONTH(tanggal_mulai) = ? AND YEAR(tanggal_mulai) = ?");
            mysqli_stmt_bind_param($stmt_uploaded_count, "sii", $nip_pegawai, $bulan_filter, $tahun_filter);
            mysqli_stmt_execute($stmt_uploaded_count);
            $result_uploaded_count = mysqli_stmt_get_result($stmt_uploaded_count);
            $uploaded_count_data = mysqli_fetch_assoc($result_uploaded_count);
            $jumlah_berkas_sebelumnya = $uploaded_count_data['total'];
            mysqli_stmt_close($stmt_uploaded_count);
            
            if ($jumlah_berkas_sebelumnya + $jumlah_file_diupload_saat_ini > $jumlah_berkas_diminta_final) {
                $message = "Jumlah total berkas (lama + baru) melebihi jumlah yang diizinkan (" . $jumlah_berkas_diminta_final . ").";
                $upload_error = true;
            }
        }
        
        if (!$upload_error) {
            $target_dir = "uploads/";
            if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }
            
            if (isset($_FILES['file_surat']) && !empty($_FILES['file_surat']['name'][0])) {
                foreach ($_FILES['file_surat']['name'] as $key => $filename) {
                    if ($_FILES['file_surat']['error'][$key] == UPLOAD_ERR_OK) {
                        $target_file = $target_dir . basename($filename);
                        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $allowed_types = array("pdf", "doc", "docx", "jpg", "jpeg", "png");

                        if (!in_array($file_type, $allowed_types)) {
                            $message = "Maaf, hanya file PDF, DOC, DOCX, JPG, JPEG, & PNG yang diizinkan.";
                            $upload_error = true;
                            break;
                        } elseif ($_FILES["file_surat"]["size"][$key] > 5000000) {
                            $message = "Maaf, ukuran file terlalu besar.";
                            $upload_error = true;
                            break;
                        } else {
                            if (move_uploaded_file($_FILES["file_surat"]["tmp_name"][$key], $target_file)) {
                                $files_to_upload[] = basename($filename);
                            } else {
                                $message = "Maaf, terjadi kesalahan saat mengunggah file.";
                                $upload_error = true;
                                break;
                            }
                        }
                    } elseif ($_FILES['file_surat']['error'][$key] != UPLOAD_ERR_NO_FILE) {
                        $message = "Terjadi kesalahan upload file. Kode error: " . $_FILES['file_surat']['error'][$key];
                        $upload_error = true;
                        break;
                    }
                }
            }
        }
        
        if (!$upload_error) {
            $jenis_cuti_array = $_POST['jenis_cuti'];
            $tanggal_mulai_array = $_POST['tanggal_mulai'];
            $jumlah_cuti_array = $_POST['jumlah_cuti'];
            $total_pengajuan = count($jenis_cuti_array);

            $query = "INSERT INTO tbl_cuti (nip_pegawai, nama_pegawai, jenis_cuti, tanggal_mulai, tanggal_selesai, jumlah_cuti, nama_file_surat, created_at, jumlah_berkas_diminta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);

            for ($i = 0; $i < $total_pengajuan; $i++) {
                $jenis_cuti = $jenis_cuti_array[$i];
                $tanggal_mulai = $tanggal_mulai_array[$i];
                $jumlah_cuti_hari = floatval(str_replace(',', '.', $jumlah_cuti_array[$i]));

                $tanggal_selesai = date('Y-m-d', strtotime($tanggal_mulai . ' + ' . ($jumlah_cuti_hari - 1) . ' days'));
                $nama_file = $files_to_upload[$i] ?? null;
                
                $bulan_cuti = date('m', strtotime($tanggal_mulai));
                $tahun_cuti = date('Y', strtotime($tanggal_mulai));
                
                if ($stmt === false) { die("Error mempersiapkan query: " . mysqli_error($conn)); }
                
                mysqli_stmt_bind_param($stmt, "sssssdsii", $nip_pegawai, $nama_pegawai, $jenis_cuti, $tanggal_mulai, $tanggal_selesai, $jumlah_cuti_hari, $nama_file, $created_at, $jumlah_berkas_diminta_final);
                
                if (!mysqli_stmt_execute($stmt)) {
                    $message = "Error saat menyimpan data cuti: " . mysqli_error($conn);
                    break;
                }
            }
            
            mysqli_stmt_close($stmt);

            if (empty($message)) {
                header("Location: pecel.php?status=success_add");
                exit;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $is_approval_mode ? 'Approval Berkas Cuti' : 'Pengajuan Cuti'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h3 class="mb-2">
            <?php if ($is_approval_mode): ?>
                Approval Berkas Cuti
            <?php else: ?>
                Formulir Pengajuan Cuti
            <?php endif; ?>
        </h3>
        <p class="mb-3">
            Untuk pegawai: <strong><?= htmlspecialchars($pegawai_nama); ?></strong> (NIP: <?= htmlspecialchars($pegawai_nip); ?>)
        </p>

        <?php if (!empty($message)) { ?>
            <div class="alert alert-info"><?= $message; ?></div>
        <?php } ?>

        <?php if ($is_approval_mode): ?>
            <form action="" method="POST">
                <input type="hidden" name="nip_pegawai_approval" value="<?= htmlspecialchars($pegawai_nip); ?>">
                <input type="hidden" name="nama_pegawai_approval" value="<?= htmlspecialchars($pegawai_nama); ?>">
                <input type="hidden" name="bulan_approval" value="<?= htmlspecialchars($bulan_filter); ?>">
                <input type="hidden" name="tahun_approval" value="<?= htmlspecialchars($tahun_filter); ?>">
                
                <div class="mb-3">
                    <label for="jumlah_berkas_diminta" class="form-label">Jumlah Berkas yang Harus Diunggah:</label>
                    <input type="number" class="form-control" id="jumlah_berkas_diminta" name="jumlah_berkas_diminta" min="0" value="<?= htmlspecialchars($jumlah_berkas_diminta_existing); ?>" required>
                    <div class="form-text">Masukkan jumlah berkas yang wajib diunggah oleh pegawai untuk periode ini.</div>
                </div>

                <button type="submit" class="btn btn-warning">Simpan Approval</button>
                <a href="pecel.php" class="btn btn-secondary">Kembali</a>
            </form>

        <?php else: ?>
            <form id="cuti-form" action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="nip_pegawai" value="<?= htmlspecialchars($pegawai_nip); ?>">
                <input type="hidden" name="nama_pegawai" value="<?= htmlspecialchars($pegawai_nama); ?>">
                <input type="hidden" name="jumlah_berkas_diminta_final" value="<?= htmlspecialchars($jumlah_berkas_diminta_existing); ?>">
                
                <?php if ($jumlah_berkas_tersisa > 0): ?>
                    <p class="mb-3 text-info">Anda masih perlu mengunggah <?= $jumlah_berkas_tersisa; ?> berkas lagi.</p>
                    <?php for ($i = 1; $i <= $jumlah_berkas_tersisa; $i++): ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                Pengajuan Cuti ke-<?= $jumlah_berkas_diunggah + $i; ?> dari <?= $jumlah_berkas_diminta_existing; ?>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="tanggal_mulai_<?= $i; ?>" class="form-label">Tanggal Mulai Cuti:</label>
                                    <input type="date" class="form-control" id="tanggal_mulai_<?= $i; ?>" name="tanggal_mulai[]" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_cuti_<?= $i; ?>" class="form-label">Jenis Cuti:</label>
                                    <select name="jenis_cuti[]" id="jenis_cuti_<?= $i; ?>" class="form-control" required>
                                        <option value="">-- Pilih Jenis Cuti --</option>
                                        <option value="Cuti Tahunan">1. Cuti Tahunan</option>
                                        <option value="Cuti Besar">2. Cuti Besar</option>
                                        <option value="Cuti Sakit">3. Cuti Sakit</option>
                                        <option value="Cuti Alasan Penting">4. Cuti Alasan Penting</option>
                                        <option value="Cuti Melahirkan">5. Cuti Melahirkan</option>
                                        <option value="Cuti Luar Tanggungan Negara">6. Cuti Luar Tanggungan Negara</option>
                                        <option value="Cuti Tahunan (Harian)">7. Cuti Tahunan (Harian)</option>
                                        <option value="Cuti Tahunan (1/2 Hari)">8. Cuti Tahunan (1/2 Hari)</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_cuti_<?= $i; ?>" class="form-label">Jumlah Cuti (Hari):</label>
                                    <input type="number" class="form-control" id="jumlah_cuti_<?= $i; ?>" name="jumlah_cuti[]" step="any" required>
                                </div>
                                <div class="mb-3">
                                    <label for="file_surat_<?= $i; ?>" class="form-label">Unggah Berkas Cuti:</label>
                                    <input type="file" class="form-control" id="file_surat_<?= $i; ?>" name="file_surat[]" required>
                                    <div class="form-text">Maks. 5MB per berkas, format PDF, DOC, DOCX, JPG, JPEG, PNG.</div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php elseif ($jumlah_berkas_diminta_existing > 0 && $jumlah_berkas_tersisa == 0): ?>
                    <div class="alert alert-success" role="alert">
                        Anda sudah mengunggah semua berkas yang dibutuhkan untuk periode ini (<?= $jumlah_berkas_diminta_existing; ?> berkas).
                        Silakan kembali ke halaman monitoring atau hapus berkas jika ingin mengunggah ulang.
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">
                        Approval untuk jumlah berkas cuti belum ditentukan oleh Supervisi/Admin. Silakan hubungi admin untuk melanjutkan.
                    </div>
                <?php endif; ?>
                
                <?php if ($jumlah_berkas_tersisa > 0): ?>
                    <button type="submit" class="btn btn-primary">Upload Berkas</button>
                <?php endif; ?>
                <a href="pecel.php" class="btn btn-secondary">Kembali ke Monitoring</a>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>