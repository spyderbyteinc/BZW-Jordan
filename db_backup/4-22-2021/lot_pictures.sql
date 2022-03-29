-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2021 at 03:39 PM
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
(149, 35, 19, '1592086670voted.jpg'),
(150, 35, 20, '1592415559img026.jpg'),
(151, 35, 20, '1592415559profile.jpg'),
(152, 35, 20, '1592415560round2.png'),
(153, 35, 20, '1592415560jordan.jpeg'),
(154, 35, 20, '1592415561Sketchpad.png'),
(155, 42, 28, '1594322243profile.jpg'),
(156, 42, 28, '1594322244round2.png'),
(157, 42, 28, '1594322245Sketchpad.png'),
(158, 42, 28, '1594322246jordan.jpeg'),
(159, 42, 28, '1594322247spyro.PNG'),
(160, 42, 28, '1594322253wallpaper1.jpg'),
(161, 42, 28, '1594322259voted.jpg'),
(162, 42, 28, '1594404525haters.jpg'),
(163, 42, 28, '1594404527img026.jpg'),
(164, 42, 28, '1594404528profile.jpg'),
(165, 42, 28, '1594404528round2.png'),
(166, 42, 28, '1594404528jordan.jpeg'),
(167, 42, 28, '1594404529Sketchpad.png'),
(168, 42, 28, '1594404531spyro.PNG'),
(169, 42, 28, '1594404532wallpaper1.jpg'),
(170, 42, 28, '1594404536voted.jpg'),
(171, 42, 25, '1594568746spyro.PNG'),
(174, 44, 28, '1596569207profile.jpg'),
(173, 42, 25, '1594568752wallpaper1.jpg'),
(175, 42, 28, '1596569245Sketchpad.png'),
(176, 45, 29, '1601159968haters.jpg'),
(177, 45, 29, '1601159970img026.jpg'),
(178, 45, 29, '1601159971profile.jpg'),
(179, 45, 29, '1601159972round2.png'),
(180, 45, 29, '1601159976Sketchpad.png'),
(181, 45, 29, '1601159980jordan.jpeg'),
(182, 45, 29, '1601159988spyro.PNG'),
(183, 45, 29, '1601159994wallpaper1.jpg'),
(185, 46, 30, '160131789220190714_101831 (1).jpg'),
(186, 46, 30, '160131789320190708_162007 (1).jpg'),
(187, 46, 30, '16013178952019071395132627(1) (1).jpg'),
(188, 46, 30, '16013178972019071395132635 (1).jpg'),
(189, 46, 30, '16013178992019071395132655.jpg'),
(190, 46, 30, '160131790120190715_155305.jpg'),
(191, 46, 31, '1601318629SA_PROFILE_CACHE.jpg'),
(192, 46, 31, '160131906920191207_103712.jpg'),
(193, 46, 31, '160131907120191207_103703.jpg'),
(194, 46, 31, '160131910520191207_103721 (1).jpg'),
(195, 46, 31, '160131910520191207_103730.jpg'),
(196, 62, 34, '16041741119073273.jpg'),
(197, 62, 34, '1604174322Apples-in-a-basket.jpg'),
(198, 62, 34, '160417433735803125-organic-apples-in-basket-in-summer-grass-fresh-apples-in-nature.jpg'),
(199, 62, 35, '16041751292020-Chevrolet-Corvette-C8-Stingray-Coupe-Z51-Real-World-July-2019-Exterior-006-720x340.jpg'),
(200, 62, 35, '1604175136chevrolet-corvette-c8-rapid-blue.jpg'),
(201, 62, 35, '1604175143rapid-blue-carlisle-2019-d-low-res.jpg'),
(202, 52, 32, '1604525821haters.jpg'),
(203, 52, 32, '1604525822img026.jpg'),
(204, 52, 32, '1604525823birthday.jpg'),
(205, 52, 32, '1604525945jordan.jpeg'),
(206, 52, 32, '1604526112profile.jpg'),
(207, 52, 33, '1605556739birthday.jpg'),
(208, 52, 33, '1605556793profile.jpg'),
(209, 52, 33, '1605556813voted.jpg'),
(210, 52, 33, '16055570102016-05-13 203345-2070399.JPG'),
(211, 52, 33, '16055570132016-03-11 164905-2355092.PNG'),
(212, 52, 33, '16055570132016-03-14 100450-1464841.PNG'),
(213, 52, 33, '16055570162016-03-21 210154-2319626.JPG'),
(214, 52, 33, '16055570182016-03-21 210212-2241663.JPG'),
(215, 52, 33, '16055570192016-04-03 174746-152091.PNG'),
(216, 52, 33, '16055570192016-03-23 181243-947736.PNG'),
(217, 52, 33, '16055570202016-04-07 193344-618842.PNG'),
(218, 52, 33, '16055570252016-05-09 070659-4408424.JPG'),
(219, 63, 38, '160572292320201013_123908.jpg'),
(220, 63, 38, '160572296620201013_122944.jpg'),
(223, 63, 38, '160572311220201013_122917.jpg'),
(224, 63, 38, '160572311420201013_122921.jpg'),
(225, 63, 38, '160572311920201013_122923.jpg'),
(226, 52, 32, '1606091736profile.jpg'),
(227, 52, 32, '1606091739jordan.jpeg'),
(228, 52, 32, '1606091739round2.png'),
(229, 52, 32, '1606091739Sketchpad.png'),
(230, 52, 32, '1606091741spyro.PNG'),
(231, 52, 32, '1606091742wallpaper1.jpg'),
(232, 52, 32, '1606091746voted.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
