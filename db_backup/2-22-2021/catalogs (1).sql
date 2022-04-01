-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2021 at 01:12 PM
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
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IP_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `catalog_name`, `auction_type`, `charity`, `catalog_description`, `start_date`, `start_time`, `end_date`, `end_time`, `end_increment`, `house_list`, `currency`, `timezone`, `buyer_premium`, `allow_freeze`, `asset_location_1`, `asset_location_2`, `asset_location_3`, `asset_location_4`, `asset_location_5`, `inspection_1`, `inspection_2`, `inspection_3`, `inspection_4`, `inspection_5`, `inspection_6`, `inspection_7`, `inspection_8`, `inspection_9`, `inspection_10`, `removal_1`, `removal_2`, `removal_3`, `removal_4`, `removal_5`, `removal_6`, `removal_7`, `removal_8`, `removal_9`, `removal_10`, `contact_1`, `contact_2`, `contact_3`, `contact_4`, `contact_5`, `contact_6`, `contact_7`, `contact_8`, `contact_9`, `contact_10`, `question_1`, `question_2`, `question_3`, `question_4`, `question_5`, `question_6`, `question_7`, `question_8`, `question_9`, `question_10`, `terms_conditions`, `inspection_notes`, `removal_notes`, `extended_bidding`, `extended_type`, `extended_time_remaining`, `extended_minutes_jump`, `extended_minutes_increment`, `owner`, `IP_address`, `published`) VALUES
(61, 'testing data and stuff\'s', 'timed', 'no', 'This is mostly for testing editing catalogs. This catalog will have all locations/inspections/removals/contacts/questions but will be staggered - deleting some and adding more', '2020-01-09', '0100', '2020-01-31', '0015', '15', '||', 'GBP', 'EAT', 12, 'yes', '6??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '16??||&&566 Main St??||&&Unit 4??||&&Haverhill??||&&HI??||&&US', '21??||&&566 Main St??||&&Unit 4??||&&Haverhill??||&&HI??||&&US', '22??||&&100 The St??||&&-1??||&&Test??||&&AL??||&&US', '23??||&&420 Rockin Ave??||&&-1??||&&Denver??||&&CO??||&&US', '4??||&&10/30/2020??||&&10/08/2020??||&&0415??||&&0415??||&&6', '8??||&&10/08/2020??||&&??||&&0030??||&&0030??||&&6', '10??||&&10/09/2020??||&&??||&&0015??||&&0030??||&&6', '12??||&&10/09/2020??||&&??||&&0015??||&&0045??||&&6', '15??||&&10/14/2020??||&&??||&&0045??||&&0045??||&&16', '16??||&&10/07/2020??||&&??||&&0015??||&&0030??||&&16', '17??||&&10/28/2020??||&&??||&&0030??||&&0115??||&&23', '-1', '-1', '-1', '0??||&&10/02/2020??||&&??||&&0430??||&&0415??||&&6', '3??||&&10/23/2020??||&&??||&&0315??||&&0400??||&&6', '5??||&&10/23/2020??||&&??||&&0015??||&&0045??||&&16', '6??||&&10/30/2020??||&&10/30/2020??||&&0045??||&&0045??||&&6', '-1', '-1', '-1', '-1', '-1', '-1', '2??||&&Tom??||&&345??||&&6', '3??||&&Jordan Halaby??||&&12312??||&&6', '6??||&&Girl??||&&123??||&&16', '7??||&&Mitchell??||&&456??||&&6', '9??||&&afds??||&&5423??||&&21', '10??||&&Becky??||&&876??||&&22', '12??||&&Billy??||&&987??||&&16', '-1', '-1', '-1', '3??||&&four', '4??||&&six', '5??||&&eight', '6??||&&ten', '7??||&&one', '8??||&&three', '9??||&&two', '10??||&&five', '11??||&&seven', '12??||&&nine', 'these are my terms', 'these notes were made for walkin\'', 'and that\'s what these notes shall do', '', '', '', '', '', 'jhalaby', '76.217.175.77', 1),
(62, 'Happy Daze 2', 'timed', 'yes', 'STANDARD TEST', '2021-10-07', '0800', '2021-10-21', '1730', '5', '||', 'USD', 'EST', 5.75, 'no', '1??||&&10132 Devonshire Dr??||&&??||&&South Lyon??||&&MI??||&&US', '3??||&&101 MAIN??||&&-1??||&&MAYBERRY??||&&NC??||&&US', '-1', '-1', '-1', '1??||&&10/05/2021??||&&10/06/2021??||&&0900??||&&2000??||&&1', '2??||&&10/04/2021??||&&10/06/2021??||&&0800??||&&1700??||&&3', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&10/28/2021??||&&11/10/2021??||&&0900??||&&1600??||&&1', '1??||&&10/21/2021??||&&11/11/2021??||&&0900??||&&1530??||&&3', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&Steve??||&&2484440710??||&&1', '1??||&&ME??||&&313-555-0000??||&&3', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&WHO ARE YOU?', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'ALL STANDARD', 'STANDARD', '', '', '', '', '', '', 'DustyCar', '76.217.175.77', 0),
(63, 'Steve-Test 2', 'timed', 'no', 'xcvcavfz sv', '2021-10-27', '0700', '2021-11-30', '0700', '5', '||', 'USD', 'EST', 13, 'yes\\', '1??||&&1016 Devonshire Dr??||&&??||&&South Lyon??||&&MI??||&&US', '3??||&&222 GGGGG??||&&-1??||&&FFFF??||&&KS??||&&US', '-1', '-1', '-1', '0??||&&10/25/2021??||&&10/26/2021??||&&0715??||&&1715??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&12/02/2021??||&&??||&&1315??||&&2200??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&Billy Bob??||&&2484377871??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'ALL STANDARD', 'CWcccwqcqvcwc', '', '', '', '', '', '', 'DustyCar', '76.217.175.77', 0),
(54, 'one more until break', 'timed', 'yes', 'im hungry but not starving', '2020-10-08', '0345', '2020-01-14', '0415', '25', '||', 'NOK', 'AET', 12, 'no', '1??||&&asfd??||&&-1??||&&asfd??||&&jordanville??||&&AF', '2??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '5??||&&123 South St??||&&-1??||&&Boston??||&&MA??||&&US', '-1', '-1', '1??||&&10/07/2020??||&&10/13/2020??||&&0430??||&&0430??||&&1', '2??||&&10/08/2020??||&&10/20/2020??||&&0415??||&&0430??||&&2', '3??||&&10/07/2020??||&&10/28/2020??||&&0345??||&&0430??||&&1', '4??||&&10/15/2020??||&&10/28/2020??||&&0430??||&&0415??||&&2', '5??||&&10/24/2020??||&&-1??||&&0415??||&&0415??||&&2', '6??||&&10/14/2020??||&&10/06/2020??||&&0415??||&&0430??||&&5', '7??||&&10/16/2020??||&&-1??||&&0430??||&&0430??||&&2', '8??||&&10/15/2020??||&&-1??||&&0415??||&&0430??||&&2', '9??||&&10/01/2020??||&&10/07/2020??||&&0430??||&&0430??||&&5', '10??||&&10/23/2020??||&&-1??||&&0430??||&&0430??||&&1', '1??||&&10/15/2020??||&&-1??||&&0430??||&&0430??||&&1', '2??||&&10/08/2020??||&&-1??||&&0445??||&&0430??||&&2', '3??||&&10/08/2020??||&&-1??||&&0445??||&&0430??||&&1', '4??||&&10/23/2020??||&&-1??||&&0430??||&&0430??||&&1', '5??||&&10/15/2020??||&&-1??||&&0415??||&&0430??||&&1', '6??||&&10/10/2020??||&&-1??||&&0430??||&&0430??||&&1', '7??||&&10/09/2020??||&&10/22/2020??||&&0415??||&&0445??||&&1', '8??||&&10/17/2020??||&&10/21/2020??||&&0445??||&&0430??||&&5', '9??||&&10/03/2020??||&&-1??||&&0430??||&&0415??||&&2', '10??||&&10/02/2020??||&&-1??||&&0400??||&&0415??||&&1', '1??||&&jordan??||&&2489127636??||&&1', '2??||&&Jordan Test??||&&9785552222??||&&1', '3??||&&Billy??||&&9785552222??||&&1', '4??||&&Billy??||&&9785552222??||&&1', '5??||&&Jordan Test??||&&2345667??||&&5', '6??||&&yogurt??||&&9785552222??||&&1', '7??||&&jimmy??||&&123??||&&1', '8??||&&fsad??||&&asfd??||&&5', '9??||&&Billy??||&&safd??||&&1', '10??||&&Jordan Halaby??||&&4555431234??||&&2', '1??||&&one', '2??||&&two', '3??||&&three', '4??||&&four', '5??||&&five', '6??||&&six', '7??||&&seven', '8??||&&eight', '9??||&&nine', '-1', 'what are my terms and who is my conditions', 'these are our inspection notes', 'these are my removal notes!!', '', '', '', '', '', 'jhalaby', '76.217.175.77', 1),
(68, 'Missing Location Testing', 'timed', 'yes', 'This catalog is created to test the missing location feature on editing a catalog', '2021-02-10', '0015', '2021-02-27', '0345', '15', '||83||84||85||', 'USD', 'EST', 12, 'yes', '2??||&&566 Main St??||&&Unit 4??||&&Haverhill??||&&HI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '2??||&&02/25/2021??||&&02/28/2021??||&&0315??||&&0245??||&&2', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'None of the above', '', '', '', '', '', '', '', 'jhalaby', '76.217.175.77', 0),
(52, 'school of hard knocks', 'timed', 'no', 'SAFD', '2020-01-08', '0000', '2020-01-23', '0300', '10', '||83||84||', 'ZAR', 'HST', 12, 'yes', '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '2??||&&5270 Mt. Maria??||&&-1??||&&Hubbard Lake??||&&MI??||&&US', '-1', '-1', '-1', '1??||&&01/28/2021??||&&01/31/2021??||&&0030??||&&0015??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&01/06/2021??||&&01/11/2021??||&&0400??||&&0330??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'these are the best terms ever', '', '', '', '', '', '', '', 'jhalaby', '76.217.175.77', 1),
(64, 'Assorted Videos', 'timed', 'no', 'An assortment of videos and DVDs', '2021-01-13', '0415', '2021-01-14', '0415', '20', '||84||83||85||', 'CAD', 'VST', 12, 'no', '2??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&02/26/2021??||&&-1??||&&0330??||&&0315??||&&2', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'You can specify this', '', '', '', '', '', '', '', 'jhalaby', '76.217.175.77', 0),
(65, 'This will be deleted', 'timed', 'no', 'adfs', '2021-01-08', '0415', '2021-01-30', '0400', '20', '||', 'ZAR', 'CST', 12, 'yes', '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1??||&&01/06/2021??||&&-1??||&&0445??||&&0445??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'thanks bro', '', '', '', '', '', '', '', 'jhalaby', '76.217.175.77', 0),
(66, 'Smart Dates', 'timed', 'no', 'whadup', '2021-01-01', '0015', '2021-01-27', '0345', '20', '||83||84||85||', 'USD', 'EST', 45, 'yes', '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&01/06/2021??||&&01/13/2021??||&&0015??||&&0015??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'There is no use', '', '', '', '', '', '', '', 'jhalaby', '76.217.175.77', 1),
(67, 'Test Smart Calendar', 'timed', 'no', 'Test test test', '2021-03-03', '0400', '2021-03-31', '0345', '10', '||', 'USD', 'EST', 17, 'yes', '1??||&&10137 Devonshire Drive??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '0??||&&02/25/2021??||&&03/01/2021??||&&0800??||&&0430??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&04/01/2021??||&&04/13/2021??||&&0330??||&&0845??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'Terms TBD', 'notes', '', '', '', '', '', '', 'DustyCar', '76.217.175.77', 0),
(69, 'Extended Bidding TESTER', 'timed', 'no', 'this is my catalog - deal with it', '2021-02-10', '0030', '2021-02-27', '0430', '10', '||', 'USD', 'EST', 8, 'yes', '1??||&&10137 Devonshire??||&&-1??||&&South Lyon??||&&MI??||&&US', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '0??||&&02/12/2021??||&&??||&&0015??||&&0000??||&&1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'these are my terms - deal with it', '', '', 'yes', 'jump', '7', '7', '', 'jhalaby', '76.217.175.77', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
