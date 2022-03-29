-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2020 at 05:18 PM
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
-- Table structure for table `lot_picture_order`
--

CREATE TABLE `lot_picture_order` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `sequence` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lot_picture_order`
--

INSERT INTO `lot_picture_order` (`id`, `cat_id`, `lot_id`, `sequence`) VALUES
(2, 30, 11, '||115||116||117||118||119||'),
(3, 32, 7, '||132||133||130||136||131||134||'),
(4, 32, 8, '||139||138||'),
(5, 32, 15, '||'),
(6, 35, 19, '||140||143||141||142||144||145||146||147||148||149||');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lot_picture_order`
--
ALTER TABLE `lot_picture_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lot_picture_order`
--
ALTER TABLE `lot_picture_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
