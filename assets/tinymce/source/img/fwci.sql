-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2013 at 06:55 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fwci`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id_action` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) NOT NULL,
  `function` varchar(100) NOT NULL,
  PRIMARY KEY (`id_action`),
  UNIQUE KEY `function` (`function`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id_action`, `action`, `function`) VALUES
(5, 'Module', 'module'),
(6, 'Add', 'add'),
(7, 'Update', 'update'),
(8, 'Delete', 'delete'),
(9, 'Print', 'print');

-- --------------------------------------------------------

--
-- Table structure for table `detailaction`
--

CREATE TABLE IF NOT EXISTS `detailaction` (
  `id_detailaction` int(11) NOT NULL AUTO_INCREMENT,
  `id_typemodul` int(11) NOT NULL,
  `id_action` int(11) NOT NULL,
  PRIMARY KEY (`id_detailaction`),
  KEY `id_typemodul` (`id_typemodul`),
  KEY `id_action` (`id_action`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `detailaction`
--

INSERT INTO `detailaction` (`id_detailaction`, `id_typemodul`, `id_action`) VALUES
(6, 4, 5),
(7, 4, 6),
(8, 4, 7),
(9, 4, 8),
(10, 5, 5),
(11, 5, 9),
(12, 6, 5),
(13, 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `modul` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `id_typemodul` int(11) NOT NULL,
  PRIMARY KEY (`id_modul`),
  UNIQUE KEY `class` (`class`),
  KEY `id_typemodul` (`id_typemodul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `modul`, `class`, `id_typemodul`) VALUES
(5, 'Usergroup', 'usergroup', 4),
(6, 'User', 'user', 4),
(7, 'Report', 'report', 5),
(8, 'Grafik', 'grafik', 6);

-- --------------------------------------------------------

--
-- Table structure for table `privilage`
--

CREATE TABLE IF NOT EXISTS `privilage` (
  `id_privilage` int(11) NOT NULL AUTO_INCREMENT,
  `id_modul` int(11) NOT NULL,
  `id_detailaction` int(11) NOT NULL,
  `id_usergroup` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_privilage`),
  KEY `id_modul` (`id_modul`),
  KEY `id_detailaction` (`id_detailaction`),
  KEY `id_usergroup` (`id_usergroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `privilage`
--

INSERT INTO `privilage` (`id_privilage`, `id_modul`, `id_detailaction`, `id_usergroup`, `status`) VALUES
(17, 5, 6, 1, '1'),
(18, 5, 7, 1, '1'),
(19, 5, 8, 1, '1'),
(20, 5, 9, 1, '1'),
(21, 5, 6, 2, '0'),
(22, 5, 7, 2, '0'),
(23, 5, 8, 2, '0'),
(24, 5, 9, 2, '0'),
(25, 6, 6, 1, '1'),
(26, 6, 7, 1, '1'),
(27, 6, 8, 1, '1'),
(28, 6, 9, 1, '1'),
(29, 6, 6, 2, '1'),
(30, 6, 7, 2, '1'),
(31, 6, 8, 2, '1'),
(32, 6, 9, 2, '1'),
(33, 7, 10, 1, '1'),
(34, 7, 11, 1, '1'),
(35, 7, 10, 2, '1'),
(36, 7, 11, 2, '1'),
(37, 8, 12, 1, '1'),
(38, 8, 13, 1, '1'),
(39, 8, 12, 2, '1'),
(40, 8, 13, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `typemodul`
--

CREATE TABLE IF NOT EXISTS `typemodul` (
  `id_typemodul` int(11) NOT NULL AUTO_INCREMENT,
  `typemodul` varchar(100) NOT NULL,
  PRIMARY KEY (`id_typemodul`),
  UNIQUE KEY `typemodul` (`typemodul`),
  UNIQUE KEY `typemodul_2` (`typemodul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `typemodul`
--

INSERT INTO `typemodul` (`id_typemodul`, `typemodul`) VALUES
(6, 'Grafik'),
(4, 'Master'),
(5, 'Report');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_usergroup` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_usergroup` (`id_usergroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `email`, `password`, `id_usergroup`) VALUES
(2, 'Andri', 'ant123', 'ant@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(3, 'Thiqo', 'thicoq', 'thico@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id_usergroup` int(11) NOT NULL AUTO_INCREMENT,
  `usergroup` varchar(100) NOT NULL,
  `parent` varchar(25) NOT NULL,
  PRIMARY KEY (`id_usergroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id_usergroup`, `usergroup`, `parent`) VALUES
(1, 'root', '0'),
(2, 'administrator1', '1'),
(3, 'administrator2', '1'),
(4, 'administrator3', '1'),
(5, 'user1', '2'),
(6, 'user1', '2'),
(7, 'user2', '2'),
(8, 'user3', '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailaction`
--
ALTER TABLE `detailaction`
  ADD CONSTRAINT `detailaction_ibfk_1` FOREIGN KEY (`id_typemodul`) REFERENCES `typemodul` (`id_typemodul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailaction_ibfk_2` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modul`
--
ALTER TABLE `modul`
  ADD CONSTRAINT `modul_ibfk_1` FOREIGN KEY (`id_typemodul`) REFERENCES `typemodul` (`id_typemodul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privilage`
--
ALTER TABLE `privilage`
  ADD CONSTRAINT `privilage_ibfk_1` FOREIGN KEY (`id_detailaction`) REFERENCES `detailaction` (`id_detailaction`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `privilage_ibfk_2` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id_modul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `privilage_ibfk_3` FOREIGN KEY (`id_usergroup`) REFERENCES `usergroup` (`id_usergroup`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_usergroup`) REFERENCES `usergroup` (`id_usergroup`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
