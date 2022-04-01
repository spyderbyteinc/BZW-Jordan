-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2021 at 12:36 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
