-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 05:12 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `hak_akses` varchar(25) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakaian`
--

CREATE TABLE IF NOT EXISTS `pakaian` (
  `id_pakaian` tinyint(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `asal_daerah_pakaian` varchar(25) NOT NULL,
  `gambar` mediumblob NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `stok` int(50) NOT NULL,
  PRIMARY KEY (`id_pakaian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` tinyint(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` tinyint(15) NOT NULL AUTO_INCREMENT,
  `ukuran` varchar(20) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `jumlah` int(25) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `lama_pinjam` varchar(25) NOT NULL,
  `id_pengunjung` tinyint(15) NOT NULL,
  `id_pakaian` tinyint(15) NOT NULL,
  PRIMARY KEY (`id_peminjaman`),
  KEY `id_pelanggan` (`id_pengunjung`),
  KEY `id_pengembalian` (`id_pakaian`),
  KEY `id_pengunjung` (`id_pengunjung`),
  KEY `id_pakaian` (`id_pakaian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE IF NOT EXISTS `pengembalian` (
  `id_pengembalian` tinyint(15) NOT NULL AUTO_INCREMENT,
  `no_resi` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl/-kembali` date NOT NULL,
  `id_peminjaman` tinyint(15) NOT NULL,
  PRIMARY KEY (`id_pengembalian`),
  KEY `id_peminjaman` (`id_peminjaman`),
  KEY `id_peminjaman_2` (`id_peminjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE IF NOT EXISTS `pengunjung` (
  `id_pengunjung` tinyint(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pengunjung`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resi`
--

CREATE TABLE IF NOT EXISTS `resi` (
  `id_resi` tinyint(15) NOT NULL,
  `gambar` mediumblob NOT NULL,
  PRIMARY KEY (`id_resi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_pakaian`) REFERENCES `pakaian` (`id_pakaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_pengunjung`) REFERENCES `pengunjung` (`id_pengunjung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
