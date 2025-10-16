-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 30, 2025 at 03:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

CREATE TABLE `form_data` (
  `id` int(11) NOT NULL,
  `nama_spj` varchar(100) DEFAULT NULL,
  `jenis_spj` varchar(50) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `file_names` text DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `ppk_status` varchar(50) DEFAULT NULL,
  `ppk_tanggal` date DEFAULT NULL,
  `ppk_keterangan` varchar(100) DEFAULT NULL,
  `bendahara_status` varchar(50) DEFAULT NULL,
  `bendahara_tanggal` date DEFAULT NULL,
  `bendahara_keterangan` varchar(100) DEFAULT NULL,
  `proses_bayar` varchar(50) DEFAULT NULL,
  `ppspm_status` varchar(50) DEFAULT NULL,
  `ppspm_tanggal` date DEFAULT NULL,
  `ppspm_keterangan` varchar(100) DEFAULT NULL,
  `proses_terakhir` varchar(50) DEFAULT NULL,
  `program` varchar(255) DEFAULT NULL,
  `output` varchar(255) DEFAULT NULL,
  `komponen` varchar(255) DEFAULT NULL,
  `akun` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`id`, `nama_spj`, `jenis_spj`, `detail`, `file_names`, `tgl_kirim`, `ppk_status`, `ppk_tanggal`, `ppk_keterangan`, `bendahara_status`, `bendahara_tanggal`, `bendahara_keterangan`, `proses_bayar`, `ppspm_status`, `ppspm_tanggal`, `ppspm_keterangan`, `proses_terakhir`, `program`, `output`, `komponen`, `akun`, `email`) VALUES
(1, 'nln', 'Perlengkapan', 'lw', '[]', '2025-07-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'uuu', 'Perlengkapan', 'jabhja', '[]', '2025-07-13', 'Setuju', '2008-01-09', '', 'Setuju', '3009-06-06', NULL, 'UP', 'Setuju', '9987-09-09', '', 'Setuju', NULL, NULL, NULL, NULL, NULL),
(3, 'uuu', 'Konsumsi', 'kwjjw', '[]', '2025-07-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'honor', 'Perlengkapan', 'jhh', '[]', '2025-07-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'hinie', 'Perlengkapan', 'h', '[]', '2025-07-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'tyy', 'Belanja', 'bhjb', '[\"SE2026-WILKERSTAT_66_3271_exportmitra_2025-07-18_140409 (2).xlsx\"]', '2025-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'baru', 'Konsumsi', 'coba lagi', '[\"Undangan Pembuktian Kualifikasi.docx\"]', '2025-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'coba pdf', 'Perlengkapan', 'coba pdf', '[\"Undangan Pembuktian Kualifikasi.pdf\"]', '2025-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'operator coba', 'Konsumsi', 'operator', '[\"Undangan Pembuktian Kualifikasi.docx\"]', '2025-07-21', 'Setuju', '2025-07-09', '-', 'Setuju', '2025-07-16', NULL, 'Ditunda', 'Setuju', '2025-07-20', 'op', 'Setuju', NULL, NULL, NULL, NULL, NULL),
(10, 'tyy', 'Belanja Bahan', '', '[]', '2025-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'baru', 'Perlengkapan', NULL, '[\"227006516065_Septya Kurnia Azzahra_UTS Metodologi Penelitian_R02.pdf\",\"Undangan Pembuktian Kualifikasi.pdf\",\"Materi Perkuliahan 2.pdf\",\"Septya Kurnia Azzahra_Jurnalisme Human Interest Narasi kuat, Visual Berbicara.pdf\",\"227006516065_Septya Kurnia Azzahra_UTS Machine Learning_R02.pdf\",\"Rama Dwi Satria_Universitas Nasional_PKM-GFT.pdf\"]', '2025-07-21', 'Setuju', '2007-01-01', '', 'Setuju', '2025-07-18', NULL, 'Setuju', 'Setuju', '2025-07-09', '', 'Setuju', '054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik', '2905.BMA.006 – SUTAS', '516 - Updating Direktori Usaha/Perusahaan Ekonomi Lanjutan', '524114', 'bimonunu@gmail.com'),
(12, 'coba pdf', 'Perlengkapan', NULL, '{\"FORM PERMINTAAN *\":\"687f3f5a3b64e-UndanganPembuktianKualifikasi.pdf\",\"KAK*\":\"687f3f5a3bdf7-Metopen_SeptyaKurniaAzzahra_227006516065.pdf\",\"TANDA TERIMA *\":\"687f3f5a3c223-Tugas1_Manpro_SeptyaKurniaAzzahra_227006516065.pdf\",\"FOTO BARANG 1 *\":\"687f3f5a3c490-RamaDwiSatria_UniversitasNasional_PKM-GFT.pdf\",\"FOTO BARANG 2 *\":\"687f3f5a3c6f3-FORMKEIKUTSERTAANKOMPETISILOMBAMAHASISWAKIP-KULIAHUNAS2022MARET-AGUSTUS-GENAP2025.pdf\",\"KUITANSI PEMBELIAN\":\"687f3f5a3ca4f-SeptyaKurniaAzzahra-CV.pdf\"}', '2025-07-22', 'Setuju', '2025-07-11', '', 'Setuju', '2025-07-12', NULL, 'Setuju', 'Setuju', '2025-07-08', '', 'Setuju', '054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik', '2898.BMA.007 - PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN', '053 - Pengolahan dan Analisis', '522151', 'bimonunu@gmail.com'),
(13, 'coba baru', 'Perlengkapan', '', '[]', '2025-07-28', 'Setuju', '0000-00-00', '', 'Setuju', '0000-00-00', NULL, 'Setuju', 'Perbaiki', '2025-07-28', 'perbaiki', 'Perbaiki', NULL, NULL, NULL, NULL, NULL),
(14, 'sdxx', 'Honor Petugas', '', '[]', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'bismillah', 'Belanja Bahan', '', '[]', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'jjj', 'Transport Lokal', '', '[]', '2025-07-28', 'Ditunda', '0033-03-31', 'r', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'coba aura', 'Honor Narasumber', '', '[]', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'yuyu', 'Honor Petugas', '', '[]', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'yuyu', 'Honor Petugas', '', '[]', '2025-07-28', 'Ditunda', '0999-09-01', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'gag', 'Honor Petugas', NULL, '{\"FORM PERMINTAAN *\":\"68872697116c2-ProposalManajemenProyek_Kelompok5.pdf\",\"KAK*\":\"68872697118ca-idilkomitmenKOMITMEN_MuhammadZaky-4.12023.pdf\",\"SK*\":\"6887269711aa4-pengumuman-jakarta-pusat.pdf\",\"KUITANSI \\/ SPJ *\":\"6887269711c93-ProjectCharter_Kelompok5_ManagementProyek1.pdf\"}', '2025-07-28', 'Perbaiki', '0077-07-07', '-', 'Perbaiki', '0088-08-07', NULL, NULL, 'Perbaiki', '0099-09-01', '', 'Perbaiki', '054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik', '2904.BMA.006 - PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI', '508 - Gladi Bersih SE2026', '524113', 'bimonunu@gmail.com'),
(21, 'tyy', 'Honor Petugas', NULL, '{\"FORM PERMINTAAN *\":\"68872a256a8de-ProposalManajemenProyek_Kelompok5.pdf\",\"KAK*\":\"68872a256c6ae-pengumuman-jakarta-pusat.pdf\",\"SK*\":\"68872a257107a-MP-Pertemuan11.pdf\",\"KUITANSI \\/ SPJ *\":\"68872a25713e1-ProjectCharter_Kelompok5_ManagementProyek1.pdf\"}', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik', '2906.BMA.003 - PUBLIKASI/LAPORAN STATISTIK KESEJAHTERAAN RAKYAT', '516 - Updating Direktori Usaha/Perusahaan Ekonomi Lanjutan', '524111', 'bimonunu@gmail.com'),
(22, 'jjj', 'Honor Petugas', NULL, '{\"FORM PERMINTAAN *\":\"68872a3a98fe4-ProposalManajemenProyek_Kelompok5.pdf\",\"KAK*\":\"68872a3a991d9-ProposalManajemenProyek_Kelompok5.pdf\",\"SK*\":\"68872a3a99656-ProposalManajemenProyekKelompok5.pdf\",\"KUITANSI \\/ SPJ *\":\"68872a3a9efc4-ProposalManajemenProyek_Kelompok5.pdf\"}', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '054.01.WA - Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', '2904.BMA.006 - PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI', '506 - Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat', '521811', 'bimonunu@gmail.com'),
(23, 'hggj', 'Honor Petugas', NULL, '{\"FORM PERMINTAAN *\":\"n-a-68872b4c85e3e.pdf\",\"KAK*\":\"n-a-68872b4c861fc.pdf\",\"SK*\":\"n-a-68872b4c8665d.pdf\",\"KUITANSI \\/ SPJ *\":\"n-a-68872b4c86a3d.pdf\"}', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik', '2897.QDB.003 – PENGUATAN PENYELENGGARAAN PEMBINAAN STATISTIK SEKTORAL', '516 - Updating Direktori Usaha/Perusahaan Ekonomi Lanjutan', '524119', 'bimonunu@gmail.com'),
(24, 'coba baru', 'Honor Petugas', NULL, '{\"FORM PERMINTAAN *\":\"n-a-68872c9c4e2fd.pdf\",\"KAK*\":\"n-a-68872c9c4e6b7.pdf\",\"SK*\":\"n-a-68872c9c4eab1.pdf\",\"KUITANSI \\/ SPJ *\":\"n-a-68872c9c4ed72.pdf\"}', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik', '2904.BMA.006 - PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI', '519 - Penyusunan Bahan Publisitas', '524119', 'bimonunu@gmail.com'),
(25, 'tyy', 'Honor Petugas', NULL, '{\"FORM PERMINTAAN *\":\"proposal-manajemen-proyek-kelompok-5-1-68872d728ea4e.pdf\",\"KAK*\":\"26-jurnal-pkm-fix-68872d728ec71.pdf\",\"SK*\":\"2-kak-susenas-maret-dan-seruti-2025-68872d728f096.pdf\",\"KUITANSI \\/ SPJ *\":\"proposal-manajemen-proyek-kelompok-5-68872d728f35f.pdf\"}', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '054.01.WA - Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', '2897.BMA.004 - LAPORAN DISEMINASI DAN METADATA STATISTIK', '506 - Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat', '524113', 'bimonunu@gmail.com'),
(26, 'coba pdf', 'Honor Petugas', NULL, '{\"FORM PERMINTAAN *\":\"proposal-manajemen-proyek-kelompok-5-68872d8d9e5cf.pdf\",\"KAK*\":\"26-jurnal-pkm-fix-68872d8d9e8c4.pdf\",\"SK*\":\"23-04-270-jurnal-eproc-68872d8da2311.pdf\"}', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik', '2897.BMA.004 - LAPORAN DISEMINASI DAN METADATA STATISTIK', '519 - Penyusunan Bahan Publisitas', '524113', 'bimonunu@gmail.com'),
(27, 'daun', 'Honor Petugas', NULL, '{\"FORM PERMINTAAN *\":\"n-a-68872ded7d510.pdf\",\"KAK*\":\"n-a-68872ded7d901.pdf\",\"SK*\":\"n-a-68872ded7dc5c.pdf\",\"KUITANSI \\/ SPJ *\":\"n-a-68872ded7df70.pdf\"}', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik', '2907.BMA.008 - PUBLIKASI/LAPORAN PENDATAAN PODES', '519 - Penyusunan Bahan Publisitas', '522151', 'bimonunu@gmail.com'),
(28, 'coba pdf', 'Honor Petugas', NULL, '{\"FORM PERMINTAAN *\":\"uploads\\/coba-pdf-68872ec9e56ee.pdf\",\"KAK*\":\"uploads\\/coba-pdf-68872ec9e596c.pdf\",\"SK*\":\"uploads\\/coba-pdf-68872ec9e5cb2.pdf\",\"KUITANSI \\/ SPJ *\":\"uploads\\/coba-pdf-68872ec9e5ea2.pdf\"}', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik', '2897.BMA.004 - LAPORAN DISEMINASI DAN METADATA STATISTIK', '508 - Gladi Bersih SE2026', '521811', 'bimonunu@gmail.com'),
(29, 'tyy', 'Honor Operasional Satuan Kerja', NULL, '{\"SURAT PERMINTAAN *\":\"surat-permintaan-68872f10088f0.pdf\",\"KAK*\":\"kak-68872f1008b0f.pdf\",\"SK*\":\"sk-68872f1008de3.pdf\",\"KUITANSI \\/ SPJ *\":\"kuitansi-spj-68872f1009342.pdf\"}', '2025-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '054.01.GG - Program Penyediaan dan Pelayanan Informasi Statistik', '2897.QDB.003 – PENGUATAN PENYELENGGARAAN PEMBINAAN STATISTIK SEKTORAL', '516 - Updating Direktori Usaha/Perusahaan Ekonomi Lanjutan', '524114', 'bimonunu@gmail.com'),
(30, 'coba baru', 'Konsumsi', NULL, '{\"FORM PERMINTAAN *\":\"form-permintaan-68872f7081c81.pdf\",\"KAK*\":\"kak-68872f7081ee9.pdf\",\"SURAT UNDANGAN *\":\"surat-undangan-68872f708219e.pdf\",\"DAFTAR HADIR *\":\"daftar-hadir-68872f70823d1.pdf\",\"NOTULEN *\":\"notulen-68872f7082606.pdf\",\"KUITANSI\":\"kuitansi-68872f708289e.pdf\",\"DOKUMENTASI KEGIATAN *\":\"dokumentasi-kegiatan-68872f7082b1f.pdf\"}', '2025-07-28', 'Tidak Lengkap, Upload Ulang', '2025-07-15', 'r', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '054.01.WA - Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', '2904.BMA.006 - PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI', '519 - Penyusunan Bahan Publisitas', '524119', 'bimonunu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `spj_data`
--

CREATE TABLE `spj_data` (
  `id` int(11) NOT NULL,
  `nama_spj` varchar(255) DEFAULT NULL,
  `jenis_spj` varchar(100) DEFAULT NULL,
  `program` text DEFAULT NULL,
  `output_program` text DEFAULT NULL,
  `komponen` text DEFAULT NULL,
  `akun` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `form_permintaan` text DEFAULT NULL,
  `kak` text DEFAULT NULL,
  `kuitansi_pembelian` text DEFAULT NULL,
  `tanda_terima` text DEFAULT NULL,
  `foto_barang_1` text DEFAULT NULL,
  `foto_barang_2` text DEFAULT NULL,
  `sub_jenis_konsumsi` text DEFAULT NULL,
  `surat_undangan` text DEFAULT NULL,
  `daftar_hadir` text DEFAULT NULL,
  `notulen` text DEFAULT NULL,
  `kuitansi_konsumsi` text DEFAULT NULL,
  `dokumentasi_kegiatan` text DEFAULT NULL,
  `dokumentasi_konsumsi` text DEFAULT NULL,
  `sub_jenis_belanja_bahan` text DEFAULT NULL,
  `foto_barang_belanja_bahan` text DEFAULT NULL,
  `daftar_penerima_pulsa` text DEFAULT NULL,
  `sk` text DEFAULT NULL,
  `kuitansi_spj` text DEFAULT NULL,
  `laporan_mengajar` text DEFAULT NULL,
  `undangan_narasumber` text DEFAULT NULL,
  `ktp_npwp_narasumber` text DEFAULT NULL,
  `jadwal_kegiatan_narasumber` text DEFAULT NULL,
  `cv_narasumber` text DEFAULT NULL,
  `bahan_paparan_narasumber` text DEFAULT NULL,
  `daftar_hadir_narasumber` text DEFAULT NULL,
  `surat_tugas_transport` text DEFAULT NULL,
  `laporan_perjadin_visum_transport` text DEFAULT NULL,
  `superkendis_transport` text DEFAULT NULL,
  `surat_permintaan_perjadin` text DEFAULT NULL,
  `kuitansi_rincian_biaya_perjadin` text DEFAULT NULL,
  `bukti_transportasi_perjadin` text DEFAULT NULL,
  `bukti_penginapan_perjadin` text DEFAULT NULL,
  `surat_tugas_perjadin` text DEFAULT NULL,
  `spd_visum_perjadin` text DEFAULT NULL,
  `laporan_perjalanan_dinas_perjadin` text DEFAULT NULL,
  `superkendis_perjadin` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '1234', 'admin_utama'),
(2, 'admin_tabel', '1234', 'admin_tabel'),
(3, 'operator', '1234', 'user'),
(5, 'ppk_user', '1234', 'ppk'),
(6, 'bendahara_user', '1234', 'bendahara'),
(7, 'ppspm_user', '1234', 'ppspm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spj_data`
--
ALTER TABLE `spj_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_data`
--
ALTER TABLE `form_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `spj_data`
--
ALTER TABLE `spj_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
