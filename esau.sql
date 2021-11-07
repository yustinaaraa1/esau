-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2019 at 06:38 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esau`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambang_batas`
--

CREATE TABLE IF NOT EXISTS `ambang_batas` (
`id_ambang_batas` int(11) NOT NULL,
  `nama_ambang_batas` enum('Sangat Sering','Cukup','Kurang') DEFAULT NULL,
  `batas_atas` int(11) DEFAULT NULL,
  `batas_bawah` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambang_batas`
--

INSERT INTO `ambang_batas` (`id_ambang_batas`, `nama_ambang_batas`, `batas_atas`, `batas_bawah`) VALUES
(1, 'Sangat Sering', 6, 5),
(2, 'Cukup', 4, 3),
(3, 'Kurang', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `centroid_produk_temp`
--

CREATE TABLE IF NOT EXISTS `centroid_produk_temp` (
`id` int(11) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `c1` int(11) DEFAULT NULL,
  `c2` int(11) DEFAULT NULL,
  `c3` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `centroid_produk_temp`
--

INSERT INTO `centroid_produk_temp` (`id`, `id_group`, `id_buku`, `c1`, `c2`, `c3`) VALUES
(1, 1, 11, 1, 0, 0),
(2, 1, 12, 0, 1, 0),
(3, 1, 13, 0, 1, 0),
(4, 1, 14, 0, 0, 1),
(5, 1, 15, 0, 1, 0),
(6, 1, 16, 1, 0, 0),
(7, 1, 17, 0, 1, 0),
(8, 1, 18, 1, 0, 0),
(9, 1, 19, 0, 1, 0),
(10, 1, 20, 1, 0, 0),
(11, 1, 21, 0, 1, 0),
(12, 1, 22, 0, 1, 0),
(13, 1, 23, 0, 0, 1),
(14, 1, 24, 1, 0, 0),
(15, 1, 25, 0, 1, 0),
(16, 1, 26, 0, 1, 0),
(17, 1, 27, 1, 0, 0),
(18, 1, 28, 1, 0, 0),
(19, 1, 29, 0, 0, 1),
(20, 1, 30, 1, 0, 0),
(21, 1, 31, 0, 0, 1),
(22, 1, 32, 1, 0, 0),
(23, 1, 33, 1, 0, 0),
(24, 1, 34, 1, 0, 0),
(25, 1, 35, 0, 1, 0),
(26, 1, 36, 1, 0, 0),
(27, 1, 37, 1, 0, 0),
(28, 1, 38, 1, 0, 0),
(29, 1, 39, 0, 0, 1),
(30, 1, 40, 0, 1, 0),
(31, 1, 41, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `centroid_temp`
--

CREATE TABLE IF NOT EXISTS `centroid_temp` (
`id` int(5) NOT NULL,
  `c1_a` varchar(50) DEFAULT NULL,
  `c1_b` varchar(50) DEFAULT NULL,
  `c2_a` varchar(50) DEFAULT NULL,
  `c2_b` varchar(20) DEFAULT NULL,
  `c3_a` varchar(21) DEFAULT NULL,
  `c3_b` varchar(21) DEFAULT NULL,
  `rasio` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `centroid_temp`
--

INSERT INTO `centroid_temp` (`id`, `c1_a`, `c1_b`, `c2_a`, `c2_b`, `c3_a`, `c3_b`, `rasio`) VALUES
(1, '1', '12.785714285714', '1', '5', '1', '2', 0.28170679796669);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
`id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE IF NOT EXISTS `tb_buku` (
`id_buku` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `judul_buku` varchar(200) DEFAULT NULL,
  `pengarang` varchar(200) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_kategori`, `sku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_buku`) VALUES
(11, 1, '978-979-3925-98-1', 'Buku Kerja Prinsip Disain Pembelajaran', 'Santi Maudiarti', 'Kencana', 2009, 1),
(12, 1, '979-9075-09-2', 'Dasar-Dasar Penguasaan Bahasa Inggris', 'Azhar Arsyad', 'Pustaka Pelajar', 2008, 1),
(13, 1, '979-692-196-0', 'Manajemen Berbasis sekolah', 'E. Mulyasa', 'PT.Remaja Rosda', 2011, 1),
(14, 1, '979-421-086-2', 'Pengantar Statistik Pendidikan', 'Anas Sudijono', 'PT. Raja Grafin', 2012, 1),
(15, 1, '978-602-8300-95-7', 'Menjadi Guru Inspiratif', 'Ngainun Naim', 'Pustaka Pelajar', 2011, 1),
(16, 1, '978-979-518-824-7', 'Profesi Keguruan', 'Soetjipto', 'PT. Rineka Cipt', 2012, 1),
(17, 1, '979-062-144-2', 'Penelitian Tindakan Kelas dalam Pengajaran Bahasa Inggris', 'Herudjati Purwo', 'PT. Indeks', 2010, 1),
(18, 1, '978-602-8432-78-8', 'Strategi Mengajar Bilingual', 'Astrid Triastar', 'Cerdas Pustaka', 2011, 1),
(19, 1, '979-3931-95-7', 'A Handbook of English Grammar', 'Imam Baehaqi', 'Cakrawala Ilmu', 2012, 1),
(20, 1, '978-602-98043-9-3', 'Complete English Grammar fo Everyone', 'Mettayana Anggu', 'Pelangi Indones', 2012, 1),
(21, 1, '978-602-7515-08-6', 'Manajemen Pendidikan Karakter', 'Novan Ardy Wiya', 'Pedagogia', 2012, 1),
(22, 1, '979-26-8544-8', 'Model Pembelajaran Berbasis Kognitif Moral', 'Sarbaini', 'Aswaja Pressind', 2012, 1),
(23, 1, '979-420-393-9', 'Asas-Asas Linguistik Umum', 'J. W. M. Verhaa', 'Gadjah Mada Uni', 2010, 1),
(24, 1, '978-979-670-151-3', 'Semantik', 'Aminuddin', 'Sinar Baru Alge', 2011, 1),
(25, 1, '979-2462-12-0', 'Test Your Word Power', 'Jerome Agel', 'Baca!', 2007, 1),
(26, 1, '978-602-191-213-3', 'Pedoman Pembelajaran & Instruksi Pendidikan', 'Kelvin Seifert', 'IRCiSod', 2012, 1),
(27, 1, '978-979-075-120-0', 'Sosiopragmatik', 'Kunjana Rahardi', 'Erlangga', 2009, 1),
(28, 1, '978-979-033-743-5', 'Dasar-dasar Analisis Sintaksis', 'J.D. Parera', 'Erlangga', 2009, 1),
(29, 1, '978-979-3984-44-5', 'Hakikat Linguistik Bandingan', 'Djoko Saryono', 'Adityamedia', 2011, 1),
(30, 1, '979-741-501-5', 'Schaum''s Outlines English Grammar', 'Eugene Ehrlich', 'Erlangga', 2004, 1),
(31, 2, '979-421-215-5', 'Kamus Psikologi', 'Kartini Kartono', 'Pioner Jaya', 2000, 1),
(32, 2, '979-421-215-6', 'Kamus Lengkap Psikologi', 'James P. Chapli', 'PT. RajaGrafind', 2005, 1),
(33, 2, '979-9327-33-4', 'Ensiklopedi Ekonomi, Bisnis & Manajemen', 'Liz Wiwiek Widi', 'PT. Delta Pamun', 1997, 2),
(34, 2, '979-416-761-4', 'Kamus Manajemen', 'B.N. Marbun', 'Pustaka Sinar H', 2003, 1),
(35, 2, '979-96446-6-6', 'Kamus Komputer dan Istilah Tehnologi Informasi', 'Jack Febrian', 'Informatika', 2002, 1),
(36, 2, '979-9550-42-4', 'Kamus Lengkap Jaringan Komputer', 'Tim Penelitian', 'Salemba Infotek', 2004, 1),
(37, 2, '979-8855-06-X', 'Ensiklopedi Matematika & Peradaban Manusia', 'Wahyudin', 'CV. Tarity Samu', 2003, 1),
(38, 2, '979-489-347-1', 'Kamus Pertanian Umum', 'TIM Penyusun Ka', 'Penebar Swadaya', 2008, 1),
(39, 2, '979-421-731-x', 'Ensiklopedi Ilmu-Ilmu Sosial 1', 'Adam Kuper', 'PT. RajaGrafind', 2000, 1),
(40, 2, '979-3858-08-7', 'Ensiklopedia', 'Abdul Mun', 'Grafindo Khazan', 2006, 1),
(41, 2, '0-8160-1901-0', 'Seri Manajemen Sumber Daya Manusia 1', 'A. Dale Timpe', 'PT. Elex Media', 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
`id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Inggris'),
(2, 'Referensi'),
(3, 'Umum'),
(4, 'Indonesia'),
(5, 'PPS'),
(6, 'Manajemen');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE IF NOT EXISTS `tb_pinjam` (
`id_pinjam` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `jumlah_dipinjam` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `id_buku`, `bulan`, `tahun`, `jumlah_dipinjam`) VALUES
(49, 11, 'Agustus', 2019, 8),
(50, 12, 'Agustus', 2019, 6),
(51, 13, 'Agustus', 2019, 4),
(52, 14, 'Agustus', 2019, 3),
(53, 15, 'Agustus', 2019, 4),
(54, 16, 'Agustus', 2019, 10),
(55, 17, 'Agustus', 2019, 7),
(56, 18, 'Agustus', 2019, 14),
(57, 19, 'Agustus', 2019, 4),
(58, 20, 'Agustus', 2019, 11),
(59, 21, 'Agustus', 2019, 4),
(60, 22, 'Agustus', 2019, 5),
(61, 23, 'Agustus', 2019, 3),
(62, 24, 'Agustus', 2019, 22),
(63, 25, 'Agustus', 2019, 6),
(64, 26, 'Agustus', 2019, 5),
(65, 27, 'Agustus', 2019, 10),
(66, 28, 'Agustus', 2019, 23),
(67, 29, 'Agustus', 2019, 1),
(68, 30, 'Agustus', 2019, 9),
(69, 31, 'Agustus', 2019, 2),
(70, 32, 'Agustus', 2019, 16),
(71, 33, 'Agustus', 2019, 12),
(72, 34, 'Agustus', 2019, 15),
(73, 35, 'Agustus', 2019, 7),
(74, 36, 'Agustus', 2019, 11),
(75, 37, 'Agustus', 2019, 8),
(76, 38, 'Agustus', 2019, 10),
(77, 39, 'Agustus', 2019, 1),
(78, 40, 'Agustus', 2019, 4),
(79, 41, 'Agustus', 2019, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambang_batas`
--
ALTER TABLE `ambang_batas`
 ADD PRIMARY KEY (`id_ambang_batas`);

--
-- Indexes for table `centroid_produk_temp`
--
ALTER TABLE `centroid_produk_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centroid_temp`
--
ALTER TABLE `centroid_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
 ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
 ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambang_batas`
--
ALTER TABLE `ambang_batas`
MODIFY `id_ambang_batas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `centroid_produk_temp`
--
ALTER TABLE `centroid_produk_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `centroid_temp`
--
ALTER TABLE `centroid_temp`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
