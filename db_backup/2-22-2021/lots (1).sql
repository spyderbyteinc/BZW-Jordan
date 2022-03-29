-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2021 at 12:37 PM
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
  `reserve_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other_category` text COLLATE utf8_unicode_ci NOT NULL,
  `lot_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured_lot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allow_freeze` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `units` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lot_condition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8_unicode_ci NOT NULL,
  `internal_notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `current_bid` int(11) NOT NULL,
  `closed` int(11) NOT NULL,
  `winner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lots`
--

INSERT INTO `lots` (`id`, `catalog_id`, `name`, `description`, `starting_bid`, `increment_type`, `bid_increment`, `reserve_amount`, `category1`, `category2`, `category3`, `category4`, `other_category`, `lot_location`, `featured_lot`, `allow_freeze`, `quantity`, `units`, `brand`, `lot_condition`, `size`, `weight`, `tags`, `internal_notes`, `current_bid`, `closed`, `winner`, `owner`, `ip_address`) VALUES
(34, 62, 'Apples', 'green ', '5', 'static', '5', '0', '0', '', '', '', 'Fruit', '2', '', '', '80', 'Pallets', 'fancy', 'Uneaten', 'medium', '12', '', '', -1, -1, '-1', 'DustyCar', '76.217.175.77'),
(35, 62, 'car', 'corvette', '100', 'static', '100', '0', '4', '1', '3', '7', '', '1', '', '', '1', 'lot', '', 'Used', '', '', '', '', -1, -1, '-1', 'DustyCar', '76.217.175.77'),
(33, 52, 'The theater thug', 'A tv show is worth its weight in gold', '12', 'static', '12', '0', '2', '12', '31', '19', '', '2', '', '', '12', '', '', '', '', '', 'jordan, halaby, is, the, best', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(30, 46, 'Bicycle', 'with training wheels', '5', 'static', '5', '0', '3', '0', '', '', 'personal transportation', '1', '', '', '1', 'lot', 'Shwinn', 'old', '24', '12', '', '', -1, -1, '-1', 'DustyCar', '76.217.175.77'),
(26, 43, 'sequence test', 'this is sublime', '11', 'static', '12', '0', '1', '4', '8', '', '', '2', '', '', '2', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '174.230.9.220'),
(31, 46, 'car', 'Ugly car to start you Uber Career', '100', 'static', '25', '0', '4', '1', '1', '1', '', '1', '', '', '1', '', 'fancy', 'almost new', 'regular', '438,000 lbs', '', '', -1, -1, '-1', 'DustyCar', '76.217.175.77'),
(28, 42, 'May the Fourth be with you', 'The fourth lot in this catalog is the be3st', '12', 'static', '12', '0', '3', '7', '19', '', '', '4', '', '', '89', '', '', '', '', '', 'just,for,test', '', -1, -1, '-1', 'jhalaby', '68.188.165.106'),
(24, 42, 'Should be good to go', 'let\'s try this sucker out', '12', 'static', '12', '0', '2', '22', '', '', '', '1', '', '', '12', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '47.26.36.90'),
(25, 42, 'Another one just to make sure', 'this is literally just for my sanity', '12', 'static', '12', '0', '4', '1', '1', '1', '', '1', '', '', '09', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '47.26.36.90'),
(39, 52, 'The theater thug - Jordan is the copier', 'Another one bites the dust', '12', 'static', '12', '0', '2', '12', '31', '19', '', '2', '', '', '12', '', '', '', '', '', 'jordan,halaby,is,the,best', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(40, 52, 'I am done with this feature', 'This description doesn\'t have to be as long', '100', 'static', '7', '0', '4', '0', '', '', 'Big CAR', '2', '', '', '99', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(37, 52, 'Another One', 'This description doesn\'t have to be as long', '100', 'static', '7', '0', '4', '0', '', '', 'Big CAR', '1', 'yes', 'yes', '99', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(38, 63, 'A', 'JJJJJJJ', '5', 'static', '5', '0', '3', '11', '28', '13', '', '3', '', '', '1', '', 'REMMINGTON', 'LIKE NEW', '.45', '', '', '', -1, -1, '-1', 'DustyCar', '76.217.175.77'),
(41, 52, 'Internal Notes Test', 'Jordan was here to test the internal notes feature', '123', 'static', '12', '0', '3', '8', '0', '', 'Couches', '1', '', '', '123', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(42, 52, 'Another Internal Notes', 'This is to test the internal notes feature x2', '100', 'static', '12', '0', '1', '5', '12', '', '', '1', '', '', '12', 'Boxes', '', 'New', '', '', '', 'The internal notes for a given lot is displayed here. And this sentence is an update to the internal notes', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(43, 52, 'I put the offer out', 'This is to test the internal notes feature x2', '100', 'static', '12', '0', '1', '5', '12', '', '', '1', '', '', '12', 'Boxes', '', 'New', '', '', '', 'The internal notes for a given lot is displayed here. And this sentence is an update to the internal notes. Jordan wass totally here', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(44, 54, 'Jordan\'s Cookies', 'All cookie everything', '12', 'static', '12', '0', '1', '0', '', '', 'cookies!', '1', 'yes', 'no', '12', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(45, 54, 'The Greatest Catalog', 'It will never be enough', '12', 'static', '12', '0', '4', '1', '1', '0', 'jordan\'s vehicle', '2', 'yes', 'yes', '12', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(46, 54, 'fds', 'afsd', '12', 'static', '12', '0', '0', '', '', '', 'adfs', '2', 'yes', 'no', '12', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(47, 54, 'Maybe this will do the trick', 'zsfasdc', '12', 'static', '12', '0', '0', '', '', '', 'afds', '2', 'yes', 'no', '1', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(48, 54, 'What We\'ve Become', 'A place for us', '12', 'static', '12', '234', '0', '', '', '', 'asfd', '2', 'yes', 'no', '12', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(49, 52, 'Another One', 'Autofill needs to be turned on for specific fields', '12', 'static', '12', '12', '2', '14', '', '', '', '1', 'yes', 'yes', '12', '12', '12', '12', '12', '12', 'yes,no,maybe,so', 'no notes for me', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(50, 61, 'Assorted Books', 'There is a list of books in which I\'d like to read', '12', 'static', '12', '12', '3', '0', '', '', 'Books', '6', 'yes', 'yes', '21', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(51, 65, 'Almost Done with Selling!!', 'selling has proven to be more taxing than previously assessed', '12', 'static', '12', '12', '1', '4', '8', '', '', '1', 'no', 'yes', '12', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(52, 64, 'This lot is the best', 'afsdz', '123', 'static', '123', '0', '0', '', '', '', 'TACOS', '2', 'yes', 'no', '12', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(53, 64, 'adsfd', 'adfsfzc', '12', 'static', '12', '123', '0', '', '', '', 'ads', '2', 'no', 'no', '12', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(54, 68, 'Test 1', 'This is a test of missing locations', '123', 'static', '123', '12', '2', '19', '', '', '', '2', 'no', 'yes', '12', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77'),
(55, 68, 'TEST 2', 'This is a second test for missing locations', '12', 'static', '12', '0', '2', '23', '39', '', '', '2', 'yes', 'yes', '12', '', '', '', '', '', '', '', -1, -1, '-1', 'jhalaby', '76.217.175.77');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
