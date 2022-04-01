-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2020 at 05:18 PM
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
(149, 35, 19, '1592086670voted.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lot_pictures`
--
ALTER TABLE `lot_pictures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lot_pictures`
--
ALTER TABLE `lot_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
