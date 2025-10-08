-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2025 at 03:46 AM
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
  `proses_terakhir` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`id`, `nama_spj`, `jenis_spj`, `detail`, `file_names`, `tgl_kirim`, `ppk_status`, `ppk_tanggal`, `ppk_keterangan`, `bendahara_status`, `bendahara_tanggal`, `bendahara_keterangan`, `proses_bayar`, `ppspm_status`, `ppspm_tanggal`, `ppspm_keterangan`, `proses_terakhir`) VALUES
(1, 'nln', 'Perlengkapan', 'lw', '[]', '2025-07-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `id_cuti` int(11) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jenis_cuti` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `nama_file_surat` varchar(255) NOT NULL,
  `ukuran_file_surat` int(11) NOT NULL,
  `tipe_file_surat` varchar(100) NOT NULL,
  `tanggal_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`id_cuti`, `nama_pegawai`, `jenis_cuti`, `tanggal_mulai`, `tanggal_selesai`, `nama_file_surat`, `ukuran_file_surat`, `tipe_file_surat`, `tanggal_upload`) VALUES
(4, 'Ir. Raden Gandari Adianti Aju Fatimah, M.Si', 'Cuti Tahunan (Harian)', '2025-07-24', '2025-07-24', 'CONTOH FILE CUTI.pdf', 0, '', '2025-07-22 00:00:00'),
(5, 'Ir. Raden Gandari Adianti Aju Fatimah, M.Si', 'Cuti Tahunan (1/2 Hari)', '2025-07-25', '2025-07-26', 'CONTOH FILE CUTI.pdf', 0, '', '2025-07-22 00:00:00'),
(6, 'Asriana Ariyanti, Mi.DEc', 'Cuti Alasan Penting', '2025-07-28', '2025-07-28', 'CONTOH FILE CUTI.pdf', 0, '', '0000-00-00 00:00:00'),
(7, 'Bimo Nugroho, SST', 'Cuti Alasan Penting', '2025-07-23', '2025-07-23', 'CONTOH FILE CUTI.pdf', 0, '', '0000-00-00 00:00:00');

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
(3, 'operator', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`id_cuti`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `id_cuti` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
