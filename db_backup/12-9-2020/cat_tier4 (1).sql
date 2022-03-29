-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2020 at 01:19 PM
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
-- Table structure for table `cat_tier4`
--

CREATE TABLE `cat_tier4` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_tier4`
--

INSERT INTO `cat_tier4` (`id`, `name`, `parent`) VALUES
(1, 'Cars', 1),
(2, 'Trucks', 1),
(3, 'Motorcycles', 1),
(4, 'Cars', 2),
(5, 'Trucks', 2),
(6, 'Motorcycles', 2),
(7, 'Cars', 3),
(8, 'Trucks', 3),
(9, 'Motorcycles', 3),
(10, 'Collectible Books & Magazines', 23),
(11, 'Ammunition', 28),
(12, 'Long Guns', 28),
(13, 'Hand Guns', 28),
(14, 'Antique & Collectible Guns', 28),
(15, 'Arrows & Bolts', 29),
(16, 'Accessories', 29),
(17, 'Compound & Recurve Bows', 29),
(18, 'Crossbows', 29),
(19, 'Tractors & Implements', 31),
(20, 'Irrigation Equipment', 31),
(21, 'Harvesting Equipment', 31),
(23, 'Lawn Care Equipment', 32),
(24, 'Power Tools', 32),
(25, 'Forestry Equipment & Tools', 32),
(26, 'Livestock', 34),
(27, 'Support Equipment', 34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_tier4`
--
ALTER TABLE `cat_tier4`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_tier4`
--
ALTER TABLE `cat_tier4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
