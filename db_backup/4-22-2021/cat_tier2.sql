-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2021 at 03:36 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.27

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
-- Table structure for table `cat_tier2`
--

CREATE TABLE `cat_tier2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_tier2`
--

INSERT INTO `cat_tier2` (`id`, `name`, `parent`) VALUES
(1, 'Automotive - Cars, Trucks & Motorcycles', 4),
(2, 'Automotive - Repair & Equipment', 4),
(3, 'Commercial Trucks & Trailers', 4),
(4, 'Agricultural', 1),
(5, 'Commercial', 1),
(6, 'Residential', 1),
(7, 'Appliances', 3),
(8, 'Furniture', 3),
(9, 'Clothing, Shoes & Accessories', 3),
(10, 'Media', 3),
(11, 'Weapons', 3),
(12, 'Agricultural Equipment', 2),
(13, 'Commercial Trucks & Trailers', 2),
(14, 'Construction & Demolition Equipment', 2),
(15, 'Fabrication & Metalworking Equipment', 2),
(16, 'Food, Beverage & Restaurant Equipment', 2),
(17, 'Laboratory Equipment', 2),
(18, 'Materials & Minerals', 2),
(19, 'MRO', 2),
(20, 'Printing & Publishing Equipment', 2),
(21, 'Tools, Shop Support & Equipment', 2),
(22, 'Tool Storage ', 2),
(23, 'Lifting Equipment', 2),
(24, 'Woodworking Equipment', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_tier2`
--
ALTER TABLE `cat_tier2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_tier2`
--
ALTER TABLE `cat_tier2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
