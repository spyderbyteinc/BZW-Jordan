-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2020 at 05:16 PM
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
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_abbr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_name`, `currency_abbr`, `symbol`) VALUES
(1, 'United States dollar', 'USD', '$'),
(2, 'Euro', 'EUR', '€'),
(3, 'Japanese yen', 'JPY', '¥'),
(4, 'Pound sterling', 'GBP', '£'),
(5, 'Australian dollar', 'AUD', 'A$'),
(6, 'Canadian dollar', 'CAD', 'C$'),
(7, 'Swiss franc', 'CHF', 'CHF'),
(8, 'Renminbi', 'CNY', '&#20803;'),
(9, 'Hong Kong dollar', 'HKD', 'HK$'),
(10, 'New Zealand dollar	\r\n', 'NZD', 'NZ$'),
(11, 'Swedish krona', 'SEK', 'kr'),
(12, 'South Korean won', 'KRW', '&#8361;'),
(13, 'Singapore dollar', 'SGD', 'S$'),
(14, 'Norwegian krone', 'NOK', 'kr'),
(15, 'Mexican peso', 'MXN', '$'),
(16, 'Indian rupee', 'INR', '&#8377;'),
(17, 'Russian ruble', 'RUB', '&#8381;'),
(18, 'South African rand', 'ZAR', 'R'),
(19, 'Turkish lira', 'TRY', '&#8378;'),
(20, 'Brazilian real', 'BRL', 'R$'),
(21, 'New Taiwan dollar', 'TWD', 'nt$'),
(22, 'Danish krone', 'DKK', 'kr'),
(23, 'Polish zloty', 'PLN', 'z&#322;'),
(24, 'Thai baht', 'THB', '&#3647;'),
(25, 'Indonesian rupiah', 'IDR', 'Rp'),
(26, 'Hungarian forint', 'HUF', 'ft'),
(27, 'Czech koruna', 'CZK', 'K&#269;'),
(28, 'Israeli new shekel', 'ILS', '&#8362;'),
(29, 'Chilean peso', 'CLP', '$'),
(30, 'Philippine peso', 'PHP', '&#8369;'),
(31, 'UAE dirham', 'AED', '&#1583;.&#1573;'),
(32, 'Colombian peso', 'COP', 'COL$'),
(33, 'Saudi riyal', 'SAR', '&#65020;'),
(34, 'Malaysian ringgit', 'MYR', 'RM'),
(35, 'Romanian leu', 'ROL', 'lei');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
