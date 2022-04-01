-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2020 at 05:15 PM
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
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IP_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `catalog_name`, `auction_type`, `charity`, `catalog_description`, `start_date`, `start_time`, `end_date`, `end_time`, `end_increment`, `house_list`, `currency`, `timezone`, `buyer_premium`, `asset_location_1`, `asset_location_2`, `asset_location_3`, `asset_location_4`, `asset_location_5`, `inspection_1`, `inspection_2`, `inspection_3`, `inspection_4`, `inspection_5`, `inspection_6`, `inspection_7`, `inspection_8`, `inspection_9`, `inspection_10`, `removal_1`, `removal_2`, `removal_3`, `removal_4`, `removal_5`, `removal_6`, `removal_7`, `removal_8`, `removal_9`, `removal_10`, `contact_1`, `contact_2`, `contact_3`, `contact_4`, `contact_5`, `contact_6`, `contact_7`, `contact_8`, `contact_9`, `contact_10`, `question_1`, `question_2`, `question_3`, `question_4`, `question_5`, `question_6`, `question_7`, `question_8`, `question_9`, `question_10`, `terms_conditions`, `inspection_notes`, `removal_notes`, `owner`, `IP_address`, `published`) VALUES
(35, 'This one is a test for editing lots', 'timed', 'no', 'We will edit lots with this one. The force is strong', '2020-06-13', '0415', '2020-01-31', '0400', '5', '||', 'JPY', 'MIT', 78, '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&06/18/2020??||&&-1??||&&0400??||&&0400??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'these are my terms and those are my conditions\n', '', '', 'jhalaby', '47.26.36.90', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
