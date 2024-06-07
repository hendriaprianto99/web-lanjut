-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 05:28 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simskripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `NIDN` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  PRIMARY KEY (`NIDN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIDN`, `Nama`, `Foto`) VALUES
('0002047701', 'Teguh Wiharko, S.T., M.T.', '57563611650fa9ab53a180d28cbca8b4.jpg'),
('001', 'Slamet Risnanto, P.Hd.', '47a5e1d78e48caf3e265895deceb4397.jpg'),
('0404027604', 'Gunawan, S.T., M.Kom.', 'e5c3b24e9eff75fcd7138f03cc33834c.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `logtw`
--

INSERT INTO `logtw` (`id`, `Time`, `User`, `IpAddress`, `Information`) VALUES
(1, '2024-03-28 04:19:59', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'admin login sukses'),
(2, '2024-03-28 04:20:23', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update setting'),
(3, '2024-03-28 04:20:51', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update dosen'),
(4, '2024-03-28 04:21:08', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update dosen'),
(5, '2024-03-28 04:21:26', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update dosen'),
(6, '2024-03-28 04:21:48', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'update mahasiswa'),
(7, '2024-03-28 04:22:36', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'insert into skripsi'),
(8, '2024-03-28 04:28:17', 'admin', '127.0.0.1/WIN-CTOAIGE2VEG', 'logout');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `NIM` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Program_Studi` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  PRIMARY KEY (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `Program_Studi`, `Foto`) VALUES
('001', 'Contoh 1', 'PS01', '1510768c85d9da5f92a14cb394307eca.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE IF NOT EXISTS `program_studi` (
  `Kode` varchar(255) NOT NULL,
  `Program_Studi` varchar(255) NOT NULL,
  `Kaprodi` varchar(255) NOT NULL,
  `NIDN_Kaprodi` varchar(255) NOT NULL,
  PRIMARY KEY (`Kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`Kode`, `Program_Studi`, `Kaprodi`, `NIDN_Kaprodi`) VALUES
('PS01', 'Teknik Informatika', 'Gunawan, S.T., M.Kom.', '0404027604'),
('PS02', 'Sistem Informasi', 'Abdul Manaf, Phd.', '002');

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
(1, 'SIM Usulan Penelitian', '<font face="Verdana" size="1" color="black">Jl. PH.H. Mustofa No.68, Cikutra, Bandung</font>\r\n', '+62 22 7275489', 'info@usbypkp.ac.id', '9c2682bf67221a48dd329e7da88e3f60.png');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE IF NOT EXISTS `skripsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NIM` varchar(255) NOT NULL,
  `Pembimbing` varchar(255) NOT NULL,
  `Penguji1` varchar(255) NOT NULL,
  `Penguji2` varchar(255) NOT NULL,
  `Tanggal_Daftar` date NOT NULL,
  `Tanggal_Sidang` date NOT NULL,
  `Ruang_Sidang` varchar(255) NOT NULL,
  `Nilai_Pembimbing` varchar(255) NOT NULL,
  `Nilai_Penguji1` varchar(255) NOT NULL,
  `Nilai_Penguji2` varchar(255) NOT NULL,
  `Nilai_Akhir` varchar(255) NOT NULL,
  `Keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`id`, `NIM`, `Pembimbing`, `Penguji1`, `Penguji2`, `Tanggal_Daftar`, `Tanggal_Sidang`, `Ruang_Sidang`, `Nilai_Pembimbing`, `Nilai_Penguji1`, `Nilai_Penguji2`, `Nilai_Akhir`, `Keterangan`) VALUES
(1, '001', '0002047701', '001', '0404027604', '2024-03-27', '2024-05-24', 'B2A', '0', '0', '0', '0', '-\r\n');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tw_hak_akses`
--

INSERT INTO `tw_hak_akses` (`id`, `tabel`, `user`, `listData`, `viewData`, `insertData`, `editData`, `deleteData`, `detailData`) VALUES
(1, 'dosen', 'admin', '1', '1', '1', '1', '1', '1'),
(2, 'logtw', 'admin', '1', '1', '1', '1', '1', '1'),
(3, 'mahasiswa', 'admin', '1', '1', '1', '1', '1', '1'),
(4, 'program_studi', 'admin', '1', '1', '1', '1', '1', '1'),
(5, 'setting', 'admin', '1', '1', '1', '1', '1', '1'),
(6, 'skripsi', 'admin', '1', '1', '1', '1', '1', '1'),
(7, 'user', 'admin', '1', '1', '1', '1', '1', '1'),
(8, 'program_studi/mahasiswa', 'admin', '1', '1', '1', '1', '1', '1'),
(9, 'mahasiswa/skripsi', 'admin', '1', '1', '1', '1', '1', '1'),
(10, 'dosen/skripsi', 'admin', '1', '1', '1', '1', '1', '1'),
(11, 'Manage_User_Access', 'admin', '1', '1', '1', '1', '1', '1');

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
('dosen'),
('dosen/skripsi'),
('logtw'),
('mahasiswa'),
('mahasiswa/skripsi'),
('Manage_User_Access'),
('program_studi'),
('program_studi/mahasiswa'),
('setting'),
('skripsi'),
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
