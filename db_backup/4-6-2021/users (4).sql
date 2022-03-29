-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2021 at 01:13 PM
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
(33, 'jhalaby', 'jhalaby@emich.edu', '71603a2a25ec0996e665467cc270db97', 1, 1, 'Jordan', 'Halaby', '1', '2489127636', 1, 1, '10137 Devonshire', '', 'US', 'South Lyon', 'MI', '1', 'Werner', '5', 'Devonshire', 'SpyderByte', 'spyderbyte.co', '', '', 'no', '', '', '', '', '', 1, '2021-02-26 21:17:00', 0, 100, 1, 803429),
(41, 'billy', 'billy@bill.com', '900150983cd24fb0d6963f7d28e17f72', 0, 0, 'h', 'jl', '109', '234', 1, 1, '123 South St', 'Unit 4', 'US', 'Test', 'AL', '2', 'wer', '1', 'sdaf', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:58', 0, 100, 0, 184914),
(34, 'northcoast_n', 'steve@bidzwon.com', '4e66f7ddd20a112597b1b9f083d517c5', 1, 1, 'Steve', 'Halaby', '1', '2484440710', 1, 1, '10137 Devonshire Dr', '', 'US', 'South Lyon', 'MI', '2', 'a913af7f60269a1454a210edf0cba1ad', '5', 'b60d91de4b4b236f26d74b8d99bb3560', 'SpyderByte, Inc', 'spyderbyte.co', '', '2484440710', 'no', '15810390805 (2).png', '', '', '', 'Anything', 1, '2021-01-19 18:34:54', 0, 100, 1, 496280),
(38, 'billybob', 'billybob@yahoo.com', '71603a2a25ec0996e665467cc270db97', 1, 1, 'Billy', 'Bob', '1', '2489127636', 1, 1, '5270 Mt. Maria', '', 'US', 'Hubbard Lake', 'MI', '1', 'Werner', '1', 'Football', 'SpyderByte', 'spyderbyte.co', '1234', '', '', '1598018365profile.jpg', '', '', '', '', 1, '2021-01-19 18:34:49', 0, 100, 0, 609970),
(36, 'jhab2', 'jordan@bidzwon.com', 'd16d377af76c99d27093abc22244b342', 0, 0, 'Uwe', 'Kind', '1', '248912', 1, 1, '10137 Devonshire', '', 'US', 'Jordan', 'AL', '1', 'Werner', '5', 'Devonshire', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:45', 0, 100, 1, 561904),
(39, 'DustyCar', 's_halaby1@yahoo.com', '4e66f7ddd20a112597b1b9f083d517c5', 1, 1, 'Steve', 'Halaby', '1', '2484440710', 1, 1, '10137 Devonshire Dr', '', 'US', 'South Lyon', 'MI', '1', 'Reimer', '5', 'Dewhirst', 'ABC123 Auctions', 'ABC123Auctions.com', '4737271', '2487776767', '', '1598149342D (1).jpg', '', '', '', '', 1, '2021-01-19 18:34:41', 0, 100, 1, 606768),
(40, 'skippy', 'stevehalaby1@gmail.com', '4e66f7ddd20a112597b1b9f083d517c5', 0, 0, 'Steve', 'Halaby', '1', '2484440710', 1, 1, '10137 Devonshire Dr', '', 'US', 'South Lyon', 'MI', '1', 'Riemer', '5', 'Dewhirst', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:36', 0, 100, 1, 509142),
(42, 'bigtony', 'bigtony@yahoo.com', 'afae32efe0f84fece3f96b377b768b33', 0, 0, 'Big', 'Tony', '1', '1231231', 1, 1, '5270 Mt. Maria', '', 'US', 'Hubbard Lake', 'MI', '1', 'Wernere', '2', 'Michael', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:31:17', 0, 100, 0, 126370),
(43, 'mgk', 'mgk@spotify.com', '0e14d45c430806127d2a4a85dd419a85', 0, 0, 'MachineGun', 'Kelly', '1', '1231231231', 1, 1, '10137 Devonshire', '', 'US', 'South Lyon', 'MI', '1', 'Werner', '2', 'Michael', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:13', 0, 100, 0, 117085);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
