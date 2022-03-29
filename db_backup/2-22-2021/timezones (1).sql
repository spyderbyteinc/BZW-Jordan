-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2021 at 12:41 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
