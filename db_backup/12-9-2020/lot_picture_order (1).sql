-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2020 at 01:21 PM
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
(17, 63, 38, '||223||219||220||224||225||');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lot_picture_order`
--
ALTER TABLE `lot_picture_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lot_picture_order`
--
ALTER TABLE `lot_picture_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
