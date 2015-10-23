-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2015 at 04:30 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlykhachsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblkhachhang`
--

CREATE TABLE IF NOT EXISTS `tblkhachhang` (
  `id` int(11) NOT NULL,
  `hoTen` varchar(255) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `CMTND` varchar(20) NOT NULL,
  `ghiChu` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblkhachhang`
--

INSERT INTO `tblkhachhang` (`id`, `hoTen`, `diaChi`, `SDT`, `CMTND`, `ghiChu`) VALUES
(23, ' Ngô Doãn Tình ', ' Hải Dương ', '', '', ''),
(24, ' Phạm Xuân Tú ', ' Thái Nguyên ', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblkhachhang`
--
ALTER TABLE `tblkhachhang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblkhachhang`
--
ALTER TABLE `tblkhachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
