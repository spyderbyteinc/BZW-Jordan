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
-- Table structure for table `cat_tier3`
--

CREATE TABLE `cat_tier3` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_tier3`
--

INSERT INTO `cat_tier3` (`id`, `name`, `parent`) VALUES
(1, 'Classic Automotive', 1),
(2, 'Custom Automotive', 1),
(3, 'General Automotive', 1),
(4, 'Diagnostic Tools & Equipment', 2),
(5, 'Body, Chassis, Interior Trim Equipment', 2),
(6, 'Engine, Transmission, Driveline', 2),
(7, 'Shop Tools, Equipment & Storage', 2),
(8, 'Farm Land', 4),
(9, 'Forest & Logging', 4),
(10, 'Hotel, Motel, Bed & Breakfast', 5),
(11, 'Industrial Space', 5),
(12, 'Office Space', 5),
(13, 'Restaurant', 5),
(14, 'Retail Space', 5),
(15, 'Storage Space', 5),
(16, 'Condominiums', 6),
(17, 'Investment Property', 6),
(18, 'Single Family Housing', 6),
(19, 'Large Appliances', 7),
(20, 'Small Appliances', 7),
(21, 'Household Furniture', 8),
(22, 'Office Furniture', 8),
(23, 'Books & Magazines', 10),
(24, 'Music', 10),
(25, 'Textbooks', 10),
(26, 'Video Games & Consoles', 10),
(27, 'Movies & Players', 10),
(28, 'Firearms', 11),
(29, 'Archery', 11),
(30, 'Knives', 11),
(31, 'Farming', 12),
(32, 'Landscaping & Lawncare', 12),
(33, 'Horticultural Equipment', 12),
(34, 'Equestrian, Ranching & Livestock', 12),
(35, 'Metals', 18),
(36, 'Plastics', 18),
(37, 'Rare Earth', 18),
(38, 'Cranes', 23),
(39, 'Forklifts', 23),
(40, 'Jib & Gantry', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_tier3`
--
ALTER TABLE `cat_tier3`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_tier3`
--
ALTER TABLE `cat_tier3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
