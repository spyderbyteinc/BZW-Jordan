-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2021 at 05:21 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.28

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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IP_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `type`, `IP_address`) VALUES
(84, 'northcoast_n', 'steve@bidzwon.com', '4e66f7ddd20a112597b1b9f083d517c5', 'Steve', 'Halaby', 'seller', '76.217.175.77'),
(85, 'Doggie', 'steve@spyderbyte.co', '7164eb030556b4c0bb03b96e09580572', 'Bentley', 'Halaby', 'house', '76.217.175.77'),
(83, 'jhalaby', 'jhalaby@emich.edu', '71603a2a25ec0996e665467cc270db97', 'Jordan', 'Halaby', 'seller', '76.217.175.77'),
(94, 'billy', 'billy@bill.com', '900150983cd24fb0d6963f7d28e17f72', 'h', 'jl', 'buyer', '76.217.175.77'),
(88, 'jhab2', 'jordan@bidzwon.com', 'd16d377af76c99d27093abc22244b342', 'Uwe', 'Kind', 'buyer', '47.26.36.90'),
(90, 'billybob', 'billybob@yahoo.com', '71603a2a25ec0996e665467cc270db97', 'Billy', 'Bob', 'seller', '174.233.63.20'),
(91, 'DustyCar', 's_halaby1@yahoo.com', '09e7d4c7ed87c53f5139f5c55d8661e8', 'Steve', 'Halaby', 'seller', '75.130.196.238'),
(93, 'skippy', 'stevehalaby1@gmail.com', '09e7d4c7ed87c53f5139f5c55d8661e8', 'Steve', 'Halaby', 'buyer', '76.217.175.77'),
(95, 'bentley', 'doggie@frnk.com', '06d80eb0c50b49a509b49f2424e8c805', 'bentley', 'Halaby', 'house', '76.217.175.77'),
(132, 'another', 'another@another.com', 'b32d73e56ec99bc5ec8f83871cde708a', 'Another', 'Test', 'house', '47.26.37.178'),
(123, 'Fishstick', 'fishstick@spyderbyteinc.com', '6050eb18fbbec7fa1d1d21a86c1916d6', 'Fish', 'Stick', 'house', '76.217.175.77'),
(121, 'mgk', 'mgk@spotify.com', '0e14d45c430806127d2a4a85dd419a85', 'MachineGun', 'Kelly', 'buyer', '76.217.175.77'),
(120, 'bigtony', 'bigtony@yahoo.com', 'afae32efe0f84fece3f96b377b768b33', 'Big', 'Tony', 'buyer', '76.217.175.77'),
(131, 'snake', 'snake@bidzwon.com', 'de1b2a7baf7850243db71c4abd4e5a39', 'Jake', 'TheSnake', 'house', '174.230.12.71'),
(130, 'house', 'house@bidzwon.com', '2ca63cddd54f9490efad22421891a9d1', 'Jordan', 'House', 'house', '174.230.17.138'),
(129, 'daduck', 'ducky@bolton.com', '56975b83de847aa2ee9b2493b6c4bd8f', 'Daffy', 'Duck', 'seller', '76.217.175.77');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(11) NOT NULL,
  `catalog_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auction_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `charity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catalog_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `start_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` date NOT NULL,
  `end_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_increment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `house_list` text COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_premium` float NOT NULL,
  `allow_freeze` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `asset_location_1` text COLLATE utf8_unicode_ci NOT NULL,
  `asset_location_2` text COLLATE utf8_unicode_ci NOT NULL,
  `asset_location_3` text COLLATE utf8_unicode_ci NOT NULL,
  `asset_location_4` text COLLATE utf8_unicode_ci NOT NULL,
  `asset_location_5` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_1` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_2` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_3` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_4` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_5` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_6` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_7` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_8` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_9` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_10` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_1` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_2` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_3` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_4` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_5` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_6` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_7` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_8` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_9` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_10` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_1` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_2` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_3` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_4` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_5` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_6` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_7` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_8` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_9` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_10` text COLLATE utf8_unicode_ci NOT NULL,
  `question_1` text COLLATE utf8_unicode_ci NOT NULL,
  `question_2` text COLLATE utf8_unicode_ci NOT NULL,
  `question_3` text COLLATE utf8_unicode_ci NOT NULL,
  `question_4` text COLLATE utf8_unicode_ci NOT NULL,
  `question_5` text COLLATE utf8_unicode_ci NOT NULL,
  `question_6` text COLLATE utf8_unicode_ci NOT NULL,
  `question_7` text COLLATE utf8_unicode_ci NOT NULL,
  `question_8` text COLLATE utf8_unicode_ci NOT NULL,
  `question_9` text COLLATE utf8_unicode_ci NOT NULL,
  `question_10` text COLLATE utf8_unicode_ci NOT NULL,
  `terms_conditions` longtext COLLATE utf8_unicode_ci NOT NULL,
  `inspection_notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `removal_notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `extended_bidding` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extended_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extended_time_remaining` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extended_minutes_jump` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extended_minutes_increment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bid_increment` int(11) NOT NULL,
  `times_the_bid` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IP_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` int(11) NOT NULL,
  `preview` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `catalog_name`, `auction_type`, `charity`, `catalog_description`, `start_date`, `start_time`, `end_date`, `end_time`, `end_increment`, `house_list`, `currency`, `timezone`, `buyer_premium`, `allow_freeze`, `asset_location_1`, `asset_location_2`, `asset_location_3`, `asset_location_4`, `asset_location_5`, `inspection_1`, `inspection_2`, `inspection_3`, `inspection_4`, `inspection_5`, `inspection_6`, `inspection_7`, `inspection_8`, `inspection_9`, `inspection_10`, `removal_1`, `removal_2`, `removal_3`, `removal_4`, `removal_5`, `removal_6`, `removal_7`, `removal_8`, `removal_9`, `removal_10`, `contact_1`, `contact_2`, `contact_3`, `contact_4`, `contact_5`, `contact_6`, `contact_7`, `contact_8`, `contact_9`, `contact_10`, `question_1`, `question_2`, `question_3`, `question_4`, `question_5`, `question_6`, `question_7`, `question_8`, `question_9`, `question_10`, `terms_conditions`, `inspection_notes`, `removal_notes`, `extended_bidding`, `extended_type`, `extended_time_remaining`, `extended_minutes_jump`, `extended_minutes_increment`, `bid_increment`, `times_the_bid`, `owner`, `IP_address`, `published`, `preview`) VALUES
(85, 'Textbooks Galore', 'timed', 'no', '<p>I have a lot of textbooks that I\'m willing to sell</p>', '2021-10-13', '2115', '2021-11-25', '2230', '10', '||92||93||', 'USD', 'EST', 15, 'yes', '1??||&&5270 Mt. Maria??||&&-1??||&&Hubbard Lake??||&&MI??||&&US', '2??||&&1600 Pennsylvania Avenue??||&&-1??||&&Washington DC??||&&DC??||&&US', '3??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '1??||&&08/06/2021??||&&-1??||&&0000??||&&1200??||&&1', '2??||&&08/04/2021??||&&-1??||&&0030??||&&0115??||&&2', '3??||&&08/04/2021??||&&08/24/2021??||&&0030??||&&0115??||&&2', '4??||&&08/06/2021??||&&-1??||&&0030??||&&0315??||&&2', '5??||&&08/27/2021??||&&-1??||&&0100??||&&0100??||&&2', '-1', '-1', '-1', '-1', '-1', '1??||&&12/01/2021??||&&12/01/2021??||&&0115??||&&0315??||&&1', '2??||&&11/30/2021??||&&12/31/2021??||&&0100??||&&0400??||&&2', '3??||&&12/08/2021??||&&12/28/2021??||&&0145??||&&0315??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&bobbybrown??||&&555??||&&2', '2??||&&lara_gene??||&&9991??||&&3', '3??||&&bobby??||&&5505??||&&2', '4??||&&emily??||&&45w??||&&2', '5??||&&bobby??||&&555??||&&1', '6??||&&jerryr??||&&123??||&&2', '7??||&&jeff??||&&123??||&&2', '-1', '-1', '-1', '1??||&&What is your name?', '2??||&&What is your favorite color?', '3??||&&What is your occupation?', '4??||&&Do you like to go to the bookstore?', '5??||&&What is your favorite hobby?', '6??||&&Do you play video games?', '-1', '-1', '-1', '-1', '<ul><li>I</li><li>Think</li><li>This</li><li>Will</li><li>Suffice</li></ul>', '<p><br></p>', '<p><br></p>', 'no', '', '', '', '', 12, 'yes', 'jhalaby', '47.26.37.178', 1, 0),
(94, 'Steve\'s Garage', 'timed', 'no', '<p>This is a list of my garage</p><ul><li>wrenches</li><li>gadgets</li><li>and more</li></ul>', '2021-10-27', '0100', '2021-10-30', '1200', '15', '||', 'USD', 'EST', 7, 'yes', '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '1??||&&08/19/2021??||&&-1??||&&0015??||&&0015??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&11/17/2021??||&&11/17/2021??||&&0015??||&&0200??||&&1', '2??||&&11/17/2021??||&&11/26/2021??||&&0100??||&&0400??||&&1', '3??||&&12/08/2021??||&&12/28/2021??||&&0145??||&&0315??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&Who is the singer?', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '<ul><li>helllo</li><li>world</li></ul>', '<p><br></p>', '<p><br></p>', 'yes', 'increment', '10', '', '10', 10, 'no', 'jhalaby', '76.217.175.77', 1, 1),
(95, 'Cars that go fast', 'timed', 'no', '<p>Cars are essential to people to go places</p>', '2021-09-22', '2045', '2021-10-20', '0345', '20', '||', 'USD', 'EST', 9, 'yes', '2??||&&1600 Pennsylvania Avenue??||&&-1??||&&Washington DC??||&&DC??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&11/30/2021??||&&-1??||&&0015??||&&0215??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&What is your favorite band', '2??||&&What kind of car do you have', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '<p>what are we made for</p>', '<p><br></p>', '<p><br></p>', 'yes', 'jump', '10', '10', '', 12, 'no', 'jhalaby', '47.26.37.178', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `catalog_pictures`
--

CREATE TABLE `catalog_pictures` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog_pictures`
--

INSERT INTO `catalog_pictures` (`id`, `cat_id`, `picture`) VALUES
(2, 42, '1601160294haters.jpg'),
(3, 43, '1598021119birthday.jpg'),
(4, 45, '1601159425haters.jpg'),
(5, 52, '1604526188jordan.jpeg'),
(6, 54, '1604526706haters.jpg'),
(7, 61, '1606091426journey_continues.png'),
(8, 62, '1609303681phteven1.jpg'),
(9, 63, '1609303733flag2.png'),
(10, 67, '1612149649briggs-stratton-inverter-generatorQ6500.jpg'),
(11, 72, '1620698036try 3.png'),
(12, 85, '1631744556books_2.jpg'),
(13, 94, '1631744793tools_7.jpg'),
(14, 95, '1631744883cars_17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_status`
--

CREATE TABLE `catalog_status` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog_status`
--

INSERT INTO `catalog_status` (`id`, `cat_id`, `status`, `time`) VALUES
(2, 79, 'staging', '2021-04-26 14:22:26'),
(3, 52, 'open', '2021-04-26 14:27:03'),
(4, 54, 'open', '2021-04-26 14:27:03'),
(5, 61, 'open', '2021-04-26 14:27:03'),
(6, 64, 'staging', '2021-04-26 14:27:03'),
(7, 65, 'cancel', '2021-05-06 18:50:21'),
(8, 66, 'open', '2021-04-26 14:27:03'),
(9, 68, 'cancel', '2021-05-06 19:29:30'),
(10, 69, 'cancel', '2021-05-06 18:58:25'),
(11, 70, 'cancel', '2021-05-06 19:29:42'),
(12, 72, 'staging', '2021-04-26 14:27:03'),
(13, 73, 'cancel', '2021-05-06 19:29:48'),
(14, 74, 'staging', '2021-04-26 14:27:03'),
(15, 75, 'cancel', '2021-05-06 19:29:37'),
(16, 76, 'staging', '2021-04-26 14:27:03'),
(17, 77, 'staging', '2021-04-26 14:27:03'),
(19, 78, 'staging', '2021-05-06 18:50:03'),
(20, 80, 'staging', '2021-05-09 21:36:54'),
(21, 81, 'staging', '2021-05-09 21:58:36'),
(22, 82, 'staging', '2021-05-18 14:08:04'),
(23, 83, 'staging', '2021-05-18 14:10:45'),
(24, 84, 'staging', '2021-05-21 18:52:11'),
(25, 85, 'staging', '2021-08-06 13:06:09'),
(26, 86, 'staging', '2021-06-01 13:34:49'),
(27, 87, 'staging', '2021-06-06 14:59:51'),
(28, 88, 'staging', '2021-06-06 15:01:53'),
(29, 89, 'staging', '2021-06-07 14:32:13'),
(30, 90, 'staging', '2021-06-09 15:39:59'),
(31, 91, 'staging', '2021-06-14 14:17:09'),
(32, 92, 'staging', '2021-06-30 15:55:43'),
(33, 93, 'staging', '2021-07-28 17:22:58'),
(34, 94, 'staging', '2021-08-28 15:51:02'),
(35, 95, 'staging', '2021-08-30 13:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `cat_tier1`
--

CREATE TABLE `cat_tier1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_tier1`
--

INSERT INTO `cat_tier1` (`id`, `name`) VALUES
(1, 'Land & Real Estate'),
(2, 'Industrial'),
(3, 'Personal Property'),
(4, 'Transportation');

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
(27, 'Support Equipment', 34),
(29, 'Horses', 34);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_code`, `phone_code`) VALUES
(1, 'United States', 'US', '1'),
(2, 'Afghanistan', 'AF', '93'),
(3, 'Albania', 'AL', '355'),
(4, 'Algeria', 'DZ', '213'),
(5, 'American Samoa', 'AS', '1-684'),
(6, 'Andorra', 'AD', '376'),
(7, 'Angola', 'AO', '244'),
(8, 'Anguilla', 'AI', '1-264'),
(9, 'Antarctica', 'AQ', '672'),
(10, 'Antigua and Barbuda', 'AG', '1-268'),
(11, 'Argentina', 'AR', '54'),
(12, 'Armenia', 'AM', '374'),
(13, 'Aruba', 'AW', '297'),
(14, 'Australia', 'AU', '61'),
(15, 'Austria', 'AT', '43'),
(16, 'Azerbaijan', 'AZ', '994'),
(17, 'Bahamas', 'BS', '1-242'),
(18, 'Bahrain', 'BH', '973'),
(19, 'Bangladesh', 'BD', '880'),
(20, 'Barbados', 'BB', '1-246'),
(21, 'Belarus', 'BY', '375'),
(22, 'Belgium', 'BE', '32'),
(23, 'Belize', 'BZ', '501'),
(24, 'Benin', 'BJ', '229'),
(25, 'Bermuda', 'BM', '1-441'),
(26, 'Bhutan', 'BT', '975'),
(27, 'Bolivia', 'BO', '591'),
(28, 'Bosnia and Herzegovina', 'BA', '387'),
(29, 'Botswana', 'BW', '267'),
(30, 'Brazil', 'BR', '55'),
(31, 'British Indian Ocean Territory', 'IO', '246'),
(32, 'British Virgin Islands', 'VG', '1-284'),
(33, 'Brunei', 'BN', '673'),
(34, 'Bulgaria', 'BG', '359'),
(35, 'Burkina Faso', 'BF', '226'),
(36, 'Burundi', 'BI', '257'),
(37, 'Cambodia', 'KH', '855'),
(38, 'Cameroon', 'CM', '237'),
(39, 'Canada', 'CA', '1'),
(40, 'Cape Verde', 'CV', '238'),
(41, 'Cayman Islands', 'KY', '1-345'),
(42, 'Central African Republic', 'CF', '236'),
(43, 'Chad', 'TD', '235'),
(44, 'Chile', 'CL', '56'),
(45, 'China', 'CN', '86'),
(46, 'Christmas Island', 'CX', '61'),
(47, 'Cocos Islands', 'CC', '61'),
(48, 'Colombia', 'CO', '57'),
(49, 'Comoros', 'KM', '269'),
(50, 'Cook Islands', 'CK', '682'),
(51, 'Costa Rica', 'CR', '506'),
(52, 'Croatia', 'HR', '385'),
(53, 'Cuba', 'CU', '53'),
(54, 'Curacao', 'CW', '599'),
(55, 'Cyprus', 'CY', '357'),
(56, 'Czech Republic', 'CZ', '420'),
(57, 'Democratic Republic of the Congo', 'CD', '243'),
(58, 'Denmark', 'DK', '45'),
(59, 'Djibouti', 'DJ', '253'),
(60, 'Dominica', 'DM', '1-767'),
(61, 'Dominican Republic', 'DO', '1-809, 1-829, 1-849'),
(62, 'East Timor', 'TL', '670'),
(63, 'Ecuador', 'EC', '593'),
(64, 'Egypt', 'EG', '20'),
(65, 'El Salvador', 'SV', '503'),
(66, 'Equatorial Guinea', 'GQ', '240'),
(67, 'Eritrea', 'ER', '291'),
(68, 'Estonia', 'EE', '372'),
(69, 'Ethiopia', 'ET', '251'),
(70, 'Falkland Islands', 'FK', '500'),
(71, 'Faroe Islands', 'FO', '298'),
(72, 'Fiji', 'FJ', '679'),
(73, 'Finland', 'FI', '358'),
(74, 'France', 'FR', '33'),
(75, 'French Polynesia', 'PF', '689'),
(76, 'Gabon', 'GA', '241'),
(77, 'Gambia', 'GM', '220'),
(78, 'Georgia', 'GE', '995'),
(79, 'Germany', 'DE', '49'),
(80, 'Ghana', 'GH', '233'),
(81, 'Gibraltar', 'GI', '350'),
(82, 'Greece', 'GR', '30'),
(83, 'Greenland', 'GL', '299'),
(84, 'Grenada', 'GD', '1-473'),
(85, 'Guam', 'GU', '1-671'),
(86, 'Guatemala', 'GT', '502'),
(87, 'Guernsey', 'GG', '44-1481'),
(88, 'Guinea', 'GN', '224'),
(89, 'Guinea-Bissau', 'GW', '245'),
(90, 'Guyana', 'GY', '592'),
(91, 'Haiti', 'HT', '509'),
(92, 'Honduras', 'HN', '504'),
(93, 'Hong Kong', 'HK', '852'),
(94, 'Hungary', 'HU', '36'),
(95, 'Iceland', 'IS', '354'),
(96, 'India', 'IN', '91'),
(97, 'Indonesia', 'ID', '62'),
(98, 'Iran', 'IR', '98'),
(99, 'Iraq', 'IQ', '964'),
(100, 'Ireland', 'IE', '353'),
(101, 'Isle of Man', 'IM', '44-1624'),
(102, 'Israel', 'IL', '972'),
(103, 'Italy', 'IT', '39'),
(104, 'Ivory Coast', 'CI', '225'),
(105, 'Jamaica', 'JM', '1-876'),
(106, 'Japan', 'JP', '81'),
(107, 'Jersey', 'JE', '44-1534'),
(108, 'Jordan', 'JO', '962'),
(109, 'Kazakhstan', 'KZ', '7'),
(110, 'Kenya', 'KE', '254'),
(111, 'Kiribati', 'KI', '686'),
(112, 'Kosovo', 'XK', '383'),
(113, 'Kuwait', 'KW', '965'),
(114, 'Kyrgyzstan', 'KG', '996'),
(115, 'Laos', 'LA', '856'),
(116, 'Latvia', 'LV', '371'),
(117, 'Lebanon', 'LB', '961'),
(118, 'Lesotho', 'LS', '266'),
(119, 'Liberia', 'LR', '231'),
(120, 'Libya', 'LY', '218'),
(121, 'Liechtenstein', 'LI', '423'),
(122, 'Lithuania', 'LT', '370'),
(123, 'Luxembourg', 'LU', '352'),
(124, 'Macau', 'MO', '853'),
(125, 'Macedonia', 'MK', '389'),
(126, 'Madagascar', 'MG', '261'),
(127, 'Malawi', 'MW', '265'),
(128, 'Malaysia', 'MY', '60'),
(129, 'Maldives', 'MV', '960'),
(130, 'Mali', 'ML', '223'),
(131, 'Malta', 'MT', '356'),
(132, 'Marshall Islands', 'MH', '692'),
(133, 'Mauritania', 'MR', '222'),
(134, 'Mauritius', 'MU', '230'),
(135, 'Mayotte', 'YT', '262'),
(136, 'Mexico', 'MX', '52'),
(137, 'Micronesia', 'FM', '691'),
(138, 'Moldova', 'MD', '373'),
(139, 'Monaco', 'MC', '377'),
(140, 'Mongolia', 'MN', '976'),
(141, 'Montenegro', 'ME', '382'),
(142, 'Montserrat', 'MS', '1-664'),
(143, 'Morocco', 'MA', '212'),
(144, 'Mozambique', 'MZ', '258'),
(145, 'Myanmar', 'MM', '95'),
(146, 'Namibia', 'NA', '264'),
(147, 'Nauru', 'NR', '674'),
(148, 'Nepal', 'NP', '977'),
(149, 'Netherlands', 'NL', '31'),
(150, 'Netherlands Antilles', 'AN', '599'),
(151, 'New Caledonia', 'NC', '687'),
(152, 'New Zealand', 'NZ', '64'),
(153, 'Nicaragua', 'NI', '505'),
(154, 'Niger', 'NE', '227'),
(155, 'Nigeria', 'NG', '234'),
(156, 'Niue', 'NU', '683'),
(157, 'North Korea', 'KP', '850'),
(158, 'Northern Mariana Islands', 'MP', '1-670'),
(159, 'Norway', 'NO', '47'),
(160, 'Oman', 'OM', '968'),
(161, 'Pakistan', 'PK', '92'),
(162, 'Palau', 'PW', '680'),
(163, 'Palestine', 'PS', '970'),
(164, 'Panama', 'PA', '507'),
(165, 'Papua New Guinea', 'PG', '675'),
(166, 'Paraguay', 'PY', '595'),
(167, 'Peru', 'PE', '51'),
(168, 'Philippines', 'PH', '63'),
(169, 'Pitcairn', 'PN', '64'),
(170, 'Poland', 'PL', '48'),
(171, 'Portugal', 'PT', '351'),
(172, 'Puerto Rico', 'PR', '1-787, 1-939'),
(173, 'Qatar', 'QA', '974'),
(174, 'Republic of the Congo', 'CG', '242'),
(175, 'Reunion', 'RE', '262'),
(176, 'Romania', 'RO', '40'),
(177, 'Russia', 'RU', '7'),
(178, 'Rwanda', 'RW', '250'),
(179, 'Saint Barthelemy', 'BL', '590'),
(180, 'Saint Helena', 'SH', '290'),
(181, 'Saint Kitts and Nevis', 'KN', '1-869'),
(182, 'Saint Lucia', 'LC', '1-758'),
(183, 'Saint Martin', 'MF', '590'),
(184, 'Saint Pierre and Miquelon', 'PM', '508'),
(185, 'Saint Vincent and the Grenadines', 'VC', '1-784'),
(186, 'Samoa', 'WS', '685'),
(187, 'San Marino', 'SM', '378'),
(188, 'Sao Tome and Principe', 'ST', '239'),
(189, 'Saudi Arabia', 'SA', '966'),
(190, 'Senegal', 'SN', '221'),
(191, 'Serbia', 'RS', '381'),
(192, 'Seychelles', 'SC', '248'),
(193, 'Sierra Leone', 'SL', '232'),
(194, 'Singapore', 'SG', '65'),
(195, 'Sint Maarten', 'SX', '1-721'),
(196, 'Slovakia', 'SK', '421'),
(197, 'Slovenia', 'SI', '386'),
(198, 'Solomon Islands', 'SB', '677'),
(199, 'Somalia', 'SO', '252'),
(200, 'South Africa', 'ZA', '27'),
(201, 'South Korea', 'KR', '82'),
(202, 'South Sudan', 'SS', '211'),
(203, 'Spain', 'ES', '34'),
(204, 'Sri Lanka', 'LK', '94'),
(205, 'Sudan', 'SD', '249'),
(206, 'Suriname', 'SR', '597'),
(207, 'Svalbard and Jan Mayen', 'SJ', '47'),
(208, 'Swaziland', 'SZ', '268'),
(209, 'Sweden', 'SE', '46'),
(210, 'Switzerland', 'CH', '41'),
(211, 'Syria', 'SY', '963'),
(212, 'Taiwan', 'TW', '886'),
(213, 'Tajikistan', 'TJ', '992'),
(214, 'Tanzania', 'TZ', '255'),
(215, 'Thailand', 'TH', '66'),
(216, 'Togo', 'TG', '228'),
(217, 'Tokelau', 'TK', '690'),
(218, 'Tonga', 'TO', '676'),
(219, 'Trinidad and Tobago', 'TT', '1-868'),
(220, 'Tunisia', 'TN', '216'),
(221, 'Turkey', 'TR', '90'),
(222, 'Turkmenistan', 'TM', '993'),
(223, 'Turks and Caicos Islands', 'TC', '1-649'),
(224, 'Tuvalu', 'TV', '688'),
(225, 'U.S. Virgin Islands', 'VI', '1-340'),
(226, 'Uganda', 'UG', '256'),
(227, 'Ukraine', 'UA', '380'),
(228, 'United Arab Emirates', 'AE', '971'),
(229, 'United Kingdom', 'GB', '44'),
(231, 'Uruguay', 'UY', '598'),
(232, 'Uzbekistan', 'UZ', '998'),
(233, 'Vanuatu', 'VU', '678'),
(234, 'Vatican', 'VA', '379'),
(235, 'Venezuela', 'VE', '58'),
(236, 'Vietnam', 'VN', '84'),
(237, 'Wallis and Futuna', 'WF', '681'),
(238, 'Western Sahara', 'EH', '212'),
(239, 'Yemen', 'YE', '967'),
(240, 'Zambia', 'ZM', '260'),
(241, 'Zimbabwe', 'ZW', '263');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_abbr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_name`, `currency_abbr`, `symbol`) VALUES
(1, 'United States dollar', 'USD', '$'),
(2, 'Euro', 'EUR', '€'),
(3, 'Japanese yen', 'JPY', '¥'),
(4, 'Pound sterling', 'GBP', '£'),
(5, 'Australian dollar', 'AUD', 'A$'),
(6, 'Canadian dollar', 'CAD', 'C$'),
(7, 'Swiss franc', 'CHF', 'CHF'),
(8, 'Renminbi', 'CNY', '&#20803;'),
(9, 'Hong Kong dollar', 'HKD', 'HK$'),
(10, 'New Zealand dollar	\r\n', 'NZD', 'NZ$'),
(11, 'Swedish krona', 'SEK', 'kr'),
(12, 'South Korean won', 'KRW', '&#8361;'),
(13, 'Singapore dollar', 'SGD', 'S$'),
(14, 'Norwegian krone', 'NOK', 'kr'),
(15, 'Mexican peso', 'MXN', '$'),
(16, 'Indian rupee', 'INR', '&#8377;'),
(17, 'Russian ruble', 'RUB', '&#8381;'),
(18, 'South African rand', 'ZAR', 'R'),
(19, 'Turkish lira', 'TRY', '&#8378;'),
(20, 'Brazilian real', 'BRL', 'R$'),
(21, 'New Taiwan dollar', 'TWD', 'nt$'),
(22, 'Danish krone', 'DKK', 'kr'),
(23, 'Polish zloty', 'PLN', 'z&#322;'),
(24, 'Thai baht', 'THB', '&#3647;'),
(25, 'Indonesian rupiah', 'IDR', 'Rp'),
(26, 'Hungarian forint', 'HUF', 'ft'),
(27, 'Czech koruna', 'CZK', 'K&#269;'),
(28, 'Israeli new shekel', 'ILS', '&#8362;'),
(29, 'Chilean peso', 'CLP', '$'),
(30, 'Philippine peso', 'PHP', '&#8369;'),
(31, 'UAE dirham', 'AED', '&#1583;.&#1573;'),
(32, 'Colombian peso', 'COP', 'COL$'),
(33, 'Saudi riyal', 'SAR', '&#65020;'),
(34, 'Malaysian ringgit', 'MYR', 'RM'),
(35, 'Romanian leu', 'ROL', 'lei');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `question1`, `answer1`, `question2`, `answer2`, `owner`) VALUES
(57, 'Doggie', 'steve@spyderbyte.co', '7164eb030556b4c0bb03b96e09580572', 'Bentley', 'Halaby', '2', 'Dog School', '4', 'Marley and Me', 'northcoast_n'),
(60, 'bentley', 'doggie@frnk.com', '06d80eb0c50b49a509b49f2424e8c805', 'bentley', 'Halaby', '2', 'roof', '2', 'roof', 'DustyCar'),
(94, 'another', 'another@another.com', 'b32d73e56ec99bc5ec8f83871cde708a', 'Another', 'Test', '1', 'Werner', '2', 'Michael', 'jhalaby'),
(86, 'Fishstick', 'fishstick@spyderbyteinc.com', '6050eb18fbbec7fa1d1d21a86c1916d6', 'Fish', 'Stick', '1', 'Wanda', '4', 'Nemo', 'DustyCar'),
(93, 'snake', 'snake@bidzwon.com', 'de1b2a7baf7850243db71c4abd4e5a39', 'Jake', 'TheSnake', '2', 'Snake', '1', 'Snake', 'jhalaby'),
(92, 'house', 'house@bidzwon.com', '2ca63cddd54f9490efad22421891a9d1', 'Jordan', 'House', '2', 'House', '2', 'House', 'jhalaby');

-- --------------------------------------------------------

--
-- Table structure for table `increment`
--

CREATE TABLE `increment` (
  `number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `increment`
--

INSERT INTO `increment` (`number`) VALUES
(3172);

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
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other_category` text COLLATE utf8_unicode_ci NOT NULL,
  `lot_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured_lot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allow_freeze` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `times_the_bid` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
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
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lots`
--

INSERT INTO `lots` (`id`, `catalog_id`, `name`, `description`, `starting_bid`, `increment_type`, `bid_increment`, `reserve_amount`, `category`, `other_category`, `lot_location`, `featured_lot`, `allow_freeze`, `times_the_bid`, `quantity`, `units`, `brand`, `lot_condition`, `size`, `weight`, `tags`, `internal_notes`, `current_bid`, `closed`, `winner`, `status`, `owner`, `ip_address`) VALUES
(79, 94, 'Fork Lift', '<p>This is a fork ... lift</p>', '20', 'static', '10', '100', '3-10-24', '', '1', 'yes', 'yes', '0', '5', '---', 'french', '---', '---', '---', 'search??||&&`for??||&&what??||&&you??||&&want??||&&and??||&&press enter??||&&', '<p>whatever</p>', -1, -1, '-1', '', 'jhalaby', '47.26.37.178'),
(78, 85, 'Exactly a book', '<p>my macbook brings all the girls to the yard</p>', '89', 'static', '12', '9', '3-7-19', '', '3', 'yes', 'yes', '0', '6', '', '', '', '', '', 'every??||&&thing??||&&is??||&&awesome??||&&', '<p><br></p>', -1, -1, '-1', '', 'jhalaby', '47.26.37.178'),
(77, 85, 'Batman Book', '<p>pokemon games used to be so fun</p>', '89', 'static', '12', '9', '4-1-0', 'A big bus', '3', 'yes', 'yes', '0', '6', '', '', '', '', '', 'every??||&&thing??||&&is??||&&awesome??||&&', '<p><br></p>', -1, -1, '-1', '', 'jhalaby', '47.26.37.178'),
(76, 85, 'Cat Video', '<p>cats are funny on video</p>', '89', 'static', '12', '9', '1-4-9', '', '3', 'yes', 'yes', '0', '6', '', '', '', '', '', 'every??||&&thing??||&&is??||&&awesome??||&&', '<p><br></p>', -1, -1, '-1', '', 'jhalaby', '76.217.175.77'),
(75, 85, 'A fish, Two Fish', '<p>fish are the most boring fish out there</p>', '89', 'static', '12', '9', '1-6-16', '', '3', 'yes', 'yes', '0', '6', '', '', '', '', '', 'every??||&&thing??||&&is??||&&awesome??||&&', '<p><br></p>', -1, -1, '-1', '', 'jhalaby', '47.26.37.178'),
(74, 85, 'Dog Training', '<p>dogs are the best</p>', '89', 'static', '12', '9', '4-1-0', 'Muscle Car', '3', 'yes', 'yes', '0', '6', '', '', '', '', '', 'every??||&&thing??||&&is??||&&awesome??||&&', '<p><br></p>', -1, -1, '-1', '', 'jhalaby', '76.217.175.77'),
(80, 95, 'Ford Mustang', '<p>car goes beeb beeb</p>', '8', 'static', '6', '9', '4-1-2-5', '', '1', 'yes', 'yes', 'yes', '', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'cancel', 'jhalaby', '47.26.37.178'),
(81, 95, 'Geo Prism', '<p>this car isn\'t very fast</p>', '8', 'static', '8', '90', '4-1-3-7', '', '2', 'yes', 'yes', 'yes', '100', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', '', 'jhalaby', '47.26.37.178'),
(82, 95, 'Honda', '<p>this car isn\'t very fast</p>', '8', 'static', '8', '90', '4-1-3-7', '', '2', 'yes', 'yes', 'no', '890', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', '', 'jhalaby', '174.211.40.38'),
(83, 95, 'Ford Explorer', '<p>this car isn\'t very fast</p>', '8', 'static', '8', '90', '4-1-3-7', '', '2', 'yes', 'yes', 'yes', '112', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', '', 'jhalaby', '174.211.40.38');

-- --------------------------------------------------------

--
-- Table structure for table `lot_countdown`
--

CREATE TABLE `lot_countdown` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `create_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lot_countdown`
--

INSERT INTO `lot_countdown` (`id`, `cat_id`, `lot_id`, `create_time`, `username`, `end_time`) VALUES
(32, 85, 75, '1631744932', 'jhalaby', '1637879400'),
(33, 85, 77, '1631744932', 'jhalaby', '1637880000'),
(34, 85, 76, '1631744932', 'jhalaby', '1637880600'),
(35, 85, 74, '1631744932', 'jhalaby', '1637881200'),
(36, 85, 78, '1631744932', 'jhalaby', '1637881800'),
(37, 94, 79, '1632089612', 'jhalaby', '1635595200'),
(38, 95, 81, '1632090025', 'jhalaby', '1634701500'),
(39, 95, 82, '1632090025', 'jhalaby', '1634702700'),
(40, 95, 83, '1632090025', 'jhalaby', '1634703900');

-- --------------------------------------------------------

--
-- Table structure for table `lot_pictures`
--

CREATE TABLE `lot_pictures` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lot_pictures`
--

INSERT INTO `lot_pictures` (`id`, `cat_id`, `lot_id`, `picture`) VALUES
(136, 32, 7, '1589912083spyro.PNG'),
(133, 32, 7, '1589912081jordan.jpeg'),
(130, 32, 7, '1589912079haters.jpg'),
(131, 32, 7, '1589912080img026.jpg'),
(132, 32, 7, '1589912081profile.jpg'),
(134, 32, 7, '1589912081round2.png'),
(119, 30, 11, '1588964613voted.jpg'),
(118, 30, 11, '1588964610spyro.PNG'),
(117, 30, 11, '1588964609Sketchpad.png'),
(116, 30, 11, '1588964608jordan.jpeg'),
(115, 30, 11, '1588964607round2.png'),
(138, 32, 8, '1591715304round2.png'),
(139, 32, 8, '1591715305Sketchpad.png'),
(140, 35, 19, '1592086661bday2.jpg'),
(141, 35, 19, '1592086662haters.jpg'),
(142, 35, 19, '1592086663img026.jpg'),
(143, 35, 19, '1592086665birthday.jpg'),
(144, 35, 19, '1592086665jordan.jpeg'),
(145, 35, 19, '1592086665profile.jpg'),
(146, 35, 19, '1592086665round2.png'),
(147, 35, 19, '1592086666Sketchpad.png'),
(148, 35, 19, '1592086666spyro.PNG'),
(149, 35, 19, '1592086670voted.jpg'),
(150, 35, 20, '1592415559img026.jpg'),
(151, 35, 20, '1592415559profile.jpg'),
(152, 35, 20, '1592415560round2.png'),
(153, 35, 20, '1592415560jordan.jpeg'),
(154, 35, 20, '1592415561Sketchpad.png'),
(155, 42, 28, '1594322243profile.jpg'),
(156, 42, 28, '1594322244round2.png'),
(157, 42, 28, '1594322245Sketchpad.png'),
(158, 42, 28, '1594322246jordan.jpeg'),
(159, 42, 28, '1594322247spyro.PNG'),
(160, 42, 28, '1594322253wallpaper1.jpg'),
(161, 42, 28, '1594322259voted.jpg'),
(162, 42, 28, '1594404525haters.jpg'),
(163, 42, 28, '1594404527img026.jpg'),
(164, 42, 28, '1594404528profile.jpg'),
(165, 42, 28, '1594404528round2.png'),
(166, 42, 28, '1594404528jordan.jpeg'),
(167, 42, 28, '1594404529Sketchpad.png'),
(168, 42, 28, '1594404531spyro.PNG'),
(169, 42, 28, '1594404532wallpaper1.jpg'),
(170, 42, 28, '1594404536voted.jpg'),
(171, 42, 25, '1594568746spyro.PNG'),
(174, 44, 28, '1596569207profile.jpg'),
(173, 42, 25, '1594568752wallpaper1.jpg'),
(175, 42, 28, '1596569245Sketchpad.png'),
(176, 45, 29, '1601159968haters.jpg'),
(177, 45, 29, '1601159970img026.jpg'),
(178, 45, 29, '1601159971profile.jpg'),
(179, 45, 29, '1601159972round2.png'),
(180, 45, 29, '1601159976Sketchpad.png'),
(181, 45, 29, '1601159980jordan.jpeg'),
(182, 45, 29, '1601159988spyro.PNG'),
(183, 45, 29, '1601159994wallpaper1.jpg'),
(185, 46, 30, '160131789220190714_101831 (1).jpg'),
(186, 46, 30, '160131789320190708_162007 (1).jpg'),
(187, 46, 30, '16013178952019071395132627(1) (1).jpg'),
(188, 46, 30, '16013178972019071395132635 (1).jpg'),
(189, 46, 30, '16013178992019071395132655.jpg'),
(190, 46, 30, '160131790120190715_155305.jpg'),
(191, 46, 31, '1601318629SA_PROFILE_CACHE.jpg'),
(192, 46, 31, '160131906920191207_103712.jpg'),
(193, 46, 31, '160131907120191207_103703.jpg'),
(194, 46, 31, '160131910520191207_103721 (1).jpg'),
(195, 46, 31, '160131910520191207_103730.jpg'),
(196, 62, 34, '16041741119073273.jpg'),
(197, 62, 34, '1604174322Apples-in-a-basket.jpg'),
(198, 62, 34, '160417433735803125-organic-apples-in-basket-in-summer-grass-fresh-apples-in-nature.jpg'),
(199, 62, 35, '16041751292020-Chevrolet-Corvette-C8-Stingray-Coupe-Z51-Real-World-July-2019-Exterior-006-720x340.jpg'),
(200, 62, 35, '1604175136chevrolet-corvette-c8-rapid-blue.jpg'),
(201, 62, 35, '1604175143rapid-blue-carlisle-2019-d-low-res.jpg'),
(202, 52, 32, '1604525821haters.jpg'),
(203, 52, 32, '1604525822img026.jpg'),
(204, 52, 32, '1604525823birthday.jpg'),
(205, 52, 32, '1604525945jordan.jpeg'),
(206, 52, 32, '1604526112profile.jpg'),
(207, 52, 33, '1605556739birthday.jpg'),
(208, 52, 33, '1605556793profile.jpg'),
(209, 52, 33, '1605556813voted.jpg'),
(210, 52, 33, '16055570102016-05-13 203345-2070399.JPG'),
(211, 52, 33, '16055570132016-03-11 164905-2355092.PNG'),
(212, 52, 33, '16055570132016-03-14 100450-1464841.PNG'),
(213, 52, 33, '16055570162016-03-21 210154-2319626.JPG'),
(214, 52, 33, '16055570182016-03-21 210212-2241663.JPG'),
(215, 52, 33, '16055570192016-04-03 174746-152091.PNG'),
(216, 52, 33, '16055570192016-03-23 181243-947736.PNG'),
(217, 52, 33, '16055570202016-04-07 193344-618842.PNG'),
(218, 52, 33, '16055570252016-05-09 070659-4408424.JPG'),
(219, 63, 38, '160572292320201013_123908.jpg'),
(220, 63, 38, '160572296620201013_122944.jpg'),
(223, 63, 38, '160572311220201013_122917.jpg'),
(224, 63, 38, '160572311420201013_122921.jpg'),
(225, 63, 38, '160572311920201013_122923.jpg'),
(226, 52, 32, '1606091736profile.jpg'),
(227, 52, 32, '1606091739jordan.jpeg'),
(228, 52, 32, '1606091739round2.png'),
(229, 52, 32, '1606091739Sketchpad.png'),
(230, 52, 32, '1606091741spyro.PNG'),
(231, 52, 32, '1606091742wallpaper1.jpg'),
(232, 52, 32, '1606091746voted.jpg');

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
(6, 35, 19, '||140||143||141||142||144||145||146||147||148||149||'),
(7, 35, 20, '||153||151||154||152||150||'),
(8, 42, 28, '||155||168||156||157||158||159||169||160||161||162||163||164||165||166||167||170||175||'),
(9, 42, 25, '||173||171||'),
(10, 45, 29, '||181||182||180||176||177||178||179||183||'),
(11, 46, 30, '||185||187||190||186||188||189||'),
(12, 46, 31, '||192||191||193||194||195||'),
(13, 52, 32, '||202||203||204||205||206||226||227||228||229||230||231||232||'),
(14, 62, 34, '||196||197||198||'),
(15, 62, 35, '||201||199||200||'),
(16, 52, 33, '||207||208||209||210||211||212||213||214||215||216||217||218||'),
(17, 63, 38, '||223||219||220||224||225||'),
(18, 61, 50, '||'),
(19, 64, 52, '||'),
(20, 71, 56, '||'),
(21, 85, 74, '||'),
(22, 95, 81, '||');

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
(46, '85', '||75||77||76||74||78||'),
(56, '95', '||81||82||83||'),
(55, '94', '||79||');

-- --------------------------------------------------------

--
-- Table structure for table `note_test`
--

CREATE TABLE `note_test` (
  `id` int(11) NOT NULL,
  `vchar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `note_test`
--

INSERT INTO `note_test` (`id`, `vchar`, `text`) VALUES
(1, 'test', 'test'),
(2, '<p>Hello everyone2</p>\r\n\r\n<ol>\r\n	<li>Jordan</li>\r\n	<li>Halaby</li>\r\n</ol>\r\n\r\n<p>Test</p>\r\n\r\n<ul>\r\n	<li>Test1</li>\r\n	<li>JOrdan</li>\r\n</ul>\r\n\r\n<p>Kyle</p>\r\n', '<p>Hello everyone2</p>\r\n\r\n<ol>\r\n	<li>Jordan</li>\r\n	<li>Halaby</li>\r\n</ol>\r\n\r\n<p>Test</p>\r\n\r\n<ul>\r\n	<li>Test1</li>\r\n	<li>JOrdan</li>\r\n</ul>\r\n\r\n<p>Kyle</p>\r\n'),
(3, '<ul>\r\n	<li>Jordan</li>\r\n	<li>One</li>\r\n	<li>Two</li>\r\n</ul>\r\n\r\n<p>Halaby</p>\r\n', '<ul>\r\n	<li>Jordan</li>\r\n	<li>One</li>\r\n	<li>Two</li>\r\n</ul>\r\n\r\n<p>Halaby</p>\r\n'),
(4, 'hello', 'test\'s');

-- --------------------------------------------------------

--
-- Table structure for table `security_question1`
--

CREATE TABLE `security_question1` (
  `id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `security_question1`
--

INSERT INTO `security_question1` (`id`, `question`) VALUES
(1, 'What is your mother\'s maiden name?'),
(2, 'What highschool did you go to?'),
(3, 'What is your favorite meal?'),
(4, 'What is the name of your first pet?'),
(5, 'What is the first car you owned?'),
(6, 'Where is your favorite vacation spot?'),
(7, 'What hospital were you born in?');

-- --------------------------------------------------------

--
-- Table structure for table `security_question2`
--

CREATE TABLE `security_question2` (
  `id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `security_question2`
--

INSERT INTO `security_question2` (`id`, `question`) VALUES
(1, 'What is your favorite professional sport?'),
(2, 'What is your father\'s middle name?'),
(3, 'What is the name of your closest childhood friend?'),
(4, 'What is your favorite movie?'),
(5, 'What street did you grow up on?'),
(6, 'Who is your favorite actor/actress?'),
(7, 'What was your first job?');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `huser` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `username`, `email`, `password`, `permissions`, `huser`) VALUES
(1, 'Jordan', 'jhabs', 'jhalaby@emich.edu', '71603a2a25ec0996e665467cc270db97', 'all', 'a06ff57accb920126f25cd4b9eaecaba'),
(2, 'Steve', 'spyder', 'steve@bidzwon.com', '4e66f7ddd20a112597b1b9f083d517c5', 'all', 'e5fb0cda12f90dc4341247ddab54d1da');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `code`, `country`) VALUES
(1, 'Alberta', 'AB', 'CA'),
(2, 'Alabama', 'AL', 'US'),
(3, 'Alaska', 'AK', 'US'),
(4, 'Arizona', 'AZ', 'US'),
(5, 'Arkansas', 'AR', 'US'),
(6, 'California', 'CA', 'US'),
(7, 'Colorado', 'CO', 'US'),
(8, 'Connecticut', 'CT', 'US'),
(9, 'District of Columbia', 'DC', 'US'),
(10, 'Delaware', 'DE', 'US'),
(11, 'Florida', 'FL', 'US'),
(12, 'Georgia', 'GA', 'US'),
(13, 'Hawaii', 'HI', 'US'),
(14, 'Idaho', 'ID', 'US'),
(15, 'Illinois', 'IL', 'US'),
(16, 'Indiana', 'IN', 'US'),
(17, 'Iowa', 'IA', 'US'),
(18, 'Kansas', 'KS', 'US'),
(19, 'Kentucky', 'KY', 'US'),
(20, 'Louisiana', 'LA', 'US'),
(21, 'Maine', 'ME', 'US'),
(22, 'Maryland', 'MD', 'US'),
(23, 'Massachusetts', 'MA', 'US'),
(24, 'Michigan', 'MI', 'US'),
(25, 'Minnesota', 'MN', 'US'),
(26, 'Mississippi', 'MS', 'US'),
(27, 'Missouri', 'MO', 'US'),
(28, 'Montana', 'MT', 'US'),
(29, 'Nebraska', 'NE', 'US'),
(30, 'Nevada', 'NV', 'US'),
(31, 'New Hampshire', 'NH', 'US'),
(32, 'New Jersey', 'NJ', 'US'),
(33, 'New Mexico', 'NM', 'US'),
(34, 'New York', 'NY', 'US'),
(35, 'North Carolina', 'NC', 'US'),
(36, 'North Dakota', 'ND', 'US'),
(37, 'Ohio', 'OH', 'US'),
(38, 'Oklahoma', 'OK', 'US'),
(39, 'Oregon', 'OR', 'US'),
(40, 'Pennsylvania', 'PA', 'US'),
(41, 'Rhode Island', 'RI', 'US'),
(42, 'South Carolina', 'SC', 'US'),
(43, 'South Dakota', 'SD', 'US'),
(44, 'Tennessee', 'TN', 'US'),
(45, 'Texas', 'TX', 'US'),
(46, 'Utah', 'UT', 'US'),
(47, 'Vermont', 'VT', 'US'),
(48, 'Virginia', 'VA', 'US'),
(49, 'Washington', 'WA', 'US'),
(50, 'West Virginia', 'WV', 'US'),
(51, 'Wisconsin', 'WI', 'US'),
(52, 'Wyoming', 'WY', 'US'),
(53, 'American Samoa', 'AS', 'US'),
(54, 'Guam', 'GU', 'US'),
(55, 'Northern Mariana Islands', 'MP', 'US'),
(56, 'Puerto Rico', 'PR', 'US'),
(57, 'United States Minor Outlying Islands', 'UM', 'US'),
(58, 'Virgin Islands', 'VI', 'US'),
(59, 'British Columbia', 'BC', 'CA'),
(60, 'Manitoba', 'MB', 'CA'),
(61, 'New Brunswick', 'NB', 'CA'),
(62, 'Newfoundland and Labrador', 'NL', 'CA'),
(63, 'Nova Scotia', 'NS', 'CA'),
(64, 'Nunavut', 'NU', 'CA'),
(65, 'Northwest Territories', 'NT', 'CA'),
(66, 'Ontario', 'ON', 'CA'),
(67, 'Prince Edward Island', 'PE', 'CA'),
(68, 'Quebec', 'QC', 'CA'),
(69, 'Saskatchewan', 'SK', 'CA'),
(70, 'Yukon', 'YT', 'CA'),
(71, 'Ashmore and Cartier Islands', 'Ashmore and Cartier Islands', 'AU'),
(72, 'Australian Antarctic Territory', 'Australian Antarctic Territory', 'AU'),
(73, 'Australian Capital Territory', 'ACT', 'AU'),
(74, 'Christmas Island', 'CX', 'AU'),
(75, 'Cocos Islands', 'CC', 'AU'),
(76, 'Coral Sea Islands', 'Coral Sea Islands', 'AU'),
(77, 'Heard Island and McDonald Islands', 'HM', 'AU'),
(78, 'Jervis Bay Territory', 'JBT', 'AU'),
(79, 'New South Wales', 'NSW', 'AU'),
(80, 'Norfolk Island', 'NF', 'AU'),
(81, 'Northern Territory', 'NT', 'AU'),
(82, 'Queensland', 'QLD', 'AU'),
(83, 'South Australia', 'SA', 'AU'),
(84, 'Tasmania', 'TAS', 'AU'),
(85, 'Victoria', 'VIC', 'AU'),
(86, 'Western Australia', 'WA', 'AU'),
(87, 'Aguascalientes', 'AG', 'MX'),
(88, 'Baja California', 'BC', 'MX'),
(89, 'Baja California Sur', 'BS', 'MX'),
(90, 'Campeche', 'CM', 'MX'),
(91, 'Chiapas', 'CS', 'MX'),
(92, 'Chihuahua', 'CH', 'MX'),
(93, 'Coahuila', 'MX', 'MX'),
(94, 'Colima', 'CL', 'MX'),
(95, 'Federal District', 'DF', 'MX'),
(96, 'Durango', 'DG', 'MX'),
(97, 'Guanajuato', 'GT', 'MX'),
(98, 'Guerrero', 'GR', 'MX'),
(99, 'Hidalgo', 'HG', 'MX'),
(100, 'Jalisco', 'JA', 'MX'),
(101, 'Mexico', 'ME', 'MX'),
(102, 'Michoacán', 'MI', 'MX'),
(103, 'Morelos', 'MO', 'MX'),
(104, 'Nayarit', 'NA', 'MX'),
(105, 'Nuevo León', 'NL', 'MX'),
(106, 'Oaxaca', 'OA', 'MX'),
(107, 'Puebla', 'PU', 'MX'),
(108, 'Querétaro', 'QE', 'MX'),
(109, 'Quintana Roo', 'QR', 'MX'),
(110, 'San Luis Potosí', 'SL', 'MX'),
(111, 'Sinaloa', 'SI', 'MX'),
(112, 'Sonora', 'SO', 'MX'),
(113, 'Tabasco', 'TB', 'MX'),
(114, 'Tamaulipas', 'TM', 'MX'),
(115, 'Tlaxcala', 'TL', 'MX'),
(116, 'Veracruz', 'VE', 'MX'),
(117, 'Yucatán', 'YU', 'MX'),
(118, 'Zacatecas', 'ZA', 'MX'),
(119, 'Chongqing', 'Chongqing', 'CN'),
(120, 'Heilongjiang', 'Heilongjiang', 'CN'),
(121, 'Jilin', 'Jilin', 'CN'),
(122, 'Hainan', 'Hainan', 'CN'),
(123, 'Beijing', 'Beijing', 'CN'),
(124, 'Liaoning', 'Liaoning', 'CN'),
(125, 'Inner Mongolia', 'Inner Mongolia', 'CN'),
(126, 'Xizang', 'Xizang', 'CN'),
(127, 'Qinghai', 'Qinghai', 'CN'),
(128, 'Ningxia', 'Ningxia', 'CN'),
(129, 'Xinjiang', 'Xinjiang', 'CN'),
(130, 'Gansu', 'Gansu', 'CN'),
(131, 'Hebei', 'Hebei', 'CN'),
(132, 'Henan', 'Henan', 'CN'),
(133, 'Hubei', 'Hubei', 'CN'),
(134, 'Hunan', 'Hunan', 'CN'),
(135, 'Shandong', 'Shandong', 'CN'),
(136, 'Jiangsu', 'Jiangsu', 'CN'),
(137, 'Anhui', 'Anhui', 'CN'),
(138, 'Shanxi', 'Shanxi', 'CN'),
(139, 'Shaanxi', 'Shaanxi', 'CN'),
(140, 'sichuan', 'sichuan', 'CN'),
(141, 'Yunnan', 'Yunnan', 'CN'),
(142, 'Guizhou', 'Guizhou', 'CN'),
(143, 'Zhejiang', 'Zhejiang', 'CN'),
(144, 'Fujian', 'Fujian', 'CN'),
(145, 'Guangxi', 'Guangxi', 'CN'),
(146, 'Shanghai', 'Shanghai', 'CN'),
(147, 'Tianjin', 'Tianjin', 'CN'),
(148, 'Hongkong', 'Hongkong', 'CN'),
(149, 'Macau', 'Macau', 'CN'),
(150, 'Taiwan', 'Taiwan', 'CN'),
(151, 'Jiangxi', 'Jiangxi', 'CN'),
(152, 'Guangdong', 'Guangdong', 'CN'),
(153, 'Avon', 'Avon', 'GB'),
(154, 'Bedfordshire', 'Bedfordshire', 'GB'),
(155, 'Berkshire', 'Berkshire', 'GB'),
(156, 'Borders', 'Borders', 'GB'),
(157, 'Bristol', 'Bristol', 'GB'),
(158, 'Buckinghamshire', 'Buckinghamshire', 'GB'),
(159, 'Cambridgeshire', 'Cambridgeshire', 'GB'),
(160, 'Channel Islands', 'Channel Islands', 'GB'),
(161, 'Cheshire', 'Cheshire', 'GB'),
(162, 'Cleveland', 'Cleveland', 'GB'),
(163, 'Cornwall', 'Cornwall', 'GB'),
(164, 'Cumbria', 'Cumbria', 'GB'),
(165, 'Derbyshire', 'Derbyshire', 'GB'),
(166, 'Devon', 'Devon', 'GB'),
(167, 'Dorset', 'Dorset', 'GB'),
(168, 'Durham', 'Durham', 'GB'),
(169, 'East Riding of Yorkshire', 'East Riding of Yorkshire', 'GB'),
(170, 'East Sussex', 'East Sussex', 'GB'),
(171, 'Essex', 'Essex', 'GB'),
(172, 'Gloucestershire', 'Gloucestershire', 'GB'),
(173, 'Greater Manchester', 'Greater Manchester', 'GB'),
(174, 'Hampshire', 'Hampshire', 'GB'),
(175, 'Herefordshire', 'Herefordshire', 'GB'),
(176, 'Hertfordshire', 'Hertfordshire', 'GB'),
(177, 'Humberside', 'Humberside', 'GB'),
(178, 'Isle of Man', 'Isle of Man', 'GB'),
(179, 'Isle of Wight', 'Isle of Wight', 'GB'),
(180, 'Isles of Scilly', 'Isles of Scilly', 'GB'),
(181, 'Kent', 'Kent', 'GB'),
(182, 'Lancashire', 'Lancashire', 'GB'),
(183, 'Leicestershire', 'Leicestershire', 'GB'),
(184, 'Lincolnshire', 'Lincolnshire', 'GB'),
(185, 'London', 'London', 'GB'),
(186, 'Merseyside', 'Merseyside', 'GB'),
(187, 'Middlesex', 'Middlesex', 'GB'),
(188, 'Norfolk', 'Norfolk', 'GB'),
(189, 'North Yorkshire', 'North Yorkshire', 'GB'),
(190, 'Northamptonshire', 'Northamptonshire', 'GB'),
(191, 'Northumberland', 'Northumberland', 'GB'),
(192, 'Nottinghamshire', 'Nottinghamshire', 'GB'),
(193, 'Oxfordshire', 'Oxfordshire', 'GB'),
(194, 'Rutland', 'Rutland', 'GB'),
(195, 'Shropshire', 'Shropshire', 'GB'),
(196, 'Somerset', 'Somerset', 'GB'),
(197, 'South Yorkshire', 'South Yorkshire', 'GB'),
(198, 'Staffordshire', 'Staffordshire', 'GB'),
(199, 'Suffolk', 'Suffolk', 'GB'),
(200, 'Surrey', 'Surrey', 'GB'),
(201, 'Tyne and Wear', 'Tyne and Wear', 'GB'),
(202, 'Warwickshire', 'Warwickshire', 'GB'),
(203, 'West Midlands', 'West Midlands', 'GB'),
(204, 'West Sussex', 'West Sussex', 'GB'),
(205, 'West Yorkshire', 'West Yorkshire', 'GB'),
(206, 'Wiltshire', 'Wiltshire', 'GB'),
(207, 'Worcestershire', 'Worcestershire', 'GB'),
(208, 'Antrim', 'Antrim', 'GB'),
(209, 'Down', 'Down', 'GB'),
(210, 'Fermanagh', 'Fermanagh', 'GB'),
(211, 'Londonderry', 'Londonderry', 'GB'),
(212, 'Tyrone', 'Tyrone', 'GB'),
(213, 'Aberdeen City', 'Aberdeen City', 'GB'),
(214, 'Aberdeenshire', 'Aberdeenshire', 'GB'),
(215, 'Angus', 'Angus', 'GB'),
(216, 'Argyll and Bute', 'Argyll and Bute', 'GB'),
(217, 'Armagh', 'Armagh', 'GB'),
(218, 'Carmarthenshire', 'Carmarthenshire', 'GB'),
(219, 'Clackmannan', 'Clackmannan', 'GB'),
(220, 'Dumfries and Galloway', 'Dumfries and Galloway', 'GB'),
(221, 'East Ayrshire', 'East Ayrshire', 'GB'),
(222, 'East Dunbartonshire', 'East Dunbartonshire', 'GB'),
(223, 'East Lothian', 'East Lothian', 'GB'),
(224, 'East Renfrewshire', 'East Renfrewshire', 'GB'),
(225, 'Edinburgh City', 'Edinburgh City', 'GB'),
(226, 'Falkirk', 'Falkirk', 'GB'),
(227, 'Fife', 'Fife', 'GB'),
(228, 'Glasgow', 'Glasgow', 'GB'),
(229, 'Highland', 'Highland', 'GB'),
(230, 'Inverclyde', 'Inverclyde', 'GB'),
(231, 'Midlothian', 'Midlothian', 'GB'),
(232, 'Moray', 'Moray', 'GB'),
(233, 'North Ayrshire', 'North Ayrshire', 'GB'),
(234, 'North Lanarkshire', 'North Lanarkshire', 'GB'),
(235, 'Orkney', 'Orkney', 'GB'),
(236, 'Perthshire and Kinross', 'Perthshire and Kinross', 'GB'),
(237, 'Renfrewshire', 'Renfrewshire', 'GB'),
(238, 'Roxburghshire', 'Roxburghshire', 'GB'),
(239, 'Shetland', 'Shetland', 'GB'),
(240, 'South Ayrshire', 'South Ayrshire', 'GB'),
(241, 'South Lanarkshire', 'South Lanarkshire', 'GB'),
(242, 'Stirling', 'Stirling', 'GB'),
(243, 'West Dunbartonshire', 'West Dunbartonshire', 'GB'),
(244, 'West Lothian', 'West Lothian', 'GB'),
(245, 'Western Isles', 'Western Isles', 'GB'),
(246, 'Blaenau Gwent', 'Blaenau Gwent', 'GB'),
(247, 'Bridgend', 'Bridgend', 'GB'),
(248, 'Caerphilly', 'Caerphilly', 'GB'),
(249, 'Cardiff', 'Cardiff', 'GB'),
(250, 'Ceredigion', 'Ceredigion', 'GB'),
(251, 'Conwy', 'Conwy', 'GB'),
(252, 'Denbighshire', 'Denbighshire', 'GB'),
(253, 'Flintshire', 'Flintshire', 'GB'),
(254, 'Gwynedd', 'Gwynedd', 'GB'),
(255, 'Isle of Anglesey', 'Isle of Anglesey', 'GB'),
(256, 'Merthyr Tydfil', 'Merthyr Tydfil', 'GB'),
(257, 'Monmouthshire', 'Monmouthshire', 'GB'),
(258, 'Neath Port Talbot', 'Neath Port Talbot', 'GB'),
(259, 'Newport', 'Newport', 'GB'),
(260, 'Pembrokeshire', 'Pembrokeshire', 'GB'),
(261, 'Powys', 'Powys', 'GB'),
(262, 'Rhondda Cynon Taff', 'Rhondda Cynon Taff', 'GB'),
(263, 'Swansea', 'Swansea', 'GB'),
(264, 'The Vale of Glamorgan', 'The Vale of Glamorgan', 'GB'),
(265, 'Torfaen', 'Torfaen', 'GB'),
(266, 'Wrexham', 'Wrexham', 'GB'),
(267, 'Baden-Württemberg', 'BW', 'DE'),
(268, 'Bayern', 'BY', 'DE'),
(269, 'Berlin', 'BE', 'DE'),
(270, 'Brandenburg', 'BB', 'DE'),
(271, 'Bremen', 'HB', 'DE'),
(272, 'Hamburg', 'HH', 'DE'),
(273, 'Hessen', 'HE', 'DE'),
(274, 'Mecklenburg-Vorpommern', 'MV', 'DE'),
(275, 'Niedersachsen', 'NI', 'DE'),
(276, 'Nordrhein-Westfalen', 'NW', 'DE'),
(277, 'Rheinland-Pfalz', 'RP', 'DE'),
(278, 'Saarland', 'SL', 'DE'),
(279, 'Sachsen', 'SN', 'DE'),
(280, 'Sachsen-Anhalt', 'ST', 'DE'),
(281, 'Schleswig-Holstein', 'SH', 'DE'),
(282, 'Thüringen', 'TH', 'DE'),
(283, 'Drenthe', 'DR', 'NL'),
(284, 'Flevoland', 'FL', 'NL'),
(285, 'Friesland', 'FR', 'NL'),
(286, 'Gelderland', 'GD', 'NL'),
(287, 'Groningen', 'GR', 'NL'),
(288, 'Limburg', 'LB', 'NL'),
(289, 'Noord-Brabant', 'NB', 'NL'),
(290, 'Noord-Holland', 'NH', 'NL'),
(291, 'Overijssel', 'OV', 'NL'),
(292, 'Utrecht', 'UT', 'NL'),
(293, 'Zuid-Holland', 'ZH', 'NL'),
(294, 'Zeeland', 'ZL', 'NL'),
(295, 'Antwerpen', 'ANT', 'BE'),
(296, 'Henegouwen', 'HAI', 'BE'),
(297, 'Luik', 'LIE', 'BE'),
(298, 'Limburg', 'LIM', 'BE'),
(299, 'Luxemburg', 'LUX', 'BE'),
(300, 'Namen', 'NAM', 'BE'),
(301, 'Oost-Vlaanderen', 'OVL', 'BE'),
(302, 'Vlaams-Brabant', 'VBR', 'BE'),
(303, 'Waals-Brabant', 'WBR', 'BE'),
(304, 'West-Vlaanderen', 'WVL', 'BE'),
(305, 'Hovedstaden', 'Hovedstaden', 'DK'),
(306, 'Midtjylland', 'Midtjylland', 'DK'),
(307, 'Nordjylland', 'Nordjylland', 'DK'),
(308, 'Sjælland', 'Sjælland', 'DK'),
(309, 'Syddanmark', 'Syddanmark', 'DK'),
(310, 'Adana', 'Adana', 'TR'),
(311, 'Adıyaman', 'Adıyaman', 'TR'),
(312, 'Afyonkarahisar', 'Afyonkarahisar', 'TR'),
(313, 'Ağrı', 'Ağrı', 'TR'),
(314, 'Amasya', 'Amasya', 'TR'),
(315, 'Ankara', 'Ankara', 'TR'),
(316, 'Antalya', 'Antalya', 'TR'),
(317, 'Artvin', 'Artvin', 'TR'),
(318, 'Aydın', 'Aydın', 'TR'),
(319, 'Balıkesir', 'Balıkesir', 'TR'),
(320, 'Bilecik', 'Bilecik', 'TR'),
(321, 'Bingöl', 'Bingöl', 'TR'),
(322, 'Bitlis', 'Bitlis', 'TR'),
(323, 'Bolu', 'Bolu', 'TR'),
(324, 'Burdur', 'Burdur', 'TR'),
(325, 'Bursa', 'Bursa', 'TR'),
(326, 'Çanakkale', 'Çanakkale', 'TR'),
(327, 'Çankırı', 'Çankırı', 'TR'),
(328, 'Çorum', 'Çorum', 'TR'),
(329, 'Denizli', 'Denizli', 'TR'),
(330, 'Diyarbakır', 'Diyarbakır', 'TR'),
(331, 'Edirne', 'Edirne', 'TR'),
(332, 'Elazığ', 'Elazığ', 'TR'),
(333, 'Erzincan', 'Erzincan', 'TR'),
(334, 'Erzurum', 'Erzurum', 'TR'),
(335, 'Eskişehir', 'Eskişehir', 'TR'),
(336, 'Gaziantep', 'Gaziantep', 'TR'),
(337, 'Giresun', 'Giresun', 'TR'),
(338, 'Gümüşhane', 'Gümüşhane', 'TR'),
(339, 'Hakkâri', 'Hakkâri', 'TR'),
(340, 'Hatay', 'Hatay', 'TR'),
(341, 'Isparta', 'Isparta', 'TR'),
(342, 'Mersin', 'Mersin', 'TR'),
(343, 'Istanbul', 'Istanbul', 'TR'),
(344, 'İzmir', 'İzmir', 'TR'),
(345, 'Kars', 'Kars', 'TR'),
(346, 'Kastamonu', 'Kastamonu', 'TR'),
(347, 'Kayseri', 'Kayseri', 'TR'),
(348, 'Kırklareli', 'Kırklareli', 'TR'),
(349, 'Kırşehir', 'Kırşehir', 'TR'),
(350, 'Kocaeli', 'Kocaeli', 'TR'),
(351, 'Konya', 'Konya', 'TR'),
(352, 'Kütahya', 'Kütahya', 'TR'),
(353, 'Malatya', 'Malatya', 'TR'),
(354, 'Manisa', 'Manisa', 'TR'),
(355, 'Kahramanmaraş', 'Kahramanmaraş', 'TR'),
(356, 'Mardin', 'Mardin', 'TR'),
(357, 'Muğla', 'Muğla', 'TR'),
(358, 'Muş', 'Muş', 'TR'),
(359, 'Nevşehir', 'Nevşehir', 'TR'),
(360, 'Niğde', 'Niğde', 'TR'),
(361, 'Ordu', 'Ordu', 'TR'),
(362, 'Rize', 'Rize', 'TR'),
(363, 'Sakarya', 'Sakarya', 'TR'),
(364, 'Samsun', 'Samsun', 'TR'),
(365, 'Siirt', 'Siirt', 'TR'),
(366, 'Sinop', 'Sinop', 'TR'),
(367, 'Sivas', 'Sivas', 'TR'),
(368, 'Tekirdağ', 'Tekirdağ', 'TR'),
(369, 'Tokat', 'Tokat', 'TR'),
(370, 'Trabzon', 'Trabzon', 'TR'),
(371, 'Tunceli', 'Tunceli', 'TR'),
(372, 'Şanlıurfa', 'Şanlıurfa', 'TR'),
(373, 'Uşak', 'Uşak', 'TR'),
(374, 'Van', 'Van', 'TR'),
(375, 'Yozgat', 'Yozgat', 'TR'),
(376, 'Zonguldak', 'Zonguldak', 'TR'),
(377, 'Aksaray', 'Aksaray', 'TR'),
(378, 'Bayburt', 'Bayburt', 'TR'),
(379, 'Karaman', 'Karaman', 'TR'),
(380, 'Kırıkkale', 'Kırıkkale', 'TR'),
(381, 'Batman', 'Batman', 'TR'),
(382, 'Şırnak', 'Şırnak', 'TR'),
(383, 'Bartın', 'Bartın', 'TR'),
(384, 'Ardahan', 'Ardahan', 'TR'),
(385, 'Iğdır', 'Iğdır', 'TR'),
(386, 'Yalova', 'Yalova', 'TR'),
(387, 'Karabük', 'Karabük', 'TR'),
(388, 'Kilis', 'Kilis', 'TR'),
(389, 'Osmaniye', 'Osmaniye', 'TR'),
(390, 'Düzce', 'Düzce', 'TR'),
(391, 'Special Region of Aceh', 'ID-AC', 'ID'),
(392, 'Bali', 'ID-BA', 'ID'),
(393, 'Bangka–Belitung Islands', 'ID-BB', 'ID'),
(394, 'Banten', 'ID-BT', 'ID'),
(395, 'Bengkulu', 'ID-BE', 'ID'),
(396, 'Central Java', 'ID-JT', 'ID'),
(397, 'Central Kalimantan', 'ID-KT', 'ID'),
(398, 'Central Sulawesi', 'ID-ST', 'ID'),
(399, 'East Java', 'ID-JI', 'ID'),
(400, 'East Kalimantan', 'ID-KI', 'ID'),
(401, 'East Nusa Tenggara', 'ID-NT', 'ID'),
(402, 'Gorontalo', 'ID-GO', 'ID'),
(403, 'Jakarta Special Capital Region', 'ID-JK', 'ID'),
(404, 'Jambi', 'ID-JA', 'ID'),
(405, 'Lampung', 'ID-LA', 'ID'),
(406, 'Maluku', 'ID-MA', 'ID'),
(407, 'North Kalimantan', 'ID-KU', 'ID'),
(408, 'North Maluku', 'ID-MU', 'ID'),
(409, 'North Sulawesi', 'ID-SA', 'ID'),
(410, 'North Sumatra', 'ID-SU', 'ID'),
(411, 'Special Region of Papua', 'ID-PA', 'ID'),
(412, 'Riau', 'ID-RI', 'ID'),
(413, 'Riau Islands', 'ID-KR', 'ID'),
(414, 'Southeast Sulawesi', 'ID-SG', 'ID'),
(415, 'South Kalimantan', 'ID-KS', 'ID'),
(416, 'South Sulawesi', 'ID-SN', 'ID'),
(417, 'South Sumatra', 'ID-SS', 'ID'),
(418, 'West Java', 'ID-JB', 'ID'),
(419, 'West Kalimantan', 'ID-KB', 'ID'),
(420, 'West Nusa Tenggara', 'ID-NB', 'ID'),
(421, 'Special Region of West Papua', 'ID-PB', 'ID'),
(422, 'West Sulawesi', 'ID-SR', 'ID'),
(423, 'West Sumatra', 'ID-SB', 'ID'),
(424, 'Special Region of Yogyakarta', 'ID-YO', 'ID'),
(425, 'Irbid', 'Irbid', 'JO'),
(426, 'Ajloun', 'Ajloun', 'JO'),
(427, 'Jerash', 'Jerash', 'JO'),
(428, 'Mafraq', 'Mafraq', 'JO'),
(429, 'Balqa', 'Balqa', 'JO'),
(430, 'Amman', 'Amman', 'JO'),
(431, 'Zarqa', 'Zarqa', 'JO'),
(432, 'Madaba', 'Madaba', 'JO'),
(433, 'Karak', 'Karak', 'JO'),
(434, 'Tafilah', 'Tafilah', 'JO'),
(435, 'Ma\'an', 'Ma\'an', 'JO'),
(436, 'Aqaba', 'Aqaba', 'JO'),
(437, 'Andhra Pradesh', 'AP', 'IN'),
(438, 'Arunachal Pradesh', 'AR', 'IN'),
(439, 'Assam', 'AS', 'IN'),
(440, 'Bihar', 'BR', 'IN'),
(441, 'Chhattisgarh', 'CT', 'IN'),
(442, 'Goa', 'GA', 'IN'),
(443, 'Gujarat', 'GJ', 'IN'),
(444, 'Haryana', 'HR', 'IN'),
(445, 'Himachal Pradesh', 'HP', 'IN'),
(446, 'Jammu and Kashmir', 'JK', 'IN'),
(447, 'Jharkhand', 'JH', 'IN'),
(448, 'Karnataka', 'KA', 'IN'),
(449, 'Kerala', 'KL', 'IN'),
(450, 'Madhya Pradesh', 'MP', 'IN'),
(451, 'Maharashtra', 'MH', 'IN'),
(452, 'Manipur', 'MN', 'IN'),
(453, 'Meghalaya', 'ML', 'IN'),
(454, 'Mizoram', 'MZ', 'IN'),
(455, 'Nagaland', 'NL', 'IN'),
(456, 'Odisha', 'OR', 'IN'),
(457, 'Punjab', 'PB', 'IN'),
(458, 'Rajasthan', 'RJ', 'IN'),
(459, 'Sikkim', 'SK', 'IN'),
(460, 'Tamil Nadu', 'TN', 'IN'),
(461, 'Telangana', 'TG', 'IN'),
(462, 'Tripura', 'TR', 'IN'),
(463, 'Uttar Pradesh', 'UP', 'IN'),
(464, 'Uttarakhand', 'UT', 'IN'),
(465, 'West Bengal', 'WB', 'IN'),
(466, 'Andaman and Nicobar Islands', 'AN', 'IN'),
(467, 'Chandigarh', 'CH', 'IN'),
(468, 'Dadra and Nagar Haveli', 'DN', 'IN'),
(469, 'Daman and Diu', 'DD', 'IN'),
(470, 'Lakshadweep', 'LD', 'IN'),
(471, 'National Capital Territory of Delhi', 'DL', 'IN'),
(472, 'Puducherry', 'PY', 'IN'),
(473, 'Phnom Penh Municipality', 'Phnom Penh Municipality', 'KH'),
(474, 'Banteay Meanchey', 'Banteay Meanchey', 'KH'),
(475, 'Battambang', 'Battambang', 'KH'),
(476, 'Kampong Cham', 'Kampong Cham', 'KH'),
(477, 'Kampong Chhnang', 'Kampong Chhnang', 'KH'),
(478, 'Kampong Speu', 'Kampong Speu', 'KH'),
(479, 'Kampong Thom', 'Kampong Thom', 'KH'),
(480, 'Kampot', 'Kampot', 'KH'),
(481, 'Kandal', 'Kandal', 'KH'),
(482, 'Koh Kong', 'Koh Kong', 'KH'),
(483, 'Kep', 'Kep', 'KH'),
(484, 'Kratié', 'Kratié', 'KH'),
(485, 'Mondulkiri', 'Mondulkiri', 'KH'),
(486, 'Oddar Meanchey', 'Oddar Meanchey', 'KH'),
(487, 'Pailin', 'Pailin', 'KH'),
(488, 'Preah Sihanouk', 'Preah Sihanouk', 'KH'),
(489, 'Preah Vihear', 'Preah Vihear', 'KH'),
(490, 'Pursat', 'Pursat', 'KH'),
(491, 'Prey Veng', 'Prey Veng', 'KH'),
(492, 'Ratanakiri', 'Ratanakiri', 'KH'),
(493, 'Siem Reap', 'Siem Reap', 'KH'),
(494, 'Stung Treng', 'Stung Treng', 'KH'),
(495, 'Svay Rieng', 'Svay Rieng', 'KH'),
(496, 'Takéo', 'Takéo', 'KH'),
(497, 'Tbong Khmum', 'Tbong Khmum', 'KH'),
(498, 'Addis Ababa', 'Addis Ababa', 'ET'),
(499, 'Afar Region', 'Afar Region', 'ET'),
(500, 'Amhara Region', 'Amhara Region', 'ET'),
(501, 'Benishangul-Gumuz', 'Benishangul-Gumuz', 'ET'),
(502, 'Dire Dawa', 'Dire Dawa', 'ET'),
(503, 'Gambela', 'Gambela', 'ET'),
(504, 'Harari', 'Harari', 'ET'),
(505, 'Oromia', 'Oromia', 'ET'),
(506, 'Somali', 'Somali', 'ET'),
(507, 'Tigray Region', 'Tigray Region', 'ET'),
(508, 'Chachapoyas', 'Chachapoyas', 'PE'),
(509, 'Bagua', 'Bagua', 'PE'),
(510, 'Bongará', 'Bongará', 'PE'),
(511, 'Condorcanqui', 'Condorcanqui', 'PE'),
(512, 'Luya', 'Luya', 'PE'),
(513, 'Rodríguez de Mendoza', 'Rodríguez de Mendoza', 'PE'),
(514, 'Utcubamba', 'Utcubamba', 'PE'),
(515, 'Huaraz', 'Huaraz', 'PE'),
(516, 'Aija', 'Aija', 'PE'),
(517, 'Antonio Raymondi', 'Antonio Raymondi', 'PE'),
(518, 'Asunción', 'Asunción', 'PE'),
(519, 'Bolognesi', 'Bolognesi', 'PE'),
(520, 'Carhuaz', 'Carhuaz', 'PE'),
(521, 'Carlos Fermín Fitzcarrald', 'Carlos Fermín Fitzcarrald', 'PE'),
(522, 'Casma', 'Casma', 'PE'),
(523, 'Corongo', 'Corongo', 'PE'),
(524, 'Huari', 'Huari', 'PE'),
(525, 'Huarmey', 'Huarmey', 'PE'),
(526, 'Huaylas', 'Huaylas', 'PE'),
(527, 'Mariscal Luzuriaga', 'Mariscal Luzuriaga', 'PE'),
(528, 'Ocros', 'Ocros', 'PE'),
(529, 'Pallasca', 'Pallasca', 'PE'),
(530, 'Pomabamba', 'Pomabamba', 'PE'),
(531, 'Recuay', 'Recuay', 'PE'),
(532, 'Santa', 'Santa', 'PE'),
(533, 'Sihuas', 'Sihuas', 'PE'),
(534, 'Yungay', 'Yungay', 'PE'),
(535, 'Abancay', 'Abancay', 'PE'),
(536, 'Andahuaylas', 'Andahuaylas', 'PE'),
(537, 'Antabamba', 'Antabamba', 'PE'),
(538, 'Aymaraes', 'Aymaraes', 'PE'),
(539, 'Cotabambas', 'Cotabambas', 'PE'),
(540, 'Chincheros', 'Chincheros', 'PE'),
(541, 'Grau', 'Grau', 'PE'),
(542, 'Arequipa', 'Arequipa', 'PE'),
(543, 'Camaná', 'Camaná', 'PE'),
(544, 'Caravelí', 'Caravelí', 'PE'),
(545, 'Castilla', 'Castilla', 'PE'),
(546, 'Caylloma', 'Caylloma', 'PE'),
(547, 'Condesuyos', 'Condesuyos', 'PE'),
(548, 'Southern Nations, Nationalities, and Peoples\' Region', 'Southern Nations, Nationalities, and Peoples\' Region', 'ET'),
(549, 'Islay', 'Islay', 'PE'),
(550, 'La Unión', 'La Unión', 'PE'),
(551, 'Huamanga', 'Huamanga', 'PE'),
(552, 'Cangallo', 'Cangallo', 'PE'),
(553, 'Huanca Sancos', 'Huanca Sancos', 'PE'),
(554, 'Huanta', 'Huanta', 'PE'),
(555, 'La Mar', 'La Mar', 'PE'),
(556, 'Lucanas', 'Lucanas', 'PE'),
(557, 'Parinacochas', 'Parinacochas', 'PE'),
(558, 'Páucar del Sara Sara', 'Páucar del Sara Sara', 'PE'),
(559, 'Sucre', 'Sucre', 'PE'),
(560, 'Víctor Fajardo', 'Víctor Fajardo', 'PE'),
(561, 'Vilcas Huamán', 'Vilcas Huamán', 'PE'),
(562, 'Cajamarca', 'Cajamarca', 'PE'),
(563, 'Cajabamba', 'Cajabamba', 'PE'),
(564, 'Celendín', 'Celendín', 'PE'),
(565, 'Chota', 'Chota', 'PE'),
(566, 'Contumazá', 'Contumazá', 'PE'),
(567, 'Cutervo', 'Cutervo', 'PE'),
(568, 'Hualgayoc', 'Hualgayoc', 'PE'),
(569, 'Jaén', 'Jaén', 'PE'),
(570, 'San Ignacio', 'San Ignacio', 'PE'),
(571, 'San Marcos', 'San Marcos', 'PE'),
(572, 'San Miguel', 'San Miguel', 'PE'),
(573, 'San Pablo', 'San Pablo', 'PE'),
(574, 'Santa Cruz', 'Santa Cruz', 'PE'),
(575, 'Callao', 'Callao', 'PE'),
(576, 'Cusco', 'Cusco', 'PE'),
(577, 'Acomayo', 'Acomayo', 'PE'),
(578, 'Anta', 'Anta', 'PE'),
(579, 'Calca', 'Calca', 'PE'),
(580, 'Canas', 'Canas', 'PE'),
(581, 'Canchis', 'Canchis', 'PE'),
(582, 'Chumbivilcas', 'Chumbivilcas', 'PE'),
(583, 'Espinar', 'Espinar', 'PE'),
(584, 'La Convención', 'La Convención', 'PE'),
(585, 'Paruro', 'Paruro', 'PE'),
(586, 'Paucartambo', 'Paucartambo', 'PE'),
(587, 'Quispicanchi', 'Quispicanchi', 'PE'),
(588, 'Urubamba', 'Urubamba', 'PE'),
(589, 'Huancavelica', 'Huancavelica', 'PE'),
(590, 'Acobamba', 'Acobamba', 'PE'),
(591, 'Angaraes', 'Angaraes', 'PE'),
(592, 'Castrovirreyna', 'Castrovirreyna', 'PE'),
(593, 'Churcampa', 'Churcampa', 'PE'),
(594, 'Huaytará', 'Huaytará', 'PE'),
(595, 'Tayacaja', 'Tayacaja', 'PE'),
(596, 'Huánuco', 'Huánuco', 'PE'),
(597, 'Ambo', 'Ambo', 'PE'),
(598, 'Dos de Mayo', 'Dos de Mayo', 'PE'),
(599, 'Huacaybamba', 'Huacaybamba', 'PE'),
(600, 'Huamalíes', 'Huamalíes', 'PE'),
(601, 'Leoncio Prado', 'Leoncio Prado', 'PE'),
(602, 'Marañón', 'Marañón', 'PE'),
(603, 'Pachitea', 'Pachitea', 'PE'),
(604, 'Puerto Inca', 'Puerto Inca', 'PE'),
(605, 'Lauricocha', 'Lauricocha', 'PE'),
(606, 'Yarowilca', 'Yarowilca', 'PE'),
(607, 'Ica', 'Ica', 'PE'),
(608, 'Chincha', 'Chincha', 'PE'),
(609, 'Nazca', 'Nazca', 'PE'),
(610, 'Palpa', 'Palpa', 'PE'),
(611, 'Pisco', 'Pisco', 'PE'),
(612, 'Huancayo', 'Huancayo', 'PE'),
(613, 'Concepción', 'Concepción', 'PE'),
(614, 'Chanchamayo', 'Chanchamayo', 'PE'),
(615, 'Jauja', 'Jauja', 'PE'),
(616, 'Junín', 'Junín', 'PE'),
(617, 'Satipo', 'Satipo', 'PE'),
(618, 'Tarma', 'Tarma', 'PE'),
(619, 'Yauli', 'Yauli', 'PE'),
(620, 'Chupaca', 'Chupaca', 'PE'),
(621, 'Trujillo', 'Trujillo', 'PE'),
(622, 'Ascope', 'Ascope', 'PE'),
(623, 'Bolívar', 'Bolívar', 'PE'),
(624, 'Chepén', 'Chepén', 'PE'),
(625, 'Julcán', 'Julcán', 'PE'),
(626, 'Otuzco', 'Otuzco', 'PE'),
(627, 'Pacasmayo', 'Pacasmayo', 'PE'),
(628, 'Pataz', 'Pataz', 'PE'),
(629, 'Sánchez Carrión', 'Sánchez Carrión', 'PE'),
(630, 'Santiago de Chuco', 'Santiago de Chuco', 'PE'),
(631, 'Gran Chimú', 'Gran Chimú', 'PE'),
(632, 'Virú', 'Virú', 'PE'),
(633, 'Chiclayo', 'Chiclayo', 'PE'),
(634, 'Ferreñafe', 'Ferreñafe', 'PE'),
(635, 'Lambayeque', 'Lambayeque', 'PE'),
(636, 'Lima', 'Lima', 'PE'),
(637, 'Huaura', 'Huaura', 'PE'),
(638, 'Barranca', 'Barranca', 'PE'),
(639, 'Cajatambo', 'Cajatambo', 'PE'),
(640, 'Canta', 'Canta', 'PE'),
(641, 'Cañete', 'Cañete', 'PE'),
(642, 'Huaral', 'Huaral', 'PE'),
(643, 'Huarochirí', 'Huarochirí', 'PE'),
(644, 'Oyón', 'Oyón', 'PE'),
(645, 'Yauyos', 'Yauyos', 'PE'),
(646, 'Maynas', 'Maynas', 'PE'),
(647, 'Alto Amazonas', 'Alto Amazonas', 'PE'),
(648, 'Loreto', 'Loreto', 'PE'),
(649, 'Mariscal Ramón Castilla', 'Mariscal Ramón Castilla', 'PE'),
(650, 'Putumayo', 'Putumayo', 'PE'),
(651, 'Requena', 'Requena', 'PE'),
(652, 'Ucayali', 'Ucayali', 'PE'),
(653, 'Datem del Marañón', 'Datem del Marañón', 'PE'),
(654, 'Tambopata', 'Tambopata', 'PE'),
(655, 'Manú', 'Manú', 'PE'),
(656, 'Tahuamanu', 'Tahuamanu', 'PE'),
(657, 'Mariscal Nieto', 'Mariscal Nieto', 'PE'),
(658, 'General Sánchez Cerro', 'General Sánchez Cerro', 'PE'),
(659, 'Ilo', 'Ilo', 'PE'),
(660, 'Pasco', 'Pasco', 'PE'),
(661, 'Daniel Alcídes Carrión', 'Daniel Alcídes Carrión', 'PE'),
(662, 'Oxapampa', 'Oxapampa', 'PE'),
(663, 'Piura', 'Piura', 'PE'),
(664, 'Ayabaca', 'Ayabaca', 'PE'),
(665, 'Huancabamba', 'Huancabamba', 'PE'),
(666, 'Morropón', 'Morropón', 'PE'),
(667, 'Paita', 'Paita', 'PE'),
(668, 'Sullana', 'Sullana', 'PE'),
(669, 'Talara', 'Talara', 'PE'),
(670, 'Sechura', 'Sechura', 'PE'),
(671, 'Puno', 'Puno', 'PE'),
(672, 'Azángaro', 'Azángaro', 'PE'),
(673, 'Carabaya', 'Carabaya', 'PE'),
(674, 'Chucuito', 'Chucuito', 'PE'),
(675, 'El Collao', 'El Collao', 'PE'),
(676, 'Huancané', 'Huancané', 'PE'),
(677, 'Lampa', 'Lampa', 'PE'),
(678, 'Melgar', 'Melgar', 'PE'),
(679, 'Moho', 'Moho', 'PE'),
(680, 'San Antonio de Putina', 'San Antonio de Putina', 'PE'),
(681, 'San Román', 'San Román', 'PE'),
(682, 'Sandia', 'Sandia', 'PE'),
(683, 'Yunguyo', 'Yunguyo', 'PE'),
(684, 'Moyobamba', 'Moyobamba', 'PE'),
(685, 'Bellavista', 'Bellavista', 'PE'),
(686, 'El Dorado', 'El Dorado', 'PE'),
(687, 'Huallaga', 'Huallaga', 'PE'),
(688, 'Lamas', 'Lamas', 'PE'),
(689, 'Mariscal Cáceres', 'Mariscal Cáceres', 'PE'),
(690, 'Picota', 'Picota', 'PE'),
(691, 'Rioja', 'Rioja', 'PE'),
(692, 'San Martín', 'San Martín', 'PE'),
(693, 'Tocache', 'Tocache', 'PE'),
(694, 'Tacna', 'Tacna', 'PE'),
(695, 'Candarave', 'Candarave', 'PE'),
(696, 'Jorge Basadre', 'Jorge Basadre', 'PE'),
(697, 'Tarata', 'Tarata', 'PE'),
(698, 'Tumbes', 'Tumbes', 'PE'),
(699, 'Contralmirante Villar', 'Contralmirante Villar', 'PE'),
(700, 'Zarumilla', 'Zarumilla', 'PE'),
(701, 'Coronel Portillo', 'Coronel Portillo', 'PE'),
(702, 'Atalaya', 'Atalaya', 'PE'),
(703, 'Padre Abad', 'Padre Abad', 'PE'),
(704, 'Purús', 'Purús', 'PE'),
(705, 'Camagüey', 'Camagüey', 'CU'),
(706, 'Ciego de Ávila', 'Ciego de Ávila', 'CU'),
(707, 'Cienfuegos', 'Cienfuegos', 'CU'),
(708, 'Havana', 'Havana', 'CU'),
(709, 'Bayamo', 'Bayamo', 'CU'),
(710, 'Guantánamo', 'Guantánamo', 'CU'),
(711, 'Holguín', 'Holguín', 'CU'),
(712, 'Nueva Gerona', 'Nueva Gerona', 'CU'),
(713, 'Artemisa', 'Artemisa', 'CU'),
(714, 'Las Tunas', 'Las Tunas', 'CU'),
(715, 'Matanzas', 'Matanzas', 'CU'),
(716, 'San José de las Lajas', 'San José de las Lajas', 'CU'),
(717, 'Pinar del Río', 'Pinar del Río', 'CU'),
(718, 'Sancti Spíritus', 'Sancti Spíritus', 'CU'),
(719, 'Santiago de Cuba', 'Santiago de Cuba', 'CU'),
(720, 'Santa Clara', 'Santa Clara', 'CU'),
(721, 'Ciudad Autónoma de Buenos Aires', 'Ciudad Autónoma de Buenos Aires', 'AR'),
(722, 'Buenos Aires', 'Buenos Aires', 'AR'),
(723, 'Catamarca', 'Catamarca', 'AR'),
(724, 'Chaco', 'Chaco', 'AR'),
(725, 'Chubut', 'Chubut', 'AR'),
(726, 'Córdoba', 'Córdoba', 'AR'),
(727, 'Corrientes', 'Corrientes', 'AR'),
(728, 'Entre Ríos', 'Entre Ríos', 'AR'),
(729, 'Formosa', 'Formosa', 'AR'),
(730, 'Jujuy', 'Jujuy', 'AR'),
(731, 'La Pampa', 'La Pampa', 'AR'),
(732, 'La Rioja', 'La Rioja', 'AR'),
(733, 'Mendoza', 'Mendoza', 'AR'),
(734, 'Misiones', 'Misiones', 'AR'),
(735, 'Neuquén', 'Neuquén', 'AR'),
(736, 'Río Negro', 'Río Negro', 'AR'),
(737, 'Salta', 'Salta', 'AR'),
(738, 'San Juan', 'San Juan', 'AR'),
(739, 'San Luis', 'San Luis', 'AR'),
(740, 'Santa Cruz', 'Santa Cruz', 'AR'),
(741, 'Santa Fe', 'Santa Fe', 'AR'),
(742, 'Santiago del Estero', 'Santiago del Estero', 'AR'),
(743, 'Tierra del Fuego, Antártida e Islas del Atlántico Sur', 'Tierra del Fuego, Antártida e Islas del Atlántico Sur', 'AR'),
(744, 'Tucumán', 'Tucumán', 'AR'),
(745, 'Arica', 'Arica', 'CL'),
(746, 'Parinacota', 'Parinacota', 'CL'),
(747, 'Iquique', 'Iquique', 'CL'),
(748, 'Tamarugal', 'Tamarugal', 'CL'),
(749, 'Antofagasta', 'Antofagasta', 'CL'),
(750, 'El Loa', 'El Loa', 'CL'),
(751, 'Tocopilla', 'Tocopilla', 'CL'),
(752, 'Copiapó', 'Copiapó', 'CL'),
(753, 'Huasco', 'Huasco', 'CL'),
(754, 'Chañaral', 'Chañaral', 'CL'),
(755, 'Elqui', 'Elqui', 'CL'),
(756, 'Limarí', 'Limarí', 'CL'),
(757, 'Choapa', 'Choapa', 'CL'),
(758, 'Isla de Pascua', 'Isla de Pascua', 'CL'),
(759, 'Los Andes', 'Los Andes', 'CL'),
(760, 'Marga Marga', 'Marga Marga', 'CL'),
(761, 'Petorca', 'Petorca', 'CL'),
(762, 'Quillota', 'Quillota', 'CL'),
(763, 'San Antonio', 'San Antonio', 'CL'),
(764, 'San Felipe de Aconcagua', 'San Felipe de Aconcagua', 'CL'),
(765, 'Valparaíso', 'Valparaíso', 'CL'),
(766, 'Cachapoal', 'Cachapoal', 'CL'),
(767, 'Colchagua', 'Colchagua', 'CL'),
(768, 'Cardenal Caro', 'Cardenal Caro', 'CL'),
(769, 'Talca', 'Talca', 'CL'),
(770, 'Linares', 'Linares', 'CL'),
(771, 'Curicó', 'Curicó', 'CL'),
(772, 'Cauquenes', 'Cauquenes', 'CL'),
(773, 'Concepción', 'Concepción', 'CL'),
(774, 'Ñuble', 'Ñuble', 'CL'),
(775, 'Biobío', 'Biobío', 'CL'),
(776, 'Arauco', 'Arauco', 'CL'),
(777, 'Cautin', 'Cautin', 'CL'),
(778, 'Malleco', 'Malleco', 'CL'),
(779, 'Valdivia', 'Valdivia', 'CL'),
(780, 'Ranco', 'Ranco', 'CL'),
(781, 'Llanquihue', 'Llanquihue', 'CL'),
(782, 'Osorno', 'Osorno', 'CL'),
(783, 'Chiloe', 'Chiloe', 'CL'),
(784, 'Palena', 'Palena', 'CL'),
(785, 'Coihaique', 'Coihaique', 'CL'),
(786, 'Aisén', 'Aisén', 'CL'),
(787, 'General Carrera', 'General Carrera', 'CL'),
(788, 'Capitan Prat', 'Capitan Prat', 'CL'),
(789, 'Magallanes', 'Magallanes', 'CL'),
(790, 'Ultima Esperanza', 'Ultima Esperanza', 'CL'),
(791, 'Tierra del Fuego', 'Tierra del Fuego', 'CL'),
(792, 'Antártica Chilena', 'Antártica Chilena', 'CL'),
(793, 'Santiago', 'Santiago', 'CL'),
(794, 'Cordillera', 'Cordillera', 'CL'),
(795, 'Maipo', 'Maipo', 'CL'),
(796, 'Talagante', 'Talagante', 'CL'),
(797, 'Melipilla', 'Melipilla', 'CL'),
(798, 'Chacabuco', 'Chacabuco', 'CL'),
(799, 'Cercado', 'Cercado', 'BO'),
(800, 'Iténez', 'Iténez', 'BO'),
(801, 'José Ballivián', 'José Ballivián', 'BO'),
(802, 'Mamoré', 'Mamoré', 'BO'),
(803, 'Marbán', 'Marbán', 'BO'),
(804, 'Moxos', 'Moxos', 'BO'),
(805, 'Vaca Díez', 'Vaca Díez', 'BO'),
(806, 'Yacuma', 'Yacuma', 'BO'),
(807, 'Azurduy', 'Azurduy', 'BO'),
(808, 'Belisario Boeto', 'Belisario Boeto', 'BO'),
(809, 'Hernando Siles', 'Hernando Siles', 'BO'),
(810, 'Jaime Zudáñez', 'Jaime Zudáñez', 'BO'),
(811, 'Luis Calvo', 'Luis Calvo', 'BO'),
(812, 'Nor Cinti', 'Nor Cinti', 'BO'),
(813, 'Oropeza', 'Oropeza', 'BO'),
(814, 'Sud Cinti', 'Sud Cinti', 'BO'),
(815, 'Tomina', 'Tomina', 'BO'),
(816, 'Yamparáez', 'Yamparáez', 'BO'),
(817, 'Arani', 'Arani', 'BO'),
(818, 'Arque', 'Arque', 'BO'),
(819, 'Ayopaya', 'Ayopaya', 'BO'),
(820, 'Capinota', 'Capinota', 'BO'),
(821, 'Carrasco', 'Carrasco', 'BO'),
(822, 'Chapare', 'Chapare', 'BO'),
(823, 'Esteban Arce', 'Esteban Arce', 'BO'),
(824, 'Germán Jordán', 'Germán Jordán', 'BO'),
(825, 'Mizque', 'Mizque', 'BO'),
(826, 'Campero', 'Campero', 'BO'),
(827, 'Punata', 'Punata', 'BO'),
(828, 'Quillacollo', 'Quillacollo', 'BO'),
(829, 'Bolívar', 'Bolívar', 'BO'),
(830, 'Tapacarí', 'Tapacarí', 'BO'),
(831, 'Tiraque', 'Tiraque', 'BO'),
(832, 'Abel Iturralde', 'Abel Iturralde', 'BO'),
(833, 'Aroma', 'Aroma', 'BO'),
(834, 'Bautista Saavedra', 'Bautista Saavedra', 'BO'),
(835, 'Caranavi', 'Caranavi', 'BO'),
(836, 'Eliodoro Camacho', 'Eliodoro Camacho', 'BO'),
(837, 'Franz Tamayo', 'Franz Tamayo', 'BO'),
(838, 'Gualberto Villarroel', 'Gualberto Villarroel', 'BO'),
(839, 'Ingavi', 'Ingavi', 'BO'),
(840, 'Inquisivi', 'Inquisivi', 'BO'),
(841, 'José Manuel Pando', 'José Manuel Pando', 'BO'),
(842, 'Larecaja', 'Larecaja', 'BO'),
(843, 'Loayza', 'Loayza', 'BO'),
(844, 'Los Andes', 'Los Andes', 'BO'),
(845, 'Manco Kapac', 'Manco Kapac', 'BO'),
(846, 'Muñecas', 'Muñecas', 'BO'),
(847, 'Nor Yungas', 'Nor Yungas', 'BO'),
(848, 'Omasuyos', 'Omasuyos', 'BO'),
(849, 'Pacajes', 'Pacajes', 'BO'),
(850, 'Murillo', 'Murillo', 'BO'),
(851, 'Sud Yungas', 'Sud Yungas', 'BO'),
(852, 'Atahuallpa', 'Atahuallpa', 'BO'),
(853, 'Carangas', 'Carangas', 'BO'),
(854, 'Eduardo Avaroa', 'Eduardo Avaroa', 'BO'),
(855, 'Ladislao Cabrera', 'Ladislao Cabrera', 'BO'),
(856, 'Litoral', 'Litoral', 'BO'),
(857, 'Nor Carangas', 'Nor Carangas', 'BO'),
(858, 'Pantaléon Dalence', 'Pantaléon Dalence', 'BO'),
(859, 'Poopó', 'Poopó', 'BO'),
(860, 'Puerto de Mejillones', 'Puerto de Mejillones', 'BO'),
(861, 'Sajama', 'Sajama', 'BO'),
(862, 'San Pedro de Totora', 'San Pedro de Totora', 'BO'),
(863, 'Saucarí', 'Saucarí', 'BO'),
(864, 'Sebastián Pagador', 'Sebastián Pagador', 'BO'),
(865, 'Sud Carangas', 'Sud Carangas', 'BO'),
(866, 'Tomas Barrón', 'Tomas Barrón', 'BO'),
(867, 'Abuná', 'Abuná', 'BO'),
(868, 'Federico Román', 'Federico Román', 'BO'),
(869, 'Madre de Dios', 'Madre de Dios', 'BO'),
(870, 'Manuripi', 'Manuripi', 'BO'),
(871, 'Nicolás Suárez', 'Nicolás Suárez', 'BO'),
(872, 'Alonso de Ibáñez', 'Alonso de Ibáñez', 'BO'),
(873, 'Antonio Quijarro', 'Antonio Quijarro', 'BO'),
(874, 'Bernardino Bilbao', 'Bernardino Bilbao', 'BO'),
(875, 'Charcas', 'Charcas', 'BO'),
(876, 'Chayanta', 'Chayanta', 'BO'),
(877, 'Cornelio Saavedra', 'Cornelio Saavedra', 'BO'),
(878, 'Daniel Campos', 'Daniel Campos', 'BO'),
(879, 'Enrique Baldivieso', 'Enrique Baldivieso', 'BO'),
(880, 'José María Linares', 'José María Linares', 'BO'),
(881, 'Modesto Omiste', 'Modesto Omiste', 'BO'),
(882, 'Nor Chichas', 'Nor Chichas', 'BO'),
(883, 'Nor Lípez', 'Nor Lípez', 'BO'),
(884, 'Rafael Bustillo', 'Rafael Bustillo', 'BO'),
(885, 'Sur Chichas', 'Sur Chichas', 'BO'),
(886, 'Sur Lípez', 'Sur Lípez', 'BO'),
(887, 'Tomás Frías', 'Tomás Frías', 'BO'),
(888, 'Andrés Ibáñez', 'Andrés Ibáñez', 'BO'),
(889, 'Ángel Sandoval', 'Ángel Sandoval', 'BO'),
(890, 'Chiquitos', 'Chiquitos', 'BO'),
(891, 'Cordillera', 'Cordillera', 'BO'),
(892, 'Florida', 'Florida', 'BO'),
(893, 'Germán Busch', 'Germán Busch', 'BO'),
(894, 'Guarayos', 'Guarayos', 'BO'),
(895, 'Ichilo', 'Ichilo', 'BO'),
(896, 'Ignacio Warnes', 'Ignacio Warnes', 'BO'),
(897, 'José Miguel de Velasco', 'José Miguel de Velasco', 'BO'),
(898, 'Manuel María Caballero', 'Manuel María Caballero', 'BO'),
(899, 'Ñuflo de Chávez', 'Ñuflo de Chávez', 'BO'),
(900, 'Obispo Santistevan', 'Obispo Santistevan', 'BO'),
(901, 'Sara', 'Sara', 'BO'),
(902, 'Vallegrande', 'Vallegrande', 'BO'),
(903, 'Aniceto Arce', 'Aniceto Arce', 'BO'),
(904, 'Burnet O\'Connor', 'Burnet O\'Connor', 'BO'),
(905, 'Eustaquio Méndez', 'Eustaquio Méndez', 'BO'),
(906, 'Gran Chaco', 'Gran Chaco', 'BO'),
(907, 'José María Avilés', 'José María Avilés', 'BO'),
(908, 'La Coruña', 'C', 'ES'),
(909, 'Lugo', 'LU', 'ES'),
(910, 'Vizcaya', 'BI', 'ES'),
(911, 'Guipúzcoa', 'SS', 'ES'),
(912, 'Huesca', 'HU', 'ES'),
(913, 'Lérida', 'L', 'ES'),
(914, 'Gerona', 'GI', 'ES'),
(915, 'Barcelona', 'B', 'ES'),
(916, 'Tarragona', 'T', 'ES'),
(917, 'Castellón', 'CS', 'ES'),
(918, 'Valencia', 'V', 'ES'),
(919, 'Alicante', 'A', 'ES'),
(920, 'Murcia', 'MU', 'ES'),
(921, 'Zaragoza', 'Z', 'ES'),
(922, 'Teruel', 'TE', 'ES'),
(923, 'Cuenca', 'CU', 'ES'),
(924, 'Albacete', 'AB', 'ES'),
(925, 'Almeria', 'AL', 'ES'),
(926, 'Granada', 'GR', 'ES'),
(927, 'Málaga', 'MA', 'ES'),
(928, 'Tenerife', 'TF', 'ES'),
(929, 'Cádiz', 'CA', 'ES'),
(930, 'Sevilla', 'SE', 'ES'),
(931, 'Huelva', 'H', 'ES'),
(932, 'Las Palmas', 'GC', 'ES'),
(933, 'Madrid', 'M', 'ES'),
(934, 'Badajoz', 'BA', 'ES'),
(935, 'Cáceres', 'CC', 'ES'),
(936, 'Toledo', 'TO', 'ES'),
(937, 'Ciudad Real', 'CR', 'ES'),
(938, 'Salamanca', 'SA', 'ES'),
(939, 'Córdoba', 'CO', 'ES'),
(940, 'Jaén', 'J', 'ES'),
(941, 'Ávila', 'AV', 'ES'),
(942, 'Valladolid', 'VA', 'ES'),
(943, 'Zamora', 'ZA', 'ES'),
(944, 'Álava', 'VI', 'ES'),
(945, 'Segovia', 'SG', 'ES'),
(946, 'Burgos', 'BU', 'ES'),
(947, 'Pontevedra', 'PO', 'ES'),
(948, 'León', 'LE', 'ES'),
(949, 'Orense', 'OU', 'ES'),
(950, 'Palencia', 'P', 'ES'),
(951, 'La Rioja', 'LO', 'ES'),
(952, 'Soria', 'SO', 'ES'),
(953, 'Guadalajara', 'GU', 'ES'),
(954, 'Barguna', 'Barguna', 'BD'),
(955, 'Barisal', 'Barisal', 'BD'),
(956, 'Bhola', 'Bhola', 'BD'),
(957, 'Jhalokati', 'Jhalokati', 'BD'),
(958, 'Patuakhali', 'Patuakhali', 'BD'),
(959, 'Pirojpur', 'Pirojpur', 'BD'),
(960, 'Bandarban', 'Bandarban', 'BD'),
(961, 'Brahmanbaria', 'Brahmanbaria', 'BD'),
(962, 'Chandpur', 'Chandpur', 'BD'),
(963, 'Chittagong', 'Chittagong', 'BD'),
(964, 'Comilla', 'Comilla', 'BD'),
(965, 'Feni', 'Feni', 'BD'),
(966, 'Khagrachhari', 'Khagrachhari', 'BD'),
(967, 'Lakshmipur', 'Lakshmipur', 'BD'),
(968, 'Noakhali', 'Noakhali', 'BD'),
(969, 'Rangamati', 'Rangamati', 'BD'),
(970, 'Dhaka', 'Dhaka', 'BD'),
(971, 'Faridpur', 'Faridpur', 'BD'),
(972, 'Gazipur', 'Gazipur', 'BD'),
(973, 'Gopalganj', 'Gopalganj', 'BD'),
(974, 'Jamalpur', 'Jamalpur', 'BD'),
(975, 'Kishoreganj', 'Kishoreganj', 'BD'),
(976, 'Madaripur', 'Madaripur', 'BD'),
(977, 'Manikganj', 'Manikganj', 'BD'),
(978, 'Munshiganj', 'Munshiganj', 'BD'),
(979, 'Mymensingh', 'Mymensingh', 'BD'),
(980, 'Narayanganj', 'Narayanganj', 'BD'),
(981, 'Narsingdi', 'Narsingdi', 'BD'),
(982, 'Netrakona', 'Netrakona', 'BD'),
(983, 'Rajbari', 'Rajbari', 'BD'),
(984, 'Shariatpur', 'Shariatpur', 'BD'),
(985, 'Sherpur', 'Sherpur', 'BD'),
(986, 'Tangail', 'Tangail', 'BD'),
(987, 'Bagerhat', 'Bagerhat', 'BD'),
(988, 'Chuadanga', 'Chuadanga', 'BD'),
(989, 'Jessore', 'Jessore', 'BD'),
(990, 'Jhenaidah', 'Jhenaidah', 'BD'),
(991, 'Khulna', 'Khulna', 'BD'),
(992, 'Kushtia', 'Kushtia', 'BD'),
(993, 'Magura', 'Magura', 'BD'),
(994, 'Meherpur', 'Meherpur', 'BD'),
(995, 'Narail', 'Narail', 'BD'),
(996, 'Satkhira', 'Satkhira', 'BD'),
(997, 'Bogra', 'Bogra', 'BD'),
(998, 'Joypurhat', 'Joypurhat', 'BD'),
(999, 'Naogaon', 'Naogaon', 'BD'),
(1000, 'Natore', 'Natore', 'BD'),
(1001, 'Chapainawabganj', 'Chapainawabganj', 'BD'),
(1002, 'Pabna', 'Pabna', 'BD'),
(1003, 'Rajshahi', 'Rajshahi', 'BD'),
(1004, 'Cox\'s Bazar', 'Cox\'s Bazar', 'BD'),
(1005, 'Sirajganj', 'Sirajganj', 'BD'),
(1006, 'Dinajpur', 'Dinajpur', 'BD'),
(1007, 'Gaibandha', 'Gaibandha', 'BD'),
(1008, 'Kurigram', 'Kurigram', 'BD'),
(1009, 'Lalmonirhat', 'Lalmonirhat', 'BD'),
(1010, 'Nilphamari', 'Nilphamari', 'BD'),
(1011, 'Panchagarh', 'Panchagarh', 'BD'),
(1012, 'Rangpur', 'Rangpur', 'BD'),
(1013, 'Thakurgaon', 'Thakurgaon', 'BD'),
(1014, 'Habiganj', 'Habiganj', 'BD'),
(1015, 'Moulvibazar', 'Moulvibazar', 'BD'),
(1016, 'Sunamganj', 'Sunamganj', 'BD'),
(1017, 'Sylhet', 'Sylhet', 'BD'),
(1018, 'Azad Kashmir', 'Azad Kashmir', 'PK'),
(1019, 'Bahawalpur', 'Bahawalpur', 'PK'),
(1020, 'Bannu', 'Bannu', 'PK'),
(1021, 'Dera Ghazi Khan', 'Dera Ghazi Khan', 'PK'),
(1022, 'Dera Ismail Khan', 'Dera Ismail Khan', 'PK'),
(1023, 'Faisalabad', 'Faisalabad', 'PK'),
(1024, 'F.A.T.A.', 'F.A.T.A.', 'PK'),
(1025, 'Gujranwala', 'Gujranwala', 'PK'),
(1026, 'Hazara', 'Hazara', 'PK'),
(1027, 'Hyderabad', 'Hyderabad', 'PK'),
(1028, 'Islamabad', 'Islamabad', 'PK'),
(1029, 'Kalat', 'Kalat', 'PK'),
(1030, 'Karachi', 'Karachi', 'PK'),
(1031, 'Kohat', 'Kohat', 'PK'),
(1032, 'Lahore', 'Lahore', 'PK'),
(1033, 'Larkana', 'Larkana', 'PK'),
(1034, 'Makran', 'Makran', 'PK'),
(1035, 'Malakand', 'Malakand', 'PK'),
(1036, 'Mardan', 'Mardan', 'PK'),
(1037, 'Mirpur Khas', 'Mirpur Khas', 'PK'),
(1038, 'Multan', 'Multan', 'PK'),
(1039, 'Nasirabad', 'Nasirabad', 'PK'),
(1040, 'Northern Areas', 'Northern Areas', 'PK'),
(1041, 'Peshawar', 'Peshawar', 'PK'),
(1042, 'Quetta', 'Quetta', 'PK'),
(1043, 'Rawalpindi', 'Rawalpindi', 'PK'),
(1044, 'Sargodha', 'Sargodha', 'PK'),
(1045, 'Sahiwal', 'Sahiwal', 'PK'),
(1046, 'Sibi', 'Sibi', 'PK'),
(1047, 'Sukkur', 'Sukkur', 'PK'),
(1048, 'Zhob', 'Zhob', 'PK'),
(1049, 'Abia', 'AB', 'NG'),
(1050, 'Abuja', 'FC', 'NG'),
(1051, 'Adamawa', 'AD', 'NG'),
(1052, 'Akwa Ibom', 'AK', 'NG'),
(1053, 'Anambra', 'AN', 'NG'),
(1054, 'Bauchi', 'BA', 'NG'),
(1055, 'Bayelsa', 'BY', 'NG'),
(1056, 'Benue', 'BE', 'NG'),
(1057, 'Borno', 'BO', 'NG'),
(1058, 'Cross River', 'CR', 'NG'),
(1059, 'Delta', 'DE', 'NG'),
(1060, 'Ebonyi', 'EB', 'NG'),
(1061, 'Edo', 'ED', 'NG'),
(1062, 'Ekiti', 'EK', 'NG'),
(1063, 'Enugu', 'EN', 'NG'),
(1064, 'Gombe', 'GO', 'NG'),
(1065, 'Imo', 'IM', 'NG'),
(1066, 'Jigawa', 'JI', 'NG'),
(1067, 'Kaduna', 'KD', 'NG'),
(1068, 'Kano', 'KN', 'NG'),
(1069, 'Katsina', 'KT', 'NG'),
(1070, 'Kebbi', 'KE', 'NG'),
(1071, 'Kogi', 'KO', 'NG'),
(1072, 'Kwara', 'KW', 'NG'),
(1073, 'Lagos', 'LA', 'NG'),
(1074, 'Nasarawa', 'NA', 'NG'),
(1075, 'Niger', 'NI', 'NG'),
(1076, 'Ogun', 'OG', 'NG'),
(1077, 'Ondo', 'ON', 'NG'),
(1078, 'Osun', 'OS', 'NG'),
(1079, 'Oyo', 'OY', 'NG'),
(1080, 'Plateau', 'PL', 'NG'),
(1081, 'Rivers', 'RI', 'NG'),
(1082, 'Sokoto', 'SO', 'NG'),
(1083, 'Taraba', 'TA', 'NG'),
(1084, 'Yobe', 'YO', 'NG'),
(1085, 'Zamfara', 'ZA', 'NG'),
(1086, 'Aichi', 'Aichi', 'JP'),
(1087, 'Akita', 'Akita', 'JP'),
(1088, 'Aomori', 'Aomori', 'JP'),
(1089, 'Chiba', 'Chiba', 'JP'),
(1090, 'Ehime', 'Ehime', 'JP'),
(1091, 'Fukui', 'Fukui', 'JP'),
(1092, 'Fukuoka', 'Fukuoka', 'JP'),
(1093, 'Fukushima', 'Fukushima', 'JP'),
(1094, 'Gifu', 'Gifu', 'JP'),
(1095, 'Gunma', 'Gunma', 'JP'),
(1096, 'Hiroshima', 'Hiroshima', 'JP'),
(1097, 'Hokkaidō', 'Hokkaidō', 'JP'),
(1098, 'Hyōgo', 'Hyōgo', 'JP'),
(1099, 'Ibaraki', 'Ibaraki', 'JP'),
(1100, 'Ishikawa', 'Ishikawa', 'JP'),
(1101, 'Iwate', 'Iwate', 'JP'),
(1102, 'Kagawa', 'Kagawa', 'JP'),
(1103, 'Kagoshima', 'Kagoshima', 'JP'),
(1104, 'Kanagawa', 'Kanagawa', 'JP'),
(1105, 'Kōchi', 'Kōchi', 'JP'),
(1106, 'Kumamoto', 'Kumamoto', 'JP'),
(1107, 'Kyōto', 'Kyōto', 'JP'),
(1108, 'Mie', 'Mie', 'JP'),
(1109, 'Miyagi', 'Miyagi', 'JP'),
(1110, 'Miyazaki', 'Miyazaki', 'JP'),
(1111, 'Nagano', 'Nagano', 'JP'),
(1112, 'Nagasaki', 'Nagasaki', 'JP'),
(1113, 'Nara', 'Nara', 'JP'),
(1114, 'Niigata', 'Niigata', 'JP'),
(1115, 'Ōita', 'Ōita', 'JP'),
(1116, 'Okayama', 'Okayama', 'JP'),
(1117, 'Okinawa', 'Okinawa', 'JP'),
(1118, 'Ōsaka', 'Ōsaka', 'JP'),
(1119, 'Saga', 'Saga', 'JP'),
(1120, 'Saitama', 'Saitama', 'JP'),
(1121, 'Shiga', 'Shiga', 'JP'),
(1122, 'Shimane', 'Shimane', 'JP'),
(1123, 'Shizuoka', 'Shizuoka', 'JP'),
(1124, 'Tochigi', 'Tochigi', 'JP'),
(1125, 'Tokushima', 'Tokushima', 'JP'),
(1126, 'Tōkyō', 'Tōkyō', 'JP'),
(1127, 'Tottori', 'Tottori', 'JP'),
(1128, 'Toyama', 'Toyama', 'JP'),
(1129, 'Wakayama', 'Wakayama', 'JP'),
(1130, 'Yamagata', 'Yamagata', 'JP'),
(1131, 'Yamaguchi', 'Yamaguchi', 'JP'),
(1132, 'Yamanashi', 'Yamanashi', 'JP'),
(1133, 'Rio Grande do Sul', 'RS', 'BR'),
(1134, 'Rio Grande do Norte', 'RN', 'BR'),
(1135, 'Rio de Janeiro', 'RJ', 'BR'),
(1136, 'Piauí', 'PI', 'BR'),
(1137, 'Niederösterreich', 'NÖ', 'AT'),
(1138, 'Kärnten', 'K', 'AT'),
(1139, 'Burgenland', 'B', 'AT'),
(1140, 'Pernambuco', 'PE', 'BR'),
(1141, 'Paraná', 'PR', 'BR'),
(1142, 'Paraíba', 'PB', 'BR'),
(1143, 'Pará', 'PA', 'BR'),
(1144, 'Minas Gerais', 'MG', 'BR'),
(1145, 'Mato Grosso do Sul', 'MS', 'BR'),
(1146, 'Mato Grosso', 'MT', 'BR'),
(1147, 'Maranhão', 'MA', 'BR'),
(1148, 'Goiás', 'GO', 'BR'),
(1149, 'Espírito Santo', 'ES', 'BR'),
(1150, 'Distrito Federal', 'DF', 'BR'),
(1151, 'Ceará', 'CE', 'BR'),
(1152, 'Bahia', 'BA', 'BR'),
(1153, 'Amazonas', 'AM', 'BR'),
(1154, 'Amapá', 'AP', 'BR'),
(1155, 'Alagoas', 'AL', 'BR'),
(1156, 'Acre', 'AC', 'BR'),
(1157, 'Wien', 'W', 'AT'),
(1158, 'Vorarlberg', 'V', 'AT'),
(1159, 'Tirol', 'T', 'AT'),
(1160, 'Steiermark', 'ST', 'AT'),
(1161, 'Salzburg', 'S', 'AT'),
(1162, 'Oberösterreich', 'OÖ', 'AT'),
(1163, 'Rondônia', 'RO', 'BR'),
(1164, 'Roraima', 'RR', 'BR'),
(1165, 'Santa Catarina', 'SC', 'BR'),
(1166, 'São Paulo', 'SP', 'BR'),
(1167, 'Sergipe', 'SE', 'BR'),
(1168, 'Tocantins', 'TO', 'BR'),
(1169, 'Abra', 'Abra', 'PH'),
(1170, 'Agusan del Norte', 'Agusan del Norte', 'PH'),
(1171, 'Agusan del Sur', 'Agusan del Sur', 'PH'),
(1172, 'Aklan', 'Aklan', 'PH'),
(1173, 'Albay', 'Albay', 'PH'),
(1174, 'Antique', 'Antique', 'PH'),
(1175, 'Apayao', 'Apayao', 'PH'),
(1176, 'Aurora', 'Aurora', 'PH'),
(1177, 'Basilan', 'Basilan', 'PH'),
(1178, 'Bataan', 'Bataan', 'PH'),
(1179, 'Batanes', 'Batanes', 'PH'),
(1180, 'Batangas', 'Batangas', 'PH'),
(1181, 'Benguet', 'Benguet', 'PH'),
(1182, 'Biliran', 'Biliran', 'PH'),
(1183, 'Bohol', 'Bohol', 'PH'),
(1184, 'Bukidnon', 'Bukidnon', 'PH'),
(1185, 'Bulacan', 'Bulacan', 'PH'),
(1186, 'Cagayan', 'Cagayan', 'PH'),
(1187, 'Camarines Norte', 'Camarines Norte', 'PH'),
(1188, 'Camarines Sur', 'Camarines Sur', 'PH'),
(1189, 'Camiguin', 'Camiguin', 'PH'),
(1190, 'Capiz', 'Capiz', 'PH'),
(1191, 'Catanduanes', 'Catanduanes', 'PH'),
(1192, 'Cavite', 'Cavite', 'PH'),
(1193, 'Cebu', 'Cebu', 'PH'),
(1194, 'Compostela Valley', 'Compostela Valley', 'PH'),
(1195, 'Cotabato', 'Cotabato', 'PH'),
(1196, 'Davao del Norte', 'Davao del Norte', 'PH'),
(1197, 'Davao del Sur', 'Davao del Sur', 'PH'),
(1198, 'Davao Occidental', 'Davao Occidental', 'PH'),
(1199, 'Davao Oriental', 'Davao Oriental', 'PH'),
(1200, 'Dinagat Islands', 'Dinagat Islands', 'PH'),
(1201, 'Eastern Samar', 'Eastern Samar', 'PH'),
(1202, 'Guimaras', 'Guimaras', 'PH'),
(1203, 'Ifugao', 'Ifugao', 'PH'),
(1204, 'Ilocos Norte', 'Ilocos Norte', 'PH'),
(1205, 'Ilocos Sur', 'Ilocos Sur', 'PH'),
(1206, 'Iloilo', 'Iloilo', 'PH'),
(1207, 'Isabela', 'Isabela', 'PH'),
(1208, 'Kalinga', 'Kalinga', 'PH'),
(1209, 'La Union', 'La Union', 'PH'),
(1210, 'Laguna', 'Laguna', 'PH'),
(1211, 'Lanao del Norte', 'Lanao del Norte', 'PH'),
(1212, 'Lanao del Sur', 'Lanao del Sur', 'PH'),
(1213, 'Leyte', 'Leyte', 'PH'),
(1214, 'Maguindanao', 'Maguindanao', 'PH'),
(1215, 'Marinduque', 'Marinduque', 'PH'),
(1216, 'Masbate', 'Masbate', 'PH'),
(1217, 'Misamis Occidental', 'Misamis Occidental', 'PH'),
(1218, 'Misamis Oriental', 'Misamis Oriental', 'PH'),
(1219, 'Mountain Province', 'Mountain Province', 'PH'),
(1220, 'Negros Occidental', 'Negros Occidental', 'PH'),
(1221, 'Negros Oriental', 'Negros Oriental', 'PH'),
(1222, 'Northern Samar', 'Northern Samar', 'PH'),
(1223, 'Nueva Ecija', 'Nueva Ecija', 'PH'),
(1224, 'Nueva Vizcaya', 'Nueva Vizcaya', 'PH'),
(1225, 'Occidental Mindoro', 'Occidental Mindoro', 'PH'),
(1226, 'Oriental Mindoro', 'Oriental Mindoro', 'PH'),
(1227, 'Palawan', 'Palawan', 'PH'),
(1228, 'Pampanga', 'Pampanga', 'PH'),
(1229, 'Pangasinan', 'Pangasinan', 'PH'),
(1230, 'Quezon', 'Quezon', 'PH'),
(1231, 'Quirino', 'Quirino', 'PH'),
(1232, 'Rizal', 'Rizal', 'PH'),
(1233, 'Romblon', 'Romblon', 'PH'),
(1234, 'Samar', 'Samar', 'PH'),
(1235, 'Sarangani', 'Sarangani', 'PH'),
(1236, 'Siquijor', 'Siquijor', 'PH'),
(1237, 'Sorsogon', 'Sorsogon', 'PH'),
(1238, 'South Cotabato', 'South Cotabato', 'PH'),
(1239, 'Southern Leyte', 'Southern Leyte', 'PH'),
(1240, 'Sultan Kudarat', 'Sultan Kudarat', 'PH'),
(1241, 'Sulu', 'Sulu', 'PH'),
(1242, 'Surigao del Norte', 'Surigao del Norte', 'PH'),
(1243, 'Surigao del Sur', 'Surigao del Sur', 'PH'),
(1244, 'Tarlac', 'Tarlac', 'PH'),
(1245, 'Tawi-Tawi', 'Tawi-Tawi', 'PH'),
(1246, 'Zambales', 'Zambales', 'PH'),
(1247, 'Zamboanga del Norte', 'Zamboanga del Norte', 'PH'),
(1248, 'Zamboanga del Sur', 'Zamboanga del Sur', 'PH'),
(1249, 'Zamboanga Sibugay', 'Zamboanga Sibugay', 'PH'),
(1250, 'Metro Manila', 'Metro Manila', 'PH'),
(1251, 'Hà Nội', 'Hà Nội', 'VN'),
(1252, 'Hà Giang', 'Hà Giang', 'VN'),
(1253, 'Cao Bằng', 'Cao Bằng', 'VN'),
(1254, 'Bắc Kạn', 'Bắc Kạn', 'VN'),
(1255, 'Tuyên Quang', 'Tuyên Quang', 'VN'),
(1256, 'Lào Cai', 'Lào Cai', 'VN'),
(1257, 'Điện Biên', 'Điện Biên', 'VN'),
(1258, 'Lai Châu', 'Lai Châu', 'VN'),
(1259, 'Sơn La', 'Sơn La', 'VN'),
(1260, 'Yên Bái', 'Yên Bái', 'VN'),
(1261, 'Hòa Bình', 'Hòa Bình', 'VN'),
(1262, 'Thái Nguyên', 'Thái Nguyên', 'VN'),
(1263, 'Lạng Sơn', 'Lạng Sơn', 'VN'),
(1264, 'Quảng Ninh', 'Quảng Ninh', 'VN'),
(1265, 'Bắc Giang', 'Bắc Giang', 'VN'),
(1266, 'Phú Thọ', 'Phú Thọ', 'VN'),
(1267, 'Vĩnh Phúc', 'Vĩnh Phúc', 'VN'),
(1268, 'Bắc Ninh', 'Bắc Ninh', 'VN'),
(1269, 'Hải Dương', 'Hải Dương', 'VN'),
(1270, 'Hải Phòng', 'Hải Phòng', 'VN'),
(1271, 'Hưng Yên', 'Hưng Yên', 'VN'),
(1272, 'Thái Bình', 'Thái Bình', 'VN'),
(1273, 'Hà Nam', 'Hà Nam', 'VN'),
(1274, 'Nam Định', 'Nam Định', 'VN'),
(1275, 'Ninh Bình', 'Ninh Bình', 'VN'),
(1276, 'Thanh Hóa', 'Thanh Hóa', 'VN'),
(1277, 'Nghệ An', 'Nghệ An', 'VN'),
(1278, 'Hà Tĩnh', 'Hà Tĩnh', 'VN'),
(1279, 'Quảng Bình', 'Quảng Bình', 'VN'),
(1280, 'Quảng Trị', 'Quảng Trị', 'VN'),
(1281, 'Thừa Thiên–Huế', 'Thừa Thiên–Huế', 'VN'),
(1282, 'Đà Nẵng', 'Đà Nẵng', 'VN'),
(1283, 'Quảng Nam', 'Quảng Nam', 'VN'),
(1284, 'Quảng Ngãi', 'Quảng Ngãi', 'VN'),
(1285, 'Bình Định', 'Bình Định', 'VN'),
(1286, 'Phú Yên', 'Phú Yên', 'VN'),
(1287, 'Khánh Hòa', 'Khánh Hòa', 'VN'),
(1288, 'Ninh Thuận', 'Ninh Thuận', 'VN'),
(1289, 'Bình Thuận', 'Bình Thuận', 'VN'),
(1290, 'Kon Tum', 'Kon Tum', 'VN'),
(1291, 'Gia Lai', 'Gia Lai', 'VN'),
(1292, 'Đắk Lắk', 'Đắk Lắk', 'VN'),
(1293, 'Đắk Nông', 'Đắk Nông', 'VN'),
(1294, 'Lâm Đồng', 'Lâm Đồng', 'VN'),
(1295, 'Bình Phước', 'Bình Phước', 'VN'),
(1296, 'Tây Ninh', 'Tây Ninh', 'VN'),
(1297, 'Bình Dương', 'Bình Dương', 'VN'),
(1298, 'Đồng Nai', 'Đồng Nai', 'VN'),
(1299, 'Bà Rịa–Vũng Tàu', 'Bà Rịa–Vũng Tàu', 'VN'),
(1300, 'Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh', 'VN'),
(1301, 'Long An', 'Long An', 'VN'),
(1302, 'Tiền Giang', 'Tiền Giang', 'VN'),
(1303, 'Bến Tre', 'Bến Tre', 'VN'),
(1304, 'Trà Vinh', 'Trà Vinh', 'VN'),
(1305, 'Vĩnh Long', 'Vĩnh Long', 'VN'),
(1306, 'Đồng Tháp', 'Đồng Tháp', 'VN'),
(1307, 'An Giang', 'An Giang', 'VN'),
(1308, 'Kiên Giang', 'Kiên Giang', 'VN'),
(1309, 'Cần Thơ', 'Cần Thơ', 'VN'),
(1310, 'Hậu Giang', 'Hậu Giang', 'VN'),
(1311, 'Sóc Trăng', 'Sóc Trăng', 'VN'),
(1312, 'Bạc Liêu', 'Bạc Liêu', 'VN'),
(1313, 'Cà Mau', 'Cà Mau', 'VN'),
(1314, 'San José', 'San José', 'CR'),
(1315, 'Alajuela', 'Alajuela', 'CR'),
(1316, 'Cartago', 'Cartago', 'CR'),
(1317, 'Heredia', 'Heredia', 'CR'),
(1318, 'Guanacaste', 'Guanacaste', 'CR'),
(1319, 'Puntarenas', 'Puntarenas', 'CR'),
(1320, 'Limón', 'Limón', 'CR'),
(1321, 'Auckland', 'Auckland', 'NZ'),
(1322, 'New Plymouth', 'New Plymouth', 'NZ'),
(1323, 'Hawke\'s Bay', 'Hawke\'s Bay', 'NZ'),
(1324, 'Wellington', 'Wellington', 'NZ'),
(1325, 'Nelson', 'Nelson', 'NZ'),
(1326, 'Marlborough', 'Marlborough', 'NZ'),
(1327, 'Westland', 'Westland', 'NZ'),
(1328, 'Canterbury', 'Canterbury', 'NZ'),
(1329, 'Otago', 'Otago', 'NZ'),
(1330, 'Southland', 'Southland', 'NZ');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `military_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `military_time`, `display_time`) VALUES
(1, '0000', '12:00 AM'),
(2, '0015', '12:15 AM'),
(3, '0030', '12:30 AM'),
(4, '0045', '12:45 AM'),
(5, '0100', '1:00 AM'),
(6, '0115', '1:15 AM'),
(7, '0130', '1:30 AM'),
(8, '0145', '1:45 AM'),
(9, '0200', '2:00 AM'),
(10, '0215', '2:15 AM'),
(11, '0230', '2:30 AM'),
(12, '0245', '2:45 AM'),
(13, '0300', '3:00 AM'),
(14, '0315', '3:15 AM'),
(15, '0330', '3:30 AM'),
(16, '0345', '3:45 AM'),
(17, '0400', '4:00 AM'),
(18, '0415', '4:15 AM'),
(19, '0430', '4:30 AM'),
(20, '0445', '4:45 AM'),
(21, '0500', '5:00 AM'),
(22, '0515', '5:15 AM'),
(23, '0530', '5:30 AM'),
(24, '0545', '5:45 AM'),
(25, '0600', '6:00 AM'),
(26, '0615', '6:15 AM'),
(27, '0630', '6:30 AM'),
(28, '0645', '6:45 AM'),
(29, '0700', '7:00 AM'),
(30, '0715', '7:15 AM'),
(31, '0730', '7:30 AM'),
(32, '0745', '7:45 AM'),
(33, '0800', '8:00 AM'),
(34, '0815', '8:15 AM'),
(35, '0830', '8:30 AM'),
(36, '0845', '8:45 AM'),
(37, '0900', '9:00 AM'),
(38, '0915', '9:15 AM'),
(39, '0930', '9:30 AM'),
(40, '0945', '9:45 AM'),
(41, '1000', '10:00 AM'),
(42, '1015', '10:15 AM'),
(43, '1030', '10:30 AM'),
(44, '1045', '10:45 AM'),
(45, '1100', '11:00 AM'),
(46, '1115', '11:15 AM'),
(47, '1130', '11:30 AM'),
(48, '1145', '11:45 AM'),
(49, '1200', '12:00 PM'),
(50, '1215', '12:15 PM'),
(51, '1230', '12:30 PM'),
(52, '1245', '12:45 PM'),
(53, '1300', '1:00 PM'),
(54, '1315', '1:15 PM'),
(55, '1330', '1:30 PM'),
(56, '1345', '1:45 PM'),
(57, '1400', '2:00 PM'),
(58, '1415', '2:15 PM'),
(59, '1430', '2:30 PM'),
(60, '1445', '2:45 PM'),
(61, '1500', '3:00 PM'),
(62, '1515', '3:15 PM'),
(63, '1530', '3:30 PM'),
(64, '1545', '3:45 PM'),
(65, '1600', '4:00 PM'),
(66, '1615', '4:15 PM'),
(67, '1630', '4:30 PM'),
(68, '1645', '4:45 PM'),
(69, '1700', '5:00 PM'),
(70, '1715', '5:15 PM'),
(71, '1730', '5:30 PM'),
(72, '1745', '5:45 PM'),
(73, '1800', '6:00 PM'),
(74, '1815', '6:15 PM'),
(75, '1830', '6:30 PM'),
(76, '1845', '6:45 PM'),
(77, '1900', '7:00 PM'),
(78, '1915', '7:15 PM'),
(79, '1930', '7:30 PM'),
(80, '1945', '7:45 PM'),
(81, '2000', '8:00 PM'),
(82, '2015', '8:15 PM'),
(83, '2030', '8:30 PM'),
(84, '2045', '8:45 PM'),
(85, '2100', '9:00 PM'),
(86, '2115', '9:15 PM'),
(87, '2130', '9:30 PM'),
(88, '2145', '9:45 PM'),
(89, '2200', '10:00 PM'),
(90, '2215', '10:15 PM'),
(91, '2230', '10:30 PM'),
(92, '2245', '10:45 PM'),
(93, '2300', '11:00 PM'),
(94, '2315', '11:15 PM'),
(95, '2330', '11:30 PM'),
(96, '2345', '11:45 PM');

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `id` int(11) NOT NULL,
  `zone_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zone_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`id`, `zone_code`, `zone_name`) VALUES
(2, 'ECT', 'European Central Time'),
(3, 'EET', 'Eastern European Time'),
(4, 'ART', '(Arabic) Egypt Standard Time'),
(5, 'EAT', 'Eastern African Time'),
(6, 'MET', 'Middle East Time'),
(7, 'NET', 'Near East Time'),
(8, 'PLT', 'Pakistan Lahore Time'),
(9, 'IST', 'India Standard Time'),
(10, 'BST', 'Bangladesh Standard Time'),
(11, 'VST', 'Vietnam Standard Time'),
(12, 'CTT', 'China Taiwan Time'),
(13, 'JST', 'Japan Standard Time'),
(14, 'ACT', 'Australia Central Time'),
(15, 'AET', 'Australia Eastern Time'),
(16, 'SST', 'Solomon Standard Time'),
(17, 'NST', 'New Zealand Standard Time'),
(18, 'MIT', 'Midway Islands Time'),
(19, 'HST', 'Hawaii Standard Time'),
(20, 'AST', 'Alaska Standard Time'),
(21, 'PST', 'Pacific Standard Time'),
(22, 'PNT', 'Phoenix Standard Time'),
(23, 'MST', 'Mountain Standard Time'),
(24, 'CST', 'Central Standard Time'),
(25, 'EST', 'Eastern Standard Time'),
(26, 'IET', 'Indiana Eastern Standard Time'),
(27, 'PRT', 'Puerto Rico and US Virgin Islands Time'),
(28, 'CNT', 'Canada Newfoundland Time'),
(29, 'AGT', 'Argentina Standard Time'),
(30, 'BET', 'Brazil Eastern Time'),
(31, 'CAT', 'Central African Time'),
(32, 'GMT', 'Greenwich Mean Time');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` int(11) NOT NULL,
  `age_check` int(11) NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_ein` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_non_profit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `affiliation1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `affiliation2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `affiliation3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `what_selling` longtext COLLATE utf8_unicode_ci NOT NULL,
  `terms_check` int(11) NOT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `seller_auth` int(11) NOT NULL,
  `rating` float NOT NULL,
  `email_verified` int(11) NOT NULL,
  `confirmation_code` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `seller`, `company`, `first_name`, `last_name`, `country_code`, `phoneNumber`, `dob`, `age_check`, `address1`, `address2`, `country`, `city`, `state`, `question1`, `answer1`, `question2`, `answer2`, `company_name`, `company_website`, `company_ein`, `company_phone`, `company_non_profit`, `company_logo`, `affiliation1`, `affiliation2`, `affiliation3`, `what_selling`, `terms_check`, `created_timestamp`, `seller_auth`, `rating`, `email_verified`, `confirmation_code`) VALUES
(33, 'jhalaby', 'jhalaby@emich.edu', '71603a2a25ec0996e665467cc270db97', 1, 1, 'Jordan', 'Halaby', '1', '2489127636', 1, 1, '10137 Devonshire', '', 'US', 'South Lyon', 'MI', '1', 'Werner', '5', 'Devonshire', 'SpyderByte', 'spyderbyte.co', '', '', 'no', '', '', '', '', '', 1, '2021-04-18 21:30:49', 1, 100, 1, 803429),
(41, 'billy', 'billy@bill.com', '900150983cd24fb0d6963f7d28e17f72', 0, 0, 'h', 'jl', '109', '234', 1, 1, '123 South St', 'Unit 4', 'US', 'Test', 'AL', '2', 'wer', '1', 'sdaf', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:58', 0, 100, 0, 184914),
(34, 'northcoast_n', 'steve@bidzwon.com', '4e66f7ddd20a112597b1b9f083d517c5', 1, 1, 'Steve', 'Halaby', '1', '2484440710', 1, 1, '10137 Devonshire Dr', '', 'US', 'South Lyon', 'MI', '2', 'a913af7f60269a1454a210edf0cba1ad', '5', 'b60d91de4b4b236f26d74b8d99bb3560', 'SpyderByte, Inc', 'spyderbyte.co', '', '2484440710', 'no', '15810390805 (2).png', '', '', '', 'Anything', 1, '2021-06-15 21:42:47', 1, 100, 1, 496280),
(38, 'billybob', 'billybob@yahoo.com', '71603a2a25ec0996e665467cc270db97', 1, 1, 'Billy', 'Bob', '1', '2489127636', 1, 1, '5270 Mt. Maria', '', 'US', 'Hubbard Lake', 'MI', '1', 'Werner', '1', 'Football', 'SpyderByte', 'spyderbyte.co', '1234', '', '', '1598018365profile.jpg', '', '', '', '', 1, '2021-05-21 23:55:27', 1, 100, 0, 609970),
(36, 'jhab2', 'jordan@bidzwon.com', 'd16d377af76c99d27093abc22244b342', 0, 0, 'Uwe', 'Kind', '1', '248912', 1, 1, '10137 Devonshire', '', 'US', 'Jordan', 'AL', '1', 'Werner', '5', 'Devonshire', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:45', 0, 100, 1, 561904),
(39, 'DustyCar', 's_halaby1@yahoo.com', '09e7d4c7ed87c53f5139f5c55d8661e8', 1, 1, 'Steve', 'Halaby', '1', '2484440710', 1, 1, '10137 Devonshire Dr', '', 'US', 'South Lyon', 'MI', '1', 'Reimer', '5', 'Dewhirst', 'ABC123 Auctions', 'ABC123Auctions.com', '4737271', '2487776767', '', '1598149342D (1).jpg', '', '', '', '', 1, '2021-06-15 21:42:57', 1, 100, 1, 606768),
(40, 'skippy', 'stevehalaby1@gmail.com', '4e66f7ddd20a112597b1b9f083d517c5', 0, 0, 'Steve', 'Halaby', '1', '2484440710', 1, 1, '10137 Devonshire Dr', '', 'US', 'South Lyon', 'MI', '1', 'Riemer', '5', 'Dewhirst', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:36', 0, 100, 1, 509142),
(42, 'bigtony', 'bigtony@yahoo.com', 'afae32efe0f84fece3f96b377b768b33', 0, 0, 'Big', 'Tony', '1', '1231231', 1, 1, '5270 Mt. Maria', '', 'US', 'Hubbard Lake', 'MI', '1', 'Wernere', '2', 'Michael', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:31:17', 0, 100, 0, 126370),
(43, 'mgk', 'mgk@spotify.com', '0e14d45c430806127d2a4a85dd419a85', 0, 0, 'MachineGun', 'Kelly', '1', '1231231231', 1, 1, '10137 Devonshire', '', 'US', 'South Lyon', 'MI', '1', 'Werner', '2', 'Michael', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:13', 0, 100, 0, 117085),
(44, 'daduck', 'ducky@bolton.com', '56975b83de847aa2ee9b2493b6c4bd8f', 1, 1, 'Daffy', 'Duck', '1', '2484377871', 1, 1, '5270 Mt. Maria', '', 'US', 'Hubbard Lake', 'MI', '4', 'Duck', '4', 'MIghty Ducks', 'SpyderByte', 'https://spyderbyte.co', '123456', '12345678900', 'yes', '1618425752xmas.png', 'SpyderByte', 'BidZWon', 'Crossroads', 'I am planning on selling books, movies, and video games', 1, '2021-04-15 17:54:43', 1, 100, 1, 754332);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog_pictures`
--
ALTER TABLE `catalog_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog_status`
--
ALTER TABLE `catalog_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_tier1`
--
ALTER TABLE `cat_tier1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_tier2`
--
ALTER TABLE `cat_tier2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_tier3`
--
ALTER TABLE `cat_tier3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_tier4`
--
ALTER TABLE `cat_tier4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot_countdown`
--
ALTER TABLE `lot_countdown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot_pictures`
--
ALTER TABLE `lot_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot_picture_order`
--
ALTER TABLE `lot_picture_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot_sort`
--
ALTER TABLE `lot_sort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note_test`
--
ALTER TABLE `note_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_question1`
--
ALTER TABLE `security_question1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_question2`
--
ALTER TABLE `security_question2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `catalog_pictures`
--
ALTER TABLE `catalog_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `catalog_status`
--
ALTER TABLE `catalog_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cat_tier1`
--
ALTER TABLE `cat_tier1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cat_tier2`
--
ALTER TABLE `cat_tier2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cat_tier3`
--
ALTER TABLE `cat_tier3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cat_tier4`
--
ALTER TABLE `cat_tier4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `lot_countdown`
--
ALTER TABLE `lot_countdown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `lot_pictures`
--
ALTER TABLE `lot_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `lot_picture_order`
--
ALTER TABLE `lot_picture_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lot_sort`
--
ALTER TABLE `lot_sort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `note_test`
--
ALTER TABLE `note_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `security_question1`
--
ALTER TABLE `security_question1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `security_question2`
--
ALTER TABLE `security_question2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1331;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
