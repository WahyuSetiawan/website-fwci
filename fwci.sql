-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2014 at 05:05 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(7, 'Add', 'add'),
(8, 'Update', 'update'),
(9, 'Delete', 'delete');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `detailaction`
--

INSERT INTO `detailaction` (`id_detailaction`, `id_typemodul`, `id_action`) VALUES
(1, 5, 7),
(3, 5, 8),
(4, 5, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `modul`, `class`, `id_typemodul`) VALUES
(2, 'User', 'user', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `privilage`
--

INSERT INTO `privilage` (`id_privilage`, `id_modul`, `id_detailaction`, `id_usergroup`, `status`) VALUES
(25, 2, 1, 1, '1'),
(26, 2, 3, 1, '1'),
(27, 2, 4, 1, '1'),
(28, 2, 1, 2, '1'),
(29, 2, 3, 2, '1'),
(30, 2, 4, 2, '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `typemodul`
--

INSERT INTO `typemodul` (`id_typemodul`, `typemodul`) VALUES
(5, 'Master');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id_usergroup` int(11) NOT NULL AUTO_INCREMENT,
  `usergroup` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id_usergroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id_usergroup`, `usergroup`, `parent`) VALUES
(1, 'root', 1),
(2, 'administrator', 2);

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
