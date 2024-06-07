-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 01:20 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `edocument`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
  `No_Dokumen` varchar(255) NOT NULL,
  `Kode` varchar(255) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Tanggal_Pembuatan` date NOT NULL,
  `Tanggal_Modifikasi` date DEFAULT NULL,
  `Kode_Pengguna` varchar(255) NOT NULL,
  PRIMARY KEY (`No_Dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`No_Dokumen`, `Kode`, `Judul`, `Deskripsi`, `Tanggal_Pembuatan`, `Tanggal_Modifikasi`, `Kode_Pengguna`) VALUES
('001/USB/III/2024', 'Surat', 'Surat1', 'Deskripsi Surat1<br />\r\n', '2024-03-28', '0000-00-00', '0002047701');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_file`
--

CREATE TABLE IF NOT EXISTS `dokumen_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `No_Dokumen` varchar(255) NOT NULL,
  `File` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dokumen_file`
--

INSERT INTO `dokumen_file` (`id`, `No_Dokumen`, `File`) VALUES
(1, '001/USB/III/2024', 'b33a488b39670771f3b2da3d296587ad.pdf'),
(2, '001/USB/III/2024', '6e65919430e8e071ac63b29bc0b6eb71.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengguna`
--

CREATE TABLE IF NOT EXISTS `jenis_pengguna` (
  `Jenis_Pengguna` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`Jenis_Pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pengguna`
--

INSERT INTO `jenis_pengguna` (`Jenis_Pengguna`, `Keterangan`) VALUES
('Dosen', 'Dosen DPK, Yayasan, dan LB'),
('Mahasiswa', 'Mahasiswa semua program studi'),
('Pegawai', 'Pegawai Tetap dan Outsourcing');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_dokumen`
--

CREATE TABLE IF NOT EXISTS `kategori_dokumen` (
  `Kode` varchar(255) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `Keterangan` text NOT NULL,
  PRIMARY KEY (`Kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_dokumen`
--

INSERT INTO `kategori_dokumen` (`Kode`, `Kategori`, `Keterangan`) VALUES
('Formulir', 'Formulir aplikasi, formulir pendaftaran, formulir survei, dan formulir lainnya.', ''),
('Invoice', 'Tagihan pembayaran, faktur penjualan, dan dokumen terkait keuangan lainnya.', ''),
('Kontrak', 'Kontrak bisnis, kontrak layanan, kontrak kerja, dan perjanjian lainnya.', ''),
('Laporan', 'Laporan keuangan, laporan proyek, laporan penelitian, dan laporan lainnya.', ''),
('Memo', 'Memo internal, memo kebijakan, memo pengumuman, dan memo lainnya.', ''),
('Panduan', 'Panduan pengguna, panduan teknis, panduan produk, dan panduan lainnya.', ''),
('Presentasi', 'Slide presentasi, dokumen panduan presentasi, dan materi presentasi lainnya.', ''),
('Proposal', 'Proposal proyek, proposal penelitian, proposal bisnis, dan proposal lainnya.', ''),
('Sertifikat', 'Sertifikat penghargaan, sertifikat pelatihan, sertifikat keahlian, dan sertifikat lainnya.', ''),
('Surat', 'Termasuk surat resmi, surat pribadi, surat bisnis, dan surat pemberitahuan', '');

-- --------------------------------------------------------

--
-- Table structure for table `logtw`
--

CREATE TABLE IF NOT EXISTS `logtw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `User` varchar(200) DEFAULT NULL,
  `IpAddress` varchar(200) DEFAULT NULL,
  `Information` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `logtw`
--

INSERT INTO `logtw` (`id`, `Time`, `User`, `IpAddress`, `Information`) VALUES
(1, '2024-03-28 23:40:11', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'admin login sukses'),
(2, '2024-03-28 23:48:02', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into jenis_pengguna'),
(3, '2024-03-28 23:48:23', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into jenis_pengguna'),
(4, '2024-03-28 23:48:47', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into jenis_pengguna'),
(5, '2024-03-28 23:49:44', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into kategori_dokumen'),
(6, '2024-03-28 23:50:08', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into kategori_dokumen'),
(7, '2024-03-28 23:50:27', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into kategori_dokumen'),
(8, '2024-03-28 23:50:41', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into kategori_dokumen'),
(9, '2024-03-28 23:50:56', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into kategori_dokumen'),
(10, '2024-03-28 23:51:10', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into kategori_dokumen'),
(11, '2024-03-28 23:51:24', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into kategori_dokumen'),
(12, '2024-03-28 23:51:38', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into kategori_dokumen'),
(13, '2024-03-28 23:51:51', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into kategori_dokumen'),
(14, '2024-03-28 23:52:08', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into kategori_dokumen'),
(15, '2024-03-28 23:53:04', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into pengguna'),
(16, '2024-03-28 23:54:22', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into pengguna'),
(17, '2024-03-28 23:54:52', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into pengguna'),
(18, '2024-03-29 00:08:37', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into dokumen'),
(19, '2024-03-29 00:09:41', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into dokumen_file'),
(20, '2024-03-29 00:10:20', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into dokumen_file'),
(21, '2024-03-29 00:10:39', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update dokumen_file'),
(22, '2024-03-29 00:10:55', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update dokumen_file'),
(23, '2024-03-29 00:19:17', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update setting'),
(24, '2024-03-29 00:19:37', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update setting'),
(25, '2024-03-29 00:20:02', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update setting'),
(26, '2024-03-29 00:20:37', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'logout');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `Kode_Pengguna` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Jenis_Pengguna` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telepon` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  PRIMARY KEY (`Kode_Pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`Kode_Pengguna`, `Nama`, `Jenis_Pengguna`, `Email`, `Telepon`, `Foto`) VALUES
('0002047701', 'Teguh Wiharko, S.T., M.T.', 'Dosen', 'wiharkoteguh@gmail.com', '085720962019', '64c1da2c51b5f41edf8846457b44aea9.jpg'),
('NIK001', 'Pegawai1', 'Pegawai', 'pegawai1@usbypkp.ac.id', '1234567890', '1b44d23c52556da4f02ce427110a994b.jpg'),
('NIM001', 'Mahasiswa1', 'Mahasiswa', 'mahasiswa1@usbypkp.ac.id', '0987654321', '0fc57da86b64d86ec3a0679ddddd1051.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `Nama` varchar(255) DEFAULT NULL,
  `Alamat` text,
  `Telepon` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`ID`, `Nama`, `Alamat`, `Telepon`, `Email`, `Logo`) VALUES
(1, 'Electronic Documents', '&nbsp;Jl. PH.H. Mustofa No.68, Cikutra, Bandung\r\n', '+62 22 7275489', 'info@usbypkp.ac.id', 'c96b5517d6d2f4feca575e43fe7e9bf2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tw_hak_akses`
--

CREATE TABLE IF NOT EXISTS `tw_hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tabel` varchar(250) DEFAULT NULL,
  `user` varchar(250) DEFAULT NULL,
  `listData` char(1) DEFAULT NULL,
  `viewData` char(1) DEFAULT NULL,
  `insertData` char(1) DEFAULT NULL,
  `editData` char(1) DEFAULT NULL,
  `deleteData` char(1) DEFAULT NULL,
  `detailData` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tw_hak_akses`
--

INSERT INTO `tw_hak_akses` (`id`, `tabel`, `user`, `listData`, `viewData`, `insertData`, `editData`, `deleteData`, `detailData`) VALUES
(1, 'dokumen', 'admin', '1', '1', '1', '1', '1', '1'),
(2, 'dokumen_file', 'admin', '1', '1', '1', '1', '1', '1'),
(3, 'jenis_pengguna', 'admin', '1', '1', '1', '1', '1', '1'),
(4, 'kategori_dokumen', 'admin', '1', '1', '1', '1', '1', '1'),
(5, 'logtw', 'admin', '1', '1', '1', '1', '1', '1'),
(6, 'pengguna', 'admin', '1', '1', '1', '1', '1', '1'),
(7, 'setting', 'admin', '1', '1', '1', '1', '1', '1'),
(8, 'user', 'admin', '1', '1', '1', '1', '1', '1'),
(9, 'pengguna/dokumen', 'admin', '1', '1', '1', '1', '1', '1'),
(10, 'dokumen/dokumen_file', 'admin', '1', '1', '1', '1', '1', '1'),
(11, 'jenis_pengguna/pengguna', 'admin', '1', '1', '1', '1', '1', '1'),
(12, 'kategori_dokumen/dokumen', 'admin', '1', '1', '1', '1', '1', '1'),
(13, 'Manage_User_Access', 'admin', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tw_tabel`
--

CREATE TABLE IF NOT EXISTS `tw_tabel` (
  `tabel` varchar(250) NOT NULL,
  PRIMARY KEY (`tabel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tw_tabel`
--

INSERT INTO `tw_tabel` (`tabel`) VALUES
('dokumen'),
('dokumen/dokumen_file'),
('dokumen_file'),
('jenis_pengguna'),
('jenis_pengguna/pengguna'),
('kategori_dokumen'),
('kategori_dokumen/dokumen'),
('logtw'),
('Manage_User_Access'),
('pengguna'),
('pengguna/dokumen'),
('setting'),
('user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Email` varchar(200) NOT NULL DEFAULT '',
  `Password` varchar(100) DEFAULT NULL,
  `Active` char(1) DEFAULT '0',
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Password`, `Active`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
