-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 12, 2021 at 03:24 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emails`
--

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(320) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`ID`, `email`, `date`) VALUES
(14, 'mariscinis@gmail.com', '2021-03-10 21:14:52'),
(15, 'fukuchi@aol.com', '2007-11-22 11:30:18'),
(16, 'burniske@verizon.net', '2016-11-19 16:40:59'),
(17, 'guialbu@sbcglobal.net', '2019-10-23 11:29:32'),
(18, 'ehood@gmail.com', '2008-11-21 10:48:49'),
(19, 'dougj@gmail.com', '2017-10-26 19:21:30'),
(20, 'parrt@gmail.com', '2006-10-23 19:10:44'),
(21, 'jfriedl@att.net', '2005-12-10 16:37:35'),
(22, 'mschilli@yahoo.ca', '2015-12-14 19:15:51'),
(23, 'stern@optonline.net', '2017-12-20 21:23:36'),
(25, 'flaviog@aol.com', '2007-12-21 12:32:22'),
(26, 'emmanuel@yahoo.com', '2006-12-26 20:49:48'),
(27, 'redingtn@hotmail.com', '2006-11-12 14:24:11'),
(30, 'dkrishna@att.net', '2015-11-26 23:23:47'),
(31, 'sopwith@msn.com', '2009-11-21 23:44:11'),
(32, 'ajlitt@sbcglobal.net', '2011-10-10 17:44:13'),
(33, 'demmel@gmail.com', '2006-10-22 20:48:53'),
(34, 'tubesteak@msn.com', '2009-11-29 14:45:32'),
(35, 'moonlapse@yahoo.ca', '2012-10-12 20:56:38'),
(36, 'matthijs@sbcglobal.net', '2020-10-30 16:16:10'),
(38, 'garland@att.net', '2008-12-12 23:37:56'),
(39, 'alastair@optonline.net', '2005-10-29 18:39:19'),
(40, 'seasweb@optonline.net', '2007-11-13 17:28:43'),
(41, 'tbeck@outlook.com', '2011-12-14 23:20:18'),
(42, 'uraeus@verizon.net', '2007-11-17 22:45:25'),
(43, 'pplinux@outlook.com', '2020-12-21 21:13:29'),
(44, 'josephw@hotmail.com', '2018-10-14 10:11:39'),
(46, 'maarisc@inbox.lv', '2021-03-11 15:51:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
