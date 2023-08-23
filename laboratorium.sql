-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2023 pada 03.15
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laboratorium`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ail`
--

CREATE TABLE `ail` (
  `id_ail` int(5) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ail`
--

INSERT INTO `ail` (`id_ail`, `id_user`) VALUES
(1, 4),
(2, 5),
(3, 6),
(4, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id_lab` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_barang` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status_barang` varchar(255) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id_lab`, `nama`, `no_barang`, `gambar`, `jumlah`, `keterangan`, `status_barang`, `id_ruangan`, `is_active`) VALUES
(1, 'Komputer', 'PC 1', 'pc1019.jpg', '1', 'Aset', 'Booking', 1, 1),
(2, 'Komputer', 'PC 2', 'pc1020.jpg', '1', 'Aset', 'Booking', 1, 1),
(3, 'Komputer', 'PC 3', 'pc1021.jpg', '1', 'Aset', 'Booking', 1, 1),
(34, 'Komputer', 'PC 4', 'pc1022.jpg', '1', 'Aset', 'Tidak Tersedia', 1, 1),
(35, 'Komputer', 'PC 5', 'pc1023.jpg', '1', 'Aset', 'Booking', 1, 1),
(36, 'Komputer', 'PC 6', 'pc1024.jpg', '1', 'Aset', 'Booking', 1, 1),
(37, 'Komputer', 'PC 7', 'pc1025.jpg', '1', 'Aset', 'Tidak Tersedia', 1, 1),
(38, 'Komputer', 'PC 8', 'pc1026.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(39, 'Komputer', 'PC 9', 'pc1027.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(40, 'Komputer', 'PC 10', 'pc1028.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(41, 'Komputer', 'PC 11', 'pc1029.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(42, 'Komputer', 'PC 12', 'pc1030.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(43, 'Komputer', 'PC 13', 'pc1031.jpg', '1', 'Aset', 'Booking', 1, 1),
(44, 'Komputer', 'PC 14', 'pc1032.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(45, 'Komputer', 'PC 16', 'pc1033.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(46, 'Komputer', 'PC 16', 'pc1034.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(47, 'Komputer', 'PC 17', 'pc1035.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(48, 'Komputer', 'PC 18', 'pc1036.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(49, 'Komputer', 'PC 19', 'pc1037.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(50, 'Komputer', 'PC 20', 'pc1038.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(51, 'Komputer', 'PC 21', 'pc1039.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(52, 'Komputer', 'PC 1', 'pc1040.jpg', '1', 'Aset', 'Booking', 14, 1),
(53, 'Komputer', 'PC 2', 'pc1041.jpg', '1', 'Aset', 'Booking', 14, 1),
(54, 'Komputer', 'PC 3', 'pc1042.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(55, 'Komputer', 'PC 4', 'pc1043.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(56, 'Komputer', 'PC 5', 'pc1044.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(57, 'Komputer', 'PC 6', 'pc1045.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(58, 'Komputer', 'PC 7', 'pc1046.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(59, 'Komputer', 'PC 8', 'pc1047.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(60, 'Komputer', 'PC 9', 'pc1048.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(61, 'Komputer', 'PC 10', 'pc1049.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(62, 'Komputer', 'PC 1', 'pc1050.jpg', '1', 'Aset', 'Booking', 15, 1),
(63, 'Komputer', 'PC 2', 'pc1051.jpg', '1', 'Aset', 'Tersedia', 15, 1),
(64, 'Komputer', 'PC 3', 'pc1052.jpg', '1', 'Aset', 'Tersedia', 15, 1),
(65, 'Komputer', 'PC 4', 'pc1053.jpg', '1', 'Aset', 'Tersedia', 15, 1),
(66, 'Komputer', 'PC 5', 'pc1054.jpg', '1', 'Aset', 'Tersedia', 15, 1),
(67, 'Komputer', 'PC 6', 'pc1055.jpg', '1', 'Aset', 'Tersedia', 15, 1),
(68, 'Komputer', 'PC 7', 'pc1056.jpg', '1', 'Aset', 'Tersedia', 15, 1),
(69, 'Komputer', 'PC 8', 'pc1057.jpg', '1', 'Aset', 'Tersedia', 15, 1),
(70, 'Komputer', 'PC 9', 'pc1058.jpg', '1', 'Aset', 'Tersedia', 15, 1),
(71, 'Komputer', 'PC 10', 'pc1059.jpg', '1', 'Aset', 'Tersedia', 15, 1),
(72, 'Komputer', 'PC 1', 'pc1060.jpg', '1', 'Aset', 'Booking', 17, 1),
(73, 'Komputer', 'PC 2', 'pc1061.jpg', '1', 'Aset', 'Booking', 17, 1),
(74, 'Komputer', 'PC 3', 'pc1062.jpg', '1', 'Aset', 'Booking', 17, 1),
(75, 'Komputer', 'PC 4', 'pc1063.jpg', '1', 'Aset', 'Tersedia', 17, 1),
(76, 'Komputer', 'PC 5', 'pc1064.jpg', '1', 'Aset', 'Tersedia', 17, 1),
(77, 'Komputer', 'PC 6', 'pc1065.jpg', '1', 'Aset', 'Tersedia', 17, 1),
(78, 'Komputer', 'PC 7', 'pc1066.jpg', '1', 'Aset', 'Booking', 17, 1),
(79, 'Komputer', 'PC 8', 'pc1067.jpg', '1', 'Aset', 'Booking', 17, 1),
(80, 'Komputer', 'PC 9', 'pc1068.jpg', '1', 'Aset', 'Tersedia', 17, 1),
(81, 'Komputer', 'PC 10', 'pc1069.jpg', '1', 'Aset', 'Booking', 17, 1),
(82, 'Komputer', 'PC 11', 'pc1070.jpg', '1', 'Aset', 'Tersedia', 17, 1),
(83, 'Komputer', 'PC 1', 'pc1071.jpg', '1', 'Aset', 'Tersedia', 11, 1),
(84, 'Komputer', 'PC 2', 'pc1072.jpg', '1', 'Aset', 'Tersedia', 11, 1),
(85, 'Komputer', 'PC 3', 'pc1073.jpg', '1', 'Aset', 'Booking', 11, 1),
(86, 'Komputer', 'PC 4', 'pc1074.jpg', '1', 'Aset', 'Booking', 11, 1),
(87, 'Komputer', 'PC 22', 'pc1075.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(88, 'Komputer', 'PC 23', 'pc1076.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(89, 'Komputer', 'PC 24', 'pc1077.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(90, 'Komputer', 'PC 25', 'pc1078.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(91, 'Komputer', 'PC 26', 'pc1079.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(92, 'Komputer', 'PC 27', 'pc1080.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(93, 'Komputer', 'PC 28', 'pc1081.jpg', '1', 'Aset', 'Tersedia', 1, 1),
(94, 'Komputer', 'PC 29', 'pc1082.jpg', '1', 'Aset', 'Booking', 1, 1),
(95, 'Komputer', 'PC 30', 'pc1083.jpg', '1', 'Aset', 'Booking', 1, 1),
(96, 'Komputer', 'PC 11', 'pc1084.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(97, 'Komputer', 'PC 12', 'pc1085.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(98, 'Komputer', 'PC 13', 'pc1086.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(99, 'Komputer', 'PC 14', 'pc1087.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(100, 'Komputer', 'PC 15', 'pc1088.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(101, 'Komputer', 'PC 16', 'pc1089.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(102, 'Komputer', 'PC 17', 'pc1090.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(103, 'Komputer', 'PC 18', 'pc1091.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(104, 'Komputer', 'PC 19', 'pc1092.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(105, 'Komputer', 'PC 20', 'pc1093.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(106, 'Komputer', 'PC 21', 'pc1094.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(107, 'Komputer', 'PC 22', 'pc1095.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(108, 'Komputer', 'PC 23', 'pc1096.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(109, 'Komputer', 'PC 24', 'pc1097.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(110, 'Komputer', 'PC 25', 'pc1098.jpg', '1', 'Aset', 'Tersedia', 14, 1),
(112, 'Komputer', 'PC 1', '1.jpg', '1', 'Aset', 'Booking', 12, 1),
(113, 'Komputer', 'PC 5', '11.jpg', '1', 'Aset', 'Booking', 11, 1),
(114, 'Komputer', 'PC 6', '12.jpg', '1', 'Aset', 'Tersedia', 11, 1),
(115, 'Komputer', 'PC 7', '13.jpg', '1', 'Aset', 'Tersedia', 11, 1),
(116, 'Komputer', 'PC 8', '14.jpg', '1', 'Aset', 'Tersedia', 11, 1),
(117, 'Komputer', 'PC 9', '15.jpg', '1', 'Aset', 'Tersedia', 11, 1),
(118, 'Komputer', 'PC 10', '16.jpg', '1', 'Aset', 'Tersedia', 11, 1),
(119, 'Komputer', 'PC 26', '18.jpg', '1', 'Aset', 'Tersedia', 14, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(5) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_user`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalab`
--

CREATE TABLE `kalab` (
  `id_kalab` int(5) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kalab`
--

INSERT INTO `kalab` (`id_kalab`, `id_user`) VALUES
(2, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_ail` int(5) NOT NULL,
  `id_kalab` int(5) NOT NULL,
  `id_dosen` int(5) NOT NULL,
  `nohp` char(12) NOT NULL,
  `level_peminjaman` int(1) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `keterangan` varchar(32) NOT NULL,
  `peserta` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `approval_dosen` int(1) NOT NULL,
  `approval_ail` int(1) NOT NULL,
  `approval_kalab` int(1) NOT NULL,
  `approval_kajur` int(1) NOT NULL,
  `approval_pudir1` int(1) NOT NULL,
  `status_peminjaman` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_ruangan`, `id_ail`, `id_kalab`, `id_dosen`, `nohp`, `level_peminjaman`, `tanggal_awal`, `tanggal_akhir`, `jam_awal`, `jam_akhir`, `keterangan`, `peserta`, `status`, `approval_dosen`, `approval_ail`, `approval_kalab`, `approval_kajur`, `approval_pudir1`, `status_peminjaman`) VALUES
(59, 3, 1, 1, 1, 1, '081254004344', 3, '2023-07-31', '2023-08-31', '07:00:00', '14:35:00', 'Seminar', '-', 'Peminjaman Ditolak', 0, 0, 0, 0, 0, 4),
(61, 17, 1, 1, 1, 1, '0823223', 1, '2023-07-31', '2023-07-31', '07:21:00', '04:00:00', 'Proyek Akhir', '-', 'Peminjaman Selesai', 1, 1, 1, 0, 0, 3),
(62, 18, 14, 4, 2, 1, '085161762468', 1, '2023-07-31', '2023-07-31', '13:28:00', '15:28:00', 'Proyek Akhir', '-', 'Disetujui Ail', 1, 1, 0, 0, 0, 0),
(63, 19, 17, 3, 2, 1, '2132312', 1, '2023-07-31', '2023-07-31', '07:00:00', '14:00:00', 'Seminar', '-', 'Disetujui Ail', 1, 1, 0, 0, 0, 0),
(65, 20, 15, 4, 2, 1, '08213712323', 2, '2023-07-31', '2023-07-31', '16:54:00', '22:00:00', 'Seminar', '-', 'Disetujui Kalab', 1, 1, 1, 0, 0, 0),
(66, 21, 14, 4, 2, 1, '443534543', 1, '2023-07-31', '2023-07-31', '10:00:00', '12:00:00', 'Proyek Akhir', '-', 'Peminjaman Sukses', 1, 1, 1, 0, 0, 1),
(67, 22, 12, 3, 2, 1, '75665345', 1, '2023-07-31', '2023-07-31', '14:00:00', '16:00:00', 'Proyek Akhir', '-', 'Peminjaman Sukses', 1, 1, 1, 0, 0, 1),
(68, 23, 11, 3, 2, 1, '6545846', 1, '2023-07-31', '2023-07-31', '13:00:00', '15:59:00', 'Proyek Akhir', '-', 'Peminjaman Sukses', 1, 1, 1, 0, 0, 1),
(69, 24, 17, 3, 2, 1, '85462156', 1, '2023-07-31', '2023-07-31', '11:00:00', '13:00:00', 'Seminar', '-', 'Peminjaman Sukses', 1, 1, 1, 0, 0, 1),
(70, 25, 1, 1, 1, 1, '08542126', 1, '2023-07-31', '2023-07-31', '07:00:00', '08:29:00', 'Sidang Akhir', '-', 'Disetujui Ail', 1, 1, 0, 0, 0, 0),
(71, 26, 1, 1, 1, 1, '08545645', 1, '2023-07-31', '2023-08-14', '10:00:00', '01:00:00', 'Sidang Akhir', '-', 'Disetujui Pembina', 1, 0, 0, 0, 0, 0),
(72, 28, 17, 3, 2, 1, '0865652154', 3, '2023-08-14', '2023-08-14', '07:00:00', '22:00:00', 'Rendering Project', '-', 'Pending', 0, 0, 0, 0, 0, 0),
(73, 29, 1, 1, 1, 1, '08232123421', 1, '2023-08-14', '2023-08-14', '07:51:00', '13:51:00', 'Sidang Akhir', '-', 'Pending', 0, 0, 0, 0, 0, 0),
(75, 3, 1, 1, 1, 1, '081254004344', 1, '2023-08-25', '2023-08-25', '07:27:00', '15:27:00', 'Seminar', '-', 'Peminjaman Sukses', 1, 1, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_barang`
--

CREATE TABLE `peminjaman_barang` (
  `id_peminjaman_barang` int(5) NOT NULL,
  `id_peminjaman` int(5) DEFAULT NULL,
  `id_lab` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman_barang`
--

INSERT INTO `peminjaman_barang` (`id_peminjaman_barang`, `id_peminjaman`, `id_lab`) VALUES
(32, 59, 1),
(34, 61, 2),
(35, 62, 52),
(36, 62, 53),
(37, 62, 54),
(38, 63, 78),
(39, 63, 79),
(42, 65, 62),
(43, 66, 52),
(44, 66, 53),
(45, 67, 112),
(46, 68, 85),
(47, 68, 86),
(48, 68, 113),
(49, 69, 72),
(50, 69, 73),
(51, 69, 74),
(52, 70, 94),
(53, 70, 95),
(54, 71, 43),
(55, 72, 81),
(56, 73, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `id_ail` int(11) NOT NULL,
  `id_kalab` int(5) NOT NULL,
  `no_ruangan` varchar(25) NOT NULL,
  `nama_ruangan` varchar(128) NOT NULL,
  `status_ruangan` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `id_ail`, `id_kalab`, `no_ruangan`, `nama_ruangan`, `status_ruangan`, `is_active`) VALUES
(1, 1, 2, '225', 'Lab. Programming 1', 'Tersedia', 1),
(2, 1, 2, '313', 'Lab. Web Programming 1', 'Tersedia', 1),
(3, 1, 2, '316', 'Lab. Game & Animation', 'Tersedia', 1),
(4, 1, 2, '317', 'Lab. Mobile Programming 1', 'Tersedia', 1),
(5, 2, 2, '319', 'Lab. Data & Business Analyst', 'Tersedia', 1),
(6, 2, 2, '320', 'Lab Big Data & AI', 'Tersedia', 1),
(7, 4, 1, '324', 'Lab Computer Networking 1', 'Tersedia', 1),
(8, 4, 1, '325', 'Lab Database', 'Tersedia', 1),
(9, 2, 2, '329', 'Lab Software Engineering', 'Tersedia', 1),
(10, 4, 1, '330', 'Lab Web Programming 2', 'Tersedia', 1),
(11, 3, 1, '282', 'Lab Programming 2', 'Tersedia', 1),
(12, 3, 1, '283', 'Lab Operating Systems', 'Tersedia', 1),
(13, 3, 1, '284', 'Lab IoT & Embedded System', 'Tersedia', 1),
(14, 4, 1, '252', 'Lab Mobile Programming 2', 'Tersedia', 1),
(15, 4, 1, '256', 'Lab Soft Computing', 'Tersedia', 1),
(16, 1, 2, '352', 'Multimedia Studio', 'Tersedia', 1),
(17, 3, 1, '281', 'Lab Computer Networking 2', 'Tersedia', 1),
(29, 3, 1, '152', 'LX Studio', 'Tersedia', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `level` enum('Pudir1','Kajur','Kalab','Ail','Peminjam','Dosen') NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `nip`, `level`, `is_active`) VALUES
(1, 'pudir1', 'pudir1@gmail.com', 'pudir1@gmail.com', '0', 'Pudir1', 1),
(2, 'kajur', 'kajur@gmail.com', 'kajur@gmail.com', '231234', 'Kajur', 1),
(3, 'Adil Urwatul Woqqo', 'adil19si@mahasiswa.pcr.ac.id', 'adil19si', '1957301003', 'Peminjam', 1),
(4, 'Aida Kamila', 'aidakamila@gmail.com', 'aidakamila@gmail.com', '23213', 'Ail', 1),
(5, 'Nessa Chairani Bemin', 'nessa@gmail.com', 'nessa@gmail.com', '43432', 'Kalab', 1),
(6, 'Harumin', 'harumin@gmail.com', 'harumin@gmail.com', '23123', 'Kalab', 1),
(7, 'dosen1', 'dosen1@gmail.com', 'dosen1@gmail.com', '21312', 'Dosen', 1),
(8, 'Dwi Listiyanty', 'dwi@gmail.com', 'dwi@gmail.com', '2312', 'Ail', 1),
(17, 'Prengki', 'prengki19si@mahasiswa.pcr.ac.id', 'prengki19si', '1957301003', 'Peminjam', 1),
(18, 'Farrel.A', 'farrel19si@mahasiswa.pcr.ac.id', 'farrel19si', '1957301032', 'Peminjam', 1),
(19, 'Dinda Rahma Ifani', 'dinda19si@mahasiswa.pcr.ac.id', 'dinda19si', '1957301023', 'Peminjam', 1),
(20, 'Retno Evieta', 'retno19si@mahasiswa.pcr.ac.id', 'retno19si', '1957301082', 'Peminjam', 1),
(21, 'Muhammad Harits', 'harits19si@mahasiswa.pcr.ac.id', 'harits19si', '1957301062', 'Peminjam', 1),
(22, 'Teguh Amanah Putra', 'teguh19si@mahasiswa.pcr.ac.id', 'teguh19si', '1957301104', 'Peminjam', 1),
(23, 'Bagas Novendra', 'bagasnovendra19ti@mahasiswa.pcr.ac.id', 'bagas19ti', '1955301029', 'Peminjam', 1),
(24, 'Yaafiandra Rajel Ahsan', 'yaafiandra19ti@mahasiswa.pcr.ac.id', 'yaafiandra19ti', '1955301140', 'Peminjam', 1),
(25, 'Alfiah Hidayatillah ', 'alfiah19ti@mahasiswa.pcr.ac.id', 'alfiah19ti', '1955301015', 'Peminjam', 1),
(26, 'Adissa pramestya habsya sabilla', 'adissa19si@mahasiswa.pcr.ac.id', 'adissa19si', '1957301004', 'Peminjam', 1),
(27, 'Muhammad ababil', 'ababil20si@mahasiswa.pcr.ac.id', 'ababil20si', '2057301064', 'Peminjam', 1),
(28, 'Yona Eriska Rahmadila', 'yona19ti@mahasiswa.pcr.ac.id', 'yona19ti', '1955301141', 'Peminjam', 1),
(29, 'Samuel Julian ', 'samuel22trk@mahasiswa.pcr.ac.id', 'samuel22trk', '2256301424', 'Peminjam', 1),
(30, 'Khairul Gunawan ', 'khairul22trk@mahasiswa.pcr.ac.id', 'khairul22trk', '2256301412', 'Peminjam', 1),
(31, 'muhammad ageng lazuardi', 'ageng19si@mahasiswa.pcr.ac.id', 'ageng19si', '1957301060', 'Peminjam', 1),
(32, 'Rizki Indah Puspita', 'rizki19si@mahasiswa.pcr.ac.id', 'rizki19si', '1957301091', 'Peminjam', 1),
(33, 'Gian Luthfi', 'gian19si@mahasiswa.pcr.ac.id', 'gian19si', '1957301037 ', 'Peminjam', 1),
(34, 'Ibnu Muchda Nur Yassin Nasution', 'ibnu19ti@mahasiswa.pcr.ac.id', 'ibnu19ti', '1955301052', 'Peminjam', 1),
(35, 'Abdul hafiz tarmizi', 'abdul19ti@mahasiswa.pcr.ac.id', 'abdul19ti', '1955301001', 'Peminjam', 1),
(36, 'fitri khairani', 'fitri19si@mahasiswa.pcr.ac.id', 'fitri19si', '1956301034', 'Peminjam', 1),
(37, 'Imam ganteng', 'imam19si@mahasiswa.pcr.ac.id', 'imam19si', '1957301042', 'Peminjam', 1),
(38, 'Ibnu Muchda Nur Yassin Nasution', 'ibnu19ti@mahasiswa.pcr.ac.id', 'ibnu19ti', '1955301052', 'Peminjam', 1),
(39, 'Abdul Hafiz Tarmizi', 'abdul19ti@mahasiswa.pcr.ac.id', 'abdul19ti', '1955301001', 'Peminjam', 1),
(40, 'Fitri Khairani', 'fitri19si@mahasiswa.pcr.ac.id', 'fitri19si', '1956301034', 'Peminjam', 1),
(41, 'Imam Ganteng', 'imam19si@mahasiswa.pcr.ac.id', 'imam19si', '1957301042', 'Peminjam', 1),
(42, 'Arya Arsa Fikarda', 'arya19ti@mahasiswa.pcr.ac.id', 'arya19ti', '1955301024', 'Peminjam', 1),
(43, 'Dara Framini', 'dara22trk@mahasiswa.pcr.ac.id', 'dara22trk', '2256301406', 'Peminjam', 1),
(44, 'Richard Sihombing', 'richard19si@mahasiswa.pcr.ac.id', 'richard19si', '1957301085', 'Peminjam', 1),
(45, 'Eki Haiyal\'ulya', 'eki19si@mahasiswa.pcr.acid', 'eki19si', '1957301028', 'Peminjam', 1),
(46, 'Dinda Ashari', 'dinda.ashari@alumni.pcr.ac.id', 'dinda.ashari', '2256301408', 'Peminjam', 1),
(47, 'Dinda Ashari', 'dinda.ashari22trk@mahasiswa.pcr.ac.id', 'dinda.ashari22trk', '2256301408', 'Peminjam', 1),
(48, 'Muslimah Harun', 'musilmah19si@mahasiswa.pcr.ac.id', 'musilmah19si', '1957301066', 'Peminjam', 1),
(49, 'Alya Nabila', 'alya19si@mahasiswa.pcr.ac.id', 'alya19si', '1957301010', 'Peminjam', 1),
(50, 'Putri', 'putri19si@mahasiswa.pcr.ac.id', 'putri19si', '1957301076', 'Peminjam', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ail`
--
ALTER TABLE `ail`
  ADD PRIMARY KEY (`id_ail`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_lab`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kalab`
--
ALTER TABLE `kalab`
  ADD PRIMARY KEY (`id_kalab`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ail` (`id_ail`),
  ADD KEY `id_kalab` (`id_kalab`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  ADD PRIMARY KEY (`id_peminjaman_barang`),
  ADD KEY `peminjaman_barang_ibfk_1` (`id_lab`),
  ADD KEY `peminjaman_barang_ibfk_2` (`id_peminjaman`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `ruangan_ibfk_1` (`id_ail`),
  ADD KEY `id_kalab` (`id_kalab`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ail`
--
ALTER TABLE `ail`
  MODIFY `id_ail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kalab`
--
ALTER TABLE `kalab`
  MODIFY `id_kalab` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  MODIFY `id_peminjaman_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ail`
--
ALTER TABLE `ail`
  ADD CONSTRAINT `ail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD CONSTRAINT `data_barang_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `kalab`
--
ALTER TABLE `kalab`
  ADD CONSTRAINT `kalab_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `peminjaman_ibfk_5` FOREIGN KEY (`id_ail`) REFERENCES `ail` (`id_ail`),
  ADD CONSTRAINT `peminjaman_ibfk_6` FOREIGN KEY (`id_kalab`) REFERENCES `kalab` (`id_kalab`),
  ADD CONSTRAINT `peminjaman_ibfk_7` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Ketidakleluasaan untuk tabel `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  ADD CONSTRAINT `peminjaman_barang_ibfk_1` FOREIGN KEY (`id_lab`) REFERENCES `data_barang` (`id_lab`) ON DELETE SET NULL,
  ADD CONSTRAINT `peminjaman_barang_ibfk_2` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`id_ail`) REFERENCES `ail` (`id_ail`),
  ADD CONSTRAINT `ruangan_ibfk_2` FOREIGN KEY (`id_kalab`) REFERENCES `kalab` (`id_kalab`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
