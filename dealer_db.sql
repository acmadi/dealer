-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2013 at 08:56 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dealer_db`
--
CREATE DATABASE IF NOT EXISTS `dealer_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dealer_db`;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_leasing`
--

CREATE TABLE IF NOT EXISTS `jenis_leasing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jenis_leasing`
--

INSERT INTO `jenis_leasing` (`id`, `name`) VALUES
(6, 'Leasing 1'),
(4, 'Leasing 2'),
(3, 'Leasing 3');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE IF NOT EXISTS `jenis_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id`, `name`) VALUES
(1, 'Tunai'),
(2, 'Kredit');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_unit`
--

CREATE TABLE IF NOT EXISTS `jenis_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `jenis_unit`
--

INSERT INTO `jenis_unit` (`id`, `name`) VALUES
(13, 'Blade'),
(9, 'Vario'),
(8, 'Revo'),
(12, 'Scoopy'),
(10, 'Beat');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_waktu_kredit`
--

CREATE TABLE IF NOT EXISTS `jenis_waktu_kredit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jenis_waktu_kredit`
--

INSERT INTO `jenis_waktu_kredit` (`id`, `name`) VALUES
(2, '3 Bulan'),
(3, '6 Bulan'),
(4, '1 Tahun'),
(5, '2 Tahun'),
(6, '3 Tahun');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_warna`
--

CREATE TABLE IF NOT EXISTS `jenis_warna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jenis_warna`
--

INSERT INTO `jenis_warna` (`id`, `name`) VALUES
(1, 'Hitam'),
(2, 'Biru Tua'),
(3, 'Orange'),
(4, 'Putih Hitam');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penjualan_id` int(11) NOT NULL,
  `jenis_unit_id` int(11) NOT NULL,
  `jenis_warna_id` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `stock_update` int(11) NOT NULL,
  `stock_total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `penjualan_id`, `jenis_unit_id`, `jenis_warna_id`, `stock_date`, `stock_update`, `stock_total`) VALUES
(4, 0, 10, 2, '2013-12-25', 2, 3),
(2, 0, 10, 1, '2013-12-24', 2, 2),
(3, 0, 10, 2, '2013-12-24', 1, 1),
(5, 0, 9, 2, '2013-12-24', 1, 1),
(6, 0, 9, 2, '2013-12-25', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `page_static`
--

CREATE TABLE IF NOT EXISTS `page_static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `page_static`
--

INSERT INTO `page_static` (`id`, `name`, `alias`, `desc`) VALUES
(16, '1', '1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `jenis_unit_id` int(11) NOT NULL,
  `jenis_warna_id` int(11) NOT NULL,
  `jenis_leasing_id` int(11) NOT NULL,
  `jenis_angsuran_id` int(11) NOT NULL,
  `jenis_pembayaran_id` int(11) NOT NULL,
  `status_penjualan_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `discount` int(11) NOT NULL,
  `dp_customer` int(11) NOT NULL,
  `dp_gross` int(11) NOT NULL,
  `sub` int(11) NOT NULL,
  `is_deliver` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `sales_id`, `jenis_unit_id`, `jenis_warna_id`, `jenis_leasing_id`, `jenis_angsuran_id`, `jenis_pembayaran_id`, `status_penjualan_id`, `name`, `nik`, `phone`, `birth_date`, `discount`, `dp_customer`, `dp_gross`, `sub`, `is_deliver`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, '', '', '', '0000-00-00', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_penjualan`
--

CREATE TABLE IF NOT EXISTS `status_penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `status_penjualan`
--

INSERT INTO `status_penjualan` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Diterima'),
(3, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `register_date` datetime NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type_id`, `email`, `fullname`, `passwd`, `address`, `register_date`, `is_active`) VALUES
(2, 1, 'her0satr@yahoo.com', 'Herry', 'fe30fa79056939db8cbe99c8d601de74', '-', '2013-10-17 03:17:56', 1),
(8, 1, 'super@super.com', 'Super', 'd7577ed0b469acb3ae6a1beea3e6a236', 'Malang', '2013-12-24 05:47:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Member');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
