-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 12:21 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toko123`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `Kode` varchar(10) NOT NULL DEFAULT '',
  `Nama` varchar(255) DEFAULT NULL,
  `Kode_Jenis` varchar(50) NOT NULL,
  `Harga` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`Kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`Kode`, `Nama`, `Kode_Jenis`, `Harga`) VALUES
('B01', 'Indomie Goreng rebus', '', 3000),
('B02', 'Air Mineral', '', 1000),
('B03', 'Chiki', '', 1000),
('B04', 'Permen Manis', '', 500);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `Kode_Jenis` varchar(50) NOT NULL,
  `Jenis` varchar(100) NOT NULL,
  PRIMARY KEY (`Kode_Jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`Kode_Jenis`, `Jenis`) VALUES
('J01', 'Makanan'),
('J02', 'Minuman'),
('J03', 'ATK'),
('J04', 'Kosmetik');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `Kode_Pelanggan` varchar(100) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telepon` varchar(100) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  PRIMARY KEY (`Kode_Pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`Kode_Pelanggan`, `Nama`, `Alamat`, `Email`, `Telepon`, `Foto`) VALUES
('P001', 'Pelanggan 1', 'Bandung', 'pelanggan1@gmail.com', '0987654321', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `Kode_Pembelian` varchar(100) NOT NULL,
  `Tanggal` date NOT NULL,
  `Kode_Supplier` varchar(100) NOT NULL,
  `Kode_Barang` varchar(10) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Total_Harga` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Kode_Pembelian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`Kode_Pembelian`, `Tanggal`, `Kode_Supplier`, `Kode_Barang`, `Jumlah`, `Total_Harga`) VALUES
('PB001', '2024-06-01', 'S01', 'B01', 100, 300000),
('PB002', '2024-06-02', 'S01', 'B02', 200, 200000),
('PB003', '2024-06-03', 'S01', 'B03', 150, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `Kode_Penjualan` varchar(100) NOT NULL,
  `Tanggal` date NOT NULL,
  `Kode_Pelanggan` varchar(100) NOT NULL,
  `Kode_Barang` varchar(10) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Total_Harga` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Kode_Penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`Kode_Penjualan`, `Tanggal`, `Kode_Pelanggan`, `Kode_Barang`, `Jumlah`, `Total_Harga`) VALUES
('PJ001', '2024-06-01', 'P001', 'B01', 2, 6000),
('PJ002', '2024-06-02', 'P001', 'B02', 1, 1000),
('PJ003', '2024-06-03', 'P001', 'B03', 3, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `Kode_Supplier` varchar(100) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telepon` varchar(100) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  PRIMARY KEY (`Kode_Supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Kode_Supplier`, `Nama`, `Alamat`, `Email`, `Telepon`, `Foto`) VALUES
('S01', 'Supplier 1', 'Bandung', 'supplier1@gmail.com', '1234567890', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Active` int(11) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Password`, `Active`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('kasir', 'kasir', 1),
('operator', 'operator', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
