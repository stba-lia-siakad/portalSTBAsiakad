-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 10:06 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalstba`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_mk`
--

CREATE TABLE `jadwal_mk` (
  `id_jadwal` int(11) NOT NULL,
  `mk` varchar(50) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `hari` varchar(11) DEFAULT NULL,
  `ruang` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_mk`
--

INSERT INTO `jadwal_mk` (`id_jadwal`, `mk`, `jam`, `hari`, `ruang`) VALUES
(1, 'CommunicatiVE english', '12:50:00', 'Selasa', 'D32'),
(2, 'Integrated English', '13:55:00', 'Rabu', 'D31');

-- --------------------------------------------------------

--
-- Table structure for table `kalender_akademik`
--

CREATE TABLE `kalender_akademik` (
  `id_kegiatan` int(10) NOT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `tanggal_kegiatan_m` date DEFAULT NULL,
  `tanggal_kegiatan_s` date DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kalender_akademik`
--

INSERT INTO `kalender_akademik` (`id_kegiatan`, `nama_kegiatan`, `tanggal_kegiatan_m`, `tanggal_kegiatan_s`, `deskripsi`) VALUES
(1, 'Pembayaran SPP Tetap (Semester ganjil)', '2018-02-01', '2018-02-28', 'tes'),
(2, 'Pembayaran SPP Tetap (Semester ganjil)', '2018-03-01', '2018-03-31', '-'),
(3, 'Pembayaran Angsuran Uang Gedung 1', '2018-04-01', '0000-00-00', '-'),
(4, 'Pembayaran Angsuran Uang Gedung 2', '2018-04-30', '2018-05-20', '-'),
(5, 'Pembayaran Angsuran Uang Gedung 3', '2018-06-01', '0000-00-00', '-'),
(6, 'Pembayaran Angsuran Uang Gedung 4', '2018-07-01', '2018-07-30', '-'),
(7, 'Pembayaran SPP Variabel tahap 1', '2018-08-01', '2018-08-30', '-'),
(8, 'Pembayaran SPP Variabel tahap 2', '2018-09-01', '2018-09-30', '-'),
(9, 'Pembayaran Wisuda', '2018-11-20', '2018-11-30', '-'),
(10, 'Pembayaran Administrasi Graduasi', '2018-11-20', '2018-11-30', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `image`, `description`) VALUES
('MK01', 'Matematika Diskrit', 500000, 'default.jpg', 'Harus dibayarkan'),
('MK02', 'IPA', 550000, 'default.jpg', 'BISMI\r\n'),
('5c7897716a3c0', 'MANGGA', 500000, 'default.jpg', 'tes'),
('5c7897ae39fdc', 'MANGGAaa', 75000, 'default.jpg', 'tesah'),
('MK01', 'Matematika Diskrit', 500000, 'default.jpg', 'Harus dibayarkan'),
('MK02', 'IPA', 550000, 'default.jpg', 'BISMI\r\n'),
('5c7897716a3c0', 'MANGGA', 500000, 'default.jpg', 'tes'),
('5c7897ae39fdc', 'MANGGAaa', 75000, 'default.jpg', 'tesah');

-- --------------------------------------------------------

--
-- Table structure for table `setup_aktif`
--

CREATE TABLE `setup_aktif` (
  `id_ta` int(11) NOT NULL,
  `ta` varchar(20) DEFAULT NULL,
  `smt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_aktif`
--

INSERT INTO `setup_aktif` (`id_ta`, `ta`, `smt`) VALUES
(1, '2018/2019', '1');

-- --------------------------------------------------------

--
-- Table structure for table `setup_smt`
--

CREATE TABLE `setup_smt` (
  `id_smt` int(11) NOT NULL,
  `smt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_smt`
--

INSERT INTO `setup_smt` (`id_smt`, `smt`) VALUES
(1, 'Ganjil'),
(2, 'Genap'),
(3, 'Antara');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id` int(11) NOT NULL,
  `nomor_induk` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status` set('mahasiswa','dosen','baak','admin','kajur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id`, `nomor_induk`, `pass`, `status`) VALUES
(1, '3143111011', 'd336036e9f330c578bb3437fdb7d3a39', 'admin'),
(2, '123123', '4297f44b13955235245b2497399d7a93', 'admin'),
(3, '2018101022', '375a0d4d75c5a94453f3a5e597b43aca', 'mahasiswa'),
(4, '2014101028', '776715f9a5f6f54e4c6331c0c76fedcf', 'mahasiswa'),
(5, '2018211001', '6f2fd2e97c1262b70321472d5069f6cc', 'mahasiswa'),
(6, '112233', 'd0970714757783e6cf17b26fb8e2298f', 'kajur'),
(7, '08999', '9eff28a7ef3a9fb031b3ad6af31806e4', 'dosen'),
(8, '123456', 'e10adc3949ba59abbe56e057f20f883e', 'baak'),
(9, '0899911', '682df544ed64696edc38f4943a0fa0b3', 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun_detail`
--

CREATE TABLE `tbl_akun_detail` (
  `id` int(11) NOT NULL,
  `nomor_induk` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_akun_detail`
--

INSERT INTO `tbl_akun_detail` (`id`, `nomor_induk`, `nama`) VALUES
(1, '123456', 'A'),
(2, '3143111011', 'B'),
(3, '123123', 'C'),
(4, '112233', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dataket_mhs`
--

CREATE TABLE `tbl_dataket_mhs` (
  `id_dataket_mhs` int(11) NOT NULL,
  `id_ket_mhs` int(11) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `tahun_ajaran` varchar(20) DEFAULT NULL,
  `smt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dataket_mhs`
--

INSERT INTO `tbl_dataket_mhs` (`id_dataket_mhs`, `id_ket_mhs`, `nim`, `tahun_ajaran`, `smt`) VALUES
(1, 1, 2014101028, '2018/2019', 1),
(2, 1, 2018211001, '2018/2019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT '1',
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha','Kong Hu Chu') DEFAULT NULL,
  `img_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `nidn`, `nama`, `gender`, `alamat`, `id_jabatan`, `id_status`, `tempat_lahir`, `tgl_lahir`, `agama`, `img_file`) VALUES
(7, '08999', 'ade Irma Wijaya', 'L', 'xxxxxx', 1, 1, 'Banjarnegara', '2018-11-27', 'Islam', 'X'),
(8, '0899911', 'Ririn Dwi eka', 'L', 'xxxxxxxxxxxx', 2, 1, 'Banjarnegara', '2018-11-27', 'Islam', 'X'),
(9, '57457456', 'Jaka Muhammad Hatta', 'L', 'xxxxxxxxx', 1, 1, 'Purwokerto', '2018-11-27', 'Islam', '57457456.jpg'),
(10, '12312312', 'Nurul ebtanas', 'L', 'XXXXXXXXXXXXXXXXXXXXXXXXXXXX', 3, 0, 'Purwokerto', '2018-11-19', 'Islam', '12312312.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hari`
--

CREATE TABLE `tbl_hari` (
  `id_hari` int(11) NOT NULL,
  `hari` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hari`
--

INSERT INTO `tbl_hari` (`id_hari`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal_krs`
--

CREATE TABLE `tbl_jadwal_krs` (
  `id_jadwal_krs` int(11) NOT NULL,
  `tgl_awl_krs` date DEFAULT NULL,
  `tgl_akr_krs` date DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal_krs`
--

INSERT INTO `tbl_jadwal_krs` (`id_jadwal_krs`, `tgl_awl_krs`, `tgl_akr_krs`, `id_jurusan`, `keterangan`) VALUES
(1, '2001-01-02', '2018-12-19', 2, 'English(Morning)'),
(2, '2018-01-18', '2018-12-19', 3, 'Bahasa indonesia'),
(3, '2018-12-18', '2018-12-19', 4, 'English sore');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal_mk`
--

CREATE TABLE `tbl_jadwal_mk` (
  `id_jadwal_mk` int(11) NOT NULL,
  `id_mk` varchar(11) DEFAULT NULL,
  `id_jam` int(11) DEFAULT NULL,
  `id_hari` int(11) DEFAULT NULL,
  `id_ruang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal_mk`
--

INSERT INTO `tbl_jadwal_mk` (`id_jadwal_mk`, `id_mk`, `id_jam`, `id_hari`, `id_ruang`) VALUES
(9, '5', 1, 1, 1),
(10, '6', 2, 1, 1),
(11, '7', 1, 2, 2),
(12, '8', 2, 2, 2),
(13, '1', 1, 3, 3),
(14, '2', 1, 3, 1),
(15, '3', 2, 5, 3),
(16, '10', 1, 2, 1),
(17, '9', 2, 3, 1),
(18, '11', 1, 4, 2),
(19, '14', 1, 1, 3),
(20, '15', 1, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jam`
--

CREATE TABLE `tbl_jam` (
  `id_jam` int(11) NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jam`
--

INSERT INTO `tbl_jam` (`id_jam`, `jam_mulai`, `jam_akhir`) VALUES
(1, '07:40:00', '09:00:00'),
(2, '08:50:00', '10:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenispembayaran`
--

CREATE TABLE `tbl_jenispembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `nama_pembayaran` varchar(20) NOT NULL,
  `jenis_pembayaran` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenispembayaran`
--

INSERT INTO `tbl_jenispembayaran` (`id_pembayaran`, `jurusan`, `semester`, `nama_pembayaran`, `jenis_pembayaran`, `jumlah`) VALUES
(11, 1, 1, 'SPA Gelombang 1', 'SPA', 10500000),
(12, 1, 1, 'SPP Variabel', 'SPP Variabel', 250000),
(13, 1, 5, 'SPP Variabel', 'SPP Variabel', 150000),
(14, 1, 7, 'SPP Tetap', 'SPP Tetap', 1500000),
(15, 1, 5, 'SPA ', 'SPA', 12500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenjang`
--

CREATE TABLE `tbl_jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenjang`
--

INSERT INTO `tbl_jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
(1, 'S1'),
(2, 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(20) NOT NULL,
  `jenjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`, `jenjang`) VALUES
(1, 'Jurusan A', 1),
(2, 'Jurusan A', 2),
(3, 'Jurusan B', 1),
(4, 'Jurusan B', 2),
(5, 'Jurusan C', 1),
(6, 'Jurusan C', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas_mk`
--

CREATE TABLE `tbl_kelas_mk` (
  `id` int(11) NOT NULL,
  `id_mk` int(11) DEFAULT NULL,
  `nama_kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas_mk`
--

INSERT INTO `tbl_kelas_mk` (`id`, `id_mk`, `nama_kelas`) VALUES
(1, 5, 'A'),
(2, 5, 'B'),
(3, 5, 'C'),
(5, 1, 'A'),
(6, 1, 'B'),
(7, 1, 'C'),
(8, 1, 'D'),
(9, 8, 'C'),
(10, 6, 'A'),
(11, 9, 'C'),
(12, 9, 'B'),
(13, 9, 'A'),
(14, 10, 'A'),
(15, 10, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelompok_mk`
--

CREATE TABLE `tbl_kelompok_mk` (
  `id_kel_mk` int(11) NOT NULL,
  `nama_kel_mk` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelompok_mk`
--

INSERT INTO `tbl_kelompok_mk` (`id_kel_mk`, `nama_kel_mk`) VALUES
(1, 'MPK Inti'),
(2, 'MPK Institusional'),
(3, 'MKK Inti'),
(4, 'MKK Institusional'),
(5, 'MKB Inti'),
(6, 'MKB Institusional'),
(7, 'MPB Inti'),
(8, 'MPB Institusional'),
(9, 'MBB Inti'),
(10, 'MPB Institusional'),
(11, 'MBB Inti'),
(12, 'MBB Institusional');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keterangan_mahasiswa`
--

CREATE TABLE `tbl_keterangan_mahasiswa` (
  `id_ket_mhs` int(11) NOT NULL,
  `nama_ket_mhs` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keterangan_mahasiswa`
--

INSERT INTO `tbl_keterangan_mahasiswa` (`id_ket_mhs`, `nama_ket_mhs`) VALUES
(1, 'Aktif'),
(2, 'Non Aktif'),
(3, 'Cuti'),
(4, 'Keuar (DO)'),
(5, 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keuangan_status`
--

CREATE TABLE `tbl_keuangan_status` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `izin_krs` int(3) DEFAULT '0',
  `spa` int(11) DEFAULT '0',
  `spp_tetap` int(3) NOT NULL DEFAULT '0',
  `spp_variabel` int(3) NOT NULL DEFAULT '0',
  `wisuda` int(3) NOT NULL DEFAULT '0',
  `kemahasiswaan` int(3) NOT NULL DEFAULT '0',
  `praktikum` int(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keuangan_status`
--

INSERT INTO `tbl_keuangan_status` (`id`, `nim`, `izin_krs`, `spa`, `spp_tetap`, `spp_variabel`, `wisuda`, `kemahasiswaan`, `praktikum`) VALUES
(4, '1', 0, 0, 0, 0, 0, 0, 0),
(5, '5', 1, 0, 0, 0, 0, 0, 0),
(6, '2', 0, 0, 0, 0, 0, 0, 0),
(7, '6', 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `id_krs` int(11) NOT NULL,
  `nim` int(11) DEFAULT NULL,
  `id_matakuliah` varchar(30) DEFAULT NULL,
  `status_krs` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_krs`
--

INSERT INTO `tbl_krs` (`id_krs`, `nim`, `id_matakuliah`, `status_krs`) VALUES
(5, 2018101022, '3', 'Y'),
(6, 2018101022, '8', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mhs` varchar(30) DEFAULT NULL,
  `tempat_lahir_mhs` varchar(30) DEFAULT NULL,
  `tgl_lahir_mhs` date DEFAULT NULL,
  `gender_mhs` enum('L','P') DEFAULT NULL,
  `agama_mhs` enum('Islam','Kristen','Katolik','Hindu','Budha','Kong Hu Chu') DEFAULT NULL,
  `jurusan` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `sks_diakui` tinyint(3) DEFAULT '0',
  `angkatan` int(11) DEFAULT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  `id_st_msk` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `foto_mhs` varchar(100) DEFAULT NULL,
  `id_ket_mhs` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `nama_mhs`, `tempat_lahir_mhs`, `tgl_lahir_mhs`, `gender_mhs`, `agama_mhs`, `jurusan`, `semester`, `sks_diakui`, `angkatan`, `id_jenjang`, `id_st_msk`, `status`, `foto_mhs`, `id_ket_mhs`) VALUES
('1', 'Fifi Marsia Lasewa', 'Paisubatu', '1995-03-03', 'L', 'Kristen', 1, 1, 60, 2014, 2, 2, 1, NULL, 1),
('2', 'Arga N. Pradana', 'Bekasi', '2000-12-12', 'L', 'Islam', 1, 2, 0, 2018, 2, 2, 1, NULL, 1),
('5', 'Ayu Lestari', 'Mentok', '1994-08-15', 'P', 'Islam', 1, 5, 0, 2018, 3, 1, 1, NULL, 2),
('6', 'XSS', 'XS', '2018-01-01', 'L', 'Kristen', 2, 6, 25, 2016, 3, 2, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ploting`
--

CREATE TABLE `tbl_ploting` (
  `id_ploting` int(11) NOT NULL,
  `ploting_id_matakuliah` int(11) DEFAULT NULL,
  `ploting_id_dosen` int(11) DEFAULT NULL,
  `ploting_date` datetime DEFAULT NULL,
  `ploting_id_akun` varchar(20) DEFAULT NULL,
  `ploting_status` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ploting`
--

INSERT INTO `tbl_ploting` (`id_ploting`, `ploting_id_matakuliah`, `ploting_id_dosen`, `ploting_date`, `ploting_id_akun`, `ploting_status`) VALUES
(13, 5, 7, '2018-12-17 15:38:50', '3143111011', 'Y'),
(14, 6, 8, '2018-12-17 15:38:56', '3143111011', 'Y'),
(15, 7, 9, '2018-12-17 15:39:00', '3143111011', 'Y'),
(16, 8, 10, '2018-12-17 15:39:03', '3143111011', 'Y'),
(17, 1, 7, '2018-12-17 15:39:08', '3143111011', 'Y'),
(18, 2, 8, '2018-12-17 15:39:12', '3143111011', 'Y'),
(20, 3, 10, '2018-12-17 15:39:49', '3143111011', 'Y'),
(21, 9, 7, '2019-03-04 03:42:20', NULL, 'Y'),
(22, 10, 8, '2019-03-04 07:26:55', NULL, 'Y'),
(23, 11, 10, '2019-03-04 08:22:42', '123123', 'Y'),
(24, 14, 7, '2019-03-04 12:05:19', NULL, 'Y'),
(25, 15, 8, '2019-03-04 12:09:09', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prasyarat_mk`
--

CREATE TABLE `tbl_prasyarat_mk` (
  `id_prasyarat_mk` int(11) NOT NULL,
  `id_mk` varchar(11) DEFAULT NULL,
  `nama_mk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prasyarat_mk`
--

INSERT INTO `tbl_prasyarat_mk` (`id_prasyarat_mk`, `id_mk`, `nama_mk`) VALUES
(1, '-', '-'),
(2, 'STU125', 'Fonologi Bahasa Inggris'),
(3, 'SEU233', 'Morfologi Bahasa Inggris'),
(4, 'SEU243', 'Sintaksis Bahasa Inggris'),
(5, 'SEU354', 'Semantik Bahasa Inggris'),
(6, 'SEU232', 'Pengkajian Prosa Inggris I'),
(7, 'SEK112', 'Keterampilan Menyimak II'),
(8, 'SEK122', 'Keterampilan Menyimak III'),
(9, 'SEK113', 'Keterampilan Berbicara II'),
(10, 'SEK123', 'Keterampilan Berbicara III'),
(11, 'SEK114', 'Keterampilan Membaca II'),
(12, 'SEK124', 'Keterampilan Membaca III'),
(13, 'SEK115', 'Keterampilan Menulis II'),
(14, 'SEK125', 'Keterampilan Menulis III'),
(15, 'SEK111', 'Keterampilan Tata Bahasa II'),
(16, 'SEK121', 'Keterampilan Tata Bahasa III'),
(17, 'SEK232', 'Keterampilan Menyimaka IV'),
(18, 'SEK234', 'Keterampilan Membaca IV'),
(19, 'SEK235', 'Keterampilan Menulis IV'),
(20, 'SEK245', 'Keterampilan Menulis V'),
(21, 'SEK355', 'Penulisan Portofolio'),
(22, 'SEK365', 'Thematic Seminar'),
(23, 'SEK231', 'Keterampilan Tata Bahasa IV'),
(24, 'PRC102B', 'Bahasa Perancis III'),
(25, 'PRC202A', 'Bahasa Perancis IV'),
(26, 'PRC202B', 'Bahasa Perancis V'),
(27, 'PRC302A', 'Bahasa Perancis VI'),
(28, 'SEK126', 'Penerjemah II'),
(29, 'SEK233', 'Keterampilan Berbicara Didepan Umum'),
(30, 'SEK246', 'Korespondensi II'),
(31, 'SEU232', 'Keterampilan Berbicara & Sejarah Sastra Inggris'),
(32, 'SEU244', 'Pengkajian Prosa Inggris II'),
(33, 'SEU355', 'Pengkajian Drama Inggris II'),
(34, 'SEU245', 'Pengkajian Puisi Inggris II'),
(35, 'SEK236', 'Teori Terjemahan'),
(36, 'SEK242', 'Persiapan TOEFL/EAT'),
(37, 'SEU369', 'Skripsi'),
(38, 'STP232', 'Aplikasi Komputer II'),
(39, 'STU114', 'Bahasa Indonesia II');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekappembayaran`
--

CREATE TABLE `tbl_rekappembayaran` (
  `id_rekap` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `tipe_pembayaran` int(11) NOT NULL,
  `sks` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status_bayar` varchar(11) NOT NULL,
  `jumlah_dibayarkan` int(11) NOT NULL,
  `catatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `id_semester` int(11) NOT NULL,
  `nama_semester` int(5) NOT NULL,
  `th_ajaran` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`id_semester`, `nama_semester`, `th_ajaran`, `keterangan`) VALUES
(1, 1, '2018/2019', 'Ganjil'),
(2, 2, '2018/2019', 'Genap'),
(3, 3, '2018/2019', 'Ganjil'),
(4, 4, '2018/2019', 'Genap'),
(5, 5, '2018/2019', 'Ganjil'),
(6, 6, '2018/2019', 'Genap'),
(7, 7, '2018/2019', 'Ganjil'),
(8, 8, '2018/2019', 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_masuk`
--

CREATE TABLE `tbl_status_masuk` (
  `id_st_msk` int(11) NOT NULL,
  `nama_st_msk` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status_masuk`
--

INSERT INTO `tbl_status_masuk` (`id_st_msk`, `nama_st_msk`) VALUES
(1, 'Baru'),
(2, 'Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `user_level` varchar(20) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT 'noavatar.png',
  `alamat` text,
  `last_login` datetime DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `status` enum('kajur','baak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`, `avatar`, `alamat`, `last_login`, `active`, `status`) VALUES
(1, 'Muhammad Lilah', 'lilah@gmail.com', 'lilah', '1', 'tes.jpg', 'Jl rawa belong 01', '0000-00-00 00:00:00', NULL, 'kajur'),
(2, 'Daria Jona', 'jona@yahoo.com', 'jona', '2', 'sr.jpg', 'Jl. kaliurang km 15', '0000-00-00 00:00:00', NULL, 'baak'),
(3, 'Hon darling', 'hon@gmail.com', 'hon', '3', 'noavatar.png', 'Jl. Kabupaten KM 02', '0000-00-00 00:00:00', NULL, 'kajur'),
(4, 'azmi faris', 'faris@gmail.com', 'faris', '4', 'noavatar.png', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Lektor'),
(2, 'Lektor Madya'),
(3, 'Asisten Ahli'),
(4, 'Non Jabatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenjang`
--

CREATE TABLE `tb_jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(10) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenjang`
--

INSERT INTO `tb_jenjang` (`id_jenjang`, `nama_jenjang`, `jumlah`) VALUES
(1, 'D3', 35),
(3, 'S1', 97),
(4, 'S2', 10),
(5, 'S3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  `jenjang` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`, `id_jenjang`, `jenjang`) VALUES
(3, 'English', 1, 'D3'),
(4, 'English (Evening)', 3, 'S1'),
(5, 'English (Morning)', 3, 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matakuliah`
--

CREATE TABLE `tb_matakuliah` (
  `id_mk` int(11) NOT NULL,
  `kode_mk` varchar(50) DEFAULT NULL,
  `nama_mk` varchar(100) DEFAULT NULL,
  `id_prasyarat` int(11) DEFAULT NULL,
  `id_kel_mk` int(11) DEFAULT NULL,
  `sks_mk` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `tahun_ajaran` varchar(20) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `semester_prodi` int(11) DEFAULT NULL,
  `syarat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matakuliah`
--

INSERT INTO `tb_matakuliah` (`id_mk`, `kode_mk`, `nama_mk`, `id_prasyarat`, `id_kel_mk`, `sks_mk`, `id_jurusan`, `tahun_ajaran`, `semester`, `status`, `semester_prodi`, `syarat`) VALUES
(1, 'MKKB1123', 'Aural English', 4, 2, 2, 2, '2018/2019', '1', 1, 1, 'Telah Mengambil 15 SKS'),
(2, 'MKKB1124', 'English Vocational', NULL, NULL, 2, 2, '2018/2019', '4', 0, 3, 'Telah Mengambil 10 SKS'),
(3, 'MKKB1125', 'Inggris Terapan', NULL, NULL, 3, 2, '2018/2019', '2', 0, 3, 'Telah Mengambil 5 SKS'),
(4, 'MKKB1122', 'English for Disable', 18, 3, 2, 4, '2018/2019', '3', 0, 5, 'Telah Mengambil 15 SKS'),
(5, 'MKKB1120', 'Communicative English', 16, 3, 3, 2, '2018/2019', '1', 1, 3, 'Telah Mengambil 10 SKS'),
(6, 'MK26', 'English Aural B', 2, 2, 2, 3, '2018/2019', '1', 1, 4, NULL),
(7, 'MK26', 'English Aural B', 2, 2, 2, 3, '2018/2019', '1', 0, 4, NULL),
(8, 'MK266', 'English Aural Indo', 18, 12, 3, 3, '2018/2019', '1', 1, 4, NULL),
(9, 'MK266', 'English for kids', 9, 7, 3, 4, '2018/2019', '1', 1, 4, NULL),
(10, 'MK001', 'English Terintegrasi', 6, 7, 2, 4, '2018/2019', '1', 1, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mk`
--

CREATE TABLE `tb_mk` (
  `id_mk` int(11) NOT NULL,
  `kode_mk` varchar(11) DEFAULT NULL,
  `nama_mk` varchar(50) DEFAULT NULL,
  `sks_mk` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `syarat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(50) DEFAULT NULL,
  `tipe_ruangan` enum('Laboratorium','Kelas') DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id`, `nama_ruangan`, `tipe_ruangan`, `kapasitas`) VALUES
(1, 'E.2.3', 'Kelas', 40),
(2, 'E.2.1', 'Kelas', 30),
(3, 'E.2.0', 'Kelas', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_dosen`
--

CREATE TABLE `tb_status_dosen` (
  `id_status_dosen` int(11) NOT NULL,
  `nama_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_dosen`
--

INSERT INTO `tb_status_dosen` (`id_status_dosen`, `nama_status`) VALUES
(1, 'Stat 1'),
(2, 'Stat 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','alumni') NOT NULL DEFAULT 'administrator',
  `last_login` datetime NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'noavatar.png',
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `telp`, `username`, `password`, `level`, `last_login`, `avatar`, `active`) VALUES
(1, 'Abdul Manaaf', 'Jl. Sepakat No. 53', '080989999', 'administrator', '$2y$10$B2ztsNPm8JZyGR/E12rRU.itsFuvdnYCsDg/L4SZ.xCx7usFzvXUG', 'administrator', '2019-03-01 03:38:42', 'administrator_20190228064652.png', '1'),
(2, 'Brekele', '-', '-', 'brekele', '$2y$10$c14El4ivrRXfXAyspwbxQOaXu7cX1r3/odhQRIFQSuXg6yfQ6iya2', 'administrator', '2017-04-14 17:04:39', 'noavatar.png', '1'),
(3, 'Daeng', '-', '-', 'daeng', '$2y$10$Uo/O3pE0REYbte04eN171.CrkKNrdwk8LXeedOEFmDZDGYFNfRzSG', 'alumni', '2017-04-14 17:04:51', 'noavatar.png', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_mk`
--
ALTER TABLE `jadwal_mk`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_aktif`
--
ALTER TABLE `setup_aktif`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `setup_smt`
--
ALTER TABLE `setup_smt`
  ADD PRIMARY KEY (`id_smt`);

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_akun_detail`
--
ALTER TABLE `tbl_akun_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dataket_mhs`
--
ALTER TABLE `tbl_dataket_mhs`
  ADD PRIMARY KEY (`id_dataket_mhs`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tbl_hari`
--
ALTER TABLE `tbl_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `tbl_jadwal_krs`
--
ALTER TABLE `tbl_jadwal_krs`
  ADD PRIMARY KEY (`id_jadwal_krs`);

--
-- Indexes for table `tbl_jadwal_mk`
--
ALTER TABLE `tbl_jadwal_mk`
  ADD PRIMARY KEY (`id_jadwal_mk`);

--
-- Indexes for table `tbl_jam`
--
ALTER TABLE `tbl_jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `tbl_jenispembayaran`
--
ALTER TABLE `tbl_jenispembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fjurusan` (`jurusan`),
  ADD KEY `fsemester22` (`semester`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_kelas_mk`
--
ALTER TABLE `tbl_kelas_mk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kelompok_mk`
--
ALTER TABLE `tbl_kelompok_mk`
  ADD PRIMARY KEY (`id_kel_mk`);

--
-- Indexes for table `tbl_keterangan_mahasiswa`
--
ALTER TABLE `tbl_keterangan_mahasiswa`
  ADD PRIMARY KEY (`id_ket_mhs`);

--
-- Indexes for table `tbl_keuangan_status`
--
ALTER TABLE `tbl_keuangan_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fmahasiswa` (`nim`);

--
-- Indexes for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `fjurusan22` (`jurusan`);

--
-- Indexes for table `tbl_ploting`
--
ALTER TABLE `tbl_ploting`
  ADD PRIMARY KEY (`id_ploting`);

--
-- Indexes for table `tbl_prasyarat_mk`
--
ALTER TABLE `tbl_prasyarat_mk`
  ADD PRIMARY KEY (`id_prasyarat_mk`);

--
-- Indexes for table `tbl_rekappembayaran`
--
ALTER TABLE `tbl_rekappembayaran`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tbl_status_masuk`
--
ALTER TABLE `tbl_status_masuk`
  ADD PRIMARY KEY (`id_st_msk`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_jenjang`
--
ALTER TABLE `tb_jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indexes for table `tb_mk`
--
ALTER TABLE `tb_mk`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status_dosen`
--
ALTER TABLE `tb_status_dosen`
  ADD PRIMARY KEY (`id_status_dosen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  MODIFY `id_kegiatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_aktif`
--
ALTER TABLE `setup_aktif`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_smt`
--
ALTER TABLE `setup_smt`
  MODIFY `id_smt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_akun_detail`
--
ALTER TABLE `tbl_akun_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_hari`
--
ALTER TABLE `tbl_hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_jadwal_krs`
--
ALTER TABLE `tbl_jadwal_krs`
  MODIFY `id_jadwal_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jadwal_mk`
--
ALTER TABLE `tbl_jadwal_mk`
  MODIFY `id_jadwal_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_jam`
--
ALTER TABLE `tbl_jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jenispembayaran`
--
ALTER TABLE `tbl_jenispembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_kelas_mk`
--
ALTER TABLE `tbl_kelas_mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_kelompok_mk`
--
ALTER TABLE `tbl_kelompok_mk`
  MODIFY `id_kel_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_keterangan_mahasiswa`
--
ALTER TABLE `tbl_keterangan_mahasiswa`
  MODIFY `id_ket_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_keuangan_status`
--
ALTER TABLE `tbl_keuangan_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_ploting`
--
ALTER TABLE `tbl_ploting`
  MODIFY `id_ploting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_prasyarat_mk`
--
ALTER TABLE `tbl_prasyarat_mk`
  MODIFY `id_prasyarat_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_rekappembayaran`
--
ALTER TABLE `tbl_rekappembayaran`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_status_masuk`
--
ALTER TABLE `tbl_status_masuk`
  MODIFY `id_st_msk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jenjang`
--
ALTER TABLE `tb_jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_mk`
--
ALTER TABLE `tb_mk`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_status_dosen`
--
ALTER TABLE `tb_status_dosen`
  MODIFY `id_status_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jenispembayaran`
--
ALTER TABLE `tbl_jenispembayaran`
  ADD CONSTRAINT `fjurusan` FOREIGN KEY (`jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`),
  ADD CONSTRAINT `fsemester22` FOREIGN KEY (`semester`) REFERENCES `tbl_semester` (`id_semester`);

--
-- Constraints for table `tbl_keuangan_status`
--
ALTER TABLE `tbl_keuangan_status`
  ADD CONSTRAINT `fmahasiswa` FOREIGN KEY (`nim`) REFERENCES `tbl_mahasiswa` (`nim`);

--
-- Constraints for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD CONSTRAINT `fjurusan22` FOREIGN KEY (`jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
