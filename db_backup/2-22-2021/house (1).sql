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
(57, 'Doggie', 'steve@spyderbyte.co', '7164eb030556b4c0bb03b96e09580572', 'Bentley', 'Halaby', '2', '334c4a4c42fdb79d7ebc3e73b517e6f8', '4', '6875991f9b848d94c8b6db253849cdde', 'northcoast_n'),
(60, 'bentley', 'doggie@frnk.com', '06d80eb0c50b49a509b49f2424e8c805', 'bentley', 'Halaby', '2', 'roof', '2', 'roof', 'DustyCar'),
(86, 'Fishstick', 'fishstick@spyderbyteinc.com', '6050eb18fbbec7fa1d1d21a86c1916d6', 'Fish', 'Stick', '1', 'Wanda', '4', 'Nemo', 'DustyCar'),
(83, 'markylo', 'markjax@yahoo.com', '962b2d2b8e72dc6771bca613d49b46fb', 'Mark', 'Five', '3', 'French Toast', '4', 'Shawshank', 'jhalaby'),
(84, 'eicher', 'test@test.com', '6a26dccba8591545af24469f8b20c2f4', 'David', 'Yousf', '4', 'Bentley', '5', 'Longford', 'jhalaby'),
(85, 'thorton', 'tho@thou.com', 'fac4ad311049192fc538f85e737a6455', 'BillyBob', 'Thorton', '1', 'Werner', '5', 'Devonshire', 'jhalaby');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
