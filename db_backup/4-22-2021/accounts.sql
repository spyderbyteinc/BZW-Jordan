-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2021 at 03:34 PM
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
(91, 'DustyCar', 's_halaby1@yahoo.com', '4e66f7ddd20a112597b1b9f083d517c5', 'Steve', 'Halaby', 'seller', '75.130.196.238'),
(93, 'skippy', 'stevehalaby1@gmail.com', '09e7d4c7ed87c53f5139f5c55d8661e8', 'Steve', 'Halaby', 'buyer', '76.217.175.77'),
(95, 'bentley', 'doggie@frnk.com', '06d80eb0c50b49a509b49f2424e8c805', 'bentley', 'Halaby', 'house', '76.217.175.77'),
(123, 'Fishstick', 'fishstick@spyderbyteinc.com', '6050eb18fbbec7fa1d1d21a86c1916d6', 'Fish', 'Stick', 'house', '76.217.175.77'),
(121, 'mgk', 'mgk@spotify.com', '0e14d45c430806127d2a4a85dd419a85', 'MachineGun', 'Kelly', 'buyer', '76.217.175.77'),
(120, 'bigtony', 'bigtony@yahoo.com', 'afae32efe0f84fece3f96b377b768b33', 'Big', 'Tony', 'buyer', '76.217.175.77'),
(130, 'house', 'house@bidzwon.com', '2ca63cddd54f9490efad22421891a9d1', 'Jordan', 'House', 'house', '174.230.17.138'),
(129, 'daduck', 'ducky@bolton.com', '56975b83de847aa2ee9b2493b6c4bd8f', 'Daffy', 'Duck', 'seller', '76.217.175.77');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
