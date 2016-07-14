-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jul 2016 pada 08.32
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaji_karyawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` varchar(6) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `status_karyawan` varchar(10) NOT NULL,
  `usia` int(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jenjang_pendidikan` varchar(10) NOT NULL,
  `kehadiran` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `telepon`, `status_karyawan`, `usia`, `agama`, `jenjang_pendidikan`, `kehadiran`) VALUES
('K03', 'maria', 'jepAng', '085645963213', 'tetap', 26, 'Islam', 'd3', 150),
('K02', 'Toni Blank', 'RSJ', '085645963213', 'kontrak', 26, 'Islam', 'sma', 250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` varchar(6) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
('K07', 'Kreatif'),
('K06', 'Kehati-hatian'),
('K05', 'Disiplin'),
('K04', 'Tanggung Jawab'),
('K03', 'Ketelitian'),
('K02', 'Pemenuhan/ Target'),
('K01', 'Kekuasaan'),
('K08', 'Inovatif'),
('K09', 'Imaginatif'),
('K10', 'Pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai_akhir`
--

CREATE TABLE `tbl_nilai_akhir` (
  `id_nilaiakhir` varchar(6) NOT NULL,
  `id_pegawai` varchar(6) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `id_penilaian` varchar(6) NOT NULL,
  `id_karyawan` varchar(6) NOT NULL,
  `id_tahun` varchar(6) NOT NULL,
  `id_kriteria` varchar(6) NOT NULL,
  `nilai` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`id_penilaian`, `id_karyawan`, `id_tahun`, `id_kriteria`, `nilai`) VALUES
('1', 'K02', '2010', 'K01', 4),
('2', 'K02', '2010', 'K02', 3),
('3', 'K02', '2010', 'K03', 4),
('4', 'K02', '2010', 'K04', 4),
('5', 'K02', '2010', 'K05', 4),
('6', 'K02', '2010', 'K06', 4),
('7', 'K02', '2010', 'K07', 4),
('8', 'K02', '2010', 'K08', 4),
('9', 'K02', '2010', 'K09', 3),
('10', 'K02', '2010', 'K10', 4),
('11', 'K03', '2010', 'K01', 4),
('12', 'K03', '2010', 'K02', 3),
('13', 'K03', '2010', 'K03', 4),
('14', 'K03', '2010', 'K04', 3),
('15', 'K03', '2010', 'K05', 3),
('16', 'K03', '2010', 'K06', 3),
('17', 'K03', '2010', 'K07', 2),
('18', 'K03', '2010', 'K08', 1),
('19', 'K03', '2010', 'K09', 2),
('20', 'K03', '2010', 'K10', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_presensi`
--

CREATE TABLE `tbl_presensi` (
  `id_karyawan` varchar(6) NOT NULL,
  `tahun` int(6) NOT NULL,
  `jumlah_masuk` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tahun`
--

CREATE TABLE `tbl_tahun` (
  `id_tahun` varchar(6) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tahun`
--

INSERT INTO `tbl_tahun` (`id_tahun`, `tahun`, `status`) VALUES
('t01', '2010', 1),
('t02', '2085', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_target`
--

CREATE TABLE `tbl_target` (
  `id_target` varchar(6) NOT NULL,
  `id_tahun` varchar(6) NOT NULL,
  `id_kriteria` varchar(6) NOT NULL,
  `nilai` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_target`
--

INSERT INTO `tbl_target` (`id_target`, `id_tahun`, `id_kriteria`, `nilai`) VALUES
('10', '2010', 'K10', 4),
('9', '2010', 'K09', 4),
('8', '2010', 'K08', 4),
('7', '2010', 'K07', 4),
('6', '2010', 'K06', 1),
('5', '2010', 'K05', 4),
('4', '2010', 'K04', 1),
('3', '2010', 'K03', 1),
('2', '2010', 'K02', 2),
('1', '2010', 'K01', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_nilai_akhir`
--
ALTER TABLE `tbl_nilai_akhir`
  ADD PRIMARY KEY (`id_nilaiakhir`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `tbl_presensi`
--
ALTER TABLE `tbl_presensi`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tbl_target`
--
ALTER TABLE `tbl_target`
  ADD PRIMARY KEY (`id_target`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
