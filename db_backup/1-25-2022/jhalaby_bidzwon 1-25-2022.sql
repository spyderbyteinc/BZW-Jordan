-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2022 at 01:17 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.32

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
(91, 'DustyCar', 's_halaby1@yahoo.com', '09e7d4c7ed87c53f5139f5c55d8661e8', 'Steve', 'Halaby', 'seller', '75.130.196.238'),
(93, 'skippy', 'stevehalaby1@gmail.com', '09e7d4c7ed87c53f5139f5c55d8661e8', 'Steve', 'Halaby', 'buyer', '76.217.175.77'),
(95, 'bentley', 'doggie@frnk.com', '06d80eb0c50b49a509b49f2424e8c805', 'bentley', 'Halaby', 'house', '76.217.175.77'),
(132, 'another', 'another@another.com', 'b32d73e56ec99bc5ec8f83871cde708a', 'Another', 'Test', 'house', '47.26.37.178'),
(123, 'Fishstick', 'fishstick@spyderbyteinc.com', '6050eb18fbbec7fa1d1d21a86c1916d6', 'Fish', 'Stick', 'house', '76.217.175.77'),
(121, 'mgk', 'mgk@spotify.com', '0e14d45c430806127d2a4a85dd419a85', 'MachineGun', 'Kelly', 'buyer', '76.217.175.77'),
(120, 'bigtony', 'bigtony@yahoo.com', 'afae32efe0f84fece3f96b377b768b33', 'Big', 'Tony', 'buyer', '76.217.175.77'),
(131, 'snake', 'snake@bidzwon.com', 'de1b2a7baf7850243db71c4abd4e5a39', 'Jake', 'TheSnake', 'house', '174.230.12.71'),
(130, 'house', 'house@bidzwon.com', '2ca63cddd54f9490efad22421891a9d1', 'Jordan', 'House', 'house', '174.230.17.138'),
(129, 'daduck', 'ducky@bolton.com', '56975b83de847aa2ee9b2493b6c4bd8f', 'Daffy', 'Duck', 'seller', '76.217.175.77');

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE `bugs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `pictures` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `done` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id`, `title`, `url`, `description`, `pictures`, `author`, `done`) VALUES
(2, 'jordan was here', 'youtube.com', 'hello world and all who inhabit it', '??||&&bug_uploads/1634159832homes_4.jpg??||&&bug_uploads/1634159832homes_5.jpg??||&&bug_uploads/1634159832homes_6.jpg??||&&bug_uploads/1634159832homes_7.jpg??||&&bug_uploads/1634159832homes_8.jpg', 'jhabs', 0),
(3, 'finished bug', '1232a', 'this is the description', '??||&&bug_uploads/1634242659books_5.jpg??||&&bug_uploads/1634242659books_6.jpg??||&&bug_uploads/1634242659books_7.jpg??||&&bug_uploads/1634242659books_8.jpg??||&&bug_uploads/1634242659books_9.jpg??||&&bug_uploads/1634242659books_10.jpg', 'jhabs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(11) NOT NULL,
  `catalog_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auction_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `charity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catalog_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `start_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` date NOT NULL,
  `end_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_increment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `house_list` text COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_premium` float NOT NULL,
  `allow_freeze` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `asset_location_1` text COLLATE utf8_unicode_ci NOT NULL,
  `asset_location_2` text COLLATE utf8_unicode_ci NOT NULL,
  `asset_location_3` text COLLATE utf8_unicode_ci NOT NULL,
  `asset_location_4` text COLLATE utf8_unicode_ci NOT NULL,
  `asset_location_5` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_1` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_2` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_3` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_4` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_5` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_6` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_7` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_8` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_9` text COLLATE utf8_unicode_ci NOT NULL,
  `inspection_10` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_1` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_2` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_3` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_4` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_5` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_6` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_7` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_8` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_9` text COLLATE utf8_unicode_ci NOT NULL,
  `removal_10` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_1` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_2` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_3` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_4` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_5` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_6` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_7` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_8` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_9` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_10` text COLLATE utf8_unicode_ci NOT NULL,
  `question_1` text COLLATE utf8_unicode_ci NOT NULL,
  `question_2` text COLLATE utf8_unicode_ci NOT NULL,
  `question_3` text COLLATE utf8_unicode_ci NOT NULL,
  `question_4` text COLLATE utf8_unicode_ci NOT NULL,
  `question_5` text COLLATE utf8_unicode_ci NOT NULL,
  `question_6` text COLLATE utf8_unicode_ci NOT NULL,
  `question_7` text COLLATE utf8_unicode_ci NOT NULL,
  `question_8` text COLLATE utf8_unicode_ci NOT NULL,
  `question_9` text COLLATE utf8_unicode_ci NOT NULL,
  `question_10` text COLLATE utf8_unicode_ci NOT NULL,
  `terms_conditions` longtext COLLATE utf8_unicode_ci NOT NULL,
  `inspection_notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `removal_notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `extended_bidding` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extended_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extended_time_remaining` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extended_minutes_jump` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extended_minutes_increment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bid_increment` int(11) NOT NULL,
  `times_the_bid` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IP_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` int(11) NOT NULL,
  `preview` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `catalog_name`, `auction_type`, `charity`, `catalog_description`, `start_date`, `start_time`, `end_date`, `end_time`, `end_increment`, `house_list`, `currency`, `timezone`, `buyer_premium`, `allow_freeze`, `asset_location_1`, `asset_location_2`, `asset_location_3`, `asset_location_4`, `asset_location_5`, `inspection_1`, `inspection_2`, `inspection_3`, `inspection_4`, `inspection_5`, `inspection_6`, `inspection_7`, `inspection_8`, `inspection_9`, `inspection_10`, `removal_1`, `removal_2`, `removal_3`, `removal_4`, `removal_5`, `removal_6`, `removal_7`, `removal_8`, `removal_9`, `removal_10`, `contact_1`, `contact_2`, `contact_3`, `contact_4`, `contact_5`, `contact_6`, `contact_7`, `contact_8`, `contact_9`, `contact_10`, `question_1`, `question_2`, `question_3`, `question_4`, `question_5`, `question_6`, `question_7`, `question_8`, `question_9`, `question_10`, `terms_conditions`, `inspection_notes`, `removal_notes`, `extended_bidding`, `extended_type`, `extended_time_remaining`, `extended_minutes_jump`, `extended_minutes_increment`, `bid_increment`, `times_the_bid`, `owner`, `IP_address`, `published`, `preview`) VALUES
(116, 'abc123', 'timed', 'no', '<p>TESTING AND BID <strong>PAGE DEVELOPMENT</strong></p>', '2022-01-12', '0000', '2022-01-13', '2330', '5', '||57||', 'USD', 'US/Eastern', 15, 'yes', '1??||&&10137 Devonshire Dr??||&&-1??||&&South Lyon??||&&MT??||&&US', '-1', '-1', '-1', '-1', '0??||&&01/03/2022??||&&01/07/2022??||&&0330??||&&0200??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&01/24/2022??||&&02/28/2022??||&&0315??||&&0400??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&Stacy W Halaby??||&&2487627614??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '<p>terms here</p>', '<p>No notes - don\'t be late</p>', '<p><br></p>', 'yes', 'jump', '10', '10', '', 2, 'yes', 'northcoast_n', '76.217.175.77', 0, 1),
(115, 'Testing lot starting bid <= reserve bid', 'timed', 'no', '<p>need to check that starting bid &lt;= reserve bid</p>', '2021-12-22', '0130', '2021-12-31', '0130', '10', '||', 'USD', 'US/Eastern', 34, 'yes', '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&12/31/2021??||&&??||&&0030??||&&0145??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '<p>test lot starting. bid &lt;= reserve bid</p>', '<p><br></p>', '<p><br></p>', 'no', '', '', '', '', 5, 'yes', 'jhalaby', '76.217.175.77', 0, 0),
(114, 'Invalid character tester', 'timed', 'no', '<p>sdaf</p>', '2021-12-23', '0215', '2021-12-31', '0100', '15', '||', 'USD', 'US/Eastern', 12, 'yes', '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&12/15/2022??||&&-1??||&&0030??||&&0230??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&one', '2??||&&two', '3??||&&three', '4??||&&four', '5??||&&five', '6??||&&six', '7??||&&seven', '8??||&&eight', '9??||&&nine', '10??||&&ten', '<p>terms dude</p>', '<p><br></p>', '<p><br></p>', 'no', '', '', '', '', 12, 'yes', 'jhalaby', '76.217.175.77', 1, 0),
(113, 'Registration Questions', 'timed', 'no', '<p>This catalog is used for prompting registration questions</p>', '2021-12-08', '2100', '2021-12-24', '0000', '15', '||', 'USD', 'US/Eastern', 12, 'yes', '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&12/31/2021??||&&-1??||&&0030??||&&0245??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&ONE: What is your first name?', '2??||&&TWO: What is your last name?', '3??||&&THREE: Do you have a dog?', '4??||&&FOUR: What sport do you play?', '5??||&&FIVE: What is your favorite band?', '6??||&&SIX: What is your favorite movie?', '-1', '-1', '-1', '-1', '<p>Registration questions</p>', '<p><br></p>', '<p><br></p>', 'no', '', '', '', '', 12, 'yes', 'jhalaby', '76.217.175.77', 1, 0),
(112, 'Central Timezone Tester', 'timed', 'no', '<p>This is a tester for the central timezone tester</p>', '2021-11-18', '2245', '2021-11-22', '0000', '10', '||', 'USD', 'US/Central', 23, 'yes', '1??||&&220 Trowbridge Rd??||&&-1??||&&East Lansing??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&11/30/2021??||&&??||&&0030??||&&0245??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '<p>hello world</p>', '<p><br></p>', '<p><br></p>', 'no', '', '', '', '', 12, 'yes', 'jhalaby', '76.217.175.77', 1, 0),
(110, 'Lot Picture Tester', 'timed', 'no', '<p>This is for adding images to a group of lots for the browse page</p>', '2021-11-24', '0045', '2021-11-30', '0000', '20', '||', 'USD', 'US/Eastern', 9, 'yes', '1??||&&10137 Devonshire??||&&Apt 12??||&&South Lyon??||&&MI??||&&US', '2??||&&220 Trowbridge Rd??||&&-1??||&&East Lansing??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&11/30/2021??||&&??||&&0030??||&&0230??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '<p>These ar emy terms</p>', '<p><br></p>', '<p><br></p>', 'no', '', '', '', '', 12, 'yes', 'jhalaby', '76.217.175.77', 1, 0),
(111, 'Timezone Tester For Lot Countdown', 'timed', 'no', '<p>Timezone tester for lot countdown</p>', '2021-11-18', '2100', '2021-11-22', '0000', '10', '||', 'USD', 'US/Eastern', 78, 'no', '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&11/27/2021??||&&??||&&0130??||&&0415??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '<p>hello world</p>', '<p><br></p>', '<p><br></p>', 'no', '', '', '', '', 5, 'yes', 'jhalaby', '76.217.175.77', 1, 0),
(108, 'Eastern Timezone Test', 'timed', 'no', '<p>This is used in conjunction with another catalog for comparing timezones</p>', '2021-11-08', '1330', '2021-11-24', '2130', '15', '||', 'USD', 'US/Eastern', 21, 'yes', '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&11/30/2021??||&&??||&&0000??||&&0015??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '<p>Eastern Timezone terms</p>', '<p><br></p>', '<p><br></p>', 'no', '', '', '', '', 10, 'no', 'jhalaby', '76.217.175.77', 1, 0),
(109, 'Central Timezone Tester', 'timed', 'no', '<p>This is used in conjunction with the eastern Timezone tester for comparing timezones</p>', '2021-11-08', '1400', '2021-11-24', '2130', '15', '||', 'USD', 'US/Central', 11, 'yes', '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&11/30/2021??||&&??||&&0030??||&&0230??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '<p>CENTRAL TIMEZONE FTW</p>', '<p><br></p>', '<p><br></p>', 'no', '', '', '', '', 9, 'yes', 'jhalaby', '76.217.175.77', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `catalog_location`
--

CREATE TABLE `catalog_location` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `location_index` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog_location`
--

INSERT INTO `catalog_location` (`id`, `cat_id`, `location_index`) VALUES
(10, 108, '1'),
(11, 109, '1'),
(12, 110, '2'),
(13, 111, '1'),
(14, 112, '1'),
(15, 113, '1'),
(16, 114, '1'),
(17, 115, '1'),
(18, 116, '1');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_pictures`
--

CREATE TABLE `catalog_pictures` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_registration`
--

CREATE TABLE `catalog_registration` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question8` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer8` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question9` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer9` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question10` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer10` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog_registration`
--

INSERT INTO `catalog_registration` (`id`, `user`, `cat_id`, `status`, `question1`, `answer1`, `question2`, `answer2`, `question3`, `answer3`, `question4`, `answer4`, `question5`, `answer5`, `question6`, `answer6`, `question7`, `answer7`, `question8`, `answer8`, `question9`, `answer9`, `question10`, `answer10`) VALUES
(11, 'jhalaby', 112, 'approved', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1'),
(12, 'jhalaby', 110, 'approved', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1'),
(14, 'jhalaby', 114, 'pending', 'one', 'ab', 'two', 'cd', 'three', 'ef', 'four', 'gh', 'five', 'ij', 'six', 'kl', 'seven', 'mn', 'eight', 'op', 'nine', 'qr', 'ten', 'st'),
(15, 'jhalaby', 113, 'pending', 'ONE: What is your first name?', 'jordan', 'TWO: What is your last name?', 'halaby', 'THREE: Do you have a dog?', 'yes', 'FOUR: What sport do you play?', 'lacrosse', 'FIVE: What is your favorite band?', 'rise against', 'SIX: What is your favorite movie?', 'shawshank', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_status`
--

CREATE TABLE `catalog_status` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog_status`
--

INSERT INTO `catalog_status` (`id`, `cat_id`, `status`, `time`) VALUES
(48, 108, 'open', '2021-11-08 19:34:44'),
(49, 109, 'open', '2021-11-08 20:00:05'),
(50, 110, 'open', '2021-11-24 13:52:24'),
(51, 111, 'open', '2021-11-19 13:49:08'),
(52, 112, 'open', '2021-11-19 13:49:08'),
(53, 113, 'open', '2021-12-09 13:50:46'),
(54, 114, 'open', '2021-12-23 13:50:28'),
(55, 115, 'staging', '2021-12-18 22:20:37'),
(56, 116, 'cancel', '2022-01-20 01:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `cat_tier1`
--

CREATE TABLE `cat_tier1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_tier1`
--

INSERT INTO `cat_tier1` (`id`, `name`) VALUES
(1, 'Land & Real Estate'),
(2, 'Industrial'),
(3, 'Personal Property'),
(4, 'Transportation');

-- --------------------------------------------------------

--
-- Table structure for table `cat_tier2`
--

CREATE TABLE `cat_tier2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_tier2`
--

INSERT INTO `cat_tier2` (`id`, `name`, `parent`) VALUES
(1, 'Automotive - Cars, Trucks & Motorcycles', 4),
(2, 'Automotive - Repair & Equipment', 4),
(3, 'Commercial Trucks & Trailers', 4),
(4, 'Agricultural', 1),
(5, 'Commercial', 1),
(6, 'Residential', 1),
(7, 'Appliances', 3),
(8, 'Furniture', 3),
(9, 'Clothing, Shoes & Accessories', 3),
(10, 'Media', 3),
(11, 'Weapons', 3),
(12, 'Agricultural Equipment', 2),
(13, 'Commercial Trucks & Trailers', 2),
(14, 'Construction & Demolition Equipment', 2),
(15, 'Fabrication & Metalworking Equipment', 2),
(16, 'Food, Beverage & Restaurant Equipment', 2),
(17, 'Laboratory Equipment', 2),
(18, 'Materials & Minerals', 2),
(19, 'MRO', 2),
(20, 'Printing & Publishing Equipment', 2),
(21, 'Tools, Shop Support & Equipment', 2),
(22, 'Tool Storage ', 2),
(23, 'Lifting Equipment', 2),
(24, 'Woodworking Equipment', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cat_tier3`
--

CREATE TABLE `cat_tier3` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_tier3`
--

INSERT INTO `cat_tier3` (`id`, `name`, `parent`) VALUES
(1, 'Classic Automotive', 1),
(2, 'Custom Automotive', 1),
(3, 'General Automotive', 1),
(4, 'Diagnostic Tools & Equipment', 2),
(5, 'Body, Chassis, Interior Trim Equipment', 2),
(6, 'Engine, Transmission, Driveline', 2),
(7, 'Shop Tools, Equipment & Storage', 2),
(8, 'Farm Land', 4),
(9, 'Forest & Logging', 4),
(10, 'Hotel, Motel, Bed & Breakfast', 5),
(11, 'Industrial Space', 5),
(12, 'Office Space', 5),
(13, 'Restaurant', 5),
(14, 'Retail Space', 5),
(15, 'Storage Space', 5),
(16, 'Condominiums', 6),
(17, 'Investment Property', 6),
(18, 'Single Family Housing', 6),
(19, 'Large Appliances', 7),
(20, 'Small Appliances', 7),
(21, 'Household Furniture', 8),
(22, 'Office Furniture', 8),
(23, 'Books & Magazines', 10),
(24, 'Music', 10),
(25, 'Textbooks', 10),
(26, 'Video Games & Consoles', 10),
(27, 'Movies & Players', 10),
(28, 'Firearms', 11),
(29, 'Archery', 11),
(30, 'Knives', 11),
(31, 'Farming', 12),
(32, 'Landscaping & Lawncare', 12),
(33, 'Horticultural Equipment', 12),
(34, 'Equestrian, Ranching & Livestock', 12),
(35, 'Metals', 18),
(36, 'Plastics', 18),
(37, 'Rare Earth', 18),
(38, 'Cranes', 23),
(39, 'Forklifts', 23),
(40, 'Jib & Gantry', 23);

-- --------------------------------------------------------

--
-- Table structure for table `cat_tier4`
--

CREATE TABLE `cat_tier4` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_tier4`
--

INSERT INTO `cat_tier4` (`id`, `name`, `parent`) VALUES
(1, 'Cars', 1),
(2, 'Trucks', 1),
(3, 'Motorcycles', 1),
(4, 'Cars', 2),
(5, 'Trucks', 2),
(6, 'Motorcycles', 2),
(7, 'Cars', 3),
(8, 'Trucks', 3),
(9, 'Motorcycles', 3),
(10, 'Collectible Books & Magazines', 23),
(11, 'Ammunition', 28),
(12, 'Long Guns', 28),
(13, 'Hand Guns', 28),
(14, 'Antique & Collectible Guns', 28),
(15, 'Arrows & Bolts', 29),
(16, 'Accessories', 29),
(17, 'Compound & Recurve Bows', 29),
(18, 'Crossbows', 29),
(19, 'Tractors & Implements', 31),
(20, 'Irrigation Equipment', 31),
(21, 'Harvesting Equipment', 31),
(23, 'Lawn Care Equipment', 32),
(24, 'Power Tools', 32),
(25, 'Forestry Equipment & Tools', 32),
(26, 'Livestock', 34),
(27, 'Support Equipment', 34),
(29, 'Horses', 34);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_code`, `phone_code`) VALUES
(1, 'United States', 'US', '1'),
(2, 'Afghanistan', 'AF', '93'),
(3, 'Albania', 'AL', '355'),
(4, 'Algeria', 'DZ', '213'),
(5, 'American Samoa', 'AS', '1-684'),
(6, 'Andorra', 'AD', '376'),
(7, 'Angola', 'AO', '244'),
(8, 'Anguilla', 'AI', '1-264'),
(9, 'Antarctica', 'AQ', '672'),
(10, 'Antigua and Barbuda', 'AG', '1-268'),
(11, 'Argentina', 'AR', '54'),
(12, 'Armenia', 'AM', '374'),
(13, 'Aruba', 'AW', '297'),
(14, 'Australia', 'AU', '61'),
(15, 'Austria', 'AT', '43'),
(16, 'Azerbaijan', 'AZ', '994'),
(17, 'Bahamas', 'BS', '1-242'),
(18, 'Bahrain', 'BH', '973'),
(19, 'Bangladesh', 'BD', '880'),
(20, 'Barbados', 'BB', '1-246'),
(21, 'Belarus', 'BY', '375'),
(22, 'Belgium', 'BE', '32'),
(23, 'Belize', 'BZ', '501'),
(24, 'Benin', 'BJ', '229'),
(25, 'Bermuda', 'BM', '1-441'),
(26, 'Bhutan', 'BT', '975'),
(27, 'Bolivia', 'BO', '591'),
(28, 'Bosnia and Herzegovina', 'BA', '387'),
(29, 'Botswana', 'BW', '267'),
(30, 'Brazil', 'BR', '55'),
(31, 'British Indian Ocean Territory', 'IO', '246'),
(32, 'British Virgin Islands', 'VG', '1-284'),
(33, 'Brunei', 'BN', '673'),
(34, 'Bulgaria', 'BG', '359'),
(35, 'Burkina Faso', 'BF', '226'),
(36, 'Burundi', 'BI', '257'),
(37, 'Cambodia', 'KH', '855'),
(38, 'Cameroon', 'CM', '237'),
(39, 'Canada', 'CA', '1'),
(40, 'Cape Verde', 'CV', '238'),
(41, 'Cayman Islands', 'KY', '1-345'),
(42, 'Central African Republic', 'CF', '236'),
(43, 'Chad', 'TD', '235'),
(44, 'Chile', 'CL', '56'),
(45, 'China', 'CN', '86'),
(46, 'Christmas Island', 'CX', '61'),
(47, 'Cocos Islands', 'CC', '61'),
(48, 'Colombia', 'CO', '57'),
(49, 'Comoros', 'KM', '269'),
(50, 'Cook Islands', 'CK', '682'),
(51, 'Costa Rica', 'CR', '506'),
(52, 'Croatia', 'HR', '385'),
(53, 'Cuba', 'CU', '53'),
(54, 'Curacao', 'CW', '599'),
(55, 'Cyprus', 'CY', '357'),
(56, 'Czech Republic', 'CZ', '420'),
(57, 'Democratic Republic of the Congo', 'CD', '243'),
(58, 'Denmark', 'DK', '45'),
(59, 'Djibouti', 'DJ', '253'),
(60, 'Dominica', 'DM', '1-767'),
(61, 'Dominican Republic', 'DO', '1-809, 1-829, 1-849'),
(62, 'East Timor', 'TL', '670'),
(63, 'Ecuador', 'EC', '593'),
(64, 'Egypt', 'EG', '20'),
(65, 'El Salvador', 'SV', '503'),
(66, 'Equatorial Guinea', 'GQ', '240'),
(67, 'Eritrea', 'ER', '291'),
(68, 'Estonia', 'EE', '372'),
(69, 'Ethiopia', 'ET', '251'),
(70, 'Falkland Islands', 'FK', '500'),
(71, 'Faroe Islands', 'FO', '298'),
(72, 'Fiji', 'FJ', '679'),
(73, 'Finland', 'FI', '358'),
(74, 'France', 'FR', '33'),
(75, 'French Polynesia', 'PF', '689'),
(76, 'Gabon', 'GA', '241'),
(77, 'Gambia', 'GM', '220'),
(78, 'Georgia', 'GE', '995'),
(79, 'Germany', 'DE', '49'),
(80, 'Ghana', 'GH', '233'),
(81, 'Gibraltar', 'GI', '350'),
(82, 'Greece', 'GR', '30'),
(83, 'Greenland', 'GL', '299'),
(84, 'Grenada', 'GD', '1-473'),
(85, 'Guam', 'GU', '1-671'),
(86, 'Guatemala', 'GT', '502'),
(87, 'Guernsey', 'GG', '44-1481'),
(88, 'Guinea', 'GN', '224'),
(89, 'Guinea-Bissau', 'GW', '245'),
(90, 'Guyana', 'GY', '592'),
(91, 'Haiti', 'HT', '509'),
(92, 'Honduras', 'HN', '504'),
(93, 'Hong Kong', 'HK', '852'),
(94, 'Hungary', 'HU', '36'),
(95, 'Iceland', 'IS', '354'),
(96, 'India', 'IN', '91'),
(97, 'Indonesia', 'ID', '62'),
(98, 'Iran', 'IR', '98'),
(99, 'Iraq', 'IQ', '964'),
(100, 'Ireland', 'IE', '353'),
(101, 'Isle of Man', 'IM', '44-1624'),
(102, 'Israel', 'IL', '972'),
(103, 'Italy', 'IT', '39'),
(104, 'Ivory Coast', 'CI', '225'),
(105, 'Jamaica', 'JM', '1-876'),
(106, 'Japan', 'JP', '81'),
(107, 'Jersey', 'JE', '44-1534'),
(108, 'Jordan', 'JO', '962'),
(109, 'Kazakhstan', 'KZ', '7'),
(110, 'Kenya', 'KE', '254'),
(111, 'Kiribati', 'KI', '686'),
(112, 'Kosovo', 'XK', '383'),
(113, 'Kuwait', 'KW', '965'),
(114, 'Kyrgyzstan', 'KG', '996'),
(115, 'Laos', 'LA', '856'),
(116, 'Latvia', 'LV', '371'),
(117, 'Lebanon', 'LB', '961'),
(118, 'Lesotho', 'LS', '266'),
(119, 'Liberia', 'LR', '231'),
(120, 'Libya', 'LY', '218'),
(121, 'Liechtenstein', 'LI', '423'),
(122, 'Lithuania', 'LT', '370'),
(123, 'Luxembourg', 'LU', '352'),
(124, 'Macau', 'MO', '853'),
(125, 'Macedonia', 'MK', '389'),
(126, 'Madagascar', 'MG', '261'),
(127, 'Malawi', 'MW', '265'),
(128, 'Malaysia', 'MY', '60'),
(129, 'Maldives', 'MV', '960'),
(130, 'Mali', 'ML', '223'),
(131, 'Malta', 'MT', '356'),
(132, 'Marshall Islands', 'MH', '692'),
(133, 'Mauritania', 'MR', '222'),
(134, 'Mauritius', 'MU', '230'),
(135, 'Mayotte', 'YT', '262'),
(136, 'Mexico', 'MX', '52'),
(137, 'Micronesia', 'FM', '691'),
(138, 'Moldova', 'MD', '373'),
(139, 'Monaco', 'MC', '377'),
(140, 'Mongolia', 'MN', '976'),
(141, 'Montenegro', 'ME', '382'),
(142, 'Montserrat', 'MS', '1-664'),
(143, 'Morocco', 'MA', '212'),
(144, 'Mozambique', 'MZ', '258'),
(145, 'Myanmar', 'MM', '95'),
(146, 'Namibia', 'NA', '264'),
(147, 'Nauru', 'NR', '674'),
(148, 'Nepal', 'NP', '977'),
(149, 'Netherlands', 'NL', '31'),
(150, 'Netherlands Antilles', 'AN', '599'),
(151, 'New Caledonia', 'NC', '687'),
(152, 'New Zealand', 'NZ', '64'),
(153, 'Nicaragua', 'NI', '505'),
(154, 'Niger', 'NE', '227'),
(155, 'Nigeria', 'NG', '234'),
(156, 'Niue', 'NU', '683'),
(157, 'North Korea', 'KP', '850'),
(158, 'Northern Mariana Islands', 'MP', '1-670'),
(159, 'Norway', 'NO', '47'),
(160, 'Oman', 'OM', '968'),
(161, 'Pakistan', 'PK', '92'),
(162, 'Palau', 'PW', '680'),
(163, 'Palestine', 'PS', '970'),
(164, 'Panama', 'PA', '507'),
(165, 'Papua New Guinea', 'PG', '675'),
(166, 'Paraguay', 'PY', '595'),
(167, 'Peru', 'PE', '51'),
(168, 'Philippines', 'PH', '63'),
(169, 'Pitcairn', 'PN', '64'),
(170, 'Poland', 'PL', '48'),
(171, 'Portugal', 'PT', '351'),
(172, 'Puerto Rico', 'PR', '1-787, 1-939'),
(173, 'Qatar', 'QA', '974'),
(174, 'Republic of the Congo', 'CG', '242'),
(175, 'Reunion', 'RE', '262'),
(176, 'Romania', 'RO', '40'),
(177, 'Russia', 'RU', '7'),
(178, 'Rwanda', 'RW', '250'),
(179, 'Saint Barthelemy', 'BL', '590'),
(180, 'Saint Helena', 'SH', '290'),
(181, 'Saint Kitts and Nevis', 'KN', '1-869'),
(182, 'Saint Lucia', 'LC', '1-758'),
(183, 'Saint Martin', 'MF', '590'),
(184, 'Saint Pierre and Miquelon', 'PM', '508'),
(185, 'Saint Vincent and the Grenadines', 'VC', '1-784'),
(186, 'Samoa', 'WS', '685'),
(187, 'San Marino', 'SM', '378'),
(188, 'Sao Tome and Principe', 'ST', '239'),
(189, 'Saudi Arabia', 'SA', '966'),
(190, 'Senegal', 'SN', '221'),
(191, 'Serbia', 'RS', '381'),
(192, 'Seychelles', 'SC', '248'),
(193, 'Sierra Leone', 'SL', '232'),
(194, 'Singapore', 'SG', '65'),
(195, 'Sint Maarten', 'SX', '1-721'),
(196, 'Slovakia', 'SK', '421'),
(197, 'Slovenia', 'SI', '386'),
(198, 'Solomon Islands', 'SB', '677'),
(199, 'Somalia', 'SO', '252'),
(200, 'South Africa', 'ZA', '27'),
(201, 'South Korea', 'KR', '82'),
(202, 'South Sudan', 'SS', '211'),
(203, 'Spain', 'ES', '34'),
(204, 'Sri Lanka', 'LK', '94'),
(205, 'Sudan', 'SD', '249'),
(206, 'Suriname', 'SR', '597'),
(207, 'Svalbard and Jan Mayen', 'SJ', '47'),
(208, 'Swaziland', 'SZ', '268'),
(209, 'Sweden', 'SE', '46'),
(210, 'Switzerland', 'CH', '41'),
(211, 'Syria', 'SY', '963'),
(212, 'Taiwan', 'TW', '886'),
(213, 'Tajikistan', 'TJ', '992'),
(214, 'Tanzania', 'TZ', '255'),
(215, 'Thailand', 'TH', '66'),
(216, 'Togo', 'TG', '228'),
(217, 'Tokelau', 'TK', '690'),
(218, 'Tonga', 'TO', '676'),
(219, 'Trinidad and Tobago', 'TT', '1-868'),
(220, 'Tunisia', 'TN', '216'),
(221, 'Turkey', 'TR', '90'),
(222, 'Turkmenistan', 'TM', '993'),
(223, 'Turks and Caicos Islands', 'TC', '1-649'),
(224, 'Tuvalu', 'TV', '688'),
(225, 'U.S. Virgin Islands', 'VI', '1-340'),
(226, 'Uganda', 'UG', '256'),
(227, 'Ukraine', 'UA', '380'),
(228, 'United Arab Emirates', 'AE', '971'),
(229, 'United Kingdom', 'GB', '44'),
(231, 'Uruguay', 'UY', '598'),
(232, 'Uzbekistan', 'UZ', '998'),
(233, 'Vanuatu', 'VU', '678'),
(234, 'Vatican', 'VA', '379'),
(235, 'Venezuela', 'VE', '58'),
(236, 'Vietnam', 'VN', '84'),
(237, 'Wallis and Futuna', 'WF', '681'),
(238, 'Western Sahara', 'EH', '212'),
(239, 'Yemen', 'YE', '967'),
(240, 'Zambia', 'ZM', '260'),
(241, 'Zimbabwe', 'ZW', '263');

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
(2, 'Euro', 'EUR', '???'),
(3, 'Japanese yen', 'JPY', '??'),
(4, 'Pound sterling', 'GBP', '??'),
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
(57, 'Doggie', 'steve@spyderbyte.co', '7164eb030556b4c0bb03b96e09580572', 'Bentley', 'Halaby', '2', 'Dog School', '4', 'Marley and Me', 'northcoast_n'),
(60, 'bentley', 'doggie@frnk.com', '06d80eb0c50b49a509b49f2424e8c805', 'bentley', 'Halaby', '2', 'roof', '2', 'roof', 'DustyCar'),
(94, 'another', 'another@another.com', 'b32d73e56ec99bc5ec8f83871cde708a', 'Another', 'Test', '1', 'Werner', '2', 'Michael', 'jhalaby'),
(86, 'Fishstick', 'fishstick@spyderbyteinc.com', '6050eb18fbbec7fa1d1d21a86c1916d6', 'Fish', 'Stick', '1', 'Wanda', '4', 'Nemo', 'DustyCar'),
(93, 'snake', 'snake@bidzwon.com', 'de1b2a7baf7850243db71c4abd4e5a39', 'Jake', 'TheSnake', '2', 'Snake', '1', 'Snake', 'jhalaby'),
(92, 'house', 'house@bidzwon.com', '2ca63cddd54f9490efad22421891a9d1', 'Jordan', 'House', '2', 'House', '2', 'House', 'jhalaby');

-- --------------------------------------------------------

--
-- Table structure for table `increment`
--

CREATE TABLE `increment` (
  `number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `increment`
--

INSERT INTO `increment` (`number`) VALUES
(3172);

-- --------------------------------------------------------

--
-- Table structure for table `lots`
--

CREATE TABLE `lots` (
  `id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `starting_bid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `increment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bid_increment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reserve_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other_category` text COLLATE utf8_unicode_ci NOT NULL,
  `lot_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured_lot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allow_freeze` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `times_the_bid` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `units` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lot_condition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8_unicode_ci NOT NULL,
  `internal_notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `current_bid` int(11) NOT NULL,
  `closed` int(11) NOT NULL,
  `winner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lots`
--

INSERT INTO `lots` (`id`, `catalog_id`, `name`, `description`, `starting_bid`, `increment_type`, `bid_increment`, `reserve_amount`, `category`, `other_category`, `lot_location`, `featured_lot`, `allow_freeze`, `times_the_bid`, `quantity`, `units`, `brand`, `lot_condition`, `size`, `weight`, `tags`, `internal_notes`, `current_bid`, `closed`, `winner`, `status`, `owner`, `ip_address`) VALUES
(110, 115, 'test1', '<p>teest1</p>', '120', 'static', '5', '9000', '2-16', '', '1', 'yes', 'yes', 'yes', '8', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'staging', 'jhalaby', '76.217.175.77'),
(111, 115, 'test2', '<p>teest2</p>', '90', 'static', '5', '9000', '2-16', '', '1', 'yes', 'yes', 'yes', '8', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'staging', 'jhalaby', '76.217.175.77'),
(109, 116, 'CHOCHKEE 1', '<p>ALL FOR SHOW</p>', '1', 'static', '1', '0', '2-23-38', '', '1', 'yes', 'yes', 'yes', '1', '', 'MINE', 'OLD AND PRICELESS', 'YUGE', '1 OZ', '', '<p>BLAH BLAH</p>', -1, -1, '-1', 'staging', 'northcoast_n', '76.217.175.77'),
(104, 112, 'Central 3', '<p>central 3</p>', '12', 'static', '12', '0', '2-16', '', '1', 'yes', 'yes', 'yes', '12', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(103, 112, 'Central 2', '<p>cenrral 2</p>', '12', 'static', '12', '0', '2-16', '', '1', 'yes', 'yes', 'yes', '12', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(102, 112, 'Central 1', '<p>central 1</p>', '12', 'static', '12', '0', '2-16', '', '1', 'yes', 'yes', 'yes', '12', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(101, 111, '4th Lot', '<p>this is the fourth lot</p>', '12', 'static', '5', '12', '0', 'Nothing', '1', 'yes', 'no', 'yes', '12', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(100, 111, '3rd Lot', '<p>this is the third lot</p>', '12', 'static', '5', '12', '0', 'Nothing', '1', 'yes', 'no', 'yes', '12', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(99, 111, '2nd Lot', '<p>This is the second lot</p>', '12', 'static', '5', '12', '0', 'Nothing', '1', 'yes', 'yes', 'yes', '12', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(98, 111, '1st Lot', '<p>first lot</p>', '12', 'static', '5', '12', '0', 'Nothing', '1', 'yes', 'no', 'yes', '12', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(96, 110, 'Homes Lot', '<p>This is a lot of homes</p>', '90', 'static', '12', '0', '1-6-18', '', '1', 'yes', 'yes', 'no', '2', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(108, 116, 'WIDGET 2', '<p>ALL FOR SHOW</p>', '10', 'static', '5', '0', '2-20', '', '1', 'yes', 'yes', 'yes', '1', 'lbs', 'MINE', 'OLD AND PRICELESS2', 'YUGEx3', '1 OZ', '', '<p>BLAH BLAH</p>', -1, -1, '-1', 'staging', 'northcoast_n', '76.217.175.77'),
(107, 116, 'WIDGET 1', '<p>ALL FOR SHOW</p>', '1', 'static', '1', '0', '2-23-38', '', '1', 'yes', 'yes', 'yes', '1', '', 'MINE', 'OLD AND PRICELESS', 'YUGE', '1 OZ', '', '<p>BLAH BLAH</p>', -1, -1, '-1', 'staging', 'northcoast_n', '76.217.175.77'),
(106, 114, 'Testing Registration Questions (again)', '<p>This is just a second validation that registration questions work</p>', '90', 'static', '12', '20', '2-16', '', '1', 'yes', 'yes', 'yes', '9', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(105, 113, 'Registration question lot', '<p>This is a lot for registration questions</p>', '20', 'static', '12', '0', '0', 'None of the above', '1', 'yes', 'yes', 'yes', '12', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(97, 110, 'Tools Lot', '<p>This is a lot of tools</p>', '12', 'static', '12', '0', '2-21', '', '2', 'yes', 'yes', 'yes', '12', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(95, 110, 'Cars Lot', '<p>This is a lot of cars</p>', '12', 'static', '12', '0', '4-1-3-7', '', '2', 'yes', 'yes', 'yes', '3', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(93, 109, 'Central Lot', '<p>Goodbye world</p>', '12', 'static', '9', '122', '1-5-10', '', '1', 'yes', 'yes', 'yes', '12', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(94, 110, 'Books Lot', '<p>This is a lot of books</p>', '12', 'static', '12', '12', '3-10-23-0', 'Regular Books', '2', 'yes', 'yes', 'yes', '9', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77'),
(92, 108, 'Eastern Lot', '<p>Hello world</p>', '12', 'static', '10', '12', '0', 'Jordan', '1', 'yes', 'yes', 'no', '12', '', '', '', '', '', '', '<p><br></p>', -1, -1, '-1', 'open', 'jhalaby', '76.217.175.77');

-- --------------------------------------------------------

--
-- Table structure for table `lot_countdown`
--

CREATE TABLE `lot_countdown` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `create_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lot_countdown`
--

INSERT INTO `lot_countdown` (`id`, `cat_id`, `lot_id`, `create_time`, `username`, `end_time`) VALUES
(60, 109, 93, '1636055570', 'jhalaby', '1637789400'),
(61, 108, 92, '1636055575', 'jhalaby', '1637789400'),
(62, 110, 94, '1636568508', 'jhalaby', '1638230400'),
(63, 110, 95, '1636568508', 'jhalaby', '1638231600'),
(64, 110, 96, '1636568508', 'jhalaby', '1638232800'),
(65, 110, 97, '1636568508', 'jhalaby', '1638234000'),
(66, 111, 98, '1637260233', 'jhalaby', '1637557200'),
(67, 111, 99, '1637260233', 'jhalaby', '1637557800'),
(68, 111, 100, '1637260233', 'jhalaby', '1637558400'),
(69, 111, 101, '1637260233', 'jhalaby', '1637559000'),
(70, 112, 102, '1637260650', 'jhalaby', '1637560800'),
(71, 112, 103, '1637260650', 'jhalaby', '1637561400'),
(72, 112, 104, '1637260650', 'jhalaby', '1637562000'),
(74, 113, 105, '1638469500', 'jhalaby', '1640322000'),
(75, 114, 106, '1639864050', 'jhalaby', '1640930400');

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
(335, 116, 109, '1640993013Image_1608918055.jpg'),
(334, 116, 109, '164099301220201101_132527.jpg'),
(332, 116, 107, '164099291920210520_185305.jpg'),
(319, 110, 97, '1636568235tools_10.jpg'),
(320, 110, 97, '1636568235tools_11.jpg'),
(317, 110, 97, '1636568234tools_8.jpg'),
(318, 110, 97, '1636568235tools_9.jpg'),
(316, 110, 97, '1636568234tools_7.jpg'),
(315, 110, 97, '1636568234tools_6.jpg'),
(314, 110, 97, '1636568234tools_5.jpg'),
(331, 116, 107, '164099291820210604_171151.jpg'),
(312, 110, 97, '1636568233tools_3.jpg'),
(311, 110, 97, '1636568233tools_2.jpg'),
(309, 110, 96, '1636568183homes_11.jpg'),
(308, 110, 96, '1636568183homes_10.jpg'),
(307, 110, 96, '1636568183homes_9.jpg'),
(306, 110, 96, '1636568182homes_7.jpg'),
(305, 110, 96, '1636568182homes_8.jpg'),
(304, 110, 96, '1636568182homes_5.jpg'),
(310, 110, 97, '1636568233tools_1.jpg'),
(302, 110, 96, '1636568181homes_4.jpg'),
(301, 110, 96, '1636568181homes_3.jpg'),
(330, 116, 107, '164099291520210604_171142.jpg'),
(333, 116, 109, '164099300920210203_164329.jpg'),
(328, 116, 108, '1640992824Image_1608918139.jpg'),
(327, 116, 108, '164099282420201101_132527.jpg'),
(326, 116, 108, '1640992823Image_1608918055.jpg'),
(325, 116, 108, '164099282220201225_122824.jpg'),
(324, 116, 108, '164099282020201224_103532.jpg'),
(323, 116, 108, '164099276320201103_152715.jpg'),
(291, 110, 94, '1636402015books_14.jpg'),
(290, 110, 94, '1636402015books_13.jpg'),
(289, 110, 94, '1636402014books_12.jpg'),
(288, 110, 94, '1636402014books_11.jpg'),
(287, 110, 94, '1636402014books_10.jpg'),
(286, 110, 94, '1636402013books_9.jpg'),
(285, 110, 94, '1636402013books_8.jpg'),
(284, 110, 94, '1636402013books_6.jpg'),
(283, 110, 94, '1636402013books_7.jpg'),
(282, 110, 94, '1636402012books_5.jpg'),
(281, 110, 94, '1636402012books_4.jpg');

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
(32, 116, 109, '||334||333||335||'),
(31, 116, 107, '||330||331||332||'),
(29, 110, 97, '||316||310||311||312||314||315||317||318||319||320||'),
(28, 110, 96, '||309||301||302||304||305||306||307||308||'),
(30, 116, 108, '||325||323||324||326||327||328||'),
(27, 110, 95, '||'),
(26, 110, 94, '||286||281||282||283||284||285||287||288||289||290||291||');

-- --------------------------------------------------------

--
-- Table structure for table `lot_sort`
--

CREATE TABLE `lot_sort` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sequence` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lot_sort`
--

INSERT INTO `lot_sort` (`id`, `cat_id`, `sequence`) VALUES
(77, '116', '||108||107||109||'),
(76, '115', '||110||111||'),
(75, '114', '||106||'),
(72, '111', '||98||99||100||101||'),
(74, '113', '||105||'),
(73, '112', '||102||103||104||'),
(71, '110', '||94||95||96||97||'),
(70, '109', '||93||'),
(69, '108', '||92||');

-- --------------------------------------------------------

--
-- Table structure for table `note_test`
--

CREATE TABLE `note_test` (
  `id` int(11) NOT NULL,
  `vchar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `note_test`
--

INSERT INTO `note_test` (`id`, `vchar`, `text`) VALUES
(1, 'test', 'test'),
(2, '<p>Hello everyone2</p>\r\n\r\n<ol>\r\n	<li>Jordan</li>\r\n	<li>Halaby</li>\r\n</ol>\r\n\r\n<p>Test</p>\r\n\r\n<ul>\r\n	<li>Test1</li>\r\n	<li>JOrdan</li>\r\n</ul>\r\n\r\n<p>Kyle</p>\r\n', '<p>Hello everyone2</p>\r\n\r\n<ol>\r\n	<li>Jordan</li>\r\n	<li>Halaby</li>\r\n</ol>\r\n\r\n<p>Test</p>\r\n\r\n<ul>\r\n	<li>Test1</li>\r\n	<li>JOrdan</li>\r\n</ul>\r\n\r\n<p>Kyle</p>\r\n'),
(3, '<ul>\r\n	<li>Jordan</li>\r\n	<li>One</li>\r\n	<li>Two</li>\r\n</ul>\r\n\r\n<p>Halaby</p>\r\n', '<ul>\r\n	<li>Jordan</li>\r\n	<li>One</li>\r\n	<li>Two</li>\r\n</ul>\r\n\r\n<p>Halaby</p>\r\n'),
(4, 'hello', 'test\'s');

-- --------------------------------------------------------

--
-- Table structure for table `security_question1`
--

CREATE TABLE `security_question1` (
  `id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `security_question1`
--

INSERT INTO `security_question1` (`id`, `question`) VALUES
(1, 'What is your mother\'s maiden name?'),
(2, 'What highschool did you go to?'),
(3, 'What is your favorite meal?'),
(4, 'What is the name of your first pet?'),
(5, 'What is the first car you owned?'),
(6, 'Where is your favorite vacation spot?'),
(7, 'What hospital were you born in?');

-- --------------------------------------------------------

--
-- Table structure for table `security_question2`
--

CREATE TABLE `security_question2` (
  `id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `security_question2`
--

INSERT INTO `security_question2` (`id`, `question`) VALUES
(1, 'What is your favorite professional sport?'),
(2, 'What is your father\'s middle name?'),
(3, 'What is the name of your closest childhood friend?'),
(4, 'What is your favorite movie?'),
(5, 'What street did you grow up on?'),
(6, 'Who is your favorite actor/actress?'),
(7, 'What was your first job?');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `huser` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `username`, `email`, `password`, `permissions`, `huser`) VALUES
(1, 'Jordan', 'jhabs', 'jhalaby@emich.edu', '71603a2a25ec0996e665467cc270db97', 'all', 'a06ff57accb920126f25cd4b9eaecaba'),
(2, 'Steve', 'spyder', 'steve@bidzwon.com', '4e66f7ddd20a112597b1b9f083d517c5', 'all', 'e5fb0cda12f90dc4341247ddab54d1da');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `code`, `country`) VALUES
(1, 'Alberta', 'AB', 'CA'),
(2, 'Alabama', 'AL', 'US'),
(3, 'Alaska', 'AK', 'US'),
(4, 'Arizona', 'AZ', 'US'),
(5, 'Arkansas', 'AR', 'US'),
(6, 'California', 'CA', 'US'),
(7, 'Colorado', 'CO', 'US'),
(8, 'Connecticut', 'CT', 'US'),
(9, 'District of Columbia', 'DC', 'US'),
(10, 'Delaware', 'DE', 'US'),
(11, 'Florida', 'FL', 'US'),
(12, 'Georgia', 'GA', 'US'),
(13, 'Hawaii', 'HI', 'US'),
(14, 'Idaho', 'ID', 'US'),
(15, 'Illinois', 'IL', 'US'),
(16, 'Indiana', 'IN', 'US'),
(17, 'Iowa', 'IA', 'US'),
(18, 'Kansas', 'KS', 'US'),
(19, 'Kentucky', 'KY', 'US'),
(20, 'Louisiana', 'LA', 'US'),
(21, 'Maine', 'ME', 'US'),
(22, 'Maryland', 'MD', 'US'),
(23, 'Massachusetts', 'MA', 'US'),
(24, 'Michigan', 'MI', 'US'),
(25, 'Minnesota', 'MN', 'US'),
(26, 'Mississippi', 'MS', 'US'),
(27, 'Missouri', 'MO', 'US'),
(28, 'Montana', 'MT', 'US'),
(29, 'Nebraska', 'NE', 'US'),
(30, 'Nevada', 'NV', 'US'),
(31, 'New Hampshire', 'NH', 'US'),
(32, 'New Jersey', 'NJ', 'US'),
(33, 'New Mexico', 'NM', 'US'),
(34, 'New York', 'NY', 'US'),
(35, 'North Carolina', 'NC', 'US'),
(36, 'North Dakota', 'ND', 'US'),
(37, 'Ohio', 'OH', 'US'),
(38, 'Oklahoma', 'OK', 'US'),
(39, 'Oregon', 'OR', 'US'),
(40, 'Pennsylvania', 'PA', 'US'),
(41, 'Rhode Island', 'RI', 'US'),
(42, 'South Carolina', 'SC', 'US'),
(43, 'South Dakota', 'SD', 'US'),
(44, 'Tennessee', 'TN', 'US'),
(45, 'Texas', 'TX', 'US'),
(46, 'Utah', 'UT', 'US'),
(47, 'Vermont', 'VT', 'US'),
(48, 'Virginia', 'VA', 'US'),
(49, 'Washington', 'WA', 'US'),
(50, 'West Virginia', 'WV', 'US'),
(51, 'Wisconsin', 'WI', 'US'),
(52, 'Wyoming', 'WY', 'US'),
(53, 'American Samoa', 'AS', 'US'),
(54, 'Guam', 'GU', 'US'),
(55, 'Northern Mariana Islands', 'MP', 'US'),
(56, 'Puerto Rico', 'PR', 'US'),
(57, 'United States Minor Outlying Islands', 'UM', 'US'),
(58, 'Virgin Islands', 'VI', 'US'),
(59, 'British Columbia', 'BC', 'CA'),
(60, 'Manitoba', 'MB', 'CA'),
(61, 'New Brunswick', 'NB', 'CA'),
(62, 'Newfoundland and Labrador', 'NL', 'CA'),
(63, 'Nova Scotia', 'NS', 'CA'),
(64, 'Nunavut', 'NU', 'CA'),
(65, 'Northwest Territories', 'NT', 'CA'),
(66, 'Ontario', 'ON', 'CA'),
(67, 'Prince Edward Island', 'PE', 'CA'),
(68, 'Quebec', 'QC', 'CA'),
(69, 'Saskatchewan', 'SK', 'CA'),
(70, 'Yukon', 'YT', 'CA'),
(71, 'Ashmore and Cartier Islands', 'Ashmore and Cartier Islands', 'AU'),
(72, 'Australian Antarctic Territory', 'Australian Antarctic Territory', 'AU'),
(73, 'Australian Capital Territory', 'ACT', 'AU'),
(74, 'Christmas Island', 'CX', 'AU'),
(75, 'Cocos Islands', 'CC', 'AU'),
(76, 'Coral Sea Islands', 'Coral Sea Islands', 'AU'),
(77, 'Heard Island and McDonald Islands', 'HM', 'AU'),
(78, 'Jervis Bay Territory', 'JBT', 'AU'),
(79, 'New South Wales', 'NSW', 'AU'),
(80, 'Norfolk Island', 'NF', 'AU'),
(81, 'Northern Territory', 'NT', 'AU'),
(82, 'Queensland', 'QLD', 'AU'),
(83, 'South Australia', 'SA', 'AU'),
(84, 'Tasmania', 'TAS', 'AU'),
(85, 'Victoria', 'VIC', 'AU'),
(86, 'Western Australia', 'WA', 'AU'),
(87, 'Aguascalientes', 'AG', 'MX'),
(88, 'Baja California', 'BC', 'MX'),
(89, 'Baja California Sur', 'BS', 'MX'),
(90, 'Campeche', 'CM', 'MX'),
(91, 'Chiapas', 'CS', 'MX'),
(92, 'Chihuahua', 'CH', 'MX'),
(93, 'Coahuila', 'MX', 'MX'),
(94, 'Colima', 'CL', 'MX'),
(95, 'Federal District', 'DF', 'MX'),
(96, 'Durango', 'DG', 'MX'),
(97, 'Guanajuato', 'GT', 'MX'),
(98, 'Guerrero', 'GR', 'MX'),
(99, 'Hidalgo', 'HG', 'MX'),
(100, 'Jalisco', 'JA', 'MX'),
(101, 'Mexico', 'ME', 'MX'),
(102, 'Michoac??n', 'MI', 'MX'),
(103, 'Morelos', 'MO', 'MX'),
(104, 'Nayarit', 'NA', 'MX'),
(105, 'Nuevo Le??n', 'NL', 'MX'),
(106, 'Oaxaca', 'OA', 'MX'),
(107, 'Puebla', 'PU', 'MX'),
(108, 'Quer??taro', 'QE', 'MX'),
(109, 'Quintana Roo', 'QR', 'MX'),
(110, 'San Luis Potos??', 'SL', 'MX'),
(111, 'Sinaloa', 'SI', 'MX'),
(112, 'Sonora', 'SO', 'MX'),
(113, 'Tabasco', 'TB', 'MX'),
(114, 'Tamaulipas', 'TM', 'MX'),
(115, 'Tlaxcala', 'TL', 'MX'),
(116, 'Veracruz', 'VE', 'MX'),
(117, 'Yucat??n', 'YU', 'MX'),
(118, 'Zacatecas', 'ZA', 'MX'),
(119, 'Chongqing', 'Chongqing', 'CN'),
(120, 'Heilongjiang', 'Heilongjiang', 'CN'),
(121, 'Jilin', 'Jilin', 'CN'),
(122, 'Hainan', 'Hainan', 'CN'),
(123, 'Beijing', 'Beijing', 'CN'),
(124, 'Liaoning', 'Liaoning', 'CN'),
(125, 'Inner Mongolia', 'Inner Mongolia', 'CN'),
(126, 'Xizang', 'Xizang', 'CN'),
(127, 'Qinghai', 'Qinghai', 'CN'),
(128, 'Ningxia', 'Ningxia', 'CN'),
(129, 'Xinjiang', 'Xinjiang', 'CN'),
(130, 'Gansu', 'Gansu', 'CN'),
(131, 'Hebei', 'Hebei', 'CN'),
(132, 'Henan', 'Henan', 'CN'),
(133, 'Hubei', 'Hubei', 'CN'),
(134, 'Hunan', 'Hunan', 'CN'),
(135, 'Shandong', 'Shandong', 'CN'),
(136, 'Jiangsu', 'Jiangsu', 'CN'),
(137, 'Anhui', 'Anhui', 'CN'),
(138, 'Shanxi', 'Shanxi', 'CN'),
(139, 'Shaanxi', 'Shaanxi', 'CN'),
(140, 'sichuan', 'sichuan', 'CN'),
(141, 'Yunnan', 'Yunnan', 'CN'),
(142, 'Guizhou', 'Guizhou', 'CN'),
(143, 'Zhejiang', 'Zhejiang', 'CN'),
(144, 'Fujian', 'Fujian', 'CN'),
(145, 'Guangxi', 'Guangxi', 'CN'),
(146, 'Shanghai', 'Shanghai', 'CN'),
(147, 'Tianjin', 'Tianjin', 'CN'),
(148, 'Hongkong', 'Hongkong', 'CN'),
(149, 'Macau', 'Macau', 'CN'),
(150, 'Taiwan', 'Taiwan', 'CN'),
(151, 'Jiangxi', 'Jiangxi', 'CN'),
(152, 'Guangdong', 'Guangdong', 'CN'),
(153, 'Avon', 'Avon', 'GB'),
(154, 'Bedfordshire', 'Bedfordshire', 'GB'),
(155, 'Berkshire', 'Berkshire', 'GB'),
(156, 'Borders', 'Borders', 'GB'),
(157, 'Bristol', 'Bristol', 'GB'),
(158, 'Buckinghamshire', 'Buckinghamshire', 'GB'),
(159, 'Cambridgeshire', 'Cambridgeshire', 'GB'),
(160, 'Channel Islands', 'Channel Islands', 'GB'),
(161, 'Cheshire', 'Cheshire', 'GB'),
(162, 'Cleveland', 'Cleveland', 'GB'),
(163, 'Cornwall', 'Cornwall', 'GB'),
(164, 'Cumbria', 'Cumbria', 'GB'),
(165, 'Derbyshire', 'Derbyshire', 'GB'),
(166, 'Devon', 'Devon', 'GB'),
(167, 'Dorset', 'Dorset', 'GB'),
(168, 'Durham', 'Durham', 'GB'),
(169, 'East Riding of Yorkshire', 'East Riding of Yorkshire', 'GB'),
(170, 'East Sussex', 'East Sussex', 'GB'),
(171, 'Essex', 'Essex', 'GB'),
(172, 'Gloucestershire', 'Gloucestershire', 'GB'),
(173, 'Greater Manchester', 'Greater Manchester', 'GB'),
(174, 'Hampshire', 'Hampshire', 'GB'),
(175, 'Herefordshire', 'Herefordshire', 'GB'),
(176, 'Hertfordshire', 'Hertfordshire', 'GB'),
(177, 'Humberside', 'Humberside', 'GB'),
(178, 'Isle of Man', 'Isle of Man', 'GB'),
(179, 'Isle of Wight', 'Isle of Wight', 'GB'),
(180, 'Isles of Scilly', 'Isles of Scilly', 'GB'),
(181, 'Kent', 'Kent', 'GB'),
(182, 'Lancashire', 'Lancashire', 'GB'),
(183, 'Leicestershire', 'Leicestershire', 'GB'),
(184, 'Lincolnshire', 'Lincolnshire', 'GB'),
(185, 'London', 'London', 'GB'),
(186, 'Merseyside', 'Merseyside', 'GB'),
(187, 'Middlesex', 'Middlesex', 'GB'),
(188, 'Norfolk', 'Norfolk', 'GB'),
(189, 'North Yorkshire', 'North Yorkshire', 'GB'),
(190, 'Northamptonshire', 'Northamptonshire', 'GB'),
(191, 'Northumberland', 'Northumberland', 'GB'),
(192, 'Nottinghamshire', 'Nottinghamshire', 'GB'),
(193, 'Oxfordshire', 'Oxfordshire', 'GB'),
(194, 'Rutland', 'Rutland', 'GB'),
(195, 'Shropshire', 'Shropshire', 'GB'),
(196, 'Somerset', 'Somerset', 'GB'),
(197, 'South Yorkshire', 'South Yorkshire', 'GB'),
(198, 'Staffordshire', 'Staffordshire', 'GB'),
(199, 'Suffolk', 'Suffolk', 'GB'),
(200, 'Surrey', 'Surrey', 'GB'),
(201, 'Tyne and Wear', 'Tyne and Wear', 'GB'),
(202, 'Warwickshire', 'Warwickshire', 'GB'),
(203, 'West Midlands', 'West Midlands', 'GB'),
(204, 'West Sussex', 'West Sussex', 'GB'),
(205, 'West Yorkshire', 'West Yorkshire', 'GB'),
(206, 'Wiltshire', 'Wiltshire', 'GB'),
(207, 'Worcestershire', 'Worcestershire', 'GB'),
(208, 'Antrim', 'Antrim', 'GB'),
(209, 'Down', 'Down', 'GB'),
(210, 'Fermanagh', 'Fermanagh', 'GB'),
(211, 'Londonderry', 'Londonderry', 'GB'),
(212, 'Tyrone', 'Tyrone', 'GB'),
(213, 'Aberdeen City', 'Aberdeen City', 'GB'),
(214, 'Aberdeenshire', 'Aberdeenshire', 'GB'),
(215, 'Angus', 'Angus', 'GB'),
(216, 'Argyll and Bute', 'Argyll and Bute', 'GB'),
(217, 'Armagh', 'Armagh', 'GB'),
(218, 'Carmarthenshire', 'Carmarthenshire', 'GB'),
(219, 'Clackmannan', 'Clackmannan', 'GB'),
(220, 'Dumfries and Galloway', 'Dumfries and Galloway', 'GB'),
(221, 'East Ayrshire', 'East Ayrshire', 'GB'),
(222, 'East Dunbartonshire', 'East Dunbartonshire', 'GB'),
(223, 'East Lothian', 'East Lothian', 'GB'),
(224, 'East Renfrewshire', 'East Renfrewshire', 'GB'),
(225, 'Edinburgh City', 'Edinburgh City', 'GB'),
(226, 'Falkirk', 'Falkirk', 'GB'),
(227, 'Fife', 'Fife', 'GB'),
(228, 'Glasgow', 'Glasgow', 'GB'),
(229, 'Highland', 'Highland', 'GB'),
(230, 'Inverclyde', 'Inverclyde', 'GB'),
(231, 'Midlothian', 'Midlothian', 'GB'),
(232, 'Moray', 'Moray', 'GB'),
(233, 'North Ayrshire', 'North Ayrshire', 'GB'),
(234, 'North Lanarkshire', 'North Lanarkshire', 'GB'),
(235, 'Orkney', 'Orkney', 'GB'),
(236, 'Perthshire and Kinross', 'Perthshire and Kinross', 'GB'),
(237, 'Renfrewshire', 'Renfrewshire', 'GB'),
(238, 'Roxburghshire', 'Roxburghshire', 'GB'),
(239, 'Shetland', 'Shetland', 'GB'),
(240, 'South Ayrshire', 'South Ayrshire', 'GB'),
(241, 'South Lanarkshire', 'South Lanarkshire', 'GB'),
(242, 'Stirling', 'Stirling', 'GB'),
(243, 'West Dunbartonshire', 'West Dunbartonshire', 'GB'),
(244, 'West Lothian', 'West Lothian', 'GB'),
(245, 'Western Isles', 'Western Isles', 'GB'),
(246, 'Blaenau Gwent', 'Blaenau Gwent', 'GB'),
(247, 'Bridgend', 'Bridgend', 'GB'),
(248, 'Caerphilly', 'Caerphilly', 'GB'),
(249, 'Cardiff', 'Cardiff', 'GB'),
(250, 'Ceredigion', 'Ceredigion', 'GB'),
(251, 'Conwy', 'Conwy', 'GB'),
(252, 'Denbighshire', 'Denbighshire', 'GB'),
(253, 'Flintshire', 'Flintshire', 'GB'),
(254, 'Gwynedd', 'Gwynedd', 'GB'),
(255, 'Isle of Anglesey', 'Isle of Anglesey', 'GB'),
(256, 'Merthyr Tydfil', 'Merthyr Tydfil', 'GB'),
(257, 'Monmouthshire', 'Monmouthshire', 'GB'),
(258, 'Neath Port Talbot', 'Neath Port Talbot', 'GB'),
(259, 'Newport', 'Newport', 'GB'),
(260, 'Pembrokeshire', 'Pembrokeshire', 'GB'),
(261, 'Powys', 'Powys', 'GB'),
(262, 'Rhondda Cynon Taff', 'Rhondda Cynon Taff', 'GB'),
(263, 'Swansea', 'Swansea', 'GB'),
(264, 'The Vale of Glamorgan', 'The Vale of Glamorgan', 'GB'),
(265, 'Torfaen', 'Torfaen', 'GB'),
(266, 'Wrexham', 'Wrexham', 'GB'),
(267, 'Baden-W??rttemberg', 'BW', 'DE'),
(268, 'Bayern', 'BY', 'DE'),
(269, 'Berlin', 'BE', 'DE'),
(270, 'Brandenburg', 'BB', 'DE'),
(271, 'Bremen', 'HB', 'DE'),
(272, 'Hamburg', 'HH', 'DE'),
(273, 'Hessen', 'HE', 'DE'),
(274, 'Mecklenburg-Vorpommern', 'MV', 'DE'),
(275, 'Niedersachsen', 'NI', 'DE'),
(276, 'Nordrhein-Westfalen', 'NW', 'DE'),
(277, 'Rheinland-Pfalz', 'RP', 'DE'),
(278, 'Saarland', 'SL', 'DE'),
(279, 'Sachsen', 'SN', 'DE'),
(280, 'Sachsen-Anhalt', 'ST', 'DE'),
(281, 'Schleswig-Holstein', 'SH', 'DE'),
(282, 'Th??ringen', 'TH', 'DE'),
(283, 'Drenthe', 'DR', 'NL'),
(284, 'Flevoland', 'FL', 'NL'),
(285, 'Friesland', 'FR', 'NL'),
(286, 'Gelderland', 'GD', 'NL'),
(287, 'Groningen', 'GR', 'NL'),
(288, 'Limburg', 'LB', 'NL'),
(289, 'Noord-Brabant', 'NB', 'NL'),
(290, 'Noord-Holland', 'NH', 'NL'),
(291, 'Overijssel', 'OV', 'NL'),
(292, 'Utrecht', 'UT', 'NL'),
(293, 'Zuid-Holland', 'ZH', 'NL'),
(294, 'Zeeland', 'ZL', 'NL'),
(295, 'Antwerpen', 'ANT', 'BE'),
(296, 'Henegouwen', 'HAI', 'BE'),
(297, 'Luik', 'LIE', 'BE'),
(298, 'Limburg', 'LIM', 'BE'),
(299, 'Luxemburg', 'LUX', 'BE'),
(300, 'Namen', 'NAM', 'BE'),
(301, 'Oost-Vlaanderen', 'OVL', 'BE'),
(302, 'Vlaams-Brabant', 'VBR', 'BE'),
(303, 'Waals-Brabant', 'WBR', 'BE'),
(304, 'West-Vlaanderen', 'WVL', 'BE'),
(305, 'Hovedstaden', 'Hovedstaden', 'DK'),
(306, 'Midtjylland', 'Midtjylland', 'DK'),
(307, 'Nordjylland', 'Nordjylland', 'DK'),
(308, 'Sj??lland', 'Sj??lland', 'DK'),
(309, 'Syddanmark', 'Syddanmark', 'DK'),
(310, 'Adana', 'Adana', 'TR'),
(311, 'Ad??yaman', 'Ad??yaman', 'TR'),
(312, 'Afyonkarahisar', 'Afyonkarahisar', 'TR'),
(313, 'A??r??', 'A??r??', 'TR'),
(314, 'Amasya', 'Amasya', 'TR'),
(315, 'Ankara', 'Ankara', 'TR'),
(316, 'Antalya', 'Antalya', 'TR'),
(317, 'Artvin', 'Artvin', 'TR'),
(318, 'Ayd??n', 'Ayd??n', 'TR'),
(319, 'Bal??kesir', 'Bal??kesir', 'TR'),
(320, 'Bilecik', 'Bilecik', 'TR'),
(321, 'Bing??l', 'Bing??l', 'TR'),
(322, 'Bitlis', 'Bitlis', 'TR'),
(323, 'Bolu', 'Bolu', 'TR'),
(324, 'Burdur', 'Burdur', 'TR'),
(325, 'Bursa', 'Bursa', 'TR'),
(326, '??anakkale', '??anakkale', 'TR'),
(327, '??ank??r??', '??ank??r??', 'TR'),
(328, '??orum', '??orum', 'TR'),
(329, 'Denizli', 'Denizli', 'TR'),
(330, 'Diyarbak??r', 'Diyarbak??r', 'TR'),
(331, 'Edirne', 'Edirne', 'TR'),
(332, 'Elaz????', 'Elaz????', 'TR'),
(333, 'Erzincan', 'Erzincan', 'TR'),
(334, 'Erzurum', 'Erzurum', 'TR'),
(335, 'Eski??ehir', 'Eski??ehir', 'TR'),
(336, 'Gaziantep', 'Gaziantep', 'TR'),
(337, 'Giresun', 'Giresun', 'TR'),
(338, 'G??m????hane', 'G??m????hane', 'TR'),
(339, 'Hakk??ri', 'Hakk??ri', 'TR'),
(340, 'Hatay', 'Hatay', 'TR'),
(341, 'Isparta', 'Isparta', 'TR'),
(342, 'Mersin', 'Mersin', 'TR'),
(343, 'Istanbul', 'Istanbul', 'TR'),
(344, '??zmir', '??zmir', 'TR'),
(345, 'Kars', 'Kars', 'TR'),
(346, 'Kastamonu', 'Kastamonu', 'TR'),
(347, 'Kayseri', 'Kayseri', 'TR'),
(348, 'K??rklareli', 'K??rklareli', 'TR'),
(349, 'K??r??ehir', 'K??r??ehir', 'TR'),
(350, 'Kocaeli', 'Kocaeli', 'TR'),
(351, 'Konya', 'Konya', 'TR'),
(352, 'K??tahya', 'K??tahya', 'TR'),
(353, 'Malatya', 'Malatya', 'TR'),
(354, 'Manisa', 'Manisa', 'TR'),
(355, 'Kahramanmara??', 'Kahramanmara??', 'TR'),
(356, 'Mardin', 'Mardin', 'TR'),
(357, 'Mu??la', 'Mu??la', 'TR'),
(358, 'Mu??', 'Mu??', 'TR'),
(359, 'Nev??ehir', 'Nev??ehir', 'TR'),
(360, 'Ni??de', 'Ni??de', 'TR'),
(361, 'Ordu', 'Ordu', 'TR'),
(362, 'Rize', 'Rize', 'TR'),
(363, 'Sakarya', 'Sakarya', 'TR'),
(364, 'Samsun', 'Samsun', 'TR'),
(365, 'Siirt', 'Siirt', 'TR'),
(366, 'Sinop', 'Sinop', 'TR'),
(367, 'Sivas', 'Sivas', 'TR'),
(368, 'Tekirda??', 'Tekirda??', 'TR'),
(369, 'Tokat', 'Tokat', 'TR'),
(370, 'Trabzon', 'Trabzon', 'TR'),
(371, 'Tunceli', 'Tunceli', 'TR'),
(372, '??anl??urfa', '??anl??urfa', 'TR'),
(373, 'U??ak', 'U??ak', 'TR'),
(374, 'Van', 'Van', 'TR'),
(375, 'Yozgat', 'Yozgat', 'TR'),
(376, 'Zonguldak', 'Zonguldak', 'TR'),
(377, 'Aksaray', 'Aksaray', 'TR'),
(378, 'Bayburt', 'Bayburt', 'TR'),
(379, 'Karaman', 'Karaman', 'TR'),
(380, 'K??r??kkale', 'K??r??kkale', 'TR'),
(381, 'Batman', 'Batman', 'TR'),
(382, '????rnak', '????rnak', 'TR'),
(383, 'Bart??n', 'Bart??n', 'TR'),
(384, 'Ardahan', 'Ardahan', 'TR'),
(385, 'I??d??r', 'I??d??r', 'TR'),
(386, 'Yalova', 'Yalova', 'TR'),
(387, 'Karab??k', 'Karab??k', 'TR'),
(388, 'Kilis', 'Kilis', 'TR'),
(389, 'Osmaniye', 'Osmaniye', 'TR'),
(390, 'D??zce', 'D??zce', 'TR'),
(391, 'Special Region of Aceh', 'ID-AC', 'ID'),
(392, 'Bali', 'ID-BA', 'ID'),
(393, 'Bangka???Belitung Islands', 'ID-BB', 'ID'),
(394, 'Banten', 'ID-BT', 'ID'),
(395, 'Bengkulu', 'ID-BE', 'ID'),
(396, 'Central Java', 'ID-JT', 'ID'),
(397, 'Central Kalimantan', 'ID-KT', 'ID'),
(398, 'Central Sulawesi', 'ID-ST', 'ID'),
(399, 'East Java', 'ID-JI', 'ID'),
(400, 'East Kalimantan', 'ID-KI', 'ID'),
(401, 'East Nusa Tenggara', 'ID-NT', 'ID'),
(402, 'Gorontalo', 'ID-GO', 'ID'),
(403, 'Jakarta Special Capital Region', 'ID-JK', 'ID'),
(404, 'Jambi', 'ID-JA', 'ID'),
(405, 'Lampung', 'ID-LA', 'ID'),
(406, 'Maluku', 'ID-MA', 'ID'),
(407, 'North Kalimantan', 'ID-KU', 'ID'),
(408, 'North Maluku', 'ID-MU', 'ID'),
(409, 'North Sulawesi', 'ID-SA', 'ID'),
(410, 'North Sumatra', 'ID-SU', 'ID'),
(411, 'Special Region of Papua', 'ID-PA', 'ID'),
(412, 'Riau', 'ID-RI', 'ID'),
(413, 'Riau Islands', 'ID-KR', 'ID'),
(414, 'Southeast Sulawesi', 'ID-SG', 'ID'),
(415, 'South Kalimantan', 'ID-KS', 'ID'),
(416, 'South Sulawesi', 'ID-SN', 'ID'),
(417, 'South Sumatra', 'ID-SS', 'ID'),
(418, 'West Java', 'ID-JB', 'ID'),
(419, 'West Kalimantan', 'ID-KB', 'ID'),
(420, 'West Nusa Tenggara', 'ID-NB', 'ID'),
(421, 'Special Region of West Papua', 'ID-PB', 'ID'),
(422, 'West Sulawesi', 'ID-SR', 'ID'),
(423, 'West Sumatra', 'ID-SB', 'ID'),
(424, 'Special Region of Yogyakarta', 'ID-YO', 'ID'),
(425, 'Irbid', 'Irbid', 'JO'),
(426, 'Ajloun', 'Ajloun', 'JO'),
(427, 'Jerash', 'Jerash', 'JO'),
(428, 'Mafraq', 'Mafraq', 'JO'),
(429, 'Balqa', 'Balqa', 'JO'),
(430, 'Amman', 'Amman', 'JO'),
(431, 'Zarqa', 'Zarqa', 'JO'),
(432, 'Madaba', 'Madaba', 'JO'),
(433, 'Karak', 'Karak', 'JO'),
(434, 'Tafilah', 'Tafilah', 'JO'),
(435, 'Ma\'an', 'Ma\'an', 'JO'),
(436, 'Aqaba', 'Aqaba', 'JO'),
(437, 'Andhra Pradesh', 'AP', 'IN'),
(438, 'Arunachal Pradesh', 'AR', 'IN'),
(439, 'Assam', 'AS', 'IN'),
(440, 'Bihar', 'BR', 'IN'),
(441, 'Chhattisgarh', 'CT', 'IN'),
(442, 'Goa', 'GA', 'IN'),
(443, 'Gujarat', 'GJ', 'IN'),
(444, 'Haryana', 'HR', 'IN'),
(445, 'Himachal Pradesh', 'HP', 'IN'),
(446, 'Jammu and Kashmir', 'JK', 'IN'),
(447, 'Jharkhand', 'JH', 'IN'),
(448, 'Karnataka', 'KA', 'IN'),
(449, 'Kerala', 'KL', 'IN'),
(450, 'Madhya Pradesh', 'MP', 'IN'),
(451, 'Maharashtra', 'MH', 'IN'),
(452, 'Manipur', 'MN', 'IN'),
(453, 'Meghalaya', 'ML', 'IN'),
(454, 'Mizoram', 'MZ', 'IN'),
(455, 'Nagaland', 'NL', 'IN'),
(456, 'Odisha', 'OR', 'IN'),
(457, 'Punjab', 'PB', 'IN'),
(458, 'Rajasthan', 'RJ', 'IN'),
(459, 'Sikkim', 'SK', 'IN'),
(460, 'Tamil Nadu', 'TN', 'IN'),
(461, 'Telangana', 'TG', 'IN'),
(462, 'Tripura', 'TR', 'IN'),
(463, 'Uttar Pradesh', 'UP', 'IN'),
(464, 'Uttarakhand', 'UT', 'IN'),
(465, 'West Bengal', 'WB', 'IN'),
(466, 'Andaman and Nicobar Islands', 'AN', 'IN'),
(467, 'Chandigarh', 'CH', 'IN'),
(468, 'Dadra and Nagar Haveli', 'DN', 'IN'),
(469, 'Daman and Diu', 'DD', 'IN'),
(470, 'Lakshadweep', 'LD', 'IN'),
(471, 'National Capital Territory of Delhi', 'DL', 'IN'),
(472, 'Puducherry', 'PY', 'IN'),
(473, 'Phnom Penh Municipality', 'Phnom Penh Municipality', 'KH'),
(474, 'Banteay Meanchey', 'Banteay Meanchey', 'KH'),
(475, 'Battambang', 'Battambang', 'KH'),
(476, 'Kampong Cham', 'Kampong Cham', 'KH'),
(477, 'Kampong Chhnang', 'Kampong Chhnang', 'KH'),
(478, 'Kampong Speu', 'Kampong Speu', 'KH'),
(479, 'Kampong Thom', 'Kampong Thom', 'KH'),
(480, 'Kampot', 'Kampot', 'KH'),
(481, 'Kandal', 'Kandal', 'KH'),
(482, 'Koh Kong', 'Koh Kong', 'KH'),
(483, 'Kep', 'Kep', 'KH'),
(484, 'Krati??', 'Krati??', 'KH'),
(485, 'Mondulkiri', 'Mondulkiri', 'KH'),
(486, 'Oddar Meanchey', 'Oddar Meanchey', 'KH'),
(487, 'Pailin', 'Pailin', 'KH'),
(488, 'Preah Sihanouk', 'Preah Sihanouk', 'KH'),
(489, 'Preah Vihear', 'Preah Vihear', 'KH'),
(490, 'Pursat', 'Pursat', 'KH'),
(491, 'Prey Veng', 'Prey Veng', 'KH'),
(492, 'Ratanakiri', 'Ratanakiri', 'KH'),
(493, 'Siem Reap', 'Siem Reap', 'KH'),
(494, 'Stung Treng', 'Stung Treng', 'KH'),
(495, 'Svay Rieng', 'Svay Rieng', 'KH'),
(496, 'Tak??o', 'Tak??o', 'KH'),
(497, 'Tbong Khmum', 'Tbong Khmum', 'KH'),
(498, 'Addis Ababa', 'Addis Ababa', 'ET'),
(499, 'Afar Region', 'Afar Region', 'ET'),
(500, 'Amhara Region', 'Amhara Region', 'ET'),
(501, 'Benishangul-Gumuz', 'Benishangul-Gumuz', 'ET'),
(502, 'Dire Dawa', 'Dire Dawa', 'ET'),
(503, 'Gambela', 'Gambela', 'ET'),
(504, 'Harari', 'Harari', 'ET'),
(505, 'Oromia', 'Oromia', 'ET'),
(506, 'Somali', 'Somali', 'ET'),
(507, 'Tigray Region', 'Tigray Region', 'ET'),
(508, 'Chachapoyas', 'Chachapoyas', 'PE'),
(509, 'Bagua', 'Bagua', 'PE'),
(510, 'Bongar??', 'Bongar??', 'PE'),
(511, 'Condorcanqui', 'Condorcanqui', 'PE'),
(512, 'Luya', 'Luya', 'PE'),
(513, 'Rodr??guez de Mendoza', 'Rodr??guez de Mendoza', 'PE'),
(514, 'Utcubamba', 'Utcubamba', 'PE'),
(515, 'Huaraz', 'Huaraz', 'PE'),
(516, 'Aija', 'Aija', 'PE'),
(517, 'Antonio Raymondi', 'Antonio Raymondi', 'PE'),
(518, 'Asunci??n', 'Asunci??n', 'PE'),
(519, 'Bolognesi', 'Bolognesi', 'PE'),
(520, 'Carhuaz', 'Carhuaz', 'PE'),
(521, 'Carlos Ferm??n Fitzcarrald', 'Carlos Ferm??n Fitzcarrald', 'PE'),
(522, 'Casma', 'Casma', 'PE'),
(523, 'Corongo', 'Corongo', 'PE'),
(524, 'Huari', 'Huari', 'PE'),
(525, 'Huarmey', 'Huarmey', 'PE'),
(526, 'Huaylas', 'Huaylas', 'PE'),
(527, 'Mariscal Luzuriaga', 'Mariscal Luzuriaga', 'PE'),
(528, 'Ocros', 'Ocros', 'PE'),
(529, 'Pallasca', 'Pallasca', 'PE'),
(530, 'Pomabamba', 'Pomabamba', 'PE'),
(531, 'Recuay', 'Recuay', 'PE'),
(532, 'Santa', 'Santa', 'PE'),
(533, 'Sihuas', 'Sihuas', 'PE'),
(534, 'Yungay', 'Yungay', 'PE'),
(535, 'Abancay', 'Abancay', 'PE'),
(536, 'Andahuaylas', 'Andahuaylas', 'PE'),
(537, 'Antabamba', 'Antabamba', 'PE'),
(538, 'Aymaraes', 'Aymaraes', 'PE'),
(539, 'Cotabambas', 'Cotabambas', 'PE'),
(540, 'Chincheros', 'Chincheros', 'PE'),
(541, 'Grau', 'Grau', 'PE'),
(542, 'Arequipa', 'Arequipa', 'PE'),
(543, 'Caman??', 'Caman??', 'PE'),
(544, 'Caravel??', 'Caravel??', 'PE'),
(545, 'Castilla', 'Castilla', 'PE'),
(546, 'Caylloma', 'Caylloma', 'PE'),
(547, 'Condesuyos', 'Condesuyos', 'PE'),
(548, 'Southern Nations, Nationalities, and Peoples\' Region', 'Southern Nations, Nationalities, and Peoples\' Region', 'ET'),
(549, 'Islay', 'Islay', 'PE'),
(550, 'La Uni??n', 'La Uni??n', 'PE'),
(551, 'Huamanga', 'Huamanga', 'PE'),
(552, 'Cangallo', 'Cangallo', 'PE'),
(553, 'Huanca Sancos', 'Huanca Sancos', 'PE'),
(554, 'Huanta', 'Huanta', 'PE'),
(555, 'La Mar', 'La Mar', 'PE'),
(556, 'Lucanas', 'Lucanas', 'PE'),
(557, 'Parinacochas', 'Parinacochas', 'PE'),
(558, 'P??ucar del Sara Sara', 'P??ucar del Sara Sara', 'PE'),
(559, 'Sucre', 'Sucre', 'PE'),
(560, 'V??ctor Fajardo', 'V??ctor Fajardo', 'PE'),
(561, 'Vilcas Huam??n', 'Vilcas Huam??n', 'PE'),
(562, 'Cajamarca', 'Cajamarca', 'PE'),
(563, 'Cajabamba', 'Cajabamba', 'PE'),
(564, 'Celend??n', 'Celend??n', 'PE'),
(565, 'Chota', 'Chota', 'PE'),
(566, 'Contumaz??', 'Contumaz??', 'PE'),
(567, 'Cutervo', 'Cutervo', 'PE'),
(568, 'Hualgayoc', 'Hualgayoc', 'PE'),
(569, 'Ja??n', 'Ja??n', 'PE'),
(570, 'San Ignacio', 'San Ignacio', 'PE'),
(571, 'San Marcos', 'San Marcos', 'PE'),
(572, 'San Miguel', 'San Miguel', 'PE'),
(573, 'San Pablo', 'San Pablo', 'PE'),
(574, 'Santa Cruz', 'Santa Cruz', 'PE'),
(575, 'Callao', 'Callao', 'PE'),
(576, 'Cusco', 'Cusco', 'PE'),
(577, 'Acomayo', 'Acomayo', 'PE'),
(578, 'Anta', 'Anta', 'PE'),
(579, 'Calca', 'Calca', 'PE'),
(580, 'Canas', 'Canas', 'PE'),
(581, 'Canchis', 'Canchis', 'PE'),
(582, 'Chumbivilcas', 'Chumbivilcas', 'PE'),
(583, 'Espinar', 'Espinar', 'PE'),
(584, 'La Convenci??n', 'La Convenci??n', 'PE'),
(585, 'Paruro', 'Paruro', 'PE'),
(586, 'Paucartambo', 'Paucartambo', 'PE'),
(587, 'Quispicanchi', 'Quispicanchi', 'PE'),
(588, 'Urubamba', 'Urubamba', 'PE'),
(589, 'Huancavelica', 'Huancavelica', 'PE'),
(590, 'Acobamba', 'Acobamba', 'PE'),
(591, 'Angaraes', 'Angaraes', 'PE'),
(592, 'Castrovirreyna', 'Castrovirreyna', 'PE'),
(593, 'Churcampa', 'Churcampa', 'PE'),
(594, 'Huaytar??', 'Huaytar??', 'PE'),
(595, 'Tayacaja', 'Tayacaja', 'PE'),
(596, 'Hu??nuco', 'Hu??nuco', 'PE'),
(597, 'Ambo', 'Ambo', 'PE'),
(598, 'Dos de Mayo', 'Dos de Mayo', 'PE'),
(599, 'Huacaybamba', 'Huacaybamba', 'PE'),
(600, 'Huamal??es', 'Huamal??es', 'PE'),
(601, 'Leoncio Prado', 'Leoncio Prado', 'PE'),
(602, 'Mara????n', 'Mara????n', 'PE'),
(603, 'Pachitea', 'Pachitea', 'PE'),
(604, 'Puerto Inca', 'Puerto Inca', 'PE'),
(605, 'Lauricocha', 'Lauricocha', 'PE'),
(606, 'Yarowilca', 'Yarowilca', 'PE'),
(607, 'Ica', 'Ica', 'PE'),
(608, 'Chincha', 'Chincha', 'PE'),
(609, 'Nazca', 'Nazca', 'PE'),
(610, 'Palpa', 'Palpa', 'PE'),
(611, 'Pisco', 'Pisco', 'PE'),
(612, 'Huancayo', 'Huancayo', 'PE'),
(613, 'Concepci??n', 'Concepci??n', 'PE'),
(614, 'Chanchamayo', 'Chanchamayo', 'PE'),
(615, 'Jauja', 'Jauja', 'PE'),
(616, 'Jun??n', 'Jun??n', 'PE'),
(617, 'Satipo', 'Satipo', 'PE'),
(618, 'Tarma', 'Tarma', 'PE'),
(619, 'Yauli', 'Yauli', 'PE'),
(620, 'Chupaca', 'Chupaca', 'PE'),
(621, 'Trujillo', 'Trujillo', 'PE'),
(622, 'Ascope', 'Ascope', 'PE'),
(623, 'Bol??var', 'Bol??var', 'PE'),
(624, 'Chep??n', 'Chep??n', 'PE'),
(625, 'Julc??n', 'Julc??n', 'PE'),
(626, 'Otuzco', 'Otuzco', 'PE'),
(627, 'Pacasmayo', 'Pacasmayo', 'PE'),
(628, 'Pataz', 'Pataz', 'PE'),
(629, 'S??nchez Carri??n', 'S??nchez Carri??n', 'PE'),
(630, 'Santiago de Chuco', 'Santiago de Chuco', 'PE'),
(631, 'Gran Chim??', 'Gran Chim??', 'PE'),
(632, 'Vir??', 'Vir??', 'PE'),
(633, 'Chiclayo', 'Chiclayo', 'PE'),
(634, 'Ferre??afe', 'Ferre??afe', 'PE'),
(635, 'Lambayeque', 'Lambayeque', 'PE'),
(636, 'Lima', 'Lima', 'PE'),
(637, 'Huaura', 'Huaura', 'PE'),
(638, 'Barranca', 'Barranca', 'PE'),
(639, 'Cajatambo', 'Cajatambo', 'PE'),
(640, 'Canta', 'Canta', 'PE'),
(641, 'Ca??ete', 'Ca??ete', 'PE'),
(642, 'Huaral', 'Huaral', 'PE'),
(643, 'Huarochir??', 'Huarochir??', 'PE'),
(644, 'Oy??n', 'Oy??n', 'PE'),
(645, 'Yauyos', 'Yauyos', 'PE'),
(646, 'Maynas', 'Maynas', 'PE'),
(647, 'Alto Amazonas', 'Alto Amazonas', 'PE'),
(648, 'Loreto', 'Loreto', 'PE'),
(649, 'Mariscal Ram??n Castilla', 'Mariscal Ram??n Castilla', 'PE'),
(650, 'Putumayo', 'Putumayo', 'PE'),
(651, 'Requena', 'Requena', 'PE'),
(652, 'Ucayali', 'Ucayali', 'PE'),
(653, 'Datem del Mara????n', 'Datem del Mara????n', 'PE'),
(654, 'Tambopata', 'Tambopata', 'PE'),
(655, 'Man??', 'Man??', 'PE'),
(656, 'Tahuamanu', 'Tahuamanu', 'PE'),
(657, 'Mariscal Nieto', 'Mariscal Nieto', 'PE'),
(658, 'General S??nchez Cerro', 'General S??nchez Cerro', 'PE'),
(659, 'Ilo', 'Ilo', 'PE'),
(660, 'Pasco', 'Pasco', 'PE'),
(661, 'Daniel Alc??des Carri??n', 'Daniel Alc??des Carri??n', 'PE'),
(662, 'Oxapampa', 'Oxapampa', 'PE'),
(663, 'Piura', 'Piura', 'PE'),
(664, 'Ayabaca', 'Ayabaca', 'PE'),
(665, 'Huancabamba', 'Huancabamba', 'PE'),
(666, 'Morrop??n', 'Morrop??n', 'PE'),
(667, 'Paita', 'Paita', 'PE'),
(668, 'Sullana', 'Sullana', 'PE'),
(669, 'Talara', 'Talara', 'PE'),
(670, 'Sechura', 'Sechura', 'PE'),
(671, 'Puno', 'Puno', 'PE'),
(672, 'Az??ngaro', 'Az??ngaro', 'PE'),
(673, 'Carabaya', 'Carabaya', 'PE'),
(674, 'Chucuito', 'Chucuito', 'PE'),
(675, 'El Collao', 'El Collao', 'PE'),
(676, 'Huancan??', 'Huancan??', 'PE'),
(677, 'Lampa', 'Lampa', 'PE'),
(678, 'Melgar', 'Melgar', 'PE'),
(679, 'Moho', 'Moho', 'PE'),
(680, 'San Antonio de Putina', 'San Antonio de Putina', 'PE'),
(681, 'San Rom??n', 'San Rom??n', 'PE'),
(682, 'Sandia', 'Sandia', 'PE'),
(683, 'Yunguyo', 'Yunguyo', 'PE'),
(684, 'Moyobamba', 'Moyobamba', 'PE'),
(685, 'Bellavista', 'Bellavista', 'PE'),
(686, 'El Dorado', 'El Dorado', 'PE'),
(687, 'Huallaga', 'Huallaga', 'PE'),
(688, 'Lamas', 'Lamas', 'PE'),
(689, 'Mariscal C??ceres', 'Mariscal C??ceres', 'PE'),
(690, 'Picota', 'Picota', 'PE'),
(691, 'Rioja', 'Rioja', 'PE'),
(692, 'San Mart??n', 'San Mart??n', 'PE'),
(693, 'Tocache', 'Tocache', 'PE'),
(694, 'Tacna', 'Tacna', 'PE'),
(695, 'Candarave', 'Candarave', 'PE'),
(696, 'Jorge Basadre', 'Jorge Basadre', 'PE'),
(697, 'Tarata', 'Tarata', 'PE'),
(698, 'Tumbes', 'Tumbes', 'PE'),
(699, 'Contralmirante Villar', 'Contralmirante Villar', 'PE'),
(700, 'Zarumilla', 'Zarumilla', 'PE'),
(701, 'Coronel Portillo', 'Coronel Portillo', 'PE'),
(702, 'Atalaya', 'Atalaya', 'PE'),
(703, 'Padre Abad', 'Padre Abad', 'PE'),
(704, 'Pur??s', 'Pur??s', 'PE'),
(705, 'Camag??ey', 'Camag??ey', 'CU'),
(706, 'Ciego de ??vila', 'Ciego de ??vila', 'CU'),
(707, 'Cienfuegos', 'Cienfuegos', 'CU'),
(708, 'Havana', 'Havana', 'CU'),
(709, 'Bayamo', 'Bayamo', 'CU'),
(710, 'Guant??namo', 'Guant??namo', 'CU'),
(711, 'Holgu??n', 'Holgu??n', 'CU'),
(712, 'Nueva Gerona', 'Nueva Gerona', 'CU'),
(713, 'Artemisa', 'Artemisa', 'CU'),
(714, 'Las Tunas', 'Las Tunas', 'CU'),
(715, 'Matanzas', 'Matanzas', 'CU'),
(716, 'San Jos?? de las Lajas', 'San Jos?? de las Lajas', 'CU'),
(717, 'Pinar del R??o', 'Pinar del R??o', 'CU'),
(718, 'Sancti Sp??ritus', 'Sancti Sp??ritus', 'CU'),
(719, 'Santiago de Cuba', 'Santiago de Cuba', 'CU'),
(720, 'Santa Clara', 'Santa Clara', 'CU'),
(721, 'Ciudad Aut??noma de Buenos Aires', 'Ciudad Aut??noma de Buenos Aires', 'AR'),
(722, 'Buenos Aires', 'Buenos Aires', 'AR'),
(723, 'Catamarca', 'Catamarca', 'AR'),
(724, 'Chaco', 'Chaco', 'AR'),
(725, 'Chubut', 'Chubut', 'AR'),
(726, 'C??rdoba', 'C??rdoba', 'AR'),
(727, 'Corrientes', 'Corrientes', 'AR'),
(728, 'Entre R??os', 'Entre R??os', 'AR'),
(729, 'Formosa', 'Formosa', 'AR'),
(730, 'Jujuy', 'Jujuy', 'AR'),
(731, 'La Pampa', 'La Pampa', 'AR'),
(732, 'La Rioja', 'La Rioja', 'AR'),
(733, 'Mendoza', 'Mendoza', 'AR'),
(734, 'Misiones', 'Misiones', 'AR'),
(735, 'Neuqu??n', 'Neuqu??n', 'AR'),
(736, 'R??o Negro', 'R??o Negro', 'AR'),
(737, 'Salta', 'Salta', 'AR'),
(738, 'San Juan', 'San Juan', 'AR'),
(739, 'San Luis', 'San Luis', 'AR'),
(740, 'Santa Cruz', 'Santa Cruz', 'AR'),
(741, 'Santa Fe', 'Santa Fe', 'AR'),
(742, 'Santiago del Estero', 'Santiago del Estero', 'AR'),
(743, 'Tierra del Fuego, Ant??rtida e Islas del Atl??ntico Sur', 'Tierra del Fuego, Ant??rtida e Islas del Atl??ntico Sur', 'AR'),
(744, 'Tucum??n', 'Tucum??n', 'AR'),
(745, 'Arica', 'Arica', 'CL'),
(746, 'Parinacota', 'Parinacota', 'CL'),
(747, 'Iquique', 'Iquique', 'CL'),
(748, 'Tamarugal', 'Tamarugal', 'CL'),
(749, 'Antofagasta', 'Antofagasta', 'CL'),
(750, 'El Loa', 'El Loa', 'CL'),
(751, 'Tocopilla', 'Tocopilla', 'CL'),
(752, 'Copiap??', 'Copiap??', 'CL'),
(753, 'Huasco', 'Huasco', 'CL'),
(754, 'Cha??aral', 'Cha??aral', 'CL'),
(755, 'Elqui', 'Elqui', 'CL'),
(756, 'Limar??', 'Limar??', 'CL'),
(757, 'Choapa', 'Choapa', 'CL'),
(758, 'Isla de Pascua', 'Isla de Pascua', 'CL'),
(759, 'Los Andes', 'Los Andes', 'CL'),
(760, 'Marga Marga', 'Marga Marga', 'CL'),
(761, 'Petorca', 'Petorca', 'CL'),
(762, 'Quillota', 'Quillota', 'CL'),
(763, 'San Antonio', 'San Antonio', 'CL'),
(764, 'San Felipe de Aconcagua', 'San Felipe de Aconcagua', 'CL'),
(765, 'Valpara??so', 'Valpara??so', 'CL'),
(766, 'Cachapoal', 'Cachapoal', 'CL'),
(767, 'Colchagua', 'Colchagua', 'CL'),
(768, 'Cardenal Caro', 'Cardenal Caro', 'CL'),
(769, 'Talca', 'Talca', 'CL'),
(770, 'Linares', 'Linares', 'CL'),
(771, 'Curic??', 'Curic??', 'CL'),
(772, 'Cauquenes', 'Cauquenes', 'CL'),
(773, 'Concepci??n', 'Concepci??n', 'CL'),
(774, '??uble', '??uble', 'CL'),
(775, 'Biob??o', 'Biob??o', 'CL'),
(776, 'Arauco', 'Arauco', 'CL'),
(777, 'Cautin', 'Cautin', 'CL'),
(778, 'Malleco', 'Malleco', 'CL'),
(779, 'Valdivia', 'Valdivia', 'CL'),
(780, 'Ranco', 'Ranco', 'CL'),
(781, 'Llanquihue', 'Llanquihue', 'CL'),
(782, 'Osorno', 'Osorno', 'CL'),
(783, 'Chiloe', 'Chiloe', 'CL'),
(784, 'Palena', 'Palena', 'CL'),
(785, 'Coihaique', 'Coihaique', 'CL'),
(786, 'Ais??n', 'Ais??n', 'CL'),
(787, 'General Carrera', 'General Carrera', 'CL'),
(788, 'Capitan Prat', 'Capitan Prat', 'CL'),
(789, 'Magallanes', 'Magallanes', 'CL'),
(790, 'Ultima Esperanza', 'Ultima Esperanza', 'CL'),
(791, 'Tierra del Fuego', 'Tierra del Fuego', 'CL'),
(792, 'Ant??rtica Chilena', 'Ant??rtica Chilena', 'CL'),
(793, 'Santiago', 'Santiago', 'CL'),
(794, 'Cordillera', 'Cordillera', 'CL'),
(795, 'Maipo', 'Maipo', 'CL'),
(796, 'Talagante', 'Talagante', 'CL'),
(797, 'Melipilla', 'Melipilla', 'CL'),
(798, 'Chacabuco', 'Chacabuco', 'CL'),
(799, 'Cercado', 'Cercado', 'BO'),
(800, 'It??nez', 'It??nez', 'BO'),
(801, 'Jos?? Ballivi??n', 'Jos?? Ballivi??n', 'BO'),
(802, 'Mamor??', 'Mamor??', 'BO'),
(803, 'Marb??n', 'Marb??n', 'BO'),
(804, 'Moxos', 'Moxos', 'BO'),
(805, 'Vaca D??ez', 'Vaca D??ez', 'BO'),
(806, 'Yacuma', 'Yacuma', 'BO'),
(807, 'Azurduy', 'Azurduy', 'BO'),
(808, 'Belisario Boeto', 'Belisario Boeto', 'BO'),
(809, 'Hernando Siles', 'Hernando Siles', 'BO'),
(810, 'Jaime Zud????ez', 'Jaime Zud????ez', 'BO'),
(811, 'Luis Calvo', 'Luis Calvo', 'BO'),
(812, 'Nor Cinti', 'Nor Cinti', 'BO'),
(813, 'Oropeza', 'Oropeza', 'BO'),
(814, 'Sud Cinti', 'Sud Cinti', 'BO'),
(815, 'Tomina', 'Tomina', 'BO'),
(816, 'Yampar??ez', 'Yampar??ez', 'BO'),
(817, 'Arani', 'Arani', 'BO'),
(818, 'Arque', 'Arque', 'BO'),
(819, 'Ayopaya', 'Ayopaya', 'BO'),
(820, 'Capinota', 'Capinota', 'BO'),
(821, 'Carrasco', 'Carrasco', 'BO'),
(822, 'Chapare', 'Chapare', 'BO'),
(823, 'Esteban Arce', 'Esteban Arce', 'BO'),
(824, 'Germ??n Jord??n', 'Germ??n Jord??n', 'BO'),
(825, 'Mizque', 'Mizque', 'BO'),
(826, 'Campero', 'Campero', 'BO'),
(827, 'Punata', 'Punata', 'BO'),
(828, 'Quillacollo', 'Quillacollo', 'BO'),
(829, 'Bol??var', 'Bol??var', 'BO'),
(830, 'Tapacar??', 'Tapacar??', 'BO'),
(831, 'Tiraque', 'Tiraque', 'BO'),
(832, 'Abel Iturralde', 'Abel Iturralde', 'BO'),
(833, 'Aroma', 'Aroma', 'BO'),
(834, 'Bautista Saavedra', 'Bautista Saavedra', 'BO'),
(835, 'Caranavi', 'Caranavi', 'BO'),
(836, 'Eliodoro Camacho', 'Eliodoro Camacho', 'BO'),
(837, 'Franz Tamayo', 'Franz Tamayo', 'BO'),
(838, 'Gualberto Villarroel', 'Gualberto Villarroel', 'BO'),
(839, 'Ingavi', 'Ingavi', 'BO'),
(840, 'Inquisivi', 'Inquisivi', 'BO'),
(841, 'Jos?? Manuel Pando', 'Jos?? Manuel Pando', 'BO'),
(842, 'Larecaja', 'Larecaja', 'BO'),
(843, 'Loayza', 'Loayza', 'BO'),
(844, 'Los Andes', 'Los Andes', 'BO'),
(845, 'Manco Kapac', 'Manco Kapac', 'BO'),
(846, 'Mu??ecas', 'Mu??ecas', 'BO'),
(847, 'Nor Yungas', 'Nor Yungas', 'BO'),
(848, 'Omasuyos', 'Omasuyos', 'BO'),
(849, 'Pacajes', 'Pacajes', 'BO'),
(850, 'Murillo', 'Murillo', 'BO'),
(851, 'Sud Yungas', 'Sud Yungas', 'BO'),
(852, 'Atahuallpa', 'Atahuallpa', 'BO'),
(853, 'Carangas', 'Carangas', 'BO'),
(854, 'Eduardo Avaroa', 'Eduardo Avaroa', 'BO'),
(855, 'Ladislao Cabrera', 'Ladislao Cabrera', 'BO'),
(856, 'Litoral', 'Litoral', 'BO'),
(857, 'Nor Carangas', 'Nor Carangas', 'BO'),
(858, 'Pantal??on Dalence', 'Pantal??on Dalence', 'BO'),
(859, 'Poop??', 'Poop??', 'BO'),
(860, 'Puerto de Mejillones', 'Puerto de Mejillones', 'BO'),
(861, 'Sajama', 'Sajama', 'BO'),
(862, 'San Pedro de Totora', 'San Pedro de Totora', 'BO'),
(863, 'Saucar??', 'Saucar??', 'BO'),
(864, 'Sebasti??n Pagador', 'Sebasti??n Pagador', 'BO'),
(865, 'Sud Carangas', 'Sud Carangas', 'BO'),
(866, 'Tomas Barr??n', 'Tomas Barr??n', 'BO'),
(867, 'Abun??', 'Abun??', 'BO'),
(868, 'Federico Rom??n', 'Federico Rom??n', 'BO'),
(869, 'Madre de Dios', 'Madre de Dios', 'BO'),
(870, 'Manuripi', 'Manuripi', 'BO'),
(871, 'Nicol??s Su??rez', 'Nicol??s Su??rez', 'BO'),
(872, 'Alonso de Ib????ez', 'Alonso de Ib????ez', 'BO'),
(873, 'Antonio Quijarro', 'Antonio Quijarro', 'BO'),
(874, 'Bernardino Bilbao', 'Bernardino Bilbao', 'BO'),
(875, 'Charcas', 'Charcas', 'BO'),
(876, 'Chayanta', 'Chayanta', 'BO'),
(877, 'Cornelio Saavedra', 'Cornelio Saavedra', 'BO'),
(878, 'Daniel Campos', 'Daniel Campos', 'BO'),
(879, 'Enrique Baldivieso', 'Enrique Baldivieso', 'BO'),
(880, 'Jos?? Mar??a Linares', 'Jos?? Mar??a Linares', 'BO'),
(881, 'Modesto Omiste', 'Modesto Omiste', 'BO'),
(882, 'Nor Chichas', 'Nor Chichas', 'BO'),
(883, 'Nor L??pez', 'Nor L??pez', 'BO'),
(884, 'Rafael Bustillo', 'Rafael Bustillo', 'BO'),
(885, 'Sur Chichas', 'Sur Chichas', 'BO'),
(886, 'Sur L??pez', 'Sur L??pez', 'BO'),
(887, 'Tom??s Fr??as', 'Tom??s Fr??as', 'BO'),
(888, 'Andr??s Ib????ez', 'Andr??s Ib????ez', 'BO'),
(889, '??ngel Sandoval', '??ngel Sandoval', 'BO'),
(890, 'Chiquitos', 'Chiquitos', 'BO'),
(891, 'Cordillera', 'Cordillera', 'BO'),
(892, 'Florida', 'Florida', 'BO'),
(893, 'Germ??n Busch', 'Germ??n Busch', 'BO'),
(894, 'Guarayos', 'Guarayos', 'BO'),
(895, 'Ichilo', 'Ichilo', 'BO'),
(896, 'Ignacio Warnes', 'Ignacio Warnes', 'BO'),
(897, 'Jos?? Miguel de Velasco', 'Jos?? Miguel de Velasco', 'BO'),
(898, 'Manuel Mar??a Caballero', 'Manuel Mar??a Caballero', 'BO'),
(899, '??uflo de Ch??vez', '??uflo de Ch??vez', 'BO'),
(900, 'Obispo Santistevan', 'Obispo Santistevan', 'BO'),
(901, 'Sara', 'Sara', 'BO'),
(902, 'Vallegrande', 'Vallegrande', 'BO'),
(903, 'Aniceto Arce', 'Aniceto Arce', 'BO'),
(904, 'Burnet O\'Connor', 'Burnet O\'Connor', 'BO'),
(905, 'Eustaquio M??ndez', 'Eustaquio M??ndez', 'BO'),
(906, 'Gran Chaco', 'Gran Chaco', 'BO'),
(907, 'Jos?? Mar??a Avil??s', 'Jos?? Mar??a Avil??s', 'BO'),
(908, 'La Coru??a', 'C', 'ES'),
(909, 'Lugo', 'LU', 'ES'),
(910, 'Vizcaya', 'BI', 'ES'),
(911, 'Guip??zcoa', 'SS', 'ES'),
(912, 'Huesca', 'HU', 'ES'),
(913, 'L??rida', 'L', 'ES'),
(914, 'Gerona', 'GI', 'ES'),
(915, 'Barcelona', 'B', 'ES'),
(916, 'Tarragona', 'T', 'ES'),
(917, 'Castell??n', 'CS', 'ES'),
(918, 'Valencia', 'V', 'ES'),
(919, 'Alicante', 'A', 'ES'),
(920, 'Murcia', 'MU', 'ES'),
(921, 'Zaragoza', 'Z', 'ES'),
(922, 'Teruel', 'TE', 'ES'),
(923, 'Cuenca', 'CU', 'ES'),
(924, 'Albacete', 'AB', 'ES'),
(925, 'Almeria', 'AL', 'ES'),
(926, 'Granada', 'GR', 'ES'),
(927, 'M??laga', 'MA', 'ES'),
(928, 'Tenerife', 'TF', 'ES'),
(929, 'C??diz', 'CA', 'ES'),
(930, 'Sevilla', 'SE', 'ES'),
(931, 'Huelva', 'H', 'ES'),
(932, 'Las Palmas', 'GC', 'ES'),
(933, 'Madrid', 'M', 'ES'),
(934, 'Badajoz', 'BA', 'ES'),
(935, 'C??ceres', 'CC', 'ES'),
(936, 'Toledo', 'TO', 'ES'),
(937, 'Ciudad Real', 'CR', 'ES'),
(938, 'Salamanca', 'SA', 'ES'),
(939, 'C??rdoba', 'CO', 'ES'),
(940, 'Ja??n', 'J', 'ES'),
(941, '??vila', 'AV', 'ES'),
(942, 'Valladolid', 'VA', 'ES'),
(943, 'Zamora', 'ZA', 'ES'),
(944, '??lava', 'VI', 'ES'),
(945, 'Segovia', 'SG', 'ES'),
(946, 'Burgos', 'BU', 'ES'),
(947, 'Pontevedra', 'PO', 'ES'),
(948, 'Le??n', 'LE', 'ES'),
(949, 'Orense', 'OU', 'ES'),
(950, 'Palencia', 'P', 'ES'),
(951, 'La Rioja', 'LO', 'ES'),
(952, 'Soria', 'SO', 'ES'),
(953, 'Guadalajara', 'GU', 'ES'),
(954, 'Barguna', 'Barguna', 'BD'),
(955, 'Barisal', 'Barisal', 'BD'),
(956, 'Bhola', 'Bhola', 'BD'),
(957, 'Jhalokati', 'Jhalokati', 'BD'),
(958, 'Patuakhali', 'Patuakhali', 'BD'),
(959, 'Pirojpur', 'Pirojpur', 'BD'),
(960, 'Bandarban', 'Bandarban', 'BD'),
(961, 'Brahmanbaria', 'Brahmanbaria', 'BD'),
(962, 'Chandpur', 'Chandpur', 'BD'),
(963, 'Chittagong', 'Chittagong', 'BD'),
(964, 'Comilla', 'Comilla', 'BD'),
(965, 'Feni', 'Feni', 'BD'),
(966, 'Khagrachhari', 'Khagrachhari', 'BD'),
(967, 'Lakshmipur', 'Lakshmipur', 'BD'),
(968, 'Noakhali', 'Noakhali', 'BD'),
(969, 'Rangamati', 'Rangamati', 'BD'),
(970, 'Dhaka', 'Dhaka', 'BD'),
(971, 'Faridpur', 'Faridpur', 'BD'),
(972, 'Gazipur', 'Gazipur', 'BD'),
(973, 'Gopalganj', 'Gopalganj', 'BD'),
(974, 'Jamalpur', 'Jamalpur', 'BD'),
(975, 'Kishoreganj', 'Kishoreganj', 'BD'),
(976, 'Madaripur', 'Madaripur', 'BD'),
(977, 'Manikganj', 'Manikganj', 'BD'),
(978, 'Munshiganj', 'Munshiganj', 'BD'),
(979, 'Mymensingh', 'Mymensingh', 'BD'),
(980, 'Narayanganj', 'Narayanganj', 'BD'),
(981, 'Narsingdi', 'Narsingdi', 'BD'),
(982, 'Netrakona', 'Netrakona', 'BD'),
(983, 'Rajbari', 'Rajbari', 'BD'),
(984, 'Shariatpur', 'Shariatpur', 'BD'),
(985, 'Sherpur', 'Sherpur', 'BD'),
(986, 'Tangail', 'Tangail', 'BD'),
(987, 'Bagerhat', 'Bagerhat', 'BD'),
(988, 'Chuadanga', 'Chuadanga', 'BD'),
(989, 'Jessore', 'Jessore', 'BD'),
(990, 'Jhenaidah', 'Jhenaidah', 'BD'),
(991, 'Khulna', 'Khulna', 'BD'),
(992, 'Kushtia', 'Kushtia', 'BD'),
(993, 'Magura', 'Magura', 'BD'),
(994, 'Meherpur', 'Meherpur', 'BD'),
(995, 'Narail', 'Narail', 'BD'),
(996, 'Satkhira', 'Satkhira', 'BD'),
(997, 'Bogra', 'Bogra', 'BD'),
(998, 'Joypurhat', 'Joypurhat', 'BD'),
(999, 'Naogaon', 'Naogaon', 'BD'),
(1000, 'Natore', 'Natore', 'BD'),
(1001, 'Chapainawabganj', 'Chapainawabganj', 'BD'),
(1002, 'Pabna', 'Pabna', 'BD'),
(1003, 'Rajshahi', 'Rajshahi', 'BD'),
(1004, 'Cox\'s Bazar', 'Cox\'s Bazar', 'BD'),
(1005, 'Sirajganj', 'Sirajganj', 'BD'),
(1006, 'Dinajpur', 'Dinajpur', 'BD'),
(1007, 'Gaibandha', 'Gaibandha', 'BD'),
(1008, 'Kurigram', 'Kurigram', 'BD'),
(1009, 'Lalmonirhat', 'Lalmonirhat', 'BD'),
(1010, 'Nilphamari', 'Nilphamari', 'BD'),
(1011, 'Panchagarh', 'Panchagarh', 'BD'),
(1012, 'Rangpur', 'Rangpur', 'BD'),
(1013, 'Thakurgaon', 'Thakurgaon', 'BD'),
(1014, 'Habiganj', 'Habiganj', 'BD'),
(1015, 'Moulvibazar', 'Moulvibazar', 'BD'),
(1016, 'Sunamganj', 'Sunamganj', 'BD'),
(1017, 'Sylhet', 'Sylhet', 'BD'),
(1018, 'Azad Kashmir', 'Azad Kashmir', 'PK'),
(1019, 'Bahawalpur', 'Bahawalpur', 'PK'),
(1020, 'Bannu', 'Bannu', 'PK'),
(1021, 'Dera Ghazi Khan', 'Dera Ghazi Khan', 'PK'),
(1022, 'Dera Ismail Khan', 'Dera Ismail Khan', 'PK'),
(1023, 'Faisalabad', 'Faisalabad', 'PK'),
(1024, 'F.A.T.A.', 'F.A.T.A.', 'PK'),
(1025, 'Gujranwala', 'Gujranwala', 'PK'),
(1026, 'Hazara', 'Hazara', 'PK'),
(1027, 'Hyderabad', 'Hyderabad', 'PK'),
(1028, 'Islamabad', 'Islamabad', 'PK'),
(1029, 'Kalat', 'Kalat', 'PK'),
(1030, 'Karachi', 'Karachi', 'PK'),
(1031, 'Kohat', 'Kohat', 'PK'),
(1032, 'Lahore', 'Lahore', 'PK'),
(1033, 'Larkana', 'Larkana', 'PK'),
(1034, 'Makran', 'Makran', 'PK'),
(1035, 'Malakand', 'Malakand', 'PK'),
(1036, 'Mardan', 'Mardan', 'PK'),
(1037, 'Mirpur Khas', 'Mirpur Khas', 'PK'),
(1038, 'Multan', 'Multan', 'PK'),
(1039, 'Nasirabad', 'Nasirabad', 'PK'),
(1040, 'Northern Areas', 'Northern Areas', 'PK'),
(1041, 'Peshawar', 'Peshawar', 'PK'),
(1042, 'Quetta', 'Quetta', 'PK'),
(1043, 'Rawalpindi', 'Rawalpindi', 'PK'),
(1044, 'Sargodha', 'Sargodha', 'PK'),
(1045, 'Sahiwal', 'Sahiwal', 'PK'),
(1046, 'Sibi', 'Sibi', 'PK'),
(1047, 'Sukkur', 'Sukkur', 'PK'),
(1048, 'Zhob', 'Zhob', 'PK'),
(1049, 'Abia', 'AB', 'NG'),
(1050, 'Abuja', 'FC', 'NG'),
(1051, 'Adamawa', 'AD', 'NG'),
(1052, 'Akwa Ibom', 'AK', 'NG'),
(1053, 'Anambra', 'AN', 'NG'),
(1054, 'Bauchi', 'BA', 'NG'),
(1055, 'Bayelsa', 'BY', 'NG'),
(1056, 'Benue', 'BE', 'NG'),
(1057, 'Borno', 'BO', 'NG'),
(1058, 'Cross River', 'CR', 'NG'),
(1059, 'Delta', 'DE', 'NG'),
(1060, 'Ebonyi', 'EB', 'NG'),
(1061, 'Edo', 'ED', 'NG'),
(1062, 'Ekiti', 'EK', 'NG'),
(1063, 'Enugu', 'EN', 'NG'),
(1064, 'Gombe', 'GO', 'NG'),
(1065, 'Imo', 'IM', 'NG'),
(1066, 'Jigawa', 'JI', 'NG'),
(1067, 'Kaduna', 'KD', 'NG'),
(1068, 'Kano', 'KN', 'NG'),
(1069, 'Katsina', 'KT', 'NG'),
(1070, 'Kebbi', 'KE', 'NG'),
(1071, 'Kogi', 'KO', 'NG'),
(1072, 'Kwara', 'KW', 'NG'),
(1073, 'Lagos', 'LA', 'NG'),
(1074, 'Nasarawa', 'NA', 'NG'),
(1075, 'Niger', 'NI', 'NG'),
(1076, 'Ogun', 'OG', 'NG'),
(1077, 'Ondo', 'ON', 'NG'),
(1078, 'Osun', 'OS', 'NG'),
(1079, 'Oyo', 'OY', 'NG'),
(1080, 'Plateau', 'PL', 'NG'),
(1081, 'Rivers', 'RI', 'NG'),
(1082, 'Sokoto', 'SO', 'NG'),
(1083, 'Taraba', 'TA', 'NG'),
(1084, 'Yobe', 'YO', 'NG'),
(1085, 'Zamfara', 'ZA', 'NG'),
(1086, 'Aichi', 'Aichi', 'JP'),
(1087, 'Akita', 'Akita', 'JP'),
(1088, 'Aomori', 'Aomori', 'JP'),
(1089, 'Chiba', 'Chiba', 'JP'),
(1090, 'Ehime', 'Ehime', 'JP'),
(1091, 'Fukui', 'Fukui', 'JP'),
(1092, 'Fukuoka', 'Fukuoka', 'JP'),
(1093, 'Fukushima', 'Fukushima', 'JP'),
(1094, 'Gifu', 'Gifu', 'JP'),
(1095, 'Gunma', 'Gunma', 'JP'),
(1096, 'Hiroshima', 'Hiroshima', 'JP'),
(1097, 'Hokkaid??', 'Hokkaid??', 'JP'),
(1098, 'Hy??go', 'Hy??go', 'JP'),
(1099, 'Ibaraki', 'Ibaraki', 'JP'),
(1100, 'Ishikawa', 'Ishikawa', 'JP'),
(1101, 'Iwate', 'Iwate', 'JP'),
(1102, 'Kagawa', 'Kagawa', 'JP'),
(1103, 'Kagoshima', 'Kagoshima', 'JP'),
(1104, 'Kanagawa', 'Kanagawa', 'JP'),
(1105, 'K??chi', 'K??chi', 'JP'),
(1106, 'Kumamoto', 'Kumamoto', 'JP'),
(1107, 'Ky??to', 'Ky??to', 'JP'),
(1108, 'Mie', 'Mie', 'JP'),
(1109, 'Miyagi', 'Miyagi', 'JP'),
(1110, 'Miyazaki', 'Miyazaki', 'JP'),
(1111, 'Nagano', 'Nagano', 'JP'),
(1112, 'Nagasaki', 'Nagasaki', 'JP'),
(1113, 'Nara', 'Nara', 'JP'),
(1114, 'Niigata', 'Niigata', 'JP'),
(1115, '??ita', '??ita', 'JP'),
(1116, 'Okayama', 'Okayama', 'JP'),
(1117, 'Okinawa', 'Okinawa', 'JP'),
(1118, '??saka', '??saka', 'JP'),
(1119, 'Saga', 'Saga', 'JP'),
(1120, 'Saitama', 'Saitama', 'JP'),
(1121, 'Shiga', 'Shiga', 'JP'),
(1122, 'Shimane', 'Shimane', 'JP'),
(1123, 'Shizuoka', 'Shizuoka', 'JP'),
(1124, 'Tochigi', 'Tochigi', 'JP'),
(1125, 'Tokushima', 'Tokushima', 'JP'),
(1126, 'T??ky??', 'T??ky??', 'JP'),
(1127, 'Tottori', 'Tottori', 'JP'),
(1128, 'Toyama', 'Toyama', 'JP'),
(1129, 'Wakayama', 'Wakayama', 'JP'),
(1130, 'Yamagata', 'Yamagata', 'JP'),
(1131, 'Yamaguchi', 'Yamaguchi', 'JP'),
(1132, 'Yamanashi', 'Yamanashi', 'JP'),
(1133, 'Rio Grande do Sul', 'RS', 'BR'),
(1134, 'Rio Grande do Norte', 'RN', 'BR'),
(1135, 'Rio de Janeiro', 'RJ', 'BR'),
(1136, 'Piau??', 'PI', 'BR'),
(1137, 'Nieder??sterreich', 'N??', 'AT'),
(1138, 'K??rnten', 'K', 'AT'),
(1139, 'Burgenland', 'B', 'AT'),
(1140, 'Pernambuco', 'PE', 'BR'),
(1141, 'Paran??', 'PR', 'BR'),
(1142, 'Para??ba', 'PB', 'BR'),
(1143, 'Par??', 'PA', 'BR'),
(1144, 'Minas Gerais', 'MG', 'BR'),
(1145, 'Mato Grosso do Sul', 'MS', 'BR'),
(1146, 'Mato Grosso', 'MT', 'BR'),
(1147, 'Maranh??o', 'MA', 'BR'),
(1148, 'Goi??s', 'GO', 'BR'),
(1149, 'Esp??rito Santo', 'ES', 'BR'),
(1150, 'Distrito Federal', 'DF', 'BR'),
(1151, 'Cear??', 'CE', 'BR'),
(1152, 'Bahia', 'BA', 'BR'),
(1153, 'Amazonas', 'AM', 'BR'),
(1154, 'Amap??', 'AP', 'BR'),
(1155, 'Alagoas', 'AL', 'BR'),
(1156, 'Acre', 'AC', 'BR'),
(1157, 'Wien', 'W', 'AT'),
(1158, 'Vorarlberg', 'V', 'AT'),
(1159, 'Tirol', 'T', 'AT'),
(1160, 'Steiermark', 'ST', 'AT'),
(1161, 'Salzburg', 'S', 'AT'),
(1162, 'Ober??sterreich', 'O??', 'AT'),
(1163, 'Rond??nia', 'RO', 'BR'),
(1164, 'Roraima', 'RR', 'BR'),
(1165, 'Santa Catarina', 'SC', 'BR'),
(1166, 'S??o Paulo', 'SP', 'BR'),
(1167, 'Sergipe', 'SE', 'BR'),
(1168, 'Tocantins', 'TO', 'BR'),
(1169, 'Abra', 'Abra', 'PH'),
(1170, 'Agusan del Norte', 'Agusan del Norte', 'PH'),
(1171, 'Agusan del Sur', 'Agusan del Sur', 'PH'),
(1172, 'Aklan', 'Aklan', 'PH'),
(1173, 'Albay', 'Albay', 'PH'),
(1174, 'Antique', 'Antique', 'PH'),
(1175, 'Apayao', 'Apayao', 'PH'),
(1176, 'Aurora', 'Aurora', 'PH'),
(1177, 'Basilan', 'Basilan', 'PH'),
(1178, 'Bataan', 'Bataan', 'PH'),
(1179, 'Batanes', 'Batanes', 'PH'),
(1180, 'Batangas', 'Batangas', 'PH'),
(1181, 'Benguet', 'Benguet', 'PH'),
(1182, 'Biliran', 'Biliran', 'PH'),
(1183, 'Bohol', 'Bohol', 'PH'),
(1184, 'Bukidnon', 'Bukidnon', 'PH'),
(1185, 'Bulacan', 'Bulacan', 'PH'),
(1186, 'Cagayan', 'Cagayan', 'PH'),
(1187, 'Camarines Norte', 'Camarines Norte', 'PH'),
(1188, 'Camarines Sur', 'Camarines Sur', 'PH'),
(1189, 'Camiguin', 'Camiguin', 'PH'),
(1190, 'Capiz', 'Capiz', 'PH'),
(1191, 'Catanduanes', 'Catanduanes', 'PH'),
(1192, 'Cavite', 'Cavite', 'PH'),
(1193, 'Cebu', 'Cebu', 'PH'),
(1194, 'Compostela Valley', 'Compostela Valley', 'PH'),
(1195, 'Cotabato', 'Cotabato', 'PH'),
(1196, 'Davao del Norte', 'Davao del Norte', 'PH'),
(1197, 'Davao del Sur', 'Davao del Sur', 'PH'),
(1198, 'Davao Occidental', 'Davao Occidental', 'PH'),
(1199, 'Davao Oriental', 'Davao Oriental', 'PH'),
(1200, 'Dinagat Islands', 'Dinagat Islands', 'PH'),
(1201, 'Eastern Samar', 'Eastern Samar', 'PH'),
(1202, 'Guimaras', 'Guimaras', 'PH'),
(1203, 'Ifugao', 'Ifugao', 'PH'),
(1204, 'Ilocos Norte', 'Ilocos Norte', 'PH'),
(1205, 'Ilocos Sur', 'Ilocos Sur', 'PH'),
(1206, 'Iloilo', 'Iloilo', 'PH'),
(1207, 'Isabela', 'Isabela', 'PH'),
(1208, 'Kalinga', 'Kalinga', 'PH'),
(1209, 'La Union', 'La Union', 'PH'),
(1210, 'Laguna', 'Laguna', 'PH'),
(1211, 'Lanao del Norte', 'Lanao del Norte', 'PH'),
(1212, 'Lanao del Sur', 'Lanao del Sur', 'PH'),
(1213, 'Leyte', 'Leyte', 'PH'),
(1214, 'Maguindanao', 'Maguindanao', 'PH'),
(1215, 'Marinduque', 'Marinduque', 'PH'),
(1216, 'Masbate', 'Masbate', 'PH'),
(1217, 'Misamis Occidental', 'Misamis Occidental', 'PH'),
(1218, 'Misamis Oriental', 'Misamis Oriental', 'PH'),
(1219, 'Mountain Province', 'Mountain Province', 'PH'),
(1220, 'Negros Occidental', 'Negros Occidental', 'PH'),
(1221, 'Negros Oriental', 'Negros Oriental', 'PH'),
(1222, 'Northern Samar', 'Northern Samar', 'PH'),
(1223, 'Nueva Ecija', 'Nueva Ecija', 'PH'),
(1224, 'Nueva Vizcaya', 'Nueva Vizcaya', 'PH'),
(1225, 'Occidental Mindoro', 'Occidental Mindoro', 'PH'),
(1226, 'Oriental Mindoro', 'Oriental Mindoro', 'PH'),
(1227, 'Palawan', 'Palawan', 'PH'),
(1228, 'Pampanga', 'Pampanga', 'PH'),
(1229, 'Pangasinan', 'Pangasinan', 'PH'),
(1230, 'Quezon', 'Quezon', 'PH'),
(1231, 'Quirino', 'Quirino', 'PH'),
(1232, 'Rizal', 'Rizal', 'PH'),
(1233, 'Romblon', 'Romblon', 'PH'),
(1234, 'Samar', 'Samar', 'PH'),
(1235, 'Sarangani', 'Sarangani', 'PH'),
(1236, 'Siquijor', 'Siquijor', 'PH'),
(1237, 'Sorsogon', 'Sorsogon', 'PH'),
(1238, 'South Cotabato', 'South Cotabato', 'PH'),
(1239, 'Southern Leyte', 'Southern Leyte', 'PH'),
(1240, 'Sultan Kudarat', 'Sultan Kudarat', 'PH'),
(1241, 'Sulu', 'Sulu', 'PH'),
(1242, 'Surigao del Norte', 'Surigao del Norte', 'PH'),
(1243, 'Surigao del Sur', 'Surigao del Sur', 'PH'),
(1244, 'Tarlac', 'Tarlac', 'PH'),
(1245, 'Tawi-Tawi', 'Tawi-Tawi', 'PH'),
(1246, 'Zambales', 'Zambales', 'PH'),
(1247, 'Zamboanga del Norte', 'Zamboanga del Norte', 'PH'),
(1248, 'Zamboanga del Sur', 'Zamboanga del Sur', 'PH'),
(1249, 'Zamboanga Sibugay', 'Zamboanga Sibugay', 'PH'),
(1250, 'Metro Manila', 'Metro Manila', 'PH'),
(1251, 'H?? N???i', 'H?? N???i', 'VN'),
(1252, 'H?? Giang', 'H?? Giang', 'VN'),
(1253, 'Cao B???ng', 'Cao B???ng', 'VN'),
(1254, 'B???c K???n', 'B???c K???n', 'VN'),
(1255, 'Tuy??n Quang', 'Tuy??n Quang', 'VN'),
(1256, 'L??o Cai', 'L??o Cai', 'VN'),
(1257, '??i???n Bi??n', '??i???n Bi??n', 'VN'),
(1258, 'Lai Ch??u', 'Lai Ch??u', 'VN'),
(1259, 'S??n La', 'S??n La', 'VN'),
(1260, 'Y??n B??i', 'Y??n B??i', 'VN'),
(1261, 'H??a B??nh', 'H??a B??nh', 'VN'),
(1262, 'Th??i Nguy??n', 'Th??i Nguy??n', 'VN'),
(1263, 'L???ng S??n', 'L???ng S??n', 'VN'),
(1264, 'Qu???ng Ninh', 'Qu???ng Ninh', 'VN'),
(1265, 'B???c Giang', 'B???c Giang', 'VN'),
(1266, 'Ph?? Th???', 'Ph?? Th???', 'VN'),
(1267, 'V??nh Ph??c', 'V??nh Ph??c', 'VN'),
(1268, 'B???c Ninh', 'B???c Ninh', 'VN'),
(1269, 'H???i D????ng', 'H???i D????ng', 'VN'),
(1270, 'H???i Ph??ng', 'H???i Ph??ng', 'VN'),
(1271, 'H??ng Y??n', 'H??ng Y??n', 'VN'),
(1272, 'Th??i B??nh', 'Th??i B??nh', 'VN'),
(1273, 'H?? Nam', 'H?? Nam', 'VN'),
(1274, 'Nam ?????nh', 'Nam ?????nh', 'VN'),
(1275, 'Ninh B??nh', 'Ninh B??nh', 'VN'),
(1276, 'Thanh H??a', 'Thanh H??a', 'VN'),
(1277, 'Ngh??? An', 'Ngh??? An', 'VN'),
(1278, 'H?? T??nh', 'H?? T??nh', 'VN'),
(1279, 'Qu???ng B??nh', 'Qu???ng B??nh', 'VN'),
(1280, 'Qu???ng Tr???', 'Qu???ng Tr???', 'VN'),
(1281, 'Th???a Thi??n???Hu???', 'Th???a Thi??n???Hu???', 'VN'),
(1282, '???? N???ng', '???? N???ng', 'VN'),
(1283, 'Qu???ng Nam', 'Qu???ng Nam', 'VN'),
(1284, 'Qu???ng Ng??i', 'Qu???ng Ng??i', 'VN'),
(1285, 'B??nh ?????nh', 'B??nh ?????nh', 'VN'),
(1286, 'Ph?? Y??n', 'Ph?? Y??n', 'VN'),
(1287, 'Kh??nh H??a', 'Kh??nh H??a', 'VN'),
(1288, 'Ninh Thu???n', 'Ninh Thu???n', 'VN'),
(1289, 'B??nh Thu???n', 'B??nh Thu???n', 'VN'),
(1290, 'Kon Tum', 'Kon Tum', 'VN'),
(1291, 'Gia Lai', 'Gia Lai', 'VN'),
(1292, '?????k L???k', '?????k L???k', 'VN'),
(1293, '?????k N??ng', '?????k N??ng', 'VN'),
(1294, 'L??m ?????ng', 'L??m ?????ng', 'VN'),
(1295, 'B??nh Ph?????c', 'B??nh Ph?????c', 'VN'),
(1296, 'T??y Ninh', 'T??y Ninh', 'VN'),
(1297, 'B??nh D????ng', 'B??nh D????ng', 'VN'),
(1298, '?????ng Nai', '?????ng Nai', 'VN'),
(1299, 'B?? R???a???V??ng T??u', 'B?? R???a???V??ng T??u', 'VN'),
(1300, 'Th??nh ph??? H??? Ch?? Minh', 'Th??nh ph??? H??? Ch?? Minh', 'VN'),
(1301, 'Long An', 'Long An', 'VN'),
(1302, 'Ti???n Giang', 'Ti???n Giang', 'VN'),
(1303, 'B???n Tre', 'B???n Tre', 'VN'),
(1304, 'Tr?? Vinh', 'Tr?? Vinh', 'VN'),
(1305, 'V??nh Long', 'V??nh Long', 'VN'),
(1306, '?????ng Th??p', '?????ng Th??p', 'VN'),
(1307, 'An Giang', 'An Giang', 'VN'),
(1308, 'Ki??n Giang', 'Ki??n Giang', 'VN'),
(1309, 'C???n Th??', 'C???n Th??', 'VN'),
(1310, 'H???u Giang', 'H???u Giang', 'VN'),
(1311, 'S??c Tr??ng', 'S??c Tr??ng', 'VN'),
(1312, 'B???c Li??u', 'B???c Li??u', 'VN'),
(1313, 'C?? Mau', 'C?? Mau', 'VN'),
(1314, 'San Jos??', 'San Jos??', 'CR'),
(1315, 'Alajuela', 'Alajuela', 'CR'),
(1316, 'Cartago', 'Cartago', 'CR'),
(1317, 'Heredia', 'Heredia', 'CR'),
(1318, 'Guanacaste', 'Guanacaste', 'CR'),
(1319, 'Puntarenas', 'Puntarenas', 'CR'),
(1320, 'Lim??n', 'Lim??n', 'CR'),
(1321, 'Auckland', 'Auckland', 'NZ'),
(1322, 'New Plymouth', 'New Plymouth', 'NZ'),
(1323, 'Hawke\'s Bay', 'Hawke\'s Bay', 'NZ'),
(1324, 'Wellington', 'Wellington', 'NZ'),
(1325, 'Nelson', 'Nelson', 'NZ'),
(1326, 'Marlborough', 'Marlborough', 'NZ'),
(1327, 'Westland', 'Westland', 'NZ'),
(1328, 'Canterbury', 'Canterbury', 'NZ'),
(1329, 'Otago', 'Otago', 'NZ'),
(1330, 'Southland', 'Southland', 'NZ');

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
(476, 'Australia/Sydney', 'Australia/Sydney (GMT+10:00)'),
(475, 'Pacific/Port_Moresby', 'Pacific/Port_Moresby (GMT+10:00)'),
(472, 'Pacific/Guam', 'Pacific/Guam (GMT+10:00)'),
(473, 'Australia/Hobart', 'Australia/Hobart (GMT+10:00)'),
(474, 'Australia/Melbourne', 'Australia/Melbourne (GMT+10:00)'),
(471, 'Australia/Canberra', 'Australia/Canberra (GMT+10:00)'),
(469, 'Asia/Yakutsk', 'Asia/Yakutsk (GMT+10:00)'),
(470, 'Australia/Brisbane', 'Australia/Brisbane (GMT+10:00)'),
(468, 'Australia/Darwin', 'Australia/Darwin (GMT+09:30)'),
(467, 'Australia/Adelaide', 'Australia/Adelaide (GMT+09:30)'),
(466, 'Asia/Tokyo', 'Asia/Tokyo (GMT+09:00)'),
(465, 'Asia/Seoul', 'Asia/Seoul (GMT+09:00)'),
(464, 'Asia/Irkutsk', 'Asia/Irkutsk (GMT+09:00)'),
(463, 'Asia/Urumqi', 'Asia/Urumqi (GMT+08:00)'),
(461, 'Asia/Taipei', 'Asia/Taipei (GMT+08:00)'),
(462, 'Asia/Ulaanbaatar', 'Asia/Ulaanbaatar (GMT+08:00)'),
(460, 'Asia/Singapore', 'Asia/Singapore (GMT+08:00)'),
(459, 'Australia/Perth', 'Australia/Perth (GMT+08:00)'),
(458, 'Asia/Kuala_Lumpur', 'Asia/Kuala_Lumpur (GMT+08:00)'),
(456, 'Asia/Chongqing', 'Asia/Chongqing (GMT+08:00)'),
(457, 'Asia/Hong_Kong', 'Asia/Hong_Kong (GMT+08:00)'),
(455, 'Asia/Krasnoyarsk', 'Asia/Krasnoyarsk (GMT+08:00)'),
(454, 'Asia/Jakarta', 'Asia/Jakarta (GMT+07:00)'),
(453, 'Asia/Bangkok', 'Asia/Bangkok (GMT+07:00)'),
(452, 'Asia/Novosibirsk', 'Asia/Novosibirsk (GMT+07:00)'),
(450, 'Asia/Almaty', 'Asia/Almaty (GMT+06:00)'),
(451, 'Asia/Dhaka', 'Asia/Dhaka (GMT+06:00)'),
(449, 'Asia/Yekaterinburg', 'Asia/Yekaterinburg (GMT+06:00)'),
(448, 'Asia/Kathmandu', 'Asia/Kathmandu (GMT+05:45)'),
(446, 'Asia/Tashkent', 'Asia/Tashkent (GMT+05:00)'),
(447, 'Asia/Kolkata', 'Asia/Kolkata (GMT+05:30)'),
(445, 'Asia/Karachi', 'Asia/Karachi (GMT+05:00)'),
(444, 'Asia/Kabul', 'Asia/Kabul (GMT+04:30)'),
(443, 'Asia/Yerevan', 'Asia/Yerevan (GMT+04:00)'),
(442, 'Asia/Tbilisi', 'Asia/Tbilisi (GMT+04:00)'),
(441, 'Asia/Muscat', 'Asia/Muscat (GMT+04:00)'),
(439, 'Asia/Baku', 'Asia/Baku (GMT+04:00)'),
(440, 'Europe/Volgograd', 'Europe/Volgograd (GMT+04:00)'),
(438, 'Asia/Tehran', 'Asia/Tehran (GMT+03:30)'),
(436, 'Asia/Riyadh', 'Asia/Riyadh (GMT+03:00)'),
(437, 'Europe/Moscow', 'Europe/Moscow (GMT+03:00)'),
(435, 'Africa/Nairobi', 'Africa/Nairobi (GMT+03:00)'),
(434, 'Asia/Kuwait', 'Asia/Kuwait (GMT+03:00)'),
(432, 'Europe/Vilnius', 'Europe/Vilnius (GMT+02:00)'),
(433, 'Asia/Baghdad', 'Asia/Baghdad (GMT+03:00)'),
(431, 'Europe/Tallinn', 'Europe/Tallinn (GMT+02:00)'),
(430, 'Europe/Sofia', 'Europe/Sofia (GMT+02:00)'),
(429, 'Europe/Riga', 'Europe/Riga (GMT+02:00)'),
(428, 'Europe/Minsk', 'Europe/Minsk (GMT+02:00)'),
(426, 'Asia/Jerusalem', 'Asia/Jerusalem (GMT+02:00)'),
(427, 'Europe/Kiev', 'Europe/Kiev (GMT+02:00)'),
(425, 'Europe/Istanbul', 'Europe/Istanbul (GMT+02:00)'),
(424, 'Europe/Helsinki', 'Europe/Helsinki (GMT+02:00)'),
(422, 'Africa/Cairo', 'Africa/Cairo (GMT+02:00)'),
(423, 'Africa/Harare', 'Africa/Harare (GMT+02:00)'),
(421, 'Europe/Bucharest', 'Europe/Bucharest (GMT+02:00)'),
(420, 'Europe/Athens', 'Europe/Athens (GMT+02:00)'),
(418, 'Europe/Warsaw', 'Europe/Warsaw (GMT+01:00)'),
(419, 'Europe/Zagreb', 'Europe/Zagreb (GMT+01:00)'),
(416, 'Europe/Stockholm', 'Europe/Stockholm (GMT+01:00)'),
(417, 'Europe/Vienna', 'Europe/Vienna (GMT+01:00)'),
(414, 'Europe/Sarajevo', 'Europe/Sarajevo (GMT+01:00)'),
(415, 'Europe/Skopje', 'Europe/Skopje (GMT+01:00)'),
(413, 'Europe/Rome', 'Europe/Rome (GMT+01:00)'),
(411, 'Europe/Paris', 'Europe/Paris (GMT+01:00)'),
(412, 'Europe/Prague', 'Europe/Prague (GMT+01:00)'),
(410, 'Europe/Madrid', 'Europe/Madrid (GMT+01:00)'),
(409, 'Europe/Ljubljana', 'Europe/Ljubljana (GMT+01:00)'),
(408, 'Europe/Copenhagen', 'Europe/Copenhagen (GMT+01:00)'),
(406, 'Europe/Brussels', 'Europe/Brussels (GMT+01:00)'),
(407, 'Europe/Budapest', 'Europe/Budapest (GMT+01:00)'),
(405, 'Europe/Bratislava', 'Europe/Bratislava (GMT+01:00)'),
(404, 'Europe/Berlin', 'Europe/Berlin (GMT+01:00)'),
(403, 'Europe/Belgrade', 'Europe/Belgrade (GMT+01:00)'),
(402, 'Europe/Amsterdam', 'Europe/Amsterdam (GMT+01:00)'),
(401, 'Africa/Monrovia', 'Africa/Monrovia (GMT)'),
(400, 'Europe/London', 'Europe/London (GMT)'),
(399, 'Europe/Lisbon', 'Europe/Lisbon (GMT)'),
(398, 'Europe/Dublin', 'Europe/Dublin (GMT)'),
(397, 'Africa/Casablanca', 'Africa/Casablanca (GMT)'),
(396, 'Atlantic/Cape_Verde', 'Atlantic/Cape_Verde (GMT-01:00)'),
(395, 'Atlantic/Azores', 'Atlantic/Azores (GMT-01:00)'),
(394, 'Atlantic/Stanley', 'Atlantic/Stanley (GMT-02:00)'),
(393, 'America/Buenos_Aires', 'America/Buenos_Aires (GMT-03:00)'),
(392, 'Canada/Newfoundland', 'Canada/Newfoundland (GMT-03:30)'),
(391, 'America/Santiago', 'America/Santiago (GMT-04:00)'),
(390, 'America/La_Paz', 'America/La_Paz (GMT-04:00)'),
(389, 'Canada/Atlantic', 'Canada/Atlantic (GMT-04:00)'),
(388, 'America/Caracas', 'America/Caracas (GMT-04:30)'),
(387, 'America/Lima', 'America/Lima (GMT-05:00)'),
(386, 'America/Bogota', 'America/Bogota (GMT-05:00)'),
(385, 'Canada/Saskatchewan', 'Canada/Saskatchewan (GMT-06:00)'),
(384, 'America/Monterrey', 'America/Monterrey (GMT-06:00)'),
(383, 'America/Mexico_City', 'America/Mexico_City (GMT-06:00)'),
(382, 'America/Mazatlan', 'America/Mazatlan (GMT-07:00)'),
(381, 'America/Chihuahua', 'America/Chihuahua (GMT-07:00)'),
(380, 'America/Tijuana', 'America/Tijuana (GMT-08:00)'),
(379, 'Pacific/Midway', 'Pacific/Midway (GMT-11:00)'),
(378, 'US/East-Indiana', 'US/East-Indiana (GMT-05:00)'),
(377, 'US/Eastern', 'US/Eastern (GMT-05:00)'),
(376, 'US/Central', 'US/Central (GMT-06:00)'),
(375, 'US/Mountain', 'US/Mountain (GMT-07:00)'),
(374, 'US/Arizona', 'US/Arizona (GMT-07:00)'),
(373, 'US/Pacific', 'US/Pacific (GMT-08:00)'),
(372, 'US/Alaska', 'US/Alaska (GMT-09:00)'),
(371, 'US/Hawaii', 'US/Hawaii (GMT-10:00)'),
(370, 'US/Samoa', 'US/Samoa (GMT-11:00)'),
(477, 'Asia/Vladivostok', 'Asia/Vladivostok (GMT+11:00)'),
(478, 'Asia/Magadan', 'Asia/Magadan (GMT+12:00)'),
(479, 'Pacific/Auckland', 'Pacific/Auckland (GMT+12:00)'),
(480, 'Pacific/Fiji', 'Pacific/Fiji (GMT+12:00)');

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
(33, 'jhalaby', 'jhalaby@emich.edu', '71603a2a25ec0996e665467cc270db97', 1, 1, 'Jordan', 'Halaby', '1', '2489127636', 1, 1, '10137 Devonshire', '', 'US', 'South Lyon', 'MI', '1', 'Werner', '5', 'Devonshire', 'SpyderByte', 'spyderbyte.co', '', '', 'no', '', '', '', '', '', 1, '2021-04-18 21:30:49', 1, 100, 1, 803429),
(41, 'billy', 'billy@bill.com', '900150983cd24fb0d6963f7d28e17f72', 0, 0, 'h', 'jl', '109', '234', 1, 1, '123 South St', 'Unit 4', 'US', 'Test', 'AL', '2', 'wer', '1', 'sdaf', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:58', 0, 100, 0, 184914),
(34, 'northcoast_n', 'steve@bidzwon.com', '4e66f7ddd20a112597b1b9f083d517c5', 1, 1, 'Steve', 'Halaby', '1', '2484440710', 1, 1, '10137 Devonshire Dr', '', 'US', 'South Lyon', 'MI', '2', 'a913af7f60269a1454a210edf0cba1ad', '5', 'b60d91de4b4b236f26d74b8d99bb3560', 'SpyderByte, Inc', 'spyderbyte.co', '', '2484440710', 'no', '15810390805 (2).png', '', '', '', 'Anything', 1, '2021-06-15 21:42:47', 1, 100, 1, 496280),
(38, 'billybob', 'billybob@yahoo.com', '71603a2a25ec0996e665467cc270db97', 1, 1, 'Billy', 'Bob', '1', '2489127636', 1, 1, '5270 Mt. Maria', '', 'US', 'Hubbard Lake', 'MI', '1', 'Werner', '1', 'Football', 'SpyderByte', 'spyderbyte.co', '1234', '', '', '1598018365profile.jpg', '', '', '', '', 1, '2021-05-21 23:55:27', 1, 100, 0, 609970),
(36, 'jhab2', 'jordan@bidzwon.com', 'd16d377af76c99d27093abc22244b342', 0, 0, 'Uwe', 'Kind', '1', '248912', 1, 1, '10137 Devonshire', '', 'US', 'Jordan', 'AL', '1', 'Werner', '5', 'Devonshire', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:45', 0, 100, 1, 561904),
(39, 'DustyCar', 's_halaby1@yahoo.com', '09e7d4c7ed87c53f5139f5c55d8661e8', 1, 1, 'Steve', 'Halaby', '1', '2484440710', 1, 1, '10137 Devonshire Dr', '', 'US', 'South Lyon', 'MI', '1', 'Reimer', '5', 'Dewhirst', 'ABC123 Auctions', 'ABC123Auctions.com', '4737271', '2487776767', '', '1598149342D (1).jpg', '', '', '', '', 1, '2021-06-15 21:42:57', 1, 100, 1, 606768),
(40, 'skippy', 'stevehalaby1@gmail.com', '4e66f7ddd20a112597b1b9f083d517c5', 0, 0, 'Steve', 'Halaby', '1', '2484440710', 1, 1, '10137 Devonshire Dr', '', 'US', 'South Lyon', 'MI', '1', 'Riemer', '5', 'Dewhirst', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:36', 0, 100, 1, 509142),
(42, 'bigtony', 'bigtony@yahoo.com', 'afae32efe0f84fece3f96b377b768b33', 0, 0, 'Big', 'Tony', '1', '1231231', 1, 1, '5270 Mt. Maria', '', 'US', 'Hubbard Lake', 'MI', '1', 'Wernere', '2', 'Michael', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:31:17', 0, 100, 0, 126370),
(43, 'mgk', 'mgk@spotify.com', '0e14d45c430806127d2a4a85dd419a85', 0, 0, 'MachineGun', 'Kelly', '1', '1231231231', 1, 1, '10137 Devonshire', '', 'US', 'South Lyon', 'MI', '1', 'Werner', '2', 'Michael', '', '', '', '', '', '', '', '', '', '', 1, '2021-01-19 18:34:13', 0, 100, 0, 117085),
(44, 'daduck', 'ducky@bolton.com', '56975b83de847aa2ee9b2493b6c4bd8f', 1, 1, 'Daffy', 'Duck', '1', '2484377871', 1, 1, '5270 Mt. Maria', '', 'US', 'Hubbard Lake', 'MI', '4', 'Duck', '4', 'MIghty Ducks', 'SpyderByte', 'https://spyderbyte.co', '123456', '12345678900', 'yes', '1618425752xmas.png', 'SpyderByte', 'BidZWon', 'Crossroads', 'I am planning on selling books, movies, and video games', 1, '2021-04-15 17:54:43', 1, 100, 1, 754332);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog_location`
--
ALTER TABLE `catalog_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog_pictures`
--
ALTER TABLE `catalog_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog_registration`
--
ALTER TABLE `catalog_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog_status`
--
ALTER TABLE `catalog_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_tier1`
--
ALTER TABLE `cat_tier1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_tier2`
--
ALTER TABLE `cat_tier2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_tier3`
--
ALTER TABLE `cat_tier3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_tier4`
--
ALTER TABLE `cat_tier4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot_countdown`
--
ALTER TABLE `lot_countdown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot_pictures`
--
ALTER TABLE `lot_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot_picture_order`
--
ALTER TABLE `lot_picture_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot_sort`
--
ALTER TABLE `lot_sort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note_test`
--
ALTER TABLE `note_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_question1`
--
ALTER TABLE `security_question1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_question2`
--
ALTER TABLE `security_question2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `catalog_location`
--
ALTER TABLE `catalog_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `catalog_pictures`
--
ALTER TABLE `catalog_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalog_registration`
--
ALTER TABLE `catalog_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `catalog_status`
--
ALTER TABLE `catalog_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `cat_tier1`
--
ALTER TABLE `cat_tier1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cat_tier2`
--
ALTER TABLE `cat_tier2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cat_tier3`
--
ALTER TABLE `cat_tier3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cat_tier4`
--
ALTER TABLE `cat_tier4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `lot_countdown`
--
ALTER TABLE `lot_countdown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `lot_pictures`
--
ALTER TABLE `lot_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `lot_picture_order`
--
ALTER TABLE `lot_picture_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lot_sort`
--
ALTER TABLE `lot_sort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `note_test`
--
ALTER TABLE `note_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `security_question1`
--
ALTER TABLE `security_question1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `security_question2`
--
ALTER TABLE `security_question2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1331;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
