-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2020 at 05:25 PM
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
  `dob` date NOT NULL,
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
(33, 'jhalaby', 'jhalaby@emich.edu', '71603a2a25ec0996e665467cc270db97', 1, 1, 'Jordan', 'Halaby', '1', '2489127636', '1994-09-09', 1, '10137 Devonshire', '', 'US', 'South Lyon', 'MI', '1', '23bb133b153547613a191d4086f9cb58', '5', '9fc0ef03a75ae028da276f05cdfe5374', 'SpyderByte', 'spyderbyte.co', '', '', 'no', '', '', '', '', '', 1, '2020-02-06 21:01:41', 0, 100, 1, 803429),
(34, 'northcoast_n', 'steve@bidzwon.com', '4e66f7ddd20a112597b1b9f083d517c5', 1, 1, 'Steve', 'Halaby', '1', '2484440710', '1962-09-06', 1, '10137 Devonshire Dr', '', 'US', 'South Lyon', 'MI', '2', 'a913af7f60269a1454a210edf0cba1ad', '5', 'b60d91de4b4b236f26d74b8d99bb3560', 'SpyderByte, Inc', 'spyderbyte.co', '', '2484440710', 'no', '15810390805 (2).png', '', '', '', 'Anything', 1, '2020-02-07 01:31:51', 0, 100, 1, 496280),
(35, 'jhab', 'halabjo@gmail.com', 'bc4bd76cd0fcd582202ac7c963c0b949', 0, 0, 'Uwe', 'Kind', '1', '2489127636', '1994-09-09', 1, '566 Main St', 'Unit 4', 'US', 'South Lyon', 'MI', '1', 'Werner', '5', 'Devonshire', '', '', '', '', '', '', '', '', '', '', 1, '2020-06-13 22:25:12', 0, 100, 1, 422200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
