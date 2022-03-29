-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2020 at 05:17 PM
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
-- Table structure for table `lots`
--

CREATE TABLE `lots` (
  `id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `starting_bid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `increment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bid_increment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other_category` text COLLATE utf8_unicode_ci NOT NULL,
  `lot_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `units` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lot_condition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8_unicode_ci NOT NULL,
  `current_bid` int(11) NOT NULL,
  `closed` int(11) NOT NULL,
  `winner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lots`
--

INSERT INTO `lots` (`id`, `catalog_id`, `name`, `description`, `starting_bid`, `increment_type`, `bid_increment`, `category1`, `category2`, `category3`, `category4`, `other_category`, `lot_location`, `quantity`, `units`, `brand`, `lot_condition`, `size`, `weight`, `tags`, `current_bid`, `closed`, `winner`, `owner`, `ip_address`) VALUES
(19, 35, 'To test an update of a lot is to update the lot', 'I don\'t know what that means, but i buy it fully', '12', 'static', '12', '3', '11', '29', '15', '', '1', '12', 'units_whaaat', 'probably ford', 'picture perfect', 'huuuge', 'this mf is heavy', 'jordan,is,responsible,for,this', -1, -1, '-1', 'jhalaby', '47.26.36.90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
