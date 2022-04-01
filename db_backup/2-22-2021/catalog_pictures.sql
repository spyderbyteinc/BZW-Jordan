-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2021 at 12:34 PM
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
(10, 67, '1612149649briggs-stratton-inverter-generatorQ6500.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog_pictures`
--
ALTER TABLE `catalog_pictures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog_pictures`
--
ALTER TABLE `catalog_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
