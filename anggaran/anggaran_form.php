<?php
session_start();
include '../db/koneksi.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
$role = $_SESSION['role'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_program = $_POST['kode_program'];
    $program = $_POST['program'];
    $kode_kegiatan = $_POST['kode_kegiatan'];
    $kegiatan = $_POST['kegiatan'];
    $kode_kro = $_POST['kode_kro'];
    $kro = $_POST['kro'];
    $kode_ro = $_POST['kode_ro'];
    $ro = $_POST['ro'];
    $kode_komponen = $_POST['kode_komponen'];
    $komponen = $_POST['komponen'];
    $kode_subkomponen = $_POST['kode_subkomponen'];
    $nama_subkomponen = $_POST['nama_subkomponen'];
    $kode_akun = $_POST['kode_akun'];
    $nama_akun = $_POST['nama_akun'];
    $pagu = $_POST['pagu'];
    $jumlah_pagu = $_POST['jumlah_pagu'];

    // Simpan ke database
    $query = "INSERT INTO anggaran (
        `Kode Program`, `Program`, `Kode Kegiatan`, `Kegiatan`,
        `Kode KRO`, `KRO`, `Kode RO`, `RO`,
        `Kode Komponen`, `Komponen`, `Kode Sub Komponen`, `Nama Sub Komponen`,
        `Kode Akun`, `Nama Akun`, `Pagu`, `Jumlah Pagu`
    ) VALUES (
        '$kode_program', '$program', '$kode_kegiatan', '$kegiatan',
        '$kode_kro', '$kro', '$kode_ro', '$ro',
        '$kode_komponen', '$komponen', '$kode_subkomponen', '$nama_subkomponen',
        '$kode_akun', '$nama_akun', '$pagu', '$jumlah_pagu'
    )";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data anggaran berhasil ditambahkan!'); window.location='anggaran.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($conn) . "');</script>";
    }
}

// Ambil semua data anggaran dari database
$anggaranData = [];
$result = mysqli_query($conn, "SELECT * FROM anggaran");
while ($row = mysqli_fetch_assoc($result)) {
    $anggaranData[] = $row;
}

// Simpan ke variabel JS (akan dipakai untuk auto-fill)
$anggaranJSON = json_encode($anggaranData);

// Simpan data ke DB saat submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = [
        'Kode Program', 'Program', 'Kode Kegiatan', 'Kegiatan', 'Kode KRO', 'KRO', 'Kode RO', 'RO',
        'Kode Komponen', 'Komponen', 'Kode Sub Komponen', 'Nama Sub Komponen', 'Kode Akun', 'Nama Akun',
        'Pagu', 'Jumlah Pagu'
    ];

    $values = [];
    foreach ($fields as $field) {
        $key = strtolower(str_replace(' ', '_', $field));
        $values[$field] = $_POST[$key] ?? '';
    }

    $sql = "INSERT INTO anggaran (`" . implode("`, `", array_keys($values)) . "`) VALUES ('" . implode("', '", array_values($values)) . "')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('✅ Data anggaran berhasil ditambahkan!'); window.location='anggaran.php';</script>";
    } else {
        echo "<script>alert('❌ Gagal menambahkan data: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Data Anggaran - SI Klepon</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<style>
    body { margin:0; font-family:'Poppins',sans-serif; background:#f4f6f9; }
    .sidebar { position:fixed; top:0; left:0; width:240px; height:100vh; background:#1e1f26; color:#fff; display:flex; flex-direction:column; justify-content:space-between; }
    .sidebar .brand { font-size:20px; font-weight:600; padding:20px; border-bottom:1px solid rgba(255,255,255,0.1); text-align:center; }
    .sidebar a { display:flex; align-items:center; gap:12px; padding:12px 24px; color:#cfd3dc; text-decoration:none; font-weight:500; transition:0.2s; }
    .sidebar a:hover, .sidebar a.active { background:#343a40; color:#fff; }
    .main-content { margin-left:240px; padding:30px; }
    .card, .form-control, .btn { border-radius:0 !important; }
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div>
        <div class="brand">
            <img src="../uploads/kle.png" alt="Logo" style="width:24px;height:24px;margin-right:8px;"> SI-KLEPON
        </div>
        <div class="menu">
            <a href="../menu.php"><i class="bi bi-house-door"></i> Dashboard</a>
            <a href="../klepon/klepon.php"><i class="bi bi-folder2-open"></i> Realisasi</a>
            <a href="anggaran.php" class="active"><i class="bi bi-cash-coin"></i> Rencana Anggaran</a>
        </div>
    </div>
    <div class="logout p-3 border-top">
        <span>👋 Halo, <?= $_SESSION['nama']; ?> (<?= $_SESSION['role']; ?>)</span><br>
        <a href="../logout.php" class="text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
</div>

<!-- Main -->
<div class="main-content">
    <div class="container mt-4">
        <div class="card p-4 shadow-sm">
            <h3>Tambah Data Anggaran</h3>

            <form method="POST" action="">
                <div class="row">

                    <!-- KODE PROGRAM -->
                    <div class="col-md-6 mb-3">
                        <label for="kode_program" class="form-label">Kode Program</label>
                        <select id="kode_program" name="kode_program" class="form-select" required>
                            <option value="">-- Pilih Kode Program --</option>
                            <?php
                            $programs = mysqli_query($conn, "SELECT DISTINCT `Kode Program` FROM anggaran");
                            while ($p = mysqli_fetch_assoc($programs)) {
                                echo "<option value='{$p['Kode Program']}'>{$p['Kode Program']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Program</label>
                        <input type="text" id="program" name="program" class="form-control" readonly>
                    </div>

                    <!-- KODE KEGIATAN -->
                    <div class="col-md-6 mb-3">
                        <label for="kode_kegiatan" class="form-label">Kode Kegiatan</label>
                        <select id="kode_kegiatan" name="kode_kegiatan" class="form-select" required>
                            <option value="">-- Pilih Kode Kegiatan --</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Kegiatan</label>
                        <input type="text" id="kegiatan" name="kegiatan" class="form-control" readonly>
                    </div>

                    <!-- KODE KRO -->
                    <div class="col-md-6 mb-3">
                        <label for="kode_kro" class="form-label">Kode KRO</label>
                        <select id="kode_kro" name="kode_kro" class="form-select">
                            <option value="">-- Pilih KRO --</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama KRO</label>
                        <input type="text" id="kro" name="kro" class="form-control" readonly>
                    </div>

                    <!-- KODE RO -->
                    <div class="col-md-6 mb-3">
                        <label for="kode_ro" class="form-label">Kode RO</label>
                        <select id="kode_ro" name="kode_ro" class="form-select">
                            <option value="">-- Pilih RO --</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama RO</label>
                        <input type="text" id="ro" name="ro" class="form-control" readonly>
                    </div>

                    <!-- KODE KOMPONEN -->
                    <div class="col-md-6 mb-3">
                        <label for="kode_komponen" class="form-label">Kode Komponen</label>
                        <select id="kode_komponen" name="kode_komponen" class="form-select">
                            <option value="">-- Pilih Komponen --</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Komponen</label>
                        <input type="text" id="komponen" name="komponen" class="form-control" readonly>
                    </div>

                    <!-- Subkomponen dan Akun -->
                    <div class="col-md-6 mb-3">
                        <label for="kode_subkomponen" class="form-label">Kode Sub Komponen</label>
                        <select id="kode_subkomponen" name="kode_subkomponen" class="form-select">
                            <option value="">-- Pilih Sub Komponen --</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Sub Komponen</label>
                        <input type="text" id="nama_subkomponen" name="nama_subkomponen" class="form-control" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="kode_akun" class="form-label">Kode Akun</label>
                        <select id="kode_akun" name="kode_akun" class="form-select">
                            <option value="">-- Pilih Akun --</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Akun</label>
                        <input type="text" id="nama_akun" name="nama_akun" class="form-control" readonly>
                    </div>

                </div>

                <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Simpan</button>
                <a href="anggaran.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            </form>
        </div>
    </div>
</div>

<script>
const anggaran = <?= $anggaranJSON ?>;

function populateDropdown(selectId, options, textKey) {
    const sel = document.getElementById(selectId);
    sel.innerHTML = '<option value="">-- Pilih --</option>';
    options.forEach(opt => {
        const o = document.createElement('option');
        o.value = opt[textKey];
        o.textContent = opt[textKey];
        sel.appendChild(o);
    });
}

document.getElementById('kode_program').addEventListener('change', function() {
    const kode = this.value;
    const filtered = anggaran.filter(a => a['Kode Program'] === kode);
    document.getElementById('program').value = filtered[0]?.Program || '';

    const kegiatanList = [...new Set(filtered.map(a => a['Kode Kegiatan']))]
        .map(k => ({'Kode Kegiatan': k}));
    populateDropdown('kode_kegiatan', kegiatanList, 'Kode Kegiatan');
});

document.getElementById('kode_kegiatan').addEventListener('change', function() {
    const kodeProg = document.getElementById('kode_program').value;
    const kodeKeg = this.value;
    const filtered = anggaran.filter(a => a['Kode Program'] === kodeProg && a['Kode Kegiatan'] === kodeKeg);
    document.getElementById('kegiatan').value = filtered[0]?.Kegiatan || '';

    const kroList = [...new Set(filtered.map(a => a['Kode KRO']))].map(k => ({'Kode KRO': k}));
    populateDropdown('kode_kro', kroList, 'Kode KRO');
});

document.getElementById('kode_kro').addEventListener('change', function() {
    const kodeProg = document.getElementById('kode_program').value;
    const kodeKeg = document.getElementById('kode_kegiatan').value;
    const kodeKro = this.value;
    const filtered = anggaran.filter(a => a['Kode Program'] === kodeProg && a['Kode Kegiatan'] === kodeKeg && a['Kode KRO'] === kodeKro);
    document.getElementById('kro').value = filtered[0]?.KRO || '';

    const roList = [...new Set(filtered.map(a => a['Kode RO']))].map(k => ({'Kode RO': k}));
    populateDropdown('kode_ro', roList, 'Kode RO');
});

document.getElementById('kode_ro').addEventListener('change', function() {
    const kodeProg = document.getElementById('kode_program').value;
    const kodeKeg = document.getElementById('kode_kegiatan').value;
    const kodeKro = document.getElementById('kode_kro').value;
    const kodeRo = this.value;
    const filtered = anggaran.filter(a =>
        a['Kode Program'] === kodeProg &&
        a['Kode Kegiatan'] === kodeKeg &&
        a['Kode KRO'] === kodeKro &&
        a['Kode RO'] === kodeRo
    );
    document.getElementById('ro').value = filtered[0]?.RO || '';

    const kompList = [...new Set(filtered.map(a => a['Kode Komponen']))].map(k => ({'Kode Komponen': k}));
    populateDropdown('kode_komponen', kompList, 'Kode Komponen');
});

document.getElementById('kode_komponen').addEventListener('change', function() {
    const kodeProg = document.getElementById('kode_program').value;
    const kodeKeg = document.getElementById('kode_kegiatan').value;
    const kodeKro = document.getElementById('kode_kro').value;
    const kodeRo = document.getElementById('kode_ro').value;
    const kodeKom = this.value;
    const filtered = anggaran.filter(a =>
        a['Kode Program'] === kodeProg &&
        a['Kode Kegiatan'] === kodeKeg &&
        a['Kode KRO'] === kodeKro &&
        a['Kode RO'] === kodeRo &&
        a['Kode Komponen'] === kodeKom
    );
    document.getElementById('komponen').value = filtered[0]?.Komponen || '';

    const subList = [...new Set(filtered.map(a => a['Kode Sub Komponen']))].map(k => ({'Kode Sub Komponen': k}));
    populateDropdown('kode_subkomponen', subList, 'Kode Sub Komponen');
});

document.getElementById('kode_subkomponen').addEventListener('change', function() {
    const kodeProg = document.getElementById('kode_program').value;
    const kodeKeg = document.getElementById('kode_kegiatan').value;
    const kodeKro = document.getElementById('kode_kro').value;
    const kodeRo = document.getElementById('kode_ro').value;
    const kodeKom = document.getElementById('kode_komponen').value;
    const kodeSub = this.value;
    const filtered = anggaran.filter(a =>
        a['Kode Program'] === kodeProg &&
        a['Kode Kegiatan'] === kodeKeg &&
        a['Kode KRO'] === kodeKro &&
        a['Kode RO'] === kodeRo &&
        a['Kode Komponen'] === kodeKom &&
        a['Kode Sub Komponen'] === kodeSub
    );
    document.getElementById('nama_subkomponen').value = filtered[0]?.['Nama Sub Komponen'] || '';

    const akunList = [...new Set(filtered.map(a => a['Kode Akun']))].map(k => ({'Kode Akun': k}));
    populateDropdown('kode_akun', akunList, 'Kode Akun');
});

document.getElementById('kode_akun').addEventListener('change', function() {
    const kode = this.value;
    const found = anggaran.find(a => a['Kode Akun'] === kode);
    document.getElementById('nama_akun').value = found?.['Nama Akun'] || '';
});
</script>
</body>
</html>
