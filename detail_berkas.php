<?php
session_start();
include 'db/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$role = $_SESSION['role'];
$logged_in_nip = $_SESSION['username']; 

$nip_pegawai_target = isset($_GET['nip']) ? htmlspecialchars($_GET['nip']) : '';

if (empty($nip_pegawai_target)) {
    echo "NIP Pegawai tidak valid atau tidak diberikan.";
    exit;
}

// --- Logika Hapus Data Dimulai Di Sini ---
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id_to_delete'])) {
    $id_to_delete = intval($_GET['id_to_delete']);

    // Ambil nama file surat sebelum menghapus record, jika perlu dihapus fisik
    $stmt_get_file = mysqli_prepare($conn, "SELECT nama_file_surat, nip_pegawai FROM tbl_cuti WHERE id_cuti = ?");
    mysqli_stmt_bind_param($stmt_get_file, "i", $id_to_delete);
    mysqli_stmt_execute($stmt_get_file);
    $result_get_file = mysqli_stmt_get_result($stmt_get_file);
    $file_data = mysqli_fetch_assoc($result_get_file);
    mysqli_stmt_close($stmt_get_file);

    $file_to_delete_path = null;
    $deleted_nip = null;
    if ($file_data) {
        $deleted_nip = $file_data['nip_pegawai'];
        if (!empty($file_data['nama_file_surat'])) {
            $file_to_delete_path = "uploads/" . $file_data['nama_file_surat'];
        }
    }

    $stmt_delete = mysqli_prepare($conn, "DELETE FROM tbl_cuti WHERE id_cuti = ?");
    mysqli_stmt_bind_param($stmt_delete, "i", $id_to_delete);

    if (mysqli_stmt_execute($stmt_delete)) {
        if ($file_to_delete_path && file_exists($file_to_delete_path)) {
            unlink($file_to_delete_path);
            error_log("File fisik dihapus: " . $file_to_delete_path);
        }
        
        header("Location: detail_berkas.php?nip=" . urlencode($nip_pegawai_target) . "&status=deleted");
        exit;
    } else {
        echo "Error saat menghapus data: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt_delete);
}
// --- Logika Hapus Data Berakhir Di Sini ---

// Ambil semua data cuti untuk NIP ini
$query_detail = "SELECT id_cuti, nip_pegawai, nama_pegawai, jenis_cuti, tanggal_mulai, jumlah_cuti, nama_file_surat FROM tbl_cuti WHERE nip_pegawai = ? AND tanggal_mulai IS NOT NULL ORDER BY tanggal_mulai DESC";
$stmt_detail = mysqli_prepare($conn, $query_detail);

if ($stmt_detail === false) {
    die("Error mempersiapkan query detail: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt_detail, "s", $nip_pegawai_target);
mysqli_stmt_execute($stmt_detail);
$result_detail = mysqli_stmt_get_result($stmt_detail);
$data_riwayat_cuti = mysqli_fetch_all($result_detail, MYSQLI_ASSOC);

$nama_pegawai_tampilan = $nip_pegawai_target;
if (!empty($data_riwayat_cuti)) {
    $nama_pegawai_tampilan = htmlspecialchars($data_riwayat_cuti[0]['nama_pegawai']);
} else {
    $stmt_nama = mysqli_prepare($conn, "SELECT nama FROM pegawai_bps_bogor WHERE nip = ?");
    if ($stmt_nama) {
        mysqli_stmt_bind_param($stmt_nama, "s", $nip_pegawai_target);
        mysqli_stmt_execute($stmt_nama);
        $res_nama = mysqli_stmt_get_result($stmt_nama);
        $data_nama = mysqli_fetch_assoc($res_nama);
        if ($data_nama) {
            $nama_pegawai_tampilan = $data_nama['nama'];
        }
        mysqli_stmt_close($stmt_nama);
    }
}

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
    <title>Detail Berkas Cuti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table th, .table td { vertical-align: middle; }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h3>Detail Berkas Cuti</h3>
        <p>Nama Pegawai: <strong><?= $nama_pegawai_tampilan; ?></strong></p>
        <p>NIP Pegawai: <strong><?= htmlspecialchars($nip_pegawai_target); ?></strong></p>

        <?php if (isset($_GET['status']) && $_GET['status'] == 'deleted'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data cuti berhasil dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Jenis Cuti</th>
                        <th>Tanggal Mulai</th>
                        <th>Jumlah Hari Cuti</th>
                        <th>Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data_riwayat_cuti)): ?>
                        <?php foreach ($data_riwayat_cuti as $cuti): ?>
                            <tr>
                                <td><?= htmlspecialchars($cuti['jenis_cuti']); ?></td>
                                <td><?= formatStandardDate($cuti['tanggal_mulai']); ?></td>
                                <td class="text-center">
                                    <?= htmlspecialchars($cuti['jumlah_cuti']); ?> Hari
                                </td>
                                <td>
                                    <?php if (!empty($cuti['nama_file_surat'])): ?>
                                        <a href="uploads/<?= htmlspecialchars($cuti['nama_file_surat']); ?>" target="_blank"><?= htmlspecialchars($cuti['nama_file_surat']); ?></a>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="edit_monitoring_pecel.php?id=<?= htmlspecialchars($cuti['id_cuti']); ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <a href="#" onclick="confirmDelete(<?= $cuti['id_cuti']; ?>, '<?= htmlspecialchars($cuti['jenis_cuti']); ?>')" class="btn btn-sm btn-danger mb-1">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada riwayat pengajuan cuti ditemukan untuk NIP ini.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <a href="pecel.php" class="btn btn-secondary mt-3">Kembali ke Monitoring Ringkasan</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function confirmDelete(id_cuti, jenis_cuti) {
        if (confirm("Apakah Anda yakin ingin menghapus pengajuan cuti '" + jenis_cuti + "' (ID: " + id_cuti + ") ini? Aksi ini tidak dapat dibatalkan.")) {
            window.location.href = 'detail_berkas.php?nip=' + encodeURIComponent('<?= $nip_pegawai_target; ?>') + '&action=delete&id_to_delete=' + id_cuti;
        }
    }
    </script>
</body>
</html>