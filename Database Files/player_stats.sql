-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2015 at 04:27 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ewuscbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `player stats`
--

CREATE TABLE IF NOT EXISTS `player stats` (
  `First Name` text,
  `Last Name` text,
  `Games Played` int(11) DEFAULT NULL,
  `Points` int(11) DEFAULT NULL,
  `FGM` int(11) DEFAULT NULL,
  `FGA` int(11) DEFAULT NULL,
  `3PM` int(11) DEFAULT NULL,
  `3PA` int(11) DEFAULT NULL,
  `FTM` int(11) DEFAULT NULL,
  `FTA` int(11) DEFAULT NULL,
  `Assists` int(11) DEFAULT NULL,
  `Steals` int(11) DEFAULT NULL,
  `Rebounds` int(11) DEFAULT NULL,
  `Blocks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player stats`
--

INSERT INTO `player stats` (`First Name`, `Last Name`, `Games Played`, `Points`, `FGM`, `FGA`, `3PM`, `3PA`, `FTM`, `FTA`, `Assists`, `Steals`, `Rebounds`, `Blocks`) VALUES
('Tom', 'Capaul', 81, 1955, 681, 1500, 269, 653, 324, 359, 286, 105, 332, 16),
('Tom', 'Capaul', 81, 1955, 681, 1500, 269, 653, 324, 359, 286, 105, 332, 16),
('Rick', 'Allen', 50, 504, 70, 406, 103, 907, 55, 84, 1164, 102, 16, 1),
('Muggsy', 'Bogues', 82, 730, 671, 2, 27, 94, 120, 743, 170, 235, 6, 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
