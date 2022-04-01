-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2020 at 01:20 PM
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
(34, 62, 'Apples', 'green ', '5', 'static', '5', '0', '', '', '', 'Fruit', '1', '80', 'Pallets', 'fancy', 'Uneaten', 'medium', '12', '', -1, -1, '-1', 'DustyCar', '76.217.175.77'),
(35, 62, 'car', 'corvette', '100', 'static', '100', '4', '1', '3', '7', '', '1', '1', 'lot', '', 'Used', '', '', '', -1, -1, '-1', 'DustyCar', '76.217.175.77'),
(33, 52, 'The theater thug', 'A tv show is worth its weight in gold', '12', 'static', '12', '2', '12', '31', '19', '', '3', '12', '', '', '', '', '', 'jordan, halaby, is, the, best', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(30, 46, 'Bicycle', 'with training wheels', '5', 'static', '5', '3', '0', '', '', 'personal transportation', '1', '1', 'lot', 'Shwinn', 'old', '24', '12', '', -1, -1, '-1', 'DustyCar', '76.217.175.77'),
(26, 43, 'sequence test', 'this is sublime', '11', 'static', '12', '1', '4', '8', '', '', '2', '2', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '174.230.9.220'),
(31, 46, 'car', 'Ugly car to start you Uber Career', '100', 'static', '25', '4', '1', '1', '1', '', '1', '1', '', 'fancy', 'almost new', 'regular', '438,000 lbs', '', -1, -1, '-1', 'DustyCar', '76.217.175.77'),
(28, 42, 'May the Fourth be with you', 'The fourth lot in this catalog is the be3st', '12', 'static', '12', '3', '7', '19', '', '', '4', '89', '', '', '', '', '', 'just,for,test', -1, -1, '-1', 'jhalaby', '68.188.165.106'),
(24, 42, 'Should be good to go', 'let\'s try this sucker out', '12', 'static', '12', '2', '22', '', '', '', '1', '12', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '47.26.36.90'),
(25, 42, 'Another one just to make sure', 'this is literally just for my sanity', '12', 'static', '12', '4', '1', '1', '1', '', '1', '09', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '47.26.36.90'),
(37, 52, 'Another One', 'This description doesn\'t have to be as long', '100', 'static', '7', '2', '12', '31', '21', '', '5', '99', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(38, 63, 'A', 'JJJJJJJ', '5', 'static', '5', '3', '11', '28', '13', '', '3', '1', '', 'REMMINGTON', 'LIKE NEW', '.45', '', '', -1, -1, '-1', 'DustyCar', '76.217.175.77');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
