<?php
session_start();
include 'db/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$role = $_SESSION['role'];
$logged_in_nip = $_SESSION['username'];

$display_name_or_all = '';
if ($role == 'supervisi' || $role == 'admin_utama') {
    $display_name_or_all = 'Semua Pegawai';
} else {
    $logged_in_nama = $logged_in_nip;
    $stmt_nama_pegawai = mysqli_prepare($conn, "SELECT nama FROM pegawai_bps_bogor WHERE nip = ?");
    if ($stmt_nama_pegawai) {
        mysqli_stmt_bind_param($stmt_nama_pegawai, "s", $logged_in_nip);
        mysqli_stmt_execute($stmt_nama_pegawai);
        $result_nama = mysqli_stmt_get_result($stmt_nama_pegawai);
        $data_nama = mysqli_fetch_assoc($result_nama);
        if ($data_nama && !empty($data_nama['nama'])) {
            $logged_in_nama = $data_nama['nama'];
        }
        mysqli_stmt_close($stmt_nama_pegawai);
    }
    $display_name_or_all = $logged_in_nama;
}

$params = [];
$param_types = "";
$where_sql_join_t2 = "";
$where_sql_join_t3 = "";

$filter_bulan = isset($_GET['filter_bulan']) ? $_GET['filter_bulan'] : date('m');
$filter_tahun = isset($_GET['filter_tahun']) ? $_GET['filter_tahun'] : date('Y');

if ($filter_bulan != 'all') {
    $where_sql_join_t2 = " AND MONTH(T2.tanggal_mulai) = ? AND YEAR(T2.tanggal_mulai) = ?";
    $where_sql_join_t3 = " AND T3.bulan = ? AND T3.tahun = ?";
    $params[] = $filter_bulan;
    $params[] = $filter_tahun;
    $param_types .= "ii";
    $params[] = $filter_bulan;
    $params[] = $filter_tahun;
    $param_types .= "ii";
}

$where_sql_main = "";
if ($role != 'supervisi' && $role != 'admin_utama') {
    $where_sql_main = " WHERE T1.nip = ?";
    $params[] = $logged_in_nip;
    $param_types .= "s";
}

$query_sql = "
    SELECT 
        T1.nip AS nip_pegawai, 
        T1.nama AS nama_pegawai, 
        COALESCE(SUM(CASE WHEN T2.tanggal_mulai IS NOT NULL THEN 1 ELSE 0 END), 0) AS total_berkas_diunggah,
        COALESCE(SUM(CASE WHEN T2.tanggal_mulai IS NOT NULL THEN T2.jumlah_cuti ELSE 0 END), 0) AS total_hari_cuti,
        COALESCE(T3.jumlah_berkas_diminta, 0) AS jumlah_berkas_diminta
    FROM pegawai_bps_bogor AS T1
    LEFT JOIN tbl_cuti AS T2 
        ON T1.nip = T2.nip_pegawai $where_sql_join_t2
    LEFT JOIN tbl_approval AS T3
        ON T1.nip = T3.nip_pegawai $where_sql_join_t3
    $where_sql_main
    GROUP BY T1.nip, T1.nama
    ORDER BY T1.nama ASC
";

$stmt = mysqli_prepare($conn, $query_sql);

if ($stmt === false) {
    die("Kueri Gagal: " . mysqli_error($conn) . "<br>Kueri SQL yang Gagal: " . $query_sql);
}

if (!empty($params)) {
    mysqli_stmt_bind_param($stmt, $param_types, ...$params);
}

if (mysqli_stmt_execute($stmt)) {
    $data = mysqli_stmt_get_result($stmt);
} else {
    die("Error saat mengeksekusi kueri: " . mysqli_error($conn) . "<br>Kueri SQL: " . $query_sql);
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
    <title>Monitoring Cuti Si-Pecel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table th, .table td { vertical-align: middle; }
        .btn-check:checked + .btn-outline-primary {
            background-color: #0d6efd;
            color: #fff;
        }
        .bulan-container {
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        .bulan-container .btn {
            flex-shrink: 0;
            white-space: nowrap;
            width: auto;
        }
    </style>
</head>
<body class="bg-light">
<div class="container mt-4">
    <h3 class="mb-3">Monitoring Berkas Cuti</h3>
    <p class="mb-3">Menampilkan ringkasan berkas cuti untuk: <strong><?= htmlspecialchars($display_name_or_all); ?></strong></p>
    <div class="mb-3">
        <a href="menu.php" class="btn btn-secondary">Kembali ke DASHBOARD</a>
    </div>

    <form method="GET" action="pecel.php">
        <div class="row mb-3">
            <div class="col-12 mb-3">
                <label class="form-label d-block">Bulan:</label>
                <div class="d-flex gap-2 bulan-container">
                    <?php
                    $nama_bulan_array = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    
                    $checked_all = ($filter_bulan == 'all') ? 'checked' : '';
                    echo "<input type='radio' class='btn-check' name='filter_bulan' id='bulan-all' value='all' autocomplete='off' {$checked_all}>
                        <label class='btn btn-outline-primary' for='bulan-all'>All</label>";

                    for ($i = 1; $i <= 12; $i++) {
                        $checked = ($filter_bulan == $i) ? 'checked' : '';
                        echo "<input type='radio' class='btn-check' name='filter_bulan' id='bulan-{$i}' value='{$i}' autocomplete='off' {$checked}>
                            <label class='btn btn-outline-primary' for='bulan-{$i}'>{$nama_bulan_array[$i-1]}</label>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-12 d-flex flex-column flex-md-row gap-2 align-items-md-end">
                <div class="flex-grow-1 w-100">
                    <label for="filter_tahun" class="form-label d-block">Tahun:</label>
                    <select class="form-select w-100" id="filter_tahun" name="filter_tahun">
                        <?php
                        for ($i = 2023; $i <= date('Y') + 1; $i++) {
                            $selected = ($filter_tahun == $i) ? 'selected' : '';
                            echo "<option value='$i' $selected>$i</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex gap-2 w-100 w-md-auto mt-3 mt-md-0">
                    <button type="submit" class="btn btn-primary flex-grow-1">Filter</button>
                    <a href="pecel.php" class="btn btn-secondary flex-grow-1">Reset</a>
                </div>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle" id="cutiTable">
            <thead class="table-dark text-center">
                <tr>
                    <th>Tahun Cuti</th>
                    <th>NIP Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Total Berkas Diunggah</th>
                    <th>Jumlah Berkas Diminta</th>
                    <th>Jumlah Hari Cuti</th>
                    <th style="width: 200px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_assoc($data)) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($filter_tahun); ?></td>
                            <td><?= htmlspecialchars($d['nip_pegawai']); ?></td>
                            <td><?= htmlspecialchars($d['nama_pegawai']); ?></td>
                            <td class="text-center"><strong><?= htmlspecialchars($d['total_berkas_diunggah'] ?? 0); ?> Berkas</strong></td>
                            <td class="text-center"><strong><?= htmlspecialchars($d['jumlah_berkas_diminta'] ?? 0); ?> Berkas</strong></td>
                            <td class="text-center"><strong><?= htmlspecialchars($d['total_hari_cuti'] ?? 0); ?> Hari</strong></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href='detail_berkas.php?nip=<?= htmlspecialchars($d['nip_pegawai']); ?>' class='btn btn-sm btn-info'>Lihat Detail</a>
                                    <?php if ($role == 'admin_utama' || $role == 'supervisi'): ?>
                                        <a href='pecel_form.php?action=approval&nip=<?= htmlspecialchars($d['nip_pegawai']); ?>&bulan=<?= htmlspecialchars($filter_bulan); ?>&tahun=<?= htmlspecialchars($filter_tahun); ?>' class='btn btn-sm btn-warning'>Approval</a>
                                    <?php endif; ?>
                                    <a href='pecel_form.php?nip=<?= htmlspecialchars($d['nip_pegawai']); ?>&bulan=<?= htmlspecialchars($filter_bulan); ?>&tahun=<?= htmlspecialchars($filter_tahun); ?>' class='btn btn-sm btn-success'>Upload</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data pegawai yang ditemukan.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>