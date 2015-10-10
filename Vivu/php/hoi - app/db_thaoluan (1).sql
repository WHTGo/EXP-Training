-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2015 at 06:22 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_thaoluan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `changeTitle`(OUT title VARCHAR(255))
BEGIN
    SET title = 'Hoc lap trinh online tai freetuts.net';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `question`(IN `idVal` INT(11))
BEGIN
    SELECT * FROM quest LIMIT idVal ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reset`()
begin
	ALTER TABLE quest AUTO_INCREMENT = 1;
    ALTER TABLE view AUTO_INCREMENT = 1;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `quest`
--

CREATE TABLE IF NOT EXISTS `quest` (
  `stt` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `question` longtext NOT NULL,
  PRIMARY KEY (`stt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `quest`
--

INSERT INTO `quest` (`stt`, `name`, `question`) VALUES
(1, 'jafjfa', 'afsafsf'),
(2, 'dav', 'advdav'),
(3, 'dsgsd', 'gsg'),
(4, 'zvd', 'vsz'),
(5, 'Æ°gewg', 'sgsgg'),
(6, 'sbfbfs', 'sbfb'),
(7, 'da', 'dvv'),
(8, 'rsg', 'rgg'),
(9, 'sav', 'dvfb'),
(10, 'rswbb', 'Æ°bb'),
(11, 'sbffffs', 'sbfb'),
(12, 'sf', 'gá»­gr'),
(13, 'sfÆ°grr', 'gá»­grgá»­'),
(14, 'sdbfbfs', 'dbdsb'),
(15, 'srgr', 'grsgsrg'),
(16, 'srgrgrs', 'grsgrsgrg'),
(17, 'bac', 'nhu cc'),
(18, 'á»µqfueg', 'gkjvrkj'),
(19, 'gfeu', 'iqegewogjw'),
(20, 'á»§gh', 'á»‰wgow'),
(21, 'gewyiu', 'uihrwgr'),
(22, 'bbfib', 'iwhg'),
(23, 'hjfb', 'bhge'),
(24, 'uhu', 'uhwrgiu'),
(25, 'hbdgj', 'oehgwior'),
(26, 'ssbbfbfs', 'sfbfbfsb'),
(27, 'seg', 'áº¿b'),
(28, 'aeg', 'Æ°egwg'),
(29, 'eeeeegage', 'edvdv'),
(30, 'sssssss', 'sdvds'),
(31, 'wwgrg', 'segssg'),
(32, 'ehtg', 'eagr'),
(33, 'wgrrrrrr', 'rsgrg'),
(34, 'aee', 'evs'),
(35, 'dsfds', 'dffffdsfds'),
(36, 'fdhydr', 'hrdshd'),
(37, 'eage', 'aegeg'),
(38, 'egss', 'sgg'),
(39, 'rsg', 'shrh');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
