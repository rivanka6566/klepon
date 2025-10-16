<?php
session_start();
include '../db/koneksi.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan SI-KLEPON (Sistem Kelola SPJ Online)</title>
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

        .sidebar .brand {
            font-size: 20px;
            font-weight: 600;
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .sidebar .brand img {
            width: 24px;
            height: 24px;
            vertical-align: middle;
            margin-right: 8px;
        }

        .sidebar .menu {
            flex: 1;
            padding: 15px 0;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            color: #cfd3dc;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #343a40;
            color: #fff;
        }

        .sidebar a i {
            font-size: 18px;
        }

        .logout {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 15px 20px;
        }

        .logout a {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: 600;
        }

        /* Main Content */
        .main-content {
            margin-left: 240px;
            padding: 30px;
        }

        /* Form Elements */
        .card, .form-control, .btn, .input-group-text {
            border-radius: 0 !important;
        }

        .card {
            background-color: transparent !important;
            box-shadow: none !important;
            border: none !important;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div>
        <div class="brand">
            <img src="../uploads/kle.png" alt="Logo SI-KLEPON">
            SI-KLEPON
        </div>
        <div class="menu">
            <a href="../menu.php"><i class="bi bi-house-door"></i> Dashboard</a>
            <a href="klepon.php" class="active"><i class="bi bi-folder2-open"></i> Realisasi</a>
            <a href="../anggaran/anggaran.php"><i class="bi bi-cash-coin"></i> Rencana Anggaran</a>
            <a href="../pengaturan.php" 
                style="margin-top: 20px; border-top: 1px solid white; padding-top: 10px;">
                <i class="bi bi-gear"></i> Pengaturan
            </a>
        </div>
    </div>
    <div class="logout">
        <span class="d-block mb-2">👋 Halo, <?= $_SESSION['nama']; ?> (<?= $_SESSION['role']; ?>)</span>
        <a href="../logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container mt-4">
        <div class="card p-4">
            <h3>SI-KLEPON (Sistem Kelola SPJ Online)</h3>
            <p>Upload SPJ 2025</p>
            <form action="../proses_upload.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="nama_spj" class="form-label">Tuliskan Nama SPJ yang akan dibuat (Contoh: Honor Pengelola Anggaran Bulan Januari 2025)</label>
                <input type="text" name="nama_spj" id="nama_spj" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis_spj" class="form-label">Pilih Jenis SPJ yang akan Bapak / Ibu upload:</label>
                <select name="jenis_spj" id="jenis_spj" class="form-control" required>
                    <option value="">-- Pilih Jenis SPJ --</option>
                    <option value="Perlengkapan">1. Perlengkapan</option>
                    <option value="Konsumsi">2. Konsumsi</option>
                    <option value="Belanja Bahan">3. Belanja Bahan (Spanduk, dll)</option>
                    <option value="Pembelian Paket Data / Pulsa">4. Pembelian Paket Data / Pulsa</option>
                    <option value="Honor Instruktur Nasional / Daerah">5. Honor Instruktur Nasional / Daerah</option>
                    <option value="Honor Petugas">6. Honor Petugas</option>
                    <option value="Honor Narasumber">7. Honor Narasumber</option>
                    <option value="Transport Lokal">8. Transport Lokal</option>
                    <option value="Perjalanan Dinas Luar Kota">9. Perjalanan Dinas Luar Kota</option>
                    <option value="Honor Operasional Satuan Kerja">10. Honor Operasional Satuan Kerja</option>
                </select>
            </div>

            <div id="perlengkapan_section" class="file-upload-section">
                <h6>Perlengkapan Pelatihan</h6>
                <div class="mb-3">
                    <label for="perlengkapan_form_permintaan" class="form-label">FORM PERMINTAAN * (Upload 1 file yang didukung: PDF. Maks 10 MB.)</label>
                    <input type="file" name="perlengkapan_form_permintaan" id="perlengkapan_form_permintaan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="perlengkapan_kak" class="form-label">KAK* (Upload 1 file yang didukung: PDF. Maks 10 MB.)</label>
                    <input type="file" name="perlengkapan_kak" id="perlengkapan_kak" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="perlengkapan_tanda_terima" class="form-label">TANDA TERIMA * (Upload 1 file yang didukung: PDF. Maks 10 MB.)</label>
                    <input type="file" name="perlengkapan_tanda_terima" id="perlengkapan_tanda_terima" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="perlengkapan_foto_barang_1" class="form-label">FOTO BARANG * (Upload 1 file yang didukung: PDF atau image. Maks 10 MB.)</label>
                    <input type="file" name="perlengkapan_foto_barang_1" id="perlengkapan_foto_barang_1" class="form-control" accept="application/pdf, image/*">
                </div>
                <div class="mb-3">
                    <label for="perlengkapan_foto_barang_2" class="form-label">FOTO BARANG * (Upload 1 file yang didukung: PDF atau image. Maks 10 MB.)</label>
                    <input type="file" name="perlengkapan_foto_barang_2" id="perlengkapan_foto_barang_2" class="form-control" accept="application/pdf, image/*">
                </div>
                <div class="mb-3">
                    <label for="perlengkapan_kuitansi_pembelian" class="form-label">KUITANSI PEMBELIAN (Upload 1 file yang didukung: PDF. Maks 10 MB.)</label>
                    <input type="file" name="perlengkapan_kuitansi_pembelian" id="perlengkapan_kuitansi_pembelian" class="form-control" accept="application/pdf">
                </div>
            </div>

            <div id="konsumsi_section" class="file-upload-section">
                <h6>Konsumsi Rapat, Konsumsi Pelatihan/Briefing, Konsumsi Responden Roleplaying</h6>
                <div class="mb-3">
                    <label for="konsumsi_form_permintaan" class="form-label">FORM PERMINTAAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="konsumsi_form_permintaan" id="konsumsi_form_permintaan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="konsumsi_kak" class="form-label">KAK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="konsumsi_kak" id="konsumsi_kak" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="konsumsi_surat_undangan" class="form-label">SURAT UNDANGAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="konsumsi_surat_undangan" id="konsumsi_surat_undangan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="konsumsi_daftar_hadir" class="form-label">DAFTAR HADIR * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="konsumsi_daftar_hadir" id="konsumsi_daftar_hadir" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="konsumsi_notulen" class="form-label">NOTULEN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="konsumsi_notulen" id="konsumsi_notulen" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="konsumsi_kuitansi" class="form-label">KUITANSI (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="konsumsi_kuitansi" id="konsumsi_kuitansi" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="konsumsi_dokumentasi_kegiatan" class="form-label">DOKUMENTASI KEGIATAN * (Upload 1 supported file: PDF or image. Max 10 MB.)</label>
                    <input type="file" name="konsumsi_dokumentasi_kegiatan" id="konsumsi_dokumentasi_kegiatan" class="form-control" accept="application/pdf, image/*">
                </div>
                <div class="mb-3">
                    <label for="konsumsi_dokumentasi_konsumsi" class="form-label">DOKUMENTASI KONSUMSI (MAKAN DAN SNACK)* (Upload 1 supported file: PDF or image. Max 10 MB.)</label>
                    <input type="file" name="konsumsi_dokumentasi_konsumsi" id="konsumsi_dokumentasi_konsumsi" class="form-control" accept="application/pdf, image/*">
                </div>
            </div>

            <div id="belanja_bahan_section" class="file-upload-section">
                <h6>Spanduk, Plakat</h6>
                <div class="mb-3">
                    <label for="belanja_bahan_form_permintaan" class="form-label">FORM PERMINTAAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="belanja_bahan_form_permintaan" id="belanja_bahan_form_permintaan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="belanja_bahan_kak" class="form-label">KAK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="belanja_bahan_kak" id="belanja_bahan_kak" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="belanja_bahan_kuitansi" class="form-label">KUITANSI (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="belanja_bahan_kuitansi" id="belanja_bahan_kuitansi" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="belanja_bahan_foto_barang" class="form-label">FOTO BARANG* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="belanja_bahan_foto_barang" id="belanja_bahan_foto_barang" class="form-control" accept="application/pdf, image/*">
                </div>
            </div>

            <div id="pembelian_paket_data_pulsa_section" class="file-upload-section">
                <div class="mb-3">
                    <label for="pulsa_form_permintaan" class="form-label">FORM PERMINTAAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="pulsa_form_permintaan" id="pulsa_form_permintaan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="pulsa_kak" class="form-label">KAK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="pulsa_kak" id="pulsa_kak" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="pulsa_kuitansi" class="form-label">KUITANSI (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="pulsa_kuitansi" id="pulsa_kuitansi" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="pulsa_daftar_penerima" class="form-label">DAFTAR PENERIMA PULSA/PAKET DATA * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="pulsa_daftar_penerima" id="pulsa_daftar_penerima" class="form-control" accept="application/pdf">
                </div>
            </div>

            <div id="honor_instruktur_section" class="file-upload-section">
                <div class="mb-3">
                    <label for="instruktur_form_permintaan" class="form-label">FORM PERMINTAAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="instruktur_form_permintaan" id="instruktur_form_permintaan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="instruktur_kak" class="form-label">KAK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="instruktur_kak" id="instruktur_kak" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="instruktur_sk" class="form-label">SK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="instruktur_sk" id="instruktur_sk" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="instruktur_kuitansi_spj" class="form-label">KUITANSI / SPJ * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="instruktur_kuitansi_spj" id="instruktur_kuitansi_spj" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="instruktur_laporan_mengajar" class="form-label">LAPORAN MENGAJAR * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="instruktur_laporan_mengajar" id="instruktur_laporan_mengajar" class="form-control" accept="application/pdf">
                </div>
            </div>

            <div id="honor_petugas_section" class="file-upload-section">
                <div class="mb-3">
                    <label for="petugas_form_permintaan" class="form-label">FORM PERMINTAAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="petugas_form_permintaan" id="petugas_form_permintaan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="petugas_kak" class="form-label">KAK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="petugas_kak" id="petugas_kak" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="petugas_sk" class="form-label">SK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="petugas_sk" id="petugas_sk" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="petugas_kuitansi_spj" class="form-label">KUITANSI / SPJ * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="petugas_kuitansi_spj" id="petugas_kuitansi_spj" class="form-control" accept="application/pdf">
                </div>
            </div>

            <div id="honor_narasumber_section" class="file-upload-section">
                <div class="mb-3">
                    <label for="narasumber_form_permintaan" class="form-label">FORM PERMINTAAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="narasumber_form_permintaan" id="narasumber_form_permintaan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="narasumber_kak" class="form-label">KAK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="narasumber_kak" id="narasumber_kak" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="narasumber_sk" class="form-label">SK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="narasumber_sk" id="narasumber_sk" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="narasumber_kuitansi_spj" class="form-label">KUITANSI / SPJ * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="narasumber_kuitansi_spj" id="narasumber_kuitansi_spj" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="narasumber_undangan" class="form-label">UNDANGAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="narasumber_undangan" id="narasumber_undangan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="narasumber_ktp_npwp" class="form-label">KTP DAN NPWP * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="narasumber_ktp_npwp" id="narasumber_ktp_npwp" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="narasumber_jadwal_kegiatan" class="form-label">JADWAL KEGIATAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="narasumber_jadwal_kegiatan" id="narasumber_jadwal_kegiatan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="narasumber_cv" class="form-label">CV (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="narasumber_cv" id="narasumber_cv" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="narasumber_bahan_paparan" class="form-label">BAHAN PAPARAN NARASUMBER * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="narasumber_bahan_paparan" id="narasumber_bahan_paparan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="narasumber_daftar_hadir" class="form-label">DAFTAR HADIR NARASUMBER (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="narasumber_daftar_hadir" id="narasumber_daftar_hadir" class="form-control" accept="application/pdf">
                </div>
            </div>

            <div id="transport_lokal_section" class="file-upload-section">
                <div class="mb-3">
                    <label for="transport_lokal_form_permintaan" class="form-label">FORM PERMINTAAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="transport_lokal_form_permintaan" id="transport_lokal_form_permintaan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="transport_lokal_kak" class="form-label">KAK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="transport_lokal_kak" id="transport_lokal_kak" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="transport_lokal_sk" class="form-label">SK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="transport_lokal_sk" id="transport_lokal_sk" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="transport_lokal_kuitansi_spj" class="form-label">KUITANSI / SPJ * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="transport_lokal_kuitansi_spj" id="transport_lokal_kuitansi_spj" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="transport_lokal_surat_tugas" class="form-label">SURAT TUGAS * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="transport_lokal_surat_tugas" id="transport_lokal_surat_tugas" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="transport_lokal_laporan_perjadin_visum" class="form-label">LAPORAN PERJADIN DAN VISUM (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="transport_lokal_laporan_perjadin_visum" id="transport_lokal_laporan_perjadin_visum" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="transport_lokal_superkendis" class="form-label">SUPERKENDIS (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="transport_lokal_superkendis" id="transport_lokal_superkendis" class="form-control" accept="application/pdf">
                </div>
            </div>

            <div id="perjalanan_dinas_luar_kota_section" class="file-upload-section">
                <div class="mb-3">
                    <label for="perjadin_luar_kota_surat_permintaan" class="form-label">SURAT PERMINTAAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="perjadin_luar_kota_surat_permintaan" id="perjadin_luar_kota_surat_permintaan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="perjadin_luar_kota_kak" class="form-label">KAK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="perjadin_luar_kota_kak" id="perjadin_luar_kota_kak" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="perjadin_luar_kota_sk" class="form-label">SK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="perjadin_luar_kota_sk" id="perjadin_luar_kota_sk" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="perjadin_luar_kota_kuitansi_rincian" class="form-label">KUITANSI & RINCIAN BIAYA PERJALANAN DINAS (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="perjadin_luar_kota_kuitansi_rincian" id="perjadin_luar_kota_kuitansi_rincian" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="perjadin_luar_kota_bukti_transportasi" class="form-label">BUKTI TRANSPORTASI * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="perjadin_luar_kota_bukti_transportasi" id="perjadin_luar_kota_bukti_transportasi" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="perjadin_luar_kota_bukti_penginapan" class="form-label">BUKTI PENGINAPAN * (Upload 1 supported file. Max 10 MB)</label>
                    <input type="file" name="perjadin_luar_kota_bukti_penginapan" id="perjadin_luar_kota_bukti_penginapan" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="perjadin_luar_kota_surat_tugas" class="form-label">SURAT TUGAS * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="perjadin_luar_kota_surat_tugas" id="perjadin_luar_kota_surat_tugas" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="perjadin_luar_kota_spd_visum" class="form-label">SPD DAN VISUM * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="perjadin_luar_kota_spd_visum" id="perjadin_luar_kota_spd_visum" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="perjadin_luar_kota_laporan_dinas" class="form-label">LAPORAN PERJALANAN DINAS * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="perjadin_luar_kota_laporan_dinas" id="perjadin_luar_kota_laporan_dinas" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="perjadin_luar_kota_superkendis" class="form-label">SUPERKENDIS (Upload 1 supported file: PDF. Max 10 MB)</label>
                    <input type="file" name="perjadin_luar_kota_superkendis" id="perjadin_luar_kota_superkendis" class="form-control" accept="application/pdf">
                </div>
            </div>

            <div id="honor_operasional_satuan_kerja_section" class="file-upload-section">
                <div class="mb-3">
                    <label for="honor_satker_surat_permintaan" class="form-label">SURAT PERMINTAAN * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="honor_satker_surat_permintaan" id="honor_satker_surat_permintaan" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="honor_satker_kak" class="form-label">KAK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="honor_satker_kak" id="honor_satker_kak" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="honor_satker_sk" class="form-label">SK* (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="honor_satker_sk" id="honor_satker_sk" class="form-control" accept="application/pdf">
                </div>
                <div class="mb-3">
                    <label for="honor_satker_kuitansi_spj" class="form-label">KUITANSI / SPJ * (Upload 1 supported file: PDF. Max 10 MB.)</label>
                    <input type="file" name="honor_satker_kuitansi_spj" id="honor_satker_kuitansi_spj" class="form-control" accept="application/pdf">
                </div>
            </div>


            <div class="mb-3">
                <label for="program" class="form-label">PROGRAM</label>
                <select name="program" id="program" class="form-control">
                    <option value="">-- Pilih Program --</option>
                    <option value="054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik">054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik</option>
                    <option value="054.01.WA - Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi">054.01.WA - Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="output" class="form-label">Pilih Output *</label>
                <select name="output" id="output" class="form-control" required>
                    <option value="">-- Pilih Output --</option>
                    <option value="2896.BMA.004 - PUBLIKASI/LAPORAN ANALISIS DAN PENGEMBANGAN STATISTIK">2896.BMA.004 - PUBLIKASI/LAPORAN ANALISIS DAN PENGEMBANGAN STATISTIK</option>
                    <option value="2897.BMA.004 - LAPORAN DISEMINASI DAN METADATA STATISTIK">2897.BMA.004 - LAPORAN DISEMINASI DAN METADATA STATISTIK</option>
                    <option value="2897.QDB.003 – PENGUATAN PENYELENGGARAAN PEMBINAAN STATISTIK SEKTORAL">2897.QDB.003 – PENGUATAN PENYELENGGARAAN PEMBINAAN STATISTIK SEKTORAL</option>
                    <option value="2898.BMA.007 - PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN">2898.BMA.007 - PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN</option>
                    <option value="2899.BMA.006 - PUBLIKASI/LAPORAN NERACA PRODUKSI">2899.BMA.006 - PUBLIKASI/LAPORAN NERACA PRODUKSI</option>
                    <option value="2900.BMA.005 - DOKUMEN/LAPORAN PENGEMBANGAN METODOLOGI KEGIATAN STATISTIK">2900.BMA.005 - DOKUMEN/LAPORAN PENGEMBANGAN METODOLOGI KEGIATAN STATISTIK</option>
                    <option value="2901.CAN.004 – Pengembangan Infrastruktur dan Layanan Teknologi Informasi dan Komunikasi">2901.CAN.004 – Pengembangan Infrastruktur dan Layanan Teknologi Informasi dan Komunikasi</option>
                    <option value="2902.BMA.004 - PUBLIKASI/LAPORAN STATISTIK DISTRIBUSI">2902.BMA.004 - PUBLIKASI/LAPORAN STATISTIK DISTRIBUSI</option>
                    <option value="2902.BMA.006 - PUBLIKASI/LAPORAN SENSUS EKONOMI">2902.BMA.006 - PUBLIKASI/LAPORAN SENSUS EKONOMI</option>
                    <option value="2903.QMA.006 - PUBLIKASI/LAPORAN PENYUSUNAN INFLASI">2903.QMA.006 - PUBLIKASI/LAPORAN PENYUSUNAN INFLASI</option>
                    <option value="2904.BMA.006 - PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI">2904.BMA.006 - PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI</option>
                    <option value="2905.BMA.004 - PUBLIKASI/LAPORAN SAKERNAS">2905.BMA.004 - PUBLIKASI/LAPORAN SAKERNAS</option>
                    <option value="2905.BMA.006 – SUTAS">2905.BMA.006 – SUTAS</option>
                    <option value="2906.BMA.003 - PUBLIKASI/LAPORAN STATISTIK KESEJAHTERAAN RAKYAT">2906.BMA.003 - PUBLIKASI/LAPORAN STATISTIK KESEJAHTERAAN RAKYAT</option>
                    <option value="2906.BMA.006 - PUBLIKASI/LAPORAN SUSENAS">2906.BMA.006 - PUBLIKASI/LAPORAN SUSENAS</option>
                    <option value="2907.BMA.006 - PUBLIKASI/LAPORAN STATISTIK KETAHANAN SOSIAL">2907.BMA.006 - PUBLIKASI/LAPORAN STATISTIK KETAHANAN SOSIAL</option>
                    <option value="2907.BMA.008 - PUBLIKASI/LAPORAN PENDATAAN PODES">2907.BMA.008 - PUBLIKASI/LAPORAN PENDATAAN PODES</option>
                    <option value="2908.BMA.004 - PUBLIKASI/LAPORAN STATISTIK KEUANGAN, TEKNOLOGI INFORMASI, DAN PARIWISATA">2908.BMA.004 - PUBLIKASI/LAPORAN STATISTIK KEUANGAN, TEKNOLOGI INFORMASI, DAN PARIWISATA</option>
                    <option value="2908.BMA.009 - PUBLIKASI/LAPORAN STATISTIK E-COMMERCE">2908.BMA.009 - PUBLIKASI/LAPORAN STATISTIK E-COMMERCE</option>
                    <option value="2909.BMA.005 - PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN">2909.BMA.005 - PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN</option>
                    <option value="2910.BMA.007 - PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN">2910.BMA.007 - PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN</option>
                    <option value="2910.BMA.008 - PUBLIKASI/LAPORAN STATISTIK HORTIKULTURA DAN PERKEBUNAN">2910.BMA.008 - PUBLIKASI/LAPORAN STATISTIK HORTIKULTURA DAN PERKEBUNAN</option>
                    <option value="2886.EBA.994 – LAYANAN PERKANTORAN">2886.EBA.994 – LAYANAN PERKANTORAN</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="komponen" class="form-label">Pilih Komponen *</label>
                <select name="komponen" id="komponen" class="form-control" required>
                    <option value="">-- Pilih Komponen --</option>
                    <option value="005 - Dukungan Penyelenggaraan Tugas dan Fungsi Unit">005 - Dukungan Penyelenggaraan Tugas dan Fungsi Unit</option>
                    <option value="051 - Persiapan">051 - Persiapan</option>
                    <option value="052 - Pengumpulan Data">052 - Pengumpulan Data</option>
                    <option value="053 - Pengolahan dan Analisis">053 - Pengolahan dan Analisis</option>
                    <option value="054 - Diseminasi dan Evaluasi">054 - Diseminasi dan Evaluasi</option>
                    <option value="506 - Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat">506 - Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat</option>
                    <option value="508 - Gladi Bersih SE2026">508 - Gladi Bersih SE2026</option>
                    <option value="516 - Updating Direktori Usaha/Perusahaan Ekonomi Lanjutan">516 - Updating Direktori Usaha/Perusahaan Ekonomi Lanjutan</option>
                    <option value="519 - Penyusunan Bahan Publisitas">519 - Penyusunan Bahan Publisitas</option>
                    <option value="002 - Operasional dan Pemeliharaan Kantor">002 - Operasional dan Pemeliharaan Kantor</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="akun" class="form-label">Pilih Akun *</label>
                <select name="akun" id="akun" class="form-control" required>
                    <option value="">-- Pilih Akun --</option>
                    <option value="521211">521211</option>
                    <option value="521213">521213</option>
                    <option value="521219">521219</option>
                    <option value="521811">521811</option>
                    <option value="522151">522151</option>
                    <option value="524111">524111</option>
                    <option value="524113">524113</option>
                    <option value="524114">524114</option>
                    <option value="524119">524119</option>
                    <option value="521115">521115</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                    <input type="text" name="email" id="email" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="klepon.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<script>
    document.getElementById('jenis_spj').addEventListener('change', function () {
        // Get all sections and hide them
        const sections = document.querySelectorAll('.file-upload-section');
        sections.forEach(section => {
            section.style.display = 'none';
            // Optionally, clear required attributes if needed for hidden fields
            section.querySelectorAll('input, select, textarea').forEach(input => {
                input.removeAttribute('required');
            });
        });

        // Get the selected value
        const selectedValue = this.value;
        let requiredFields = [];

        // Show the relevant section and set required fields
        if (selectedValue === 'Perlengkapan') {
            document.getElementById('perlengkapan_section').style.display = 'block';
            requiredFields = [
                'perlengkapan_form_permintaan',
                'perlengkapan_kak',
                'perlengkapan_tanda_terima',
                'perlengkapan_foto_barang_1',
                'perlengkapan_foto_barang_2',
                'perlengkapan_kuitansi_pembelian'
            ];
        } else if (selectedValue === 'Konsumsi') {
            document.getElementById('konsumsi_section').style.display = 'block';
            requiredFields = [
                'konsumsi_form_permintaan',
                'konsumsi_kak',
                'konsumsi_surat_undangan',
                'konsumsi_daftar_hadir',
                'konsumsi_notulen',
                'konsumsi_kuitansi',
                'konsumsi_dokumentasi_kegiatan',
                'konsumsi_dokumentasi_konsumsi'
            ];
        } else if (selectedValue === 'Belanja Bahan') {
            document.getElementById('belanja_bahan_section').style.display = 'block';
            requiredFields = [
                'belanja_bahan_form_permintaan',
                'belanja_bahan_kak',
                'belanja_bahan_kuitansi',
                'belanja_bahan_foto_barang'
            ];
        } else if (selectedValue === 'Pembelian Paket Data / Pulsa') {
            document.getElementById('pembelian_paket_data_pulsa_section').style.display = 'block';
            requiredFields = [
                'pulsa_form_permintaan',
                'pulsa_kak',
                'pulsa_kuitansi',
                'pulsa_daftar_penerima'
            ];
        } else if (selectedValue === 'Honor Instruktur Nasional / Daerah') {
            document.getElementById('honor_instruktur_section').style.display = 'block';
            requiredFields = [
                'instruktur_form_permintaan',
                'instruktur_kak',
                'instruktur_sk',
                'instruktur_kuitansi_spj',
                'instruktur_laporan_mengajar'
            ];
        } else if (selectedValue === 'Honor Petugas') {
            document.getElementById('honor_petugas_section').style.display = 'block';
            requiredFields = [
                'petugas_form_permintaan',
                'petugas_kak',
                'petugas_sk',
                'petugas_kuitansi_spj'
            ];
        } else if (selectedValue === 'Honor Narasumber') {
            document.getElementById('honor_narasumber_section').style.display = 'block';
            requiredFields = [
                'narasumber_form_permintaan',
                'narasumber_kak',
                'narasumber_sk',
                'narasumber_kuitansi_spj',
                'narasumber_undangan',
                'narasumber_ktp_npwp',
                'narasumber_jadwal_kegiatan',
                'narasumber_cv',
                'narasumber_bahan_paparan',
                'narasumber_daftar_hadir'
            ];
        } else if (selectedValue === 'Transport Lokal') {
            document.getElementById('transport_lokal_section').style.display = 'block';
            requiredFields = [
                'transport_lokal_form_permintaan',
                'transport_lokal_kak',
                'transport_lokal_sk',
                'transport_lokal_kuitansi_spj',
                'transport_lokal_surat_tugas',
                'transport_lokal_laporan_perjadin_visum',
                'transport_lokal_superkendis'
            ];
        } else if (selectedValue === 'Perjalanan Dinas Luar Kota') {
            document.getElementById('perjalanan_dinas_luar_kota_section').style.display = 'block';
            requiredFields = [
                'perjadin_luar_kota_surat_permintaan',
                'perjadin_luar_kota_kak',
                'perjadin_luar_kota_sk',
                'perjadin_luar_kota_kuitansi_rincian',
                'perjadin_luar_kota_bukti_transportasi',
                'perjadin_luar_kota_bukti_penginapan',
                'perjadin_luar_kota_surat_tugas',
                'perjadin_luar_kota_spd_visum',
                'perjadin_luar_kota_laporan_dinas',
                'perjadin_luar_kota_superkendis'
            ];
        } else if (selectedValue === 'Honor Operasional Satuan Kerja') {
            document.getElementById('honor_operasional_satuan_kerja_section').style.display = 'block';
            requiredFields = [
                'honor_satker_surat_permintaan',
                'honor_satker_kak',
                'honor_satker_sk',
                'honor_satker_kuitansi_spj'
            ];
        }

        // Set required attribute for visible fields
        requiredFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.setAttribute('required', 'required');
            }
        });
    });

    // Trigger change event on page load to set initial state based on selected option (if any)
    document.getElementById('jenis_spj').dispatchEvent(new Event('change'));
</script>

</body>
</html>