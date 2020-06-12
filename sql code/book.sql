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
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher` varchar(80) NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `category_name` varchar(80) NOT NULL,
  `author_id` int(11) NOT NULL,
  `image` varchar(80) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `category_name` (`category_name`),
  KEY `author_id` (`author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `publisher`, `price`, `availability`, `title`, `category_name`, `author_id`, `image`) VALUES
(1, 'DC Comics', 13, 10, 'BATMAN: YEAR ONE', 'Comics', 1, 'batman.jpg'),
(2, 'Triumph Books', 20, 3, 'We The Champs: The Toronto Raptors\' Historic Run to the 2019 NBA Title', 'Sports', 2, 'raptors.jpg'),
(3, 'Marvel', 25, 8, 'The Infinity Gauntlet', 'Comics', 3, 'thanos.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
