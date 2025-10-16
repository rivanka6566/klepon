-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Okt 2025 pada 04.15
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
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `No` varchar(2) DEFAULT NULL,
  `NIP BPS` int(9) DEFAULT NULL,
  `Username` bigint(18) NOT NULL,
  `Password` int(4) DEFAULT NULL,
  `Nama` varchar(43) DEFAULT NULL,
  `KodeOrg` int(5) DEFAULT NULL,
  `Jabatan` varchar(45) DEFAULT NULL,
  `Wilayah` varchar(10) DEFAULT NULL,
  `GolAkhir` varchar(5) DEFAULT NULL,
  `Status` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`No`, `NIP BPS`, `Username`, `Password`, `Nama`, `KodeOrg`, `Jabatan`, `Wilayah`, `GolAkhir`, `Status`) VALUES
('06', 340051096, 19820422009022009, 1234, 'Dwi Damayanti, S.Si', 92800, 'Pelaksana', 'Kota Bogor', 'III/d', 'PNS'),
('02', 340014229, 196412221994012001, 1234, 'Dahliani, S.E., M.M.', 92800, 'Statistisi Ahli Madya BPS Kabupaten/Kota', 'Kota Bogor', 'IV/b ', 'PNS'),
('23', 340011604, 196705091987031001, 1234, 'Supriyadi, S.E.', 92800, 'Staf BPS Kabupaten/Kota', 'Kota Bogor', 'III/c', 'PNS'),
('24', 340012595, 196705171990031002, 1234, 'Iwan Rismawan', 92800, 'Staf BPS Kabupaten/Kota', 'Kota Bogor', 'III/b', 'PNS'),
('25', 340018696, 196804222006041005, 1234, 'Suganda', 92810, 'Fungsional Umum Subbagian Umum', 'Kota Bogor', 'III/a', 'PNS'),
('01', 340013632, 196809101993032001, 1234, 'Ir. Raden Gandari Adianti Aju Fatimah, M.Si', 92800, 'Kepala BPS Kabupaten/Kota', 'Kota Bogor', 'IV/b ', 'PNS'),
('07', 340014302, 196901211994012001, 1234, 'Yenni Dwi Sartika, SE', 92800, 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'Kota Bogor', 'III/d', 'PNS'),
('03', 340013831, 196905071993121001, 1234, 'Imam Wahyudi, S.Si, M.M.', 92800, 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'Kota Bogor', 'IV/a ', 'PNS'),
('27', 340013240, 196906231992032001, 1234, 'Paiyem, S.E.', 92810, 'Staf Subbagian Umum', 'Kota Bogor', 'III/d', 'PNS'),
('08', 340014974, 197208271994032001, 1234, 'Siti Hasanah, S.E.', 92800, 'Statistisi Penyelia BPS Kabupaten/Kota', 'Kota Bogor', 'III/d', 'PNS'),
('09', 340015222, 197312061996032001, 1234, 'Ari Cahyani, S.ST', 92800, 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'Kota Bogor', 'III/d', 'PNS'),
('05', 340013681, 197404021993032001, 1234, 'Tri Evi Apriana, S.E.', 92800, 'Statistisi Penyelia BPS Kabupaten/Kota', 'Kota Bogor', 'III/d', 'PNS'),
('10', 340015359, 197505221996122001, 1234, 'Ratna Sulistyowati, S.Si., M.S.E.', 92800, 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'Kota Bogor', 'III/d', 'PNS'),
('11', 340016039, 197511051999121001, 1234, 'Rudi Susilo, S.ST.', 92800, 'Pranata Komputer Ahli Muda BPS Kabupaten/Kota', 'Kota Bogor', 'III/d', 'PNS'),
('04', 340016100, 197708052000032003, 1234, 'Asriana Ariyanti, Mi.DEc', 92800, 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'Kota Bogor', 'IV/a ', 'PNS'),
('12', 340016474, 197907122002122001, 1234, 'Khairunnisa, S.ST., M.Si', 92800, 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'Kota Bogor', 'III/d', 'PNS'),
('15', 340054954, 198104082011012006, 1234, 'Nikeu Siti Purwati, S.Si.', 92800, 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'Kota Bogor', 'III/d', 'PNS'),
('13', 340019105, 198108162007012012, 1234, 'Ika Rani Mardani, S.ST.', 92800, 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'Kota Bogor', 'III/d', 'PNS'),
('17', 340054680, 198403212011012017, 1234, 'Dini Dwiana Tari, S.Si.', 92800, 'Statistisi Ahli Muda BPS Kabupaten/Kota', 'Kota Bogor', 'III/c', 'PNS'),
('16', 340051398, 198506112009022003, 1234, 'Yuni Suci Kurniawati, S.Si', 92800, 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'Kota Bogor', 'III/c', 'PNS'),
('14', 340051261, 198604302009022006, 1234, 'Ponco Astutik, S.E.', 92800, 'Statistisi Penyelia BPS Kabupaten/Kota', 'Kota Bogor', 'III/d', 'PNS'),
('18', 340054951, 198607102011012025, 1234, 'Neneng Apipatul Latipah, S.Si., M.M', 92800, 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'Kota Bogor', 'III/c', 'PNS'),
('28', 340053372, 198703282009121001, 1234, 'Bimo Nugroho, SST', 92810, 'Kepala Subbagian Umum', 'Kota Bogor', 'III/d', 'PNS'),
('20', 340056286, 199002192013111001, 1234, 'Ferry Maurist Sitorus, SST, M.E.K.K.', 92800, 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'Kota Bogor', 'III/c', 'PNS'),
('21', 340056708, 199008292014102001, 1234, 'Siti Fahriah, S.ST.', 92800, 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'Kota Bogor', 'III/b', 'PNS'),
('22', 340057691, 199401122017012001, 1234, 'Nadya Amalia, SST', 92800, 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'Kota Bogor', 'III/b', 'PNS'),
('19', 340058121, 199505082018021001, 1234, 'Alfiana Rinaldi, SST', 92800, 'Statistisi Ahli Pertama BPS Kabupaten/Kota', 'Kota Bogor', 'III/b', 'PNS'),
('26', 340061056, 200005122022012005, 1234, 'Agustina Nurwahyuni, A.Md.Kb.N.', 92810, 'Pranata Keuangan APBN Terampil Subbagian Umum', 'Kota Bogor', 'II/c ', 'PNS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
