-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jun 2023 pada 01.36
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_saw_fuzzyv2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`) VALUES
(11, 'Ahmad'),
(12, 'Sudir'),
(13, 'Repi'),
(14, 'Karpi'),
(15, 'Rumi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif2`
--

CREATE TABLE `alternatif2` (
  `id_alternatif2` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif2`
--

INSERT INTO `alternatif2` (`id_alternatif2`, `nama`) VALUES
(1, 'Ahmad'),
(2, 'Sudir'),
(3, 'Repi'),
(4, 'Karpi'),
(5, 'Rumi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `kode_aturan` char(20) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `id_himpunan_fuzzy` int(11) NOT NULL,
  `output` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `kode_aturan`, `id_variabel`, `id_himpunan_fuzzy`, `output`) VALUES
(1, 'R0001', 47, 1, 0),
(2, 'R0001', 48, 4, 0),
(3, 'R0001', 49, 7, 0),
(4, 'R0002', 47, 1, 0),
(5, 'R0002', 48, 4, 0),
(6, 'R0002', 49, 8, 0),
(7, 'R0003', 47, 1, 0),
(8, 'R0003', 48, 4, 0),
(9, 'R0003', 49, 9, 0),
(10, 'R0004', 47, 1, 0),
(11, 'R0004', 48, 5, 0),
(12, 'R0004', 49, 7, 0),
(13, 'R0005', 47, 1, 0),
(14, 'R0005', 48, 5, 0),
(15, 'R0005', 49, 8, 0),
(16, 'R0006', 47, 1, 1),
(17, 'R0006', 48, 5, 1),
(18, 'R0006', 49, 9, 1),
(19, 'R0007', 47, 1, 0),
(20, 'R0007', 48, 6, 0),
(21, 'R0007', 49, 7, 0),
(22, 'R0008', 47, 1, 0),
(23, 'R0008', 48, 6, 0),
(24, 'R0008', 49, 8, 0),
(25, 'R0009', 47, 1, 0),
(26, 'R0009', 48, 6, 0),
(27, 'R0009', 49, 9, 0),
(28, 'R0010', 47, 2, 0),
(29, 'R0010', 48, 4, 0),
(30, 'R0010', 49, 7, 0),
(31, 'R0011', 47, 2, 0),
(32, 'R0011', 48, 4, 0),
(33, 'R0011', 49, 8, 0),
(34, 'R0012', 47, 2, 0),
(35, 'R0012', 48, 4, 0),
(36, 'R0012', 49, 9, 0),
(37, 'R0013', 47, 2, 1),
(38, 'R0013', 48, 5, 1),
(39, 'R0013', 49, 7, 1),
(40, 'R0014', 47, 2, 1),
(41, 'R0014', 48, 5, 1),
(42, 'R0014', 49, 8, 1),
(43, 'R0015', 47, 2, 1),
(44, 'R0015', 48, 5, 1),
(45, 'R0015', 49, 9, 1),
(46, 'R0016', 47, 2, 0),
(47, 'R0016', 48, 6, 0),
(48, 'R0016', 49, 7, 0),
(49, 'R0017', 47, 2, 0),
(50, 'R0017', 48, 6, 0),
(51, 'R0017', 49, 8, 0),
(52, 'R0018', 47, 2, 0),
(53, 'R0018', 48, 6, 0),
(54, 'R0018', 49, 9, 0),
(55, 'R0019', 47, 3, 0),
(56, 'R0019', 48, 4, 0),
(57, 'R0019', 49, 7, 0),
(58, 'R0020', 47, 3, 0),
(59, 'R0020', 48, 4, 0),
(60, 'R0020', 49, 8, 0),
(61, 'R0021', 47, 3, 0),
(62, 'R0021', 48, 4, 0),
(63, 'R0021', 49, 9, 0),
(64, 'R0022', 47, 3, 1),
(65, 'R0022', 48, 5, 1),
(66, 'R0022', 49, 7, 1),
(67, 'R0023', 47, 3, 1),
(68, 'R0023', 48, 5, 1),
(69, 'R0023', 49, 8, 1),
(70, 'R0024', 47, 3, 1),
(71, 'R0024', 48, 5, 1),
(72, 'R0024', 49, 9, 1),
(73, 'R0025', 47, 3, 0),
(74, 'R0025', 48, 6, 0),
(75, 'R0025', 49, 7, 0),
(76, 'R0026', 47, 3, 0),
(77, 'R0026', 48, 6, 0),
(78, 'R0026', 49, 8, 0),
(79, 'R0027', 47, 3, 0),
(80, 'R0027', 48, 6, 0),
(81, 'R0027', 49, 9, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan2`
--

CREATE TABLE `aturan2` (
  `id_aturan2` int(11) NOT NULL,
  `kode_aturan2` char(20) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `id_himpunan_fuzzy` int(11) NOT NULL,
  `output` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aturan2`
--

INSERT INTO `aturan2` (`id_aturan2`, `kode_aturan2`, `id_variabel`, `id_himpunan_fuzzy`, `output`) VALUES
(1, 'R0001', 47, 1, 0),
(2, 'R0001', 48, 4, 0),
(3, 'R0001', 49, 7, 0),
(4, 'R0001', 50, 10, 0),
(5, 'R0002', 47, 1, 0),
(6, 'R0002', 48, 4, 0),
(7, 'R0002', 49, 7, 0),
(8, 'R0002', 50, 11, 0),
(9, 'R0003', 47, 1, 0),
(10, 'R0003', 48, 4, 0),
(11, 'R0003', 49, 7, 0),
(12, 'R0003', 50, 12, 0),
(13, 'R0004', 47, 1, 1),
(14, 'R0004', 48, 4, 1),
(15, 'R0004', 49, 8, 1),
(16, 'R0004', 50, 10, 1),
(17, 'R0005', 47, 1, 0),
(18, 'R0005', 48, 4, 0),
(19, 'R0005', 49, 8, 0),
(20, 'R0005', 50, 11, 0),
(21, 'R0006', 47, 1, 1),
(22, 'R0006', 48, 4, 1),
(23, 'R0006', 49, 8, 1),
(24, 'R0006', 50, 12, 1),
(25, 'R0007', 47, 1, 0),
(26, 'R0007', 48, 4, 0),
(27, 'R0007', 49, 8, 0),
(28, 'R0007', 50, 12, 0),
(29, 'R0008', 47, 1, 1),
(30, 'R0008', 48, 4, 1),
(31, 'R0008', 49, 8, 1),
(32, 'R0008', 50, 10, 1),
(33, 'R0009', 47, 1, 1),
(34, 'R0009', 48, 5, 1),
(35, 'R0009', 49, 9, 1),
(36, 'R0009', 50, 11, 1),
(37, 'R0010', 47, 1, 0),
(38, 'R0010', 48, 5, 0),
(39, 'R0010', 49, 7, 0),
(40, 'R0010', 50, 10, 0),
(41, 'R0011', 47, 1, 0),
(42, 'R0011', 48, 5, 0),
(43, 'R0011', 49, 7, 0),
(44, 'R0011', 50, 11, 0),
(45, 'R0012', 47, 1, 0),
(46, 'R0012', 48, 5, 0),
(47, 'R0012', 49, 7, 0),
(48, 'R0012', 50, 12, 0),
(49, 'R0013', 47, 2, 0),
(50, 'R0013', 48, 6, 0),
(51, 'R0013', 49, 8, 0),
(52, 'R0013', 50, 10, 0),
(53, 'R0014', 47, 2, 0),
(54, 'R0014', 48, 6, 0),
(55, 'R0014', 49, 8, 0),
(56, 'R0014', 50, 11, 0),
(57, 'R0015', 47, 2, 0),
(58, 'R0015', 48, 6, 0),
(59, 'R0015', 49, 8, 0),
(60, 'R0015', 50, 12, 0),
(61, 'R0016', 47, 2, 1),
(62, 'R0016', 48, 6, 1),
(63, 'R0016', 49, 8, 1),
(64, 'R0016', 50, 12, 1),
(65, 'R0017', 47, 2, 1),
(66, 'R0017', 48, 6, 1),
(67, 'R0017', 49, 9, 1),
(68, 'R0017', 50, 11, 1),
(69, 'R0018', 47, 2, 1),
(70, 'R0018', 48, 6, 1),
(71, 'R0018', 49, 9, 1),
(72, 'R0018', 50, 12, 1),
(73, 'R0019', 47, 2, 0),
(74, 'R0019', 48, 4, 0),
(75, 'R0019', 49, 7, 0),
(76, 'R0019', 50, 11, 0),
(77, 'R0020', 47, 2, 0),
(78, 'R0020', 48, 4, 0),
(79, 'R0020', 49, 7, 0),
(80, 'R0020', 50, 12, 0),
(81, 'R0021', 47, 2, 0),
(82, 'R0021', 48, 4, 0),
(83, 'R0021', 49, 7, 0),
(84, 'R0021', 50, 11, 0),
(85, 'R0022', 47, 2, 0),
(86, 'R0022', 48, 4, 0),
(87, 'R0022', 49, 7, 0),
(88, 'R0022', 50, 10, 0),
(89, 'R0023', 47, 2, 0),
(90, 'R0023', 48, 4, 0),
(91, 'R0023', 49, 8, 0),
(92, 'R0023', 50, 11, 0),
(93, 'R0024', 47, 2, 0),
(94, 'R0024', 48, 4, 0),
(95, 'R0024', 49, 8, 0),
(96, 'R0024', 50, 12, 0),
(97, 'R0025', 47, 3, 0),
(98, 'R0025', 48, 5, 0),
(99, 'R0025', 49, 9, 0),
(100, 'R0025', 50, 10, 0),
(101, 'R0026', 47, 3, 0),
(102, 'R0026', 48, 5, 0),
(103, 'R0026', 49, 9, 0),
(104, 'R0026', 50, 11, 0),
(105, 'R0027', 47, 3, 0),
(106, 'R0027', 48, 5, 0),
(107, 'R0027', 49, 9, 0),
(108, 'R0027', 50, 12, 0),
(109, 'R0028', 47, 3, 0),
(110, 'R0028', 48, 5, 0),
(111, 'R0028', 49, 7, 0),
(112, 'R0028', 50, 10, 0),
(113, 'R0029', 47, 3, 0),
(114, 'R0029', 48, 5, 0),
(115, 'R0029', 49, 7, 0),
(116, 'R0029', 50, 11, 0),
(117, 'R0030', 47, 3, 0),
(118, 'R0030', 48, 5, 0),
(119, 'R0030', 49, 7, 0),
(120, 'R0030', 50, 12, 0),
(121, 'R0031', 47, 3, 0),
(122, 'R0031', 48, 6, 0),
(123, 'R0031', 49, 8, 0),
(124, 'R0031', 50, 10, 0),
(125, 'R0032', 47, 3, 0),
(126, 'R0032', 48, 6, 0),
(127, 'R0032', 49, 8, 0),
(128, 'R0032', 50, 10, 0),
(129, 'R0033', 47, 3, 0),
(130, 'R0033', 48, 6, 0),
(131, 'R0033', 49, 8, 0),
(132, 'R0033', 50, 11, 0),
(133, 'R0034', 47, 3, 0),
(134, 'R0034', 48, 6, 0),
(135, 'R0034', 49, 9, 0),
(136, 'R0034', 50, 10, 0),
(137, 'R0035', 47, 3, 0),
(138, 'R0035', 48, 6, 0),
(139, 'R0035', 49, 9, 0),
(140, 'R0035', 50, 11, 0),
(141, 'R0036', 47, 3, 0),
(142, 'R0036', 48, 6, 0),
(143, 'R0036', 49, 9, 0),
(144, 'R0036', 50, 12, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`) VALUES
(1, 11, 68.1905),
(2, 12, 82.7619),
(3, 13, 88.2857),
(4, 14, 76.8571),
(5, 15, 64.0476);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil2`
--

CREATE TABLE `hasil2` (
  `id_hasil2` int(11) NOT NULL,
  `id_alternatif2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil2`
--

INSERT INTO `hasil2` (`id_hasil2`, `id_alternatif2`, `nilai`) VALUES
(1, 1, 0),
(2, 2, 0.232558),
(3, 3, 0.5),
(4, 4, 0.5),
(5, 5, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `himpunan_fuzzy`
--

CREATE TABLE `himpunan_fuzzy` (
  `id_himpunan_fuzzy` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `nama_himpunan` varchar(200) NOT NULL,
  `kurva` varchar(100) NOT NULL,
  `a` float DEFAULT NULL,
  `b` float DEFAULT NULL,
  `c` float DEFAULT NULL,
  `d` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `himpunan_fuzzy`
--

INSERT INTO `himpunan_fuzzy` (`id_himpunan_fuzzy`, `id_variabel`, `nama_himpunan`, `kurva`, `a`, `b`, `c`, `d`) VALUES
(1, 47, 'Rendah', 'Linier Turun', 500000, 2500000, 0, 0),
(2, 47, 'Sedang', 'Segitiga', 2000000, 3000000, 4000000, 0),
(3, 47, 'Tinggi', 'Linier Naik', 3500000, 5500000, 0, 0),
(4, 48, 'Rendah', 'Linier Turun', 50000, 200000, 0, 0),
(5, 48, 'Sedang', 'Segitiga', 100000, 200000, 350000, 0),
(6, 48, 'Tinggi', 'Linier Naik', 250000, 400000, 0, 0),
(7, 49, 'Rendah', 'Linier Turun', 1, 3, 0, 0),
(8, 49, 'Sedang', 'Segitiga', 2, 5, 6, 0),
(9, 49, 'Tinggi', 'Linier Naik', 2, 3, 0, 0),
(10, 50, 'Muda', 'Linier Turun', 18, 35, 0, 0),
(11, 50, 'Dewasa', 'Segitiga', 25, 30, 55, 0),
(12, 50, 'Tua', 'Linier Naik', 45, 65, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `type` enum('Benefit','Cost') NOT NULL,
  `bobot` float NOT NULL,
  `ada_pilihan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama`, `type`, `bobot`, `ada_pilihan`) VALUES
(12, 'K1', 'Status rumah', 'Benefit', 20, 1),
(13, 'K3', 'Pendidikan', 'Benefit', 14, 1),
(14, 'K2', 'Jumlah Penghasilan', 'Benefit', 15, 1),
(15, 'K4', 'Pekerjaan', 'Benefit', 13, 1),
(16, 'K5', 'Tarif Listrik', 'Benefit', 12, 1),
(17, 'K6', 'Fasilitas Listrik', 'Benefit', 11, 1),
(18, 'K7', 'Jumlah Tanggungan', 'Benefit', 10, 1),
(19, 'K8', 'Usia', 'Benefit', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(100, 11, 12, 20),
(101, 11, 14, 22),
(102, 11, 13, 27),
(103, 11, 15, 31),
(104, 11, 16, 34),
(105, 11, 17, 38),
(106, 11, 18, 42),
(107, 11, 19, 47),
(108, 12, 12, 20),
(109, 12, 14, 23),
(110, 12, 13, 28),
(111, 12, 15, 31),
(112, 12, 16, 35),
(113, 12, 17, 38),
(114, 12, 18, 44),
(115, 12, 19, 47),
(116, 13, 12, 17),
(117, 13, 14, 24),
(118, 13, 13, 28),
(119, 13, 15, 31),
(120, 13, 16, 33),
(121, 13, 17, 39),
(122, 13, 18, 41),
(123, 13, 19, 47),
(124, 14, 12, 20),
(125, 14, 14, 24),
(126, 14, 13, 28),
(127, 14, 15, 31),
(128, 14, 16, 33),
(129, 14, 17, 39),
(130, 14, 18, 41),
(131, 14, 19, 47),
(132, 15, 12, 20),
(133, 15, 14, 21),
(134, 15, 13, 27),
(135, 15, 15, 30),
(136, 15, 16, 35),
(137, 15, 17, 38),
(138, 15, 18, 42),
(139, 15, 19, 46);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian2`
--

CREATE TABLE `penilaian2` (
  `id_penilaian2` int(11) NOT NULL,
  `id_alternatif2` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian2`
--

INSERT INTO `penilaian2` (`id_penilaian2`, `id_alternatif2`, `id_variabel`, `nilai`) VALUES
(1, 1, 47, 3500000),
(2, 1, 48, 100000),
(3, 1, 49, 2),
(4, 1, 50, 49),
(5, 2, 47, 2300000),
(6, 2, 48, 150000),
(7, 2, 49, 4),
(8, 2, 50, 51),
(9, 3, 47, 800000),
(10, 3, 48, 40000),
(11, 3, 49, 4),
(12, 3, 50, 56),
(13, 4, 47, 500000),
(14, 4, 48, 35000),
(15, 4, 49, 5),
(16, 4, 50, 58),
(17, 5, 47, 6000000),
(18, 5, 48, 150000),
(19, 5, 49, 2),
(20, 5, 50, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `nama`, `nilai`) VALUES
(17, 12, 'Numpang', 35),
(18, 12, 'Sewa', 30),
(19, 12, 'Warisan', 20),
(20, 12, 'Milik Sendiri', 15),
(21, 14, '> 4 Juta', 15),
(22, 14, '2,6-4 Juta', 20),
(23, 14, '1-2,5 Juta', 30),
(24, 14, '<1 Juta', 35),
(25, 13, 'Diploma / Sarjana', 15),
(26, 13, 'SMA', 20),
(27, 13, 'SMP', 30),
(28, 13, 'SD', 35),
(29, 15, 'Wirausaha', 15),
(30, 15, 'Karyawan', 20),
(31, 15, 'Petani/Peternak', 30),
(32, 15, 'Buruh', 35),
(33, 16, '<50 ribu', 15),
(34, 16, '50-149 ribu', 20),
(35, 16, '150-250.000 ribu', 30),
(36, 16, '>250.000', 35),
(37, 17, '>=1300Kwh ', 15),
(38, 17, '900 Kwh', 20),
(39, 17, '450Kwh', 30),
(40, 17, 'Numpang', 50),
(42, 18, '2', 20),
(43, 18, '3', 30),
(44, 18, '>=4', 35),
(45, 19, '18-29', 15),
(46, 19, '30-44', 20),
(47, 19, '45-59', 30),
(48, 19, '>60', 35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'admin@gmail.com', '1'),
(8, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'User', 'user@gmail.com', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabel`
--

CREATE TABLE `variabel` (
  `id_variabel` int(11) NOT NULL,
  `nama_variabel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `variabel`
--

INSERT INTO `variabel` (`id_variabel`, `nama_variabel`) VALUES
(47, 'Jumlah penghasilan'),
(48, 'Tarif Listrik'),
(49, 'Jumlah tanggungan'),
(50, 'Usia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `alternatif2`
--
ALTER TABLE `alternatif2`
  ADD PRIMARY KEY (`id_alternatif2`);

--
-- Indexes for table `aturan2`
--
ALTER TABLE `aturan2`
  ADD PRIMARY KEY (`id_aturan2`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `hasil2`
--
ALTER TABLE `hasil2`
  ADD PRIMARY KEY (`id_hasil2`);

--
-- Indexes for table `himpunan_fuzzy`
--
ALTER TABLE `himpunan_fuzzy`
  ADD PRIMARY KEY (`id_himpunan_fuzzy`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `penilaian2`
--
ALTER TABLE `penilaian2`
  ADD PRIMARY KEY (`id_penilaian2`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`id_variabel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `alternatif2`
--
ALTER TABLE `alternatif2`
  MODIFY `id_alternatif2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `aturan2`
--
ALTER TABLE `aturan2`
  MODIFY `id_aturan2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hasil2`
--
ALTER TABLE `hasil2`
  MODIFY `id_hasil2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `penilaian2`
--
ALTER TABLE `penilaian2`
  MODIFY `id_penilaian2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `variabel`
--
ALTER TABLE `variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
