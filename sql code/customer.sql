-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2019 at 12:36 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `username` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `country` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `street` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `province` varchar(80) NOT NULL,
  `postal_code` varchar(80) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `email`, `country`, `password`, `street`, `name`, `province`, `postal_code`) VALUES
('user1', 'user@gmail.com', 'canada', '1a1dc91c907325c69271ddf0c944bc72', 'john street', 'user', 'ontario', 'l3s1j1'),
('user2', 'a@gmail.com', 'canada', '5f4dcc3b5aa765d61d8327deb882cf99', 'jo street', 'user2', 'ontario', 'l3s4w4'),
('omair', 'omair@gmail.com', 'canada', 'password', 'omair street', 'omair', 'ontario', 'l3s1j1'),
('newuser', 'otf@gmail.com', 'otf', 'otf', 'otf', 'otf', 'otf', 'otf'),
('newuser2', 'otf2@gmail.com', 'otff', 'otff', 'otff', 'otff', 'otff', 'otff'),
('sunil', 'sunil@gmail.com', 'sunil', 'sunil', 'sunil', 'sunil', 'sunil', 'sunil');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
