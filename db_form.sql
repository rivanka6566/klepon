-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2025 pada 04.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

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
-- Struktur dari tabel `anggaran`
--

CREATE TABLE `anggaran` (
  `Kode Program` varchar(9) DEFAULT NULL,
  `Program` varchar(52) DEFAULT NULL,
  `Kode Kegiatan` int(4) DEFAULT NULL,
  `Kegiatan` varchar(101) DEFAULT NULL,
  `Kode KRO` varchar(3) DEFAULT NULL,
  `KRO` varchar(48) DEFAULT NULL,
  `Kode RO` varchar(3) DEFAULT NULL,
  `RO` varchar(91) DEFAULT NULL,
  `Kode Komponen` varchar(3) DEFAULT NULL,
  `Komponen` varchar(73) DEFAULT NULL,
  `Kode Sub Komponen` varchar(1) DEFAULT NULL,
  `Nama Sub Komponen` varchar(48) DEFAULT NULL,
  `Kode Akun` int(6) DEFAULT NULL,
  `Nama Akun` varchar(51) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `anggaran`
--

INSERT INTO `anggaran` (`Kode Program`, `Program`, `Kode Kegiatan`, `Kegiatan`, `Kode KRO`, `KRO`, `Kode RO`, `RO`, `Kode Komponen`, `Komponen`, `Kode Sub Komponen`, `Nama Sub Komponen`, `Kode Akun`, `Nama Akun`) VALUES
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2896, 'Pengembangan dan Analisis Statistik', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN ANALISIS DAN PENGEMBANGAN STATISTIK', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2896, 'Pengembangan dan Analisis Statistik', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN ANALISIS DAN PENGEMBANGAN STATISTIK', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2897, 'Pelayanan dan Pengembangan Diseminasi Informasi Statistik', 'BMA', 'Data dan Informasi Publik', '004', 'LAPORAN DISEMINASI DAN METADATA STATISTIK', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2897, 'Pelayanan dan Pengembangan Diseminasi Informasi Statistik', 'BMA', 'Data dan Informasi Publik', '004', 'LAPORAN DISEMINASI DAN METADATA STATISTIK', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2897, 'Pelayanan dan Pengembangan Diseminasi Informasi Statistik', 'BMA', 'Data dan Informasi Publik', '004', 'LAPORAN DISEMINASI DAN METADATA STATISTIK', '053', 'PENGOLAHAN DAN ANALISIS', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2897, 'Pelayanan dan Pengembangan Diseminasi Informasi Statistik', 'QDB', 'Fasilitasi dan Pembinaan Lembaga', '003', 'PENGUATAN PENYELENGGARAAN PEMBINAAN STATISTIK SEKTORAL PERSIAPAN', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2897, 'Pelayanan dan Pengembangan Diseminasi Informasi Statistik', 'QDB', 'Fasilitasi dan Pembinaan Lembaga', '003', 'PENGUATAN PENYELENGGARAAN PEMBINAAN STATISTIK SEKTORAL PERSIAPAN', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 522151, 'Belanja Jasa Profesi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2897, 'Pelayanan dan Pengembangan Diseminasi Informasi Statistik', 'QDB', 'Fasilitasi dan Pembinaan Lembaga', '003', 'PENGUATAN PENYELENGGARAAN PEMBINAAN STATISTIK SEKTORAL PERSIAPAN', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2897, 'Pelayanan dan Pengembangan Diseminasi Informasi Statistik', 'QDB', 'Fasilitasi dan Pembinaan Lembaga', '003', 'PENGUATAN PENYELENGGARAAN PEMBINAAN STATISTIK SEKTORAL PERSIAPAN', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524114, 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2897, 'Pelayanan dan Pengembangan Diseminasi Informasi Statistik', 'QDB', 'Fasilitasi dan Pembinaan Lembaga', '003', 'PENGUATAN PENYELENGGARAAN PEMBINAAN STATISTIK SEKTORAL PERSIAPAN', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2897, 'Pelayanan dan Pengembangan Diseminasi Informasi Statistik', 'QDB', 'Fasilitasi dan Pembinaan Lembaga', '003', 'PENGUATAN PENYELENGGARAAN PEMBINAAN STATISTIK SEKTORAL PERSIAPAN', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524111, 'Belanja Perjalanan Dinas Biasa'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2898, 'Penyediaan dan Pengembangan Statistik Neraca Pengeluaran', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2898, 'Penyediaan dan Pengembangan Statistik Neraca Pengeluaran', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2898, 'Penyediaan dan Pengembangan Statistik Neraca Pengeluaran', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2898, 'Penyediaan dan Pengembangan Statistik Neraca Pengeluaran', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2898, 'Penyediaan dan Pengembangan Statistik Neraca Pengeluaran', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2898, 'Penyediaan dan Pengembangan Statistik Neraca Pengeluaran', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2898, 'Penyediaan dan Pengembangan Statistik Neraca Pengeluaran', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN', '053', 'PENGOLAHAN DAN ANALISIS', 'A', 'TANPA SUB KOMPONEN', 522151, 'Belanja Jasa Profesi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2899, 'Penyediaan dan Pengembangan Statistik Neraca Produksi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN STATISTIK NERACA PRODUKSI', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2899, 'Penyediaan dan Pengembangan Statistik Neraca Produksi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN STATISTIK NERACA PRODUKSI', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2899, 'Penyediaan dan Pengembangan Statistik Neraca Produksi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN STATISTIK NERACA PRODUKSI', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2899, 'Penyediaan dan Pengembangan Statistik Neraca Produksi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN STATISTIK NERACA PRODUKSI', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2899, 'Penyediaan dan Pengembangan Statistik Neraca Produksi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN STATISTIK NERACA PRODUKSI', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2900, 'Pengembangan Metodologi Sensus dan Survei', 'BMA', 'Data dan Informasi Publik', '005', 'DOKUMEN/LAPORAN PENGEMBANGAN METODOLOGI KEGIATAN STATISTIK', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2900, 'Pengembangan Metodologi Sensus dan Survei', 'BMA', 'Data dan Informasi Publik', '005', 'DOKUMEN/LAPORAN PENGEMBANGAN METODOLOGI KEGIATAN STATISTIK', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2900, 'Pengembangan Metodologi Sensus dan Survei', 'BMA', 'Data dan Informasi Publik', '005', 'DOKUMEN/LAPORAN PENGEMBANGAN METODOLOGI KEGIATAN STATISTIK', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2901, 'Pengembangan Sistem Informasi Statistik', 'CAN', 'Sarana Bidang Teknologi Informasi dan Komunikasi', '004', 'Pengembangan Infrastruktur dan Layanan Teknologi Informasi dan Komunikasi', '056', 'Pengembangan Infrastruktur dan Layanan Teknologi Informasi dan Komunikasi', 'A', 'TANPA SUB KOMPONEN', 522119, 'Belanja Langganan Daya dan Jasa Lainnya'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2901, 'Pengembangan Sistem Informasi Statistik', 'CAN', 'Sarana Bidang Teknologi Informasi dan Komunikasi', '004', 'Pengembangan Infrastruktur dan Layanan Teknologi Informasi dan Komunikasi', '056', 'Pengembangan Infrastruktur dan Layanan Teknologi Informasi dan Komunikasi', 'A', 'TANPA SUB KOMPONEN', 532111, 'Belanja Modal Peralatan dan Mesin'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN STATISTIK DISTRIBUSI', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN STATISTIK DISTRIBUSI', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN STATISTIK DISTRIBUSI', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN STATISTIK DISTRIBUSI', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SENSUS EKONOMI', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SENSUS EKONOMI', '506', 'Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SENSUS EKONOMI', '506', 'Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SENSUS EKONOMI', '506', 'Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat', 'A', 'TANPA SUB KOMPONEN', 521219, 'Belanja Barang Non Operasional Lainnya'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SENSUS EKONOMI', '506', 'Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SENSUS EKONOMI', '506', 'Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SENSUS EKONOMI', '506', 'Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat', 'A', 'TANPA SUB KOMPONEN', 524114, 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SENSUS EKONOMI', '506', 'Pemutakhiran Kerangka Geospasial dan Muatan Wilkerstat', 'A', 'TANPA SUB KOMPONEN', 524111, 'Belanja Perjalanan Dinas Biasa'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SENSUS EKONOMI', '508', 'Gladi Bersih SE2026', 'A', 'GLADI BERSIH PENDATAAN SE2026', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SENSUS EKONOMI', '516', 'Updating Direktori Usaha/Perusahaan Ekonomi Lanjutan', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2902, 'Penyediaan dan Pengembangan Statistik Distribusi', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SENSUS EKONOMI', '519', 'Penyusunan Bahan Publisitas', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK HARGA', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK HARGA', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK HARGA', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK HARGA', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK HARGA', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK HARGA', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524111, 'Belanja Perjalanan Dinas Biasa'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN PENYUSUNAN INFLASI', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN PENYUSUNAN INFLASI', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN PENYUSUNAN INFLASI', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN PENYUSUNAN INFLASI', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN PENYUSUNAN INFLASI', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN PENYUSUNAN INFLASI', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2903, 'Penyediaan dan Pengembangan Statistik Harga', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN PENYUSUNAN INFLASI', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524111, 'Belanja Perjalanan Dinas Biasa'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'B', 'Economic Wide Survey (EWS)', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'B', 'Economic Wide Survey (EWS)', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '051', 'PERSIAPAN', 'B', 'Economic Wide Survey (EWS)', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '051', 'PERSIAPAN', 'B', 'Economic Wide Survey (EWS)', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '051', 'PERSIAPAN', 'B', 'Economic Wide Survey (EWS)', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524111, 'Belanja Perjalanan Dinas Biasa'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '052', 'PENGUMPULAN DATA', 'B', 'Economic Wide Survey (EWS)', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2904, '\"Penyediaan dan Pengembangan Statistik Industri, Pertambangan dan Penggalian, Energi, dan Konstruksi\"', 'BMA', 'Data dan Informasi Publik', '006', '\"PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI\"', '052', 'PENGUMPULAN DATA', 'B', 'Economic Wide Survey (EWS)', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'B', 'SAKERNAS NOVEMBER', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'B', 'SAKERNAS NOVEMBER', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524114, 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '051', 'PERSIAPAN', 'B', 'SAKERNAS NOVEMBER', 521213, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '051', 'PERSIAPAN', 'B', 'SAKERNAS NOVEMBER', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '051', 'PERSIAPAN', 'B', 'SAKERNAS NOVEMBER', 523113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '051', 'PERSIAPAN', 'B', 'SAKERNAS NOVEMBER', 524114, 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524111, 'Perjalanan Dinas Biasa'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '052', 'PENGUMPULAN DATA', 'B', 'SAKERNAS NOVEMBER', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '004', 'PUBLIKASI/LAPORAN SAKERNAS', '052', 'PENGUMPULAN DATA', 'B', 'SAKERNAS NOVEMBER', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SURVEI PENDUDUK ANTAR SENSUS', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SURVEI PENDUDUK ANTAR SENSUS', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SURVEI PENDUDUK ANTAR SENSUS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SURVEI PENDUDUK ANTAR SENSUS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SURVEI PENDUDUK ANTAR SENSUS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SURVEI PENDUDUK ANTAR SENSUS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SURVEI PENDUDUK ANTAR SENSUS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524114, 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SURVEI PENDUDUK ANTAR SENSUS', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SURVEI PENDUDUK ANTAR SENSUS', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2905, 'Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SURVEI PENDUDUK ANTAR SENSUS', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524111, 'Perjalanan Dinas Biasa'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2906, 'Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat', 'BMA', 'Data dan Informasi Publik', '003', 'PUBLIKASI/LAPORAN STATISTIK KESEJAHTERAAN RAKYAT', '054', 'DISEMINASI DAN EVALUASI', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2906, 'Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SUSENAS', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2906, 'Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SUSENAS', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2906, 'Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SUSENAS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2906, 'Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SUSENAS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2906, 'Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SUSENAS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2906, 'Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SUSENAS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2906, 'Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SUSENAS', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524114, 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2906, 'Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SUSENAS', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2906, 'Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SUSENAS', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2906, 'Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN SUSENAS', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524111, 'Perjalanan Dinas Biasa'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN STATISTIK KETAHANAN SOSIAL', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN STATISTIK KETAHANAN SOSIAL', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN STATISTIK KETAHANAN SOSIAL', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '006', 'PUBLIKASI/LAPORAN STATISTIK KETAHANAN SOSIAL', '054', 'DISEMINASI DAN EVALUASI', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN PENDATAAN PODES', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN PENDATAAN PODES', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN PENDATAAN PODES', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN PENDATAAN PODES', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN PENDATAAN PODES', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN PENDATAAN PODES', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN PENDATAAN PODES', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524114, 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN PENDATAAN PODES', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN PENDATAAN PODES', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2907, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN PENDATAAN PODES', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524111, 'Belanja Perjalanan Dinas Biasa'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'B', 'SURVEI KONSUMSI BAHAN POKOK NON RUMAHTANGGA 2025', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'B', 'SURVEI KONSUMSI BAHAN POKOK NON RUMAHTANGGA 2025', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '051', 'PERSIAPAN', 'B', 'SURVEI KONSUMSI BAHAN POKOK NON RUMAHTANGGA 2025', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '051', 'PERSIAPAN', 'B', 'SURVEI KONSUMSI BAHAN POKOK NON RUMAHTANGGA 2025', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '051', 'PERSIAPAN', 'B', 'SURVEI KONSUMSI BAHAN POKOK NON RUMAHTANGGA 2025', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '051', 'PERSIAPAN', 'B', 'SURVEI KONSUMSI BAHAN POKOK NON RUMAHTANGGA 2025', 524114, 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '051', 'PERSIAPAN', 'B', 'SURVEI KONSUMSI BAHAN POKOK NON RUMAHTANGGA 2025', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524114, 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524111, 'Belanja Perjalanan Dinas Biasa'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '004', '\"PUBLIKASI/LAPORAN STATISTIK KEUANGAN,  TEKNOLOGI INFORMASI, DAN PARIWISATA\"', '052', 'PENGUMPULAN DATA', 'B', 'SURVEI KONSUMSI BAHAN POKOK NON RUMAHTANGGA 2025', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK E-COMMERCE', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK E-COMMERCE', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK E-COMMERCE', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK E-COMMERCE', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK E-COMMERCE', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK E-COMMERCE', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 524114, 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2908, 'Penyediaan dan Pengembangan Statistik Ketahanan Sosial', 'BMA', 'Data dan Informasi Publik', '009', 'PUBLIKASI/LAPORAN STATISTIK E-COMMERCE', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan');
INSERT INTO `anggaran` (`Kode Program`, `Program`, `Kode Kegiatan`, `Kegiatan`, `Kode KRO`, `KRO`, `Kode RO`, `RO`, `Kode Komponen`, `Komponen`, `Kode Sub Komponen`, `Nama Sub Komponen`, `Kode Akun`, `Nama Akun`) VALUES
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2909, '\"Penyediaan dan Pengembangan Statistik Peternakan, Perikanan, dan Kehutanan\"', 'BMA', 'Data dan Informasi Publik', '005', '\"PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN\"', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2909, '\"Penyediaan dan Pengembangan Statistik Peternakan, Perikanan, dan Kehutanan\"', 'BMA', 'Data dan Informasi Publik', '005', '\"PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN\"', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2909, '\"Penyediaan dan Pengembangan Statistik Peternakan, Perikanan, dan Kehutanan\"', 'BMA', 'Data dan Informasi Publik', '005', '\"PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN\"', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521219, 'Belanja Barang Non Operasional Lainnya'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2909, '\"Penyediaan dan Pengembangan Statistik Peternakan, Perikanan, dan Kehutanan\"', 'BMA', 'Data dan Informasi Publik', '005', '\"PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN\"', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2909, '\"Penyediaan dan Pengembangan Statistik Peternakan, Perikanan, dan Kehutanan\"', 'BMA', 'Data dan Informasi Publik', '005', '\"PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN\"', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2909, '\"Penyediaan dan Pengembangan Statistik Peternakan, Perikanan, dan Kehutanan\"', 'BMA', 'Data dan Informasi Publik', '005', '\"PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN\"', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'B', 'SURVEI KONVERSI GABAH BERAS', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'B', 'SURVEI KONVERSI GABAH BERAS', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '051', 'PERSIAPAN', 'B', 'SURVEI KONVERSI GABAH BERAS', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 521219, 'Belanja Barang Non Operasional Lainnya'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '052', 'PENGUMPULAN DATA', 'B', 'SURVEI KONVERSI GABAH BERAS', 521211, 'Belanja Bahan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '052', 'PENGUMPULAN DATA', 'B', 'SURVEI KONVERSI GABAH BERAS', 521219, 'Belanja Barang Non Operasional Lainnya'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '007', 'PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN', '052', 'PENGUMPULAN DATA', 'B', 'SURVEI KONVERSI GABAH BERAS', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN STATISTIK HORTIKULTURA DAN PERKEBUNAN', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 521213, 'Belanja Honor Output Kegiatan'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN STATISTIK HORTIKULTURA DAN PERKEBUNAN', '005', 'Dukungan Penyelenggaraan Tugas dan Fungsi Unit', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN STATISTIK HORTIKULTURA DAN PERKEBUNAN', '051', 'PERSIAPAN', 'A', 'TANPA SUB KOMPONEN', 521811, 'Belanja Barang Persediaan Barang Konsumsi'),
('054.01.GG', 'Program Penyediaan dan Pelayanan Informasi Statistik', 2910, '\"Penyediaan dan Pengembangan Statistik Tanaman Pangan, Hortikultura, dan Perkebunan\"', 'BMA', 'Data dan Informasi Publik', '008', 'PUBLIKASI/LAPORAN STATISTIK HORTIKULTURA DAN PERKEBUNAN', '052', 'PENGUMPULAN DATA', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '962', 'Layanan Umum', '051', 'Tanpa Komponen', 'A', 'TANPA SUB KOMPONEN', 521211, 'Belanja Bahan'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '962', 'Layanan Umum', '051', 'Tanpa Komponen', 'A', 'TANPA SUB KOMPONEN', 524111, 'Belanja Perjalanan Dinas Biasa'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 511111, 'Belanja Gaji Pokok PNS'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 511119, 'Belanja Pembulatan Gaji PNS'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 511121, 'Belanja Tunj. Suami/Istri PNS'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 511122, 'Belanja Tunj. Anak PNS'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 511123, 'Belanja Tunj. Struktural PNS'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 511124, 'Belanja Tunj. Fungsional PNS'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 511125, 'Belanja Tunj. PPh PNS'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 511126, 'Belanja Tunj. Beras PNS'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 511129, 'Belanja Uang Makan PNS'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 511151, 'Belanja Tunjangan Umum PNS'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 512211, 'Belanja Uang Lembur'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '001', 'Gaji dan Tunjangan', 'A', 'TANPA SUB KOMPONEN', 512411, 'Belanja Pegawai (Tunjangan Khusus/Kegiatan/Kinerja)'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 521111, 'Belanja Keperluan Perkantoran'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 521115, 'Belanja Honor Operasional Satuan Kerja'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 521119, 'Belanja Barang Operasional Lainnya'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 521252, 'Belanja Peralatan dan Mesin - Ekstrakomptabel'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 522111, 'Belanja Langganan Listrik'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 522112, 'Belanja Langganan Telepon'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 522113, 'Belanja Langganan Air'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 522119, 'Belanja Langganan Daya dan Jasa Lainnya'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 522191, 'Belanja Jasa Lainnya'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 523111, 'Belanja Pemeliharaan Gedung dan Bangunan'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 523121, 'Belanja Pemeliharaan Peralatan dan Mesin'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBA', 'Layanan Dukungan Manajemen Internal', '994', 'Layanan Perkantoran', '002', 'Operasional dan Pemeliharaan Kantor', 'A', 'TANPA SUB KOMPONEN', 524111, 'Belanja Perjalanan Dinas Biasa'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBD', 'Layanan Manajemen Kinerja Internal', '955', 'Layanan Manajemen Keuangan', '051', 'Tanpa Komponen', 'A', 'TANPA SUB KOMPONEN', 521115, 'Belanja Honor Operasional Satuan Kerja'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBD', 'Layanan Manajemen Kinerja Internal', '955', 'Layanan Manajemen Keuangan', '051', 'Tanpa Komponen', 'A', 'TANPA SUB KOMPONEN', 524111, 'Belanja Perjalanan Dinas Biasa'),
('054.01.WA', 'Program Dukungan Manajemen', 2886, 'Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', 'EBD', 'Layanan Manajemen Kinerja Internal', '955', 'Layanan Manajemen Keuangan', '051', 'Tanpa Komponen', 'A', 'TANPA SUB KOMPONEN', 524113, 'Belanja Perjalanan Dinas Dalam Kota'),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_data`
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
-- Dumping data untuk tabel `form_data`
--

INSERT INTO `form_data` (`id`, `nama_spj`, `jenis_spj`, `detail`, `file_names`, `tgl_kirim`, `ppk_status`, `ppk_tanggal`, `ppk_keterangan`, `bendahara_status`, `bendahara_tanggal`, `bendahara_keterangan`, `proses_bayar`, `ppspm_status`, `ppspm_tanggal`, `ppspm_keterangan`, `proses_terakhir`) VALUES
(1, 'testing', 'Perlengkapan', 'lw', '[]', '2025-07-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Honor Pengelola Anggaran Bulan Januari 2025', 'Perlengkapan', '{\"program\":\"054.01.WA - Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi\",\"output\":\"2896.BMA.004 - PUBLIKASI\\/LAPORAN ANALISIS DAN PENGEMBANGAN STATISTIK\",\"komponen\":\"508 - Gladi Bersih SE2026\",\"akun\":\"522151\",\"email\":\"bimonunu@gmail.com\"}', NULL, '2025-09-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai_bps_bogor`
--

CREATE TABLE `pegawai_bps_bogor` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai_bps_bogor`
--

INSERT INTO `pegawai_bps_bogor` (`nip`, `nama`, `jabatan`, `role`) VALUES
('196412221994012001', 'Dahliani, S.E., M.M.', 'Statistisi Ahli Madya BPS Kabupaten/Kota', 'pegawai'),
('196705091987031001', 'Supriyadi, S.E.', 'Staf BPS Kabupaten/Kota', 'pegawai'),
('196705171990031002', 'Iwan Rismawan', 'Staf BPS Kabupaten/Kota', 'pegawai'),
('196804222006041005', 'Suganda', 'Fungsional Umum Subbagian Umum', 'pegawai'),
('196809101993032001', 'Ir. Raden Gandari Adianti Aju Fatimah, M.Si', 'Kepala BPS Kabupaten/Kota', 'pegawai'),
('196901211994012001', 'Yenni Dwi Sartika, SE', 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'pegawai'),
('196905071993121001', 'Imam Wahyudi, S.Si, M.M.', 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'pegawai'),
('196906231992032001', 'Paiyem, S.E.', 'Staf Subbagian Umum', 'supervisi'),
('197208271994032001', 'Siti Hasanah, S.E.', 'Statistisi Penyelia BPS Kabupaten/Kota', 'pegawai'),
('197312061996032001', 'Ari Cahyani, S.ST', 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'pegawai'),
('197404021993032001', 'Tri Evi Apriana, S.E.', 'Statistisi Penyelia BPS Kabupaten/Kota', 'pegawai'),
('197505221996122001', 'Ratna Sulistyowati, S.Si., M.S.E.', 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'pegawai'),
('197511051999121001', 'Rudi Susilo, S.ST.', 'Pranata Komputer Ahli Muda BPS Kabupaten/Kota', 'pegawai'),
('197708052000032003', 'Asriana Ariyanti, Mi.DEc', 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'pegawai'),
('197907122002122001', 'Khairunnisa, S.ST., M.Si', 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'pegawai'),
('198104082011012006', 'Nikeu Siti Purwati, S.Si.', 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'pegawai'),
('198108162007012012', 'Ika Rani Mardani, S.ST.', 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'pegawai'),
('19820422009022009', 'Dwi Damayanti, S.Si', 'Pelaksana', 'pegawai'),
('198403212011012017', 'Dini Dwiana Tari, S.Si.', 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'pegawai'),
('198506112009022003', 'Yuni Suci Kurniawati, S.Si', 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'pegawai'),
('198604302009022006', 'Ponco Astutik, S.E.', 'Statistisi Penyelia BPS Kabupaten/Kota', 'pegawai'),
('198607102011012025', 'Neneng Apipatul Latipah, S.Si., M.M', 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'pegawai'),
('198703282009121001', 'Bimo Nugroho, SST', 'Kepala Subbagian Umum', 'admin_utama'),
('199002192013111001', 'Ferry Maurist Sitorus, SST, M.E.K.K.', 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'pegawai'),
('199008292014102001', 'Siti Fahriah, S.ST.', 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'pegawai'),
('199401122017012001', 'Nadya Amalia, SST', 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'pegawai'),
('199505082018021001', 'Alfiana Rinaldi, SST', 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'pegawai'),
('200005122022012005', 'Agustina Nurwahyuni, A.Md.Kb.N.', 'Pranata Keuangan APBN Terampil Subbagian Umum', 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_approval`
--

CREATE TABLE `tbl_approval` (
  `id` int(11) NOT NULL,
  `nip_pegawai` varchar(20) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `jumlah_berkas_diminta` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_approval`
--

INSERT INTO `tbl_approval` (`id`, `nip_pegawai`, `bulan`, `tahun`, `jumlah_berkas_diminta`, `created_at`, `updated_at`) VALUES
(1, '200005122022012005', 8, 2025, 2, '2025-08-05 07:32:00', '2025-08-05 07:32:00'),
(2, '199505082018021001', 8, 2025, 4, '2025-08-05 07:45:30', '2025-08-05 07:45:30'),
(3, '197312061996032001', 8, 2025, 1, '2025-08-05 07:54:53', '2025-08-06 03:29:31'),
(4, '197708052000032003', 8, 2025, 2, '2025-08-06 02:05:14', '2025-08-06 02:05:14'),
(5, '198403212011012017', 8, 2025, 2, '2025-08-06 03:30:17', '2025-08-06 03:30:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berkas_cuti`
--

CREATE TABLE `tbl_berkas_cuti` (
  `id_berkas` int(11) NOT NULL,
  `id_cuti` int(11) UNSIGNED NOT NULL,
  `nip_pegawai` varchar(20) NOT NULL,
  `nama_berkas` varchar(255) NOT NULL,
  `path_berkas` varchar(255) NOT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `id_cuti` int(11) UNSIGNED NOT NULL,
  `nip_pegawai` varchar(20) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jenis_cuti` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_cuti` decimal(4,1) DEFAULT NULL,
  `nama_file_surat` varchar(255) DEFAULT NULL,
  `total_berkas_diunggah` int(11) DEFAULT 0,
  `jumlah_berkas_diminta` int(11) DEFAULT NULL,
  `catatan_supervisi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`id_cuti`, `nip_pegawai`, `nama_pegawai`, `jenis_cuti`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_cuti`, `nama_file_surat`, `total_berkas_diunggah`, `jumlah_berkas_diminta`, `catatan_supervisi`, `created_at`, `updated_at`) VALUES
(1, '13632', 'Ir. Raden Gandari Adianti Aju Fatimah, M.Si', 'Cuti Besar', '2025-08-01', '2025-08-01', NULL, 'CONTOH FILE CUTI.pdf', 0, NULL, 'mantap', '2025-07-29 17:00:00', '2025-07-30 06:46:43'),
(2, '13632', 'Ir. Raden Gandari Adianti Aju Fatimah, M.Si', 'Cuti Tahunan (Harian)', '2025-07-31', '2025-07-31', NULL, NULL, 0, NULL, NULL, '2025-07-29 17:00:00', '2025-07-30 06:15:00'),
(3, '53372', 'Bimo Nugroho, SST', 'Cuti Tahunan (1/2 Hari)', '2025-08-02', '2025-08-02', NULL, NULL, 0, NULL, 'kurang berkas', '2025-07-29 17:00:00', '2025-07-30 06:47:47'),
(4, '13240', 'Paiyem, S.E.', 'Cuti Besar', '2025-08-04', '2025-08-04', NULL, NULL, 0, NULL, NULL, '2025-07-29 17:00:00', '2025-07-30 06:47:30'),
(12, '197708052000032003', 'Asriana Ariyanti, Mi.DEc', 'Cuti Besar', '2025-08-05', '1970-01-01', 2.5, 'CONTOH FILE CUTI.pdf', 0, 2, NULL, '2025-08-05 21:38:11', '2025-08-06 02:38:11'),
(13, '197708052000032003', 'Asriana Ariyanti, Mi.DEc', 'Cuti Luar Tanggungan Negara', '2025-08-21', '1970-01-01', 4.5, 'CONTOH FILE CUTI.pdf', 0, 2, NULL, '2025-08-05 21:38:11', '2025-08-06 02:38:11'),
(14, '197312061996032001', 'Ari Cahyani, S.ST', 'Cuti Tahunan (1/2 Hari)', '2025-08-07', '1970-01-01', 0.5, 'CONTOH FILE CUTI.pdf', 0, 2, NULL, '2025-08-05 22:02:12', '2025-08-05 22:27:53'),
(15, '198403212011012017', 'Dini Dwiana Tari, S.Si.', 'Cuti Tahunan (Harian)', '2025-08-21', '0000-00-00', 1.0, 'CONTOH FILE CUTI.pdf', 0, 2, NULL, '2025-08-05 22:48:14', '2025-08-06 03:48:14'),
(18, '198403212011012017', 'Dini Dwiana Tari, S.Si.', 'Cuti Tahunan (1/2 Hari)', '2025-08-15', '1970-01-01', 0.5, 'CONTOH FILE CUTI.pdf', 0, 2, NULL, '0000-00-00 00:00:00', '2025-08-06 04:01:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '1234', 'admin_utama'),
(2, 'admin_tabel', '1234', 'admin_tabel'),
(3, 'operator', '1234', 'user'),
(33, '196809101993032001', '1234', 'pegawai'),
(34, '196412221994012001', '1234', 'pegawai'),
(35, '196905071993121001', '1234', 'pegawai'),
(36, '197708052000032003', '1234', 'pegawai'),
(37, '197404021993032001', '1234', 'pegawai'),
(38, '19820422009022009', '1234', 'pegawai'),
(39, '196901211994012001', '1234', 'pegawai'),
(40, '197208271994032001', '1234', 'pegawai'),
(41, '197312061996032001', '1234', 'pegawai'),
(42, '197505221996122001', '1234', 'pegawai'),
(43, '197511051999121001', '1234', 'pegawai'),
(44, '197907122002122001', '1234', 'pegawai'),
(45, '198108162007012012', '1234', 'pegawai'),
(46, '198604302009022006', '1234', 'pegawai'),
(47, '198104082011012006', '1234', 'pegawai'),
(48, '198506112009022003', '1234', 'pegawai'),
(49, '198403212011012017', '1234', 'pegawai'),
(50, '198607102011012025', '1234', 'pegawai'),
(51, '199505082018021001', '1234', 'pegawai'),
(52, '199002192013111001', '1234', 'pegawai'),
(53, '199008292014102001', '1234', 'pegawai'),
(54, '199401122017012001', '1234', 'pegawai'),
(55, '196705091987031001', '1234', 'pegawai'),
(56, '196705171990031002', '1234', 'pegawai'),
(57, '196804222006041005', '1234', 'pegawai'),
(58, '200005122022012005', '1234', 'pegawai'),
(59, '196906231992032001', '1234', 'supervisi'),
(60, '198703282009121001', '1234', 'admin_utama');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai_bps_bogor`
--
ALTER TABLE `pegawai_bps_bogor`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tbl_approval`
--
ALTER TABLE `tbl_approval`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_nip_bulan_tahun` (`nip_pegawai`,`bulan`,`tahun`);

--
-- Indeks untuk tabel `tbl_berkas_cuti`
--
ALTER TABLE `tbl_berkas_cuti`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id_cuti` (`id_cuti`),
  ADD KEY `nip_pegawai` (`nip_pegawai`);

--
-- Indeks untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `nip_pegawai` (`nip_pegawai`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `form_data`
--
ALTER TABLE `form_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_approval`
--
ALTER TABLE `tbl_approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_berkas_cuti`
--
ALTER TABLE `tbl_berkas_cuti`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `id_cuti` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_approval`
--
ALTER TABLE `tbl_approval`
  ADD CONSTRAINT `fk_approval_pegawai` FOREIGN KEY (`nip_pegawai`) REFERENCES `pegawai_bps_bogor` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_berkas_cuti`
--
ALTER TABLE `tbl_berkas_cuti`
  ADD CONSTRAINT `tbl_berkas_cuti_ibfk_1` FOREIGN KEY (`id_cuti`) REFERENCES `tbl_cuti` (`id_cuti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_berkas_cuti_ibfk_2` FOREIGN KEY (`nip_pegawai`) REFERENCES `pegawai_bps_bogor` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
