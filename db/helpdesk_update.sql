-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2021 at 07:25 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-50+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian_departemen`
--

CREATE TABLE `bagian_departemen` (
  `id_bagian_dept` int(11) NOT NULL,
  `nama_bagian_dept` varchar(30) NOT NULL,
  `id_dept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian_departemen`
--

INSERT INTO `bagian_departemen` (`id_bagian_dept`, `nama_bagian_dept`, `id_dept`) VALUES
(5, 'SOFTWARE', 3),
(6, 'LAB', 4);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_dept` int(11) NOT NULL,
  `nama_dept` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_dept`, `nama_dept`) VALUES
(3, 'IT'),
(4, 'PPIC');

-- --------------------------------------------------------

--
-- Table structure for table `history_feedback`
--

CREATE TABLE `history_feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_ticket` varchar(13) NOT NULL,
  `feedback` int(11) NOT NULL,
  `reported` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_feedback`
--

INSERT INTO `history_feedback` (`id_feedback`, `id_ticket`, `feedback`, `reported`) VALUES
(5, 'T201612020001', 1, 'K0001'),
(6, 'T201612020002', 1, 'K0001'),
(7, 'T201612040003', 1, 'K0001'),
(8, 'T201612040004', 0, 'K0001'),
(9, 'T201612180007', 1, 'K0002'),
(10, 'T201612180006', 0, 'K0002'),
(11, 'T201612190008', 1, 'K0001'),
(12, 'T201612190010', 1, 'K0001'),
(13, 'T202110260019', 1, 'K0001');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `subject` varchar(35) NOT NULL,
  `pesan` text NOT NULL,
  `status` decimal(2,0) NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `tanggal`, `subject`, `pesan`, `status`, `id_user`) VALUES
(1, '2016-12-04 09:24:28', 'WAJIB MENGISI FEEDBACK', 'FEEDBACK SANGATLAH PENTING GUNA MEMBANTU KAMI DALAM MEMBERIKAN PENILAIAN TERHADAP KINERJA TEKNISI, INI MENYANGKUT DENGAN KEPUASAN ANDA', '1', 'K0001'),
(2, '2016-12-21 13:42:59', 'JIJ', 'NKNJK', '1', 'K0001');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'KEPALA BAGIAN'),
(2, 'KEPALA DEPARTEMEN'),
(3, 'KEPALA REGU'),
(4, 'OPERATOR'),
(5, 'DEVELOPER');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_bagian_dept` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `email`, `alamat`, `jk`, `id_bagian_dept`, `id_jabatan`) VALUES
('K0001', 'NUR SURATMAN', '', 'TANGERANG', 'LAKI-LAKI', 5, 2),
('K0002', 'DESI', NULL, 'JAKARTA', 'PEREMPUAN', 5, 3),
('K0003', 'MUHLISON', NULL, 'TANGERANG', 'LAKI-LAKI', 5, 4),
('K0004', 'ZEIN', NULL, 'BOJONG', 'LAKI-LAKI', 6, 4),
('K0005', 'RIO', NULL, 'TANGERANG', 'LAKI-LAKI', 5, 2),
('K0006', 'DENI', NULL, 'TANGERANG', 'LAKI-LAKI', 6, 4),
('K0007', 'DOSEN', NULL, 'TES', 'LAKI-LAKI', 5, 1),
('K0008', 'MAULANA', NULL, 'JAKARTA', 'LAKI-LAKI', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'HARDWARE'),
(5, 'SOFTWARE');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(30) NOT NULL,
  `waktu_respon` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `nama_kondisi`, `waktu_respon`) VALUES
(1, 'MENDESAK', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(11) NOT NULL,
  `nama_sub_kategori` varchar(35) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `nama_sub_kategori`, `id_kategori`) VALUES
(2, 'KERUSAKAN KOMPONEN MONITOR', 4),
(3, 'KERUSAKAN MOUSE', 4),
(4, 'KERUSAKAN KEYBOARD', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` varchar(5) NOT NULL,
  `nik` varchar(5) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `point` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nik`, `id_kategori`, `status`, `point`) VALUES
('T0001', 'K0003', 4, '', '3'),
('T0002', 'K0008', 4, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` varchar(13) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_proses` datetime NOT NULL,
  `tanggal_solved` datetime NOT NULL,
  `reported` varchar(5) NOT NULL,
  `id_sub_kategori` int(11) NOT NULL,
  `problem_summary` varchar(50) NOT NULL,
  `problem_detail` text NOT NULL,
  `id_teknisi` varchar(5) NOT NULL,
  `photo` text NOT NULL,
  `status` int(11) NOT NULL,
  `progress` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `tanggal`, `tanggal_proses`, `tanggal_solved`, `reported`, `id_sub_kategori`, `problem_summary`, `problem_detail`, `id_teknisi`, `photo`, `status`, `progress`) VALUES
('T201612020001', '2016-12-02 16:59:18', '2016-12-02 17:00:39', '0000-00-00 00:00:00', 'K0001', 2, 'SASAS', 'NBNB', 'T0002', '', 6, '90'),
('T201612020002', '2016-12-02 17:05:29', '2016-12-02 17:09:06', '0000-00-00 00:00:00', 'K0001', 2, 'CXZCX', 'CXZC', 'T0002', '', 6, '100'),
('T201612040003', '2016-12-04 07:06:47', '2016-12-04 08:20:29', '2016-12-04 08:22:11', 'K0001', 4, 'KLKL', 'ASA', 'T0002', '', 6, '100'),
('T201612040004', '2016-12-04 08:24:44', '2016-12-04 08:25:57', '2016-12-04 09:47:27', 'K0001', 2, 'KLKL', 'BBB', 'T0002', '', 6, '100'),
('T201612040005', '2016-12-04 09:43:02', '2016-12-04 09:46:50', '0000-00-00 00:00:00', 'K0001', 2, 'SASAS', 'NJKHKJK', 'T0002', '', 4, '0'),
('T201612180006', '2016-12-18 07:00:49', '2016-12-18 07:25:21', '2016-12-18 07:26:11', 'K0002', 4, 'TES', 'TES', 'T0001', '', 6, '100'),
('T201612180007', '2016-12-18 08:09:25', '2016-12-18 08:17:45', '2016-12-18 08:20:37', 'K0002', 2, 'RUSAK MONITOR', 'TOLONG CEPAT DI PROSES KARENA TIDAK ADA MONITOR BACKUP', 'T0001', '', 6, '0'),
('T201612190008', '2016-12-19 13:02:25', '2016-12-19 13:03:37', '2016-12-19 13:03:54', 'K0001', 4, 'NH', 'NH', 'T0001', '', 6, '100'),
('T201612190009', '2016-12-19 14:09:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0001', 4, 'GDGFGHH', 'ASDFGHJKL', '', '', 4, '0'),
('T201612190010', '2016-12-19 14:35:33', '2016-12-19 15:09:27', '2016-12-19 15:09:59', 'K0001', 2, '35535', '53', 'T0001', '', 6, '100'),
('T201612280011', '2016-12-28 15:15:32', '2021-10-25 21:36:02', '0000-00-00 00:00:00', 'K0001', 2, '6UYUGTY', 'NJHJHJHJHJHJHJ BHGHJG B JHJHJ JHJHJNN', 'T0001', '', 4, '0'),
('T202110250012', '2021-10-25 21:27:22', '2021-10-25 21:31:17', '0000-00-00 00:00:00', 'K0001', 3, 'TEST 25 OKT', 'TEST', 'T0001', '', 4, '80'),
('T202110260013', '2021-10-26 19:34:22', '2021-10-26 21:16:13', '0000-00-00 00:00:00', 'K0001', 2, 'TESTING', 'TEST', 'T0001', '', 4, '0'),
('T202110260014', '2021-10-26 20:46:30', '2021-10-26 21:16:16', '0000-00-00 00:00:00', 'K0001', 3, 'TEST', 'DESC', 'T0001', 'photos/Selection_079.png', 4, '0'),
('T202110260015', '2021-10-26 20:48:43', '2021-10-26 21:16:20', '0000-00-00 00:00:00', 'K0001', 3, 'TEST', 'DESC', 'T0001', 'photos/Selection_079.png', 4, '0'),
('T202110260016', '2021-10-26 20:55:39', '2021-10-26 21:16:25', '0000-00-00 00:00:00', 'K0001', 2, 'TEST TEST', 'DESC', 'T0001', 'photos/Selection_077.png', 4, '0'),
('T202110260017', '2021-10-26 20:57:30', '2021-10-26 21:16:57', '0000-00-00 00:00:00', 'K0001', 4, 'TEST TEST', 'DESC', 'T0001', 'photos/Selection_075.png', 4, '0'),
('T202110260018', '2021-10-26 21:03:54', '2021-10-26 21:17:04', '0000-00-00 00:00:00', 'K0001', 2, 'TEST 123', 'DESC', 'T0001', 'photos/Selection_073.png', 4, '0'),
('T202110260019', '2021-10-26 21:06:18', '2021-10-26 21:09:12', '2021-10-26 21:10:11', 'K0001', 2, 'TEST TEST', 'DESC', 'T0001', 'photos/Selection_072.png', 6, '100'),
('T202110260020', '2021-10-26 21:18:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0001', 2, 'TEST', 'DESC', 'T0001', 'photos/Screenshot_from_2021-10-04_17-14-47.png', 4, '0'),
('T202110260021', '2021-10-26 21:20:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0001', 2, 'TEST TEST', 'DESC', 'T0001', 'photos/Selection_061.png', 4, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_ticket` varchar(13) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_ticket`, `tanggal`, `status`, `deskripsi`, `id_user`) VALUES
(1, 'T201612020001', '2016-12-02 16:59:18', 'Created Ticket', '', 'K0001'),
(2, 'T201612020001', '2016-12-02 16:59:34', 'Ticket disetujui', '', 'K0001'),
(3, 'T201612020001', '2016-12-02 16:59:55', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(4, 'T201612020001', '2016-12-02 17:00:39', 'Diproses oleh teknisi', '', 'K0001'),
(5, 'T201612020001', '2016-12-02 17:01:32', 'Up Progress To 100 %', 'SELESAI SILAHKAN AMBIL', 'K0001'),
(6, 'T201612020002', '2016-12-02 17:05:29', 'Created Ticket', '', 'K0001'),
(7, 'T201612020002', '2016-12-02 17:05:41', 'Ticket tidak disetujui', '', 'K0001'),
(8, 'T201612020002', '2016-12-02 17:05:47', 'Ticket dikembalikan ke posisi belum di setujui', '', 'K0001'),
(9, 'T201612020002', '2016-12-02 17:05:48', 'Ticket disetujui', '', 'K0001'),
(10, 'T201612020002', '2016-12-02 17:06:08', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(11, 'T201612020002', '2016-12-02 17:06:35', 'Pending oleh teknisi', '', 'K0001'),
(12, 'T201612020002', '2016-12-02 17:09:06', 'Diproses oleh teknisi', '', 'K0001'),
(13, 'T201612020002', '2016-12-02 17:09:32', 'Up Progress To 90 %', '', 'K0001'),
(14, 'T201612020002', '2016-12-04 06:32:39', 'Up Progress To 100 %', '', 'K0001'),
(15, 'T201612040003', '2016-12-04 07:06:47', 'Created Ticket', '', 'K0001'),
(16, 'T201612040003', '2016-12-04 08:19:03', 'Ticket disetujui', '', 'K0001'),
(17, 'T201612040003', '2016-12-04 08:19:17', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(18, 'T201612040003', '2016-12-04 08:20:29', 'Diproses oleh teknisi', '', 'K0001'),
(19, 'T201612040003', '2016-12-04 08:21:14', 'Up Progress To 10 %', '', 'K0001'),
(20, 'T201612040003', '2016-12-04 08:22:11', 'Up Progress To 100 %', '', 'K0001'),
(21, 'T201612040004', '2016-12-04 08:24:44', 'Created Ticket', '', 'K0001'),
(22, 'T201612040004', '2016-12-04 08:25:04', 'Ticket disetujui', '', 'K0001'),
(23, 'T201612040004', '2016-12-04 08:25:35', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(24, 'T201612040004', '2016-12-04 08:25:57', 'Diproses oleh teknisi', '', 'K0001'),
(25, 'T201612040004', '2016-12-04 08:43:02', 'Up Progress To 10 %', 'MENUNGGU KOMPONEN MAINBOARD', 'K0001'),
(26, 'T201612040005', '2016-12-04 09:43:02', 'Created Ticket', '', 'K0001'),
(27, 'T201612040005', '2016-12-04 09:44:22', 'Ticket tidak disetujui', '', 'K0001'),
(28, 'T201612040005', '2016-12-04 09:44:23', 'Ticket tidak disetujui', '', 'K0001'),
(29, 'T201612040005', '2016-12-04 09:44:35', 'Ticket dikembalikan ke posisi belum di setujui', '', 'K0001'),
(30, 'T201612040005', '2016-12-04 09:44:37', 'Ticket disetujui', '', 'K0001'),
(31, 'T201612040005', '2016-12-04 09:45:31', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(32, 'T201612040005', '2016-12-04 09:45:58', 'Pending oleh teknisi', '', 'K0001'),
(33, 'T201612040005', '2016-12-04 09:46:50', 'Diproses oleh teknisi', '', 'K0001'),
(34, 'T201612040004', '2016-12-04 09:47:27', 'Up Progress To 100 %', '', 'K0001'),
(35, 'T201612180006', '2016-12-18 07:00:49', 'Created Ticket', '', 'K0002'),
(36, 'T201612180006', '2016-12-18 07:01:49', 'Ticket disetujui', '', 'K0001'),
(37, 'T201612180006', '2016-12-18 07:23:02', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(38, 'T201612180006', '2016-12-18 07:25:21', 'Diproses oleh teknisi', '', 'K0003'),
(39, 'T201612180006', '2016-12-18 07:25:48', 'Up Progress To 10 %', '', 'K0003'),
(40, 'T201612180006', '2016-12-18 07:25:58', 'Up Progress To 70 %', '', 'K0003'),
(41, 'T201612180006', '2016-12-18 07:26:11', 'Up Progress To 100 %', 'SELESAI', 'K0003'),
(42, 'T201612180007', '2016-12-18 08:09:25', 'Created Ticket', '', 'K0002'),
(43, 'T201612180007', '2016-12-18 08:11:12', 'Ticket disetujui', '', 'K0005'),
(44, 'T201612180007', '2016-12-18 08:16:57', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(45, 'T201612180007', '2016-12-18 08:17:45', 'Diproses oleh teknisi', '', 'K0003'),
(46, 'T201612180007', '2016-12-18 08:18:21', 'Up Progress To 70 %', 'TINGGAL TUNGGU KOMPONEN', 'K0003'),
(47, 'T201612180007', '2016-12-18 08:20:37', 'Up Progress To 100 %', 'SOLVED TINGGAL AMBIL', 'K0003'),
(48, 'T201612190008', '2016-12-19 13:02:25', 'Created Ticket', '', 'K0001'),
(49, 'T201612190008', '2016-12-19 13:02:36', 'Ticket disetujui', '', 'K0001'),
(50, 'T201612190008', '2016-12-19 13:02:53', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(51, 'T201612190008', '2016-12-19 13:03:37', 'Diproses oleh teknisi', '', 'K0003'),
(52, 'T201612190008', '2016-12-19 13:03:54', 'Up Progress To 100 %', 'SELESAI', 'K0003'),
(53, 'T201612190009', '2016-12-19 14:09:09', 'Created Ticket', '', 'K0001'),
(54, 'T201612190009', '2016-12-19 14:11:49', 'Ticket disetujui', '', 'K0001'),
(55, 'T201612190010', '2016-12-19 14:35:33', 'Created Ticket', '', 'K0001'),
(56, 'T201612190010', '2016-12-19 14:35:38', 'Ticket disetujui', '', 'K0001'),
(57, 'T201612190010', '2016-12-19 14:47:17', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(58, 'T201612190010', '2016-12-19 15:09:27', 'Diproses oleh teknisi', '', 'K0003'),
(59, 'T201612190010', '2016-12-19 15:09:44', 'Up Progress To 50 %', 'TGGU KOMP', 'K0003'),
(60, 'T201612190010', '2016-12-19 15:09:59', 'Up Progress To 100 %', 'OKJE', 'K0003'),
(61, 'T201612280011', '2016-12-28 15:15:32', 'Created Ticket', '', 'K0001'),
(62, 'T201612280011', '2016-12-28 15:15:54', 'Ticket disetujui', '', 'K0001'),
(63, 'T201612280011', '2016-12-28 15:16:46', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(64, 'T202110250012', '2021-10-25 21:27:22', 'Created Ticket', '', 'K0001'),
(65, 'T202110250012', '2021-10-25 21:28:08', 'Ticket disetujui', '', 'K0001'),
(66, 'T202110250012', '2021-10-25 21:29:08', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(67, 'T202110250012', '2021-10-25 21:31:17', 'Diproses oleh teknisi', '', 'K0003'),
(68, 'T201612280011', '2021-10-25 21:36:02', 'Diproses oleh teknisi', '', 'K0003'),
(69, 'T202110260013', '2021-10-26 19:34:22', 'Created Ticket', '', 'K0001'),
(70, 'T202110260013', '2021-10-26 19:34:49', 'Ticket disetujui', '', 'K0001'),
(71, 'T202110260014', '2021-10-26 20:46:30', 'Created Ticket', '', 'K0001'),
(72, 'T202110260015', '2021-10-26 20:48:43', 'Created Ticket', '', 'K0001'),
(73, 'T202110260016', '2021-10-26 20:55:39', 'Created Ticket', '', 'K0001'),
(74, 'T202110260017', '2021-10-26 20:57:30', 'Created Ticket', '', 'K0001'),
(75, 'T202110260016', '2021-10-26 21:02:41', 'Ticket disetujui', '', 'K0001'),
(76, 'T202110260014', '2021-10-26 21:02:45', 'Ticket disetujui', '', 'K0001'),
(77, 'T202110260015', '2021-10-26 21:02:48', 'Ticket disetujui', '', 'K0001'),
(78, 'T202110260017', '2021-10-26 21:02:52', 'Ticket disetujui', '', 'K0001'),
(79, 'T202110260018', '2021-10-26 21:03:54', 'Created Ticket', '', 'K0001'),
(80, 'T202110260018', '2021-10-26 21:04:13', 'Ticket disetujui', '', 'K0001'),
(81, 'T202110260019', '2021-10-26 21:06:18', 'Created Ticket', '', 'K0001'),
(82, 'T202110260019', '2021-10-26 21:07:01', 'Ticket disetujui', '', 'K0001'),
(83, 'T202110260019', '2021-10-26 21:08:16', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(84, 'T202110260019', '2021-10-26 21:09:12', 'Diproses oleh teknisi', '', 'K0003'),
(85, 'T202110260019', '2021-10-26 21:10:11', 'Up Progress To 100 %', '', 'K0003'),
(86, 'T202110250012', '2021-10-26 21:10:37', 'Up Progress To 80 %', '', 'K0003'),
(87, 'T202110250012', '2021-10-26 21:11:13', 'Up Progress To 80 %', 'DESC PROGRESS', 'K0003'),
(88, 'T202110260013', '2021-10-26 21:13:01', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(89, 'T202110260016', '2021-10-26 21:13:19', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(90, 'T202110260018', '2021-10-26 21:13:32', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(91, 'T202110260014', '2021-10-26 21:13:48', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(92, 'T202110260015', '2021-10-26 21:14:06', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(93, 'T202110260017', '2021-10-26 21:14:20', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(94, 'T202110260013', '2021-10-26 21:16:13', 'Diproses oleh teknisi', '', 'K0003'),
(95, 'T202110260014', '2021-10-26 21:16:16', 'Diproses oleh teknisi', '', 'K0003'),
(96, 'T202110260015', '2021-10-26 21:16:20', 'Diproses oleh teknisi', '', 'K0003'),
(97, 'T202110260016', '2021-10-26 21:16:25', 'Diproses oleh teknisi', '', 'K0003'),
(98, 'T202110260017', '2021-10-26 21:16:57', 'Diproses oleh teknisi', '', 'K0003'),
(99, 'T202110260018', '2021-10-26 21:17:04', 'Diproses oleh teknisi', '', 'K0003'),
(100, 'T202110260020', '2021-10-26 21:18:17', 'Created Ticket', '', 'K0001'),
(101, 'T202110260021', '2021-10-26 21:20:23', 'Created Ticket', '', 'K0001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(5) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'K0001', '5dd17b28cc71e422e1f1bc5b3f0286f8', 'ADMIN'),
(2, 'K0003', 'e10adc3949ba59abbe56e057f20f883e', 'TEKNISI'),
(3, 'K0002', 'e10adc3949ba59abbe56e057f20f883e', 'USER'),
(4, 'K0005', 'e10adc3949ba59abbe56e057f20f883e', 'USER'),
(5, 'K0007', 'e10adc3949ba59abbe56e057f20f883e', 'ADMIN'),
(7, 'K0010', 'e10adc3949ba59abbe56e057f20f883e', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian_departemen`
--
ALTER TABLE `bagian_departemen`
  ADD PRIMARY KEY (`id_bagian_dept`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indexes for table `history_feedback`
--
ALTER TABLE `history_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian_departemen`
--
ALTER TABLE `bagian_departemen`
  MODIFY `id_bagian_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `history_feedback`
--
ALTER TABLE `history_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
