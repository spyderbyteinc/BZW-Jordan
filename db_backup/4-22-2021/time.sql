-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2021 at 03:41 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
