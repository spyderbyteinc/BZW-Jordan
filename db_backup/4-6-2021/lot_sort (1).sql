-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2021 at 01:11 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jhalaby_bidzwon`
--

-- --------------------------------------------------------

--
-- Table structure for table `lot_sort`
--

CREATE TABLE `lot_sort` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sequence` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lot_sort`
--

INSERT INTO `lot_sort` (`id`, `cat_id`, `sequence`) VALUES
(2, '42', '||28||27||24||25||'),
(3, '43', '||26||'),
(4, '44', '||'),
(5, '45', '||29||'),
(6, '46', '||30||31||'),
(7, '47', '||'),
(8, '48', '||'),
(9, '49', '||'),
(10, '50', '||'),
(11, '51', '||'),
(12, '52', '||37||33||39||40||41||42||43||49||'),
(13, '53', '||'),
(14, '54', '||44||45||46||47||48||'),
(15, '55', '||'),
(16, '56', '||'),
(17, '57', '||'),
(18, '58', '||'),
(19, '59', '||'),
(20, '60', '||'),
(21, '61', '||50||'),
(22, '62', '||34||35||'),
(23, '63', '||38||'),
(24, '64', '||52||53||'),
(25, '65', '||51||'),
(26, '66', '||'),
(27, '67', '||'),
(28, '68', '||54||55||'),
(29, '0', '||'),
(30, '69', '||'),
(31, '70', '||');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lot_sort`
--
ALTER TABLE `lot_sort`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lot_sort`
--
ALTER TABLE `lot_sort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
