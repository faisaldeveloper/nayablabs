-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2014 at 08:11 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nayablab`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  `landingpage` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`itemname`, `userid`, `bizrule`, `data`, `landingpage`) VALUES
('Authority', '1', '', 's:0:"";', NULL),
('FrontDesk', '2', '', 's:0:"";', 'site/index'),
('Admin', '3', '', 's:0:"";', 'site/index');

-- --------------------------------------------------------

--
-- Table structure for table `branche`
--

CREATE TABLE IF NOT EXISTS `branche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_address` varchar(255) NOT NULL,
  `branch_phone` varchar(20) NOT NULL,
  `branch_fax` varchar(30) NOT NULL,
  `branch_email` varchar(50) NOT NULL,
  `ntn_no` varchar(20) DEFAULT NULL,
  `gst_no` varchar(20) DEFAULT NULL,
  `restaurant_id` int(11) NOT NULL,
  `active_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `appkey` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `branche`
--

INSERT INTO `branche` (`id`, `branch_address`, `branch_phone`, `branch_fax`, `branch_email`, `ntn_no`, `gst_no`, `restaurant_id`, `active_date`, `expiry_date`, `appkey`) VALUES
(1, 'ABC', '0', '0', 'email@yahoo.com', NULL, NULL, 1, '2012-01-25', '2013-01-25', '¶Îöâqk°¾®DGÆxvÊ4¶(ÆWöó');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=239 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, '---'),
(2, 'Pakistan'),
(3, 'Afghani'),
(4, 'Algeria'),
(6, 'Angola'),
(9, 'Albania'),
(10, 'Argentina'),
(11, 'Armenia'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'British'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(30, 'Brazil'),
(32, 'Brunei'),
(33, 'Bulgaria'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(49, 'Colombia'),
(51, 'Congo'),
(54, 'Costa Rica'),
(55, 'Deutsch'),
(56, 'Croatia (Hrvatska)'),
(57, 'Cuba'),
(58, 'Cyprus'),
(59, 'Czech Republic'),
(60, 'Denmark'),
(63, 'Dominican Republic'),
(64, 'East Timor'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(73, 'Faroe Islands'),
(74, 'Fiji Islands'),
(75, 'Finland'),
(76, 'France'),
(80, 'Gabon'),
(81, 'Gambia, The'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard and McDonald Islands'),
(97, 'Honduras'),
(98, 'Hungary'),
(99, 'Iceland'),
(100, 'INDIA'),
(101, 'Indonesia'),
(102, 'Iran'),
(103, 'Iraq'),
(104, 'Ireland'),
(105, 'Islands (British)'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Korea, South'),
(115, 'Korea, North'),
(116, 'Kuwait'),
(117, 'Kyrgyzstan'),
(118, 'Laos'),
(119, 'Latvia'),
(120, 'Lebanon'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libya'),
(124, 'Liechtenstein'),
(125, 'Lithuania'),
(127, 'Macedonia, Former Yugoslav'),
(128, 'Madagascar'),
(129, 'Malawi'),
(130, 'Malaysia'),
(131, 'Maldives'),
(132, 'Mali'),
(133, 'Malta'),
(135, 'Martinique'),
(136, 'Mauritania'),
(137, 'Mauritius'),
(138, 'Mayotte'),
(139, 'Mexico'),
(140, 'Micronesia'),
(141, 'Moldova'),
(142, 'Monaco'),
(143, 'Mongolia'),
(144, 'Montserrat'),
(145, 'Morocco'),
(146, 'Mozambique'),
(147, 'Myanmar'),
(148, 'Namibia'),
(149, 'Nauru'),
(150, 'Nepal'),
(151, 'Netherlands'),
(153, 'New Caledonia'),
(154, 'New Zealand'),
(155, 'Nicaragua'),
(156, 'Niger'),
(157, 'Nigeria'),
(158, 'Niue'),
(159, 'Norfolk Island'),
(160, 'Palestine'),
(161, 'Norway'),
(162, 'Oman'),
(163, 'Pakistani'),
(165, 'Panama'),
(166, 'Papua new Guinea'),
(167, 'Paraguay'),
(168, 'Peru'),
(169, 'Philippines'),
(171, 'Poland'),
(172, 'Portugal'),
(173, 'Puerto Rico'),
(174, 'Qatar'),
(176, 'Romania'),
(177, 'Russia'),
(178, 'Rwanda'),
(181, 'Saint Lucia'),
(183, 'Saint Vincent '),
(185, 'San Marino'),
(187, 'Saudi Arabia'),
(188, 'Senegal'),
(190, 'Sierra Leone'),
(191, 'Singapore'),
(192, 'Slovakia'),
(193, 'Slovenia'),
(195, 'Somalia'),
(196, 'South Africa'),
(197, 'Spain'),
(198, 'Sri Lanka'),
(199, 'Sudan'),
(202, 'Swaziland'),
(203, 'Sweden'),
(204, 'Switzerland'),
(205, 'Syria'),
(206, 'Taiwan'),
(207, 'Tajikistan'),
(208, 'Tanzania'),
(209, 'Thailand'),
(210, 'Togo'),
(214, 'Tunisia'),
(215, 'Turkey'),
(216, 'Turkmenistan'),
(219, 'Uganda'),
(220, 'Ukraine'),
(221, 'UAE'),
(223, 'USA'),
(225, 'Uruguay'),
(226, 'Uzbekistan'),
(229, 'Venezuela'),
(230, 'Vietnam'),
(234, 'Yemen'),
(235, 'Yugoslavia'),
(236, 'Zambia'),
(237, 'Zimbabwe'),
(238, 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `examination_type`
--

CREATE TABLE IF NOT EXISTS `examination_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `examination_type`
--

INSERT INTO `examination_type` (`id`, `name`) VALUES
(1, 'Physical Examination'),
(2, 'Laboratory Examination');

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE IF NOT EXISTS `ip` (
  `ip` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `entries` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ip`
--

INSERT INTO `ip` (`ip`, `entries`, `wrong`, `status`, `date`) VALUES
('::1', 45, 0, 1, '2014-02-25'),
('192.168.1.6', 2, 0, 1, '2014-01-27'),
('192.168.1.5', 8, 0, 1, '2014-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `itemchildren`
--

CREATE TABLE IF NOT EXISTS `itemchildren` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `itemchildren`
--

INSERT INTO `itemchildren` (`parent`, `child`) VALUES
('Admin', 'SiteViewing');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Authority', 2, NULL, NULL, NULL),
('FrontDesk', 2, '', '', 's:0:"";'),
('Admin', 2, '', '', 's:0:"";'),
('SiteIndex', 0, '', '', 's:0:"";');

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE IF NOT EXISTS `panel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `address` text,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `test_ids` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `urgent_charges` float DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_ids` (`test_ids`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`id`, `name`, `address`, `phone`, `fax`, `email`, `test_ids`, `price`, `discount`, `urgent_charges`, `user_id`, `created_date`, `updated_date`) VALUES
(1, 'OEC', '', '', '', '', '', 2000, 10, 300, 1, NULL, NULL),
(2, 'Medical Examination', '', '', '', '', '', 3000, 15, 400, 1, NULL, NULL),
(3, 'Western Global Services', '', '', '', '', '', 5000, NULL, 500, 1, NULL, NULL),
(4, 'Sinopec', '', '', '', '', '', 4500, NULL, 600, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(50) DEFAULT NULL,
  `patient_type_id` int(11) DEFAULT NULL,
  `referrer_id` int(11) DEFAULT NULL,
  `ref_no` varchar(50) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `father_name` varchar(150) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(10) DEFAULT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `country` int(11) NOT NULL,
  `country_applied_for` int(11) DEFAULT NULL,
  `cnic` varchar(15) DEFAULT NULL,
  `visa_type` varchar(100) DEFAULT NULL,
  `passport_no` varchar(100) DEFAULT NULL,
  `place_of_issue` varchar(150) DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `position_applied_for` varchar(250) DEFAULT NULL,
  `recruiting_agent` varchar(250) DEFAULT NULL,
  `photo_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `panel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country` (`country`),
  KEY `country_applied_for` (`country_applied_for`),
  KEY `panel_id` (`panel_id`),
  KEY `user_id` (`user_id`),
  KEY `referrer_id` (`referrer_id`),
  KEY `patient_type_id` (`patient_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `reg_no`, `patient_type_id`, `referrer_id`, `ref_no`, `name`, `father_name`, `gender`, `age`, `marital_status`, `address`, `phone`, `country`, `country_applied_for`, `cnic`, `visa_type`, `passport_no`, `place_of_issue`, `date_of_issue`, `position_applied_for`, `recruiting_agent`, `photo_file_name`, `panel_id`, `user_id`, `created_date`, `updated_date`) VALUES
(1, '1', NULL, 1, '1-1', 'muhammad fiaz', 'muhammad irfan', '1', '32', '1', 'Mansehra', '03452114551', 1, 114, '', '', 'AP 8919002', 'Mansehra', '0000-00-00', '---', NULL, NULL, 2, 1, '2014-02-20 09:14:40', '2014-02-21 06:15:06'),
(2, '2', NULL, 3, '3-1', 'arshad hussain', 'm bashir', '1', '35', '1', 'Sadhanwati', '03452114551', 1, NULL, '3415254754464', '', '', '', '0000-00-00', '', NULL, '140220184233-arshadhussain.jpg', 3, 1, '2014-02-20 18:42:33', '2014-02-21 15:25:32'),
(3, '3', NULL, 4, '4-1', 'Abdul Rehman Mirza', 'Iftikhar Ahmad Mirza', '1', '25', '1', 'rawalpindi', '03452114551', 1, NULL, '37405-2336061-9', '', '', '', '0000-00-00', '', NULL, '140220205735-AbdulRehmanMirza.jpg', 4, 1, '2014-02-20 19:27:19', '2014-02-20 21:00:34'),
(4, '4', NULL, 1, '1-2', 'ali zubair', 'm khadim', '1', '35', '1', '', '03452114551', 1, NULL, '', '', '', '', '0000-00-00', '', NULL, NULL, 2, 1, '2014-02-21 06:46:44', NULL),
(5, '5', NULL, 1, '1-3', 'khalid hussain', 'khadim hussain', '1', '56', '1', '', '03452114556', 1, NULL, '', '', '', '', '0000-00-00', '', NULL, NULL, 1, 1, '2014-02-21 16:09:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_test_detail`
--

CREATE TABLE IF NOT EXISTS `patient_test_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_main_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `normal_reading` varchar(250) DEFAULT NULL,
  `measured_reading` varchar(250) DEFAULT NULL,
  `remarks` text,
  `test_summary_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `test_summary_id` (`test_summary_id`),
  KEY `test_main_id` (`test_main_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `patient_test_detail`
--

INSERT INTO `patient_test_detail` (`id`, `test_main_id`, `test_id`, `normal_reading`, `measured_reading`, `remarks`, `test_summary_id`, `user_id`, `created_date`, `updated_date`) VALUES
(1, 1, 1, '', '170 cm', '', 1, 1, '2014-02-20 15:54:34', NULL),
(2, 1, 2, '', '60', '', 1, 1, '2014-02-20 15:54:34', NULL),
(3, 2, 3, '', '6/6', '', 1, 1, '2014-02-20 17:22:06', NULL),
(4, 2, 4, '', '6/6', '', 1, 1, '2014-02-20 17:22:06', NULL),
(5, 2, 5, '', 'normal', '', 1, 1, '2014-02-20 17:22:06', NULL),
(6, 3, 6, '', 'normal', '', 1, 1, '2014-02-20 17:22:06', NULL),
(7, 3, 7, '', 'normal', '', 1, 1, '2014-02-20 17:22:06', NULL),
(8, 4, 8, '', 'nil', '', 1, 1, '2014-02-20 17:22:06', NULL),
(9, 4, 9, '', 'nil', '', 1, 1, '2014-02-20 17:22:06', NULL),
(10, 4, 10, '', 'normal', '', 1, 1, '2014-02-20 17:22:06', NULL),
(11, 5, 11, '', '125/80', '', 1, 1, '2014-02-20 17:22:06', NULL),
(12, 5, 12, '', 'S1+S2 Audible', '', 1, 1, '2014-02-20 17:22:06', NULL),
(13, 5, 13, '', 'NAD', '', 1, 1, '2014-02-20 17:22:06', NULL),
(14, 5, 14, '', 'NAD', '', 1, 1, '2014-02-20 17:22:06', NULL),
(15, 5, 15, '', 'NAD', '', 1, 1, '2014-02-20 17:22:06', NULL),
(16, 6, 16, '', 'normal', 'No active lung lesion seen.\r\nboth Hila and Cp angles are normal.\r\nCardiac shadow is normal in size, shape and contour with normal cardic thoracic ratio.\r\nVisualized bones appear normal.\r\nCONCLUSION: Normal Study', 1, 1, '2014-02-20 17:22:06', NULL),
(17, 7, 17, '', 'negative', '', 1, 1, '2014-02-20 17:22:06', NULL),
(18, 7, 18, '', 'negative', '', 1, 1, '2014-02-20 17:22:06', NULL),
(19, 7, 19, '', 'negative', '', 1, 1, '2014-02-20 17:22:07', NULL),
(20, 8, 20, '', '16.5 (Normal)', '', 1, 1, '2014-02-20 17:22:07', NULL),
(21, 8, 21, '', '50.0 (Normal)', '', 1, 1, '2014-02-20 17:22:07', NULL),
(22, 8, 22, '', '"O"', '', 1, 1, '2014-02-20 17:22:07', NULL),
(23, 8, 23, '', 'Positive', '', 1, 1, '2014-02-20 17:22:07', NULL),
(24, 8, 24, '', 'normal', '', 1, 1, '2014-02-20 17:22:07', NULL),
(25, 9, 25, '', 'normal', '', 1, 1, '2014-02-20 17:22:07', NULL),
(26, 9, 26, '', 'normal', '', 1, 1, '2014-02-20 17:22:07', NULL),
(27, 9, 27, '', 'normal', '', 1, 1, '2014-02-20 17:22:07', NULL),
(28, 10, 28, '', 'Non-Reactive', '', 1, 1, '2014-02-20 17:22:07', NULL),
(29, 10, 29, '', 'Non-Reactive', '', 1, 1, '2014-02-20 17:22:07', NULL),
(30, 11, 30, '', 'Non-Reactive', '', 1, 1, '2014-02-20 17:22:07', NULL),
(31, 23, 61, '', '174 cm', '', 2, 1, '2014-02-20 19:08:09', NULL),
(32, 23, 62, '', '67', '', 2, 1, '2014-02-20 19:08:09', NULL),
(33, 24, 63, '', '6/6', '', 2, 1, '2014-02-20 19:08:09', NULL),
(34, 24, 64, '', '6/6', '', 2, 1, '2014-02-20 19:08:09', NULL),
(35, 26, 65, '', '72 / min', '', 2, 1, '2014-02-20 19:08:09', NULL),
(36, 26, 66, '', '120/80', '', 2, 1, '2014-02-20 19:08:09', NULL),
(37, 25, 67, '', 'normal', '', 2, 1, '2014-02-20 19:08:09', NULL),
(38, 25, 68, '', 'normal', '', 2, 1, '2014-02-20 19:08:09', NULL),
(39, 27, 69, '', 'normal', '', 2, 1, '2014-02-20 19:08:09', NULL),
(40, 28, 70, '', 'normal (10 mm/1st hr)', '', 2, 1, '2014-02-20 19:08:09', NULL),
(41, 29, 71, '', 'negative', '', 2, 1, '2014-02-20 19:08:09', NULL),
(42, 29, 72, '', 'negative', '', 2, 1, '2014-02-20 19:08:09', NULL),
(43, 30, 73, '', '"A" Negative', '', 2, 1, '2014-02-20 19:08:09', NULL),
(44, 31, 74, '', 'negative', '', 2, 1, '2014-02-20 19:08:09', NULL),
(45, 32, 75, '', 'nil', '', 2, 1, '2014-02-20 19:08:09', NULL),
(46, 32, 76, '', 'nil', '', 2, 1, '2014-02-20 19:08:09', NULL),
(47, 32, 77, '', 'nil', '', 2, 1, '2014-02-20 19:08:10', NULL),
(48, 33, 78, '', 'Not seen', '', 2, 1, '2014-02-20 19:08:10', NULL),
(49, 33, 79, '', 'Not seen', '', 2, 1, '2014-02-20 19:08:10', NULL),
(50, 33, 80, '', 'nil', '', 2, 1, '2014-02-20 19:08:10', NULL),
(51, 33, 81, '', 'nil', '', 2, 1, '2014-02-20 19:08:10', NULL),
(52, 34, 82, '', 'Typhoid & Cholera Vaccines are administered.', '', 2, 1, '2014-02-20 19:08:10', NULL),
(53, 35, 83, '', 'Nil', '', 2, 1, '2014-02-20 19:08:10', NULL),
(54, 36, 84, '', '169 cm', '', 3, 1, '2014-02-20 19:49:03', NULL),
(55, 36, 85, '', '62', '', 3, 1, '2014-02-20 19:49:03', NULL),
(56, 37, 86, '', '110/80', '', 3, 1, '2014-02-20 19:49:03', NULL),
(57, 37, 87, '', '78 / min', '', 3, 1, '2014-02-20 19:49:03', NULL),
(58, 38, 88, '', '6/6 with glasses', '', 3, 1, '2014-02-20 19:49:03', NULL),
(59, 38, 89, '', '6/6 with glasses', '', 3, 1, '2014-02-20 19:49:04', NULL),
(60, 39, 90, '', '----', '', 3, 1, '2014-02-20 19:50:20', NULL),
(61, 41, 92, '', 'nad', '', 3, 1, '2014-02-20 19:50:20', NULL),
(62, 41, 93, '', '05 mm/1st hr', '', 3, 1, '2014-02-20 19:50:20', NULL),
(63, 41, 94, '', '"B"', '', 3, 1, '2014-02-20 19:50:20', NULL),
(64, 41, 95, '', 'Positive (AB +ve)', '', 3, 1, '2014-02-20 19:50:20', NULL),
(65, 42, 96, '', 'within normal limits', '', 3, 1, '2014-02-20 19:50:20', NULL),
(66, 43, 97, '', 'nil', '', 3, 1, '2014-02-20 19:50:47', NULL),
(67, 43, 98, '', 'nil', '', 3, 1, '2014-02-20 19:50:47', NULL),
(68, 43, 99, '', 'nil', '', 3, 1, '2014-02-20 19:50:47', NULL),
(69, 43, 100, '', 'nothing significant', '', 3, 1, '2014-02-20 19:50:47', NULL),
(70, 40, 91, '', 'normal', 'There are five lumbar type vertebral bodies.\r\nThe spinal alignment, vertebral body heights and disk spaces are within normal limits.\r\nNo acute fracture or spondylolisthesis.\r\nThe sacroiliac joints are intact bilaterally.\r\nIMPRESSION: Normal Study.', 3, 1, '2014-02-20 20:48:16', NULL),
(71, 43, 101, '', 'remarks', '', 3, 1, '2014-02-20 20:54:18', NULL),
(72, 12, 31, '', '134 cm', '', 4, 1, '2014-02-21 06:47:49', NULL),
(73, 12, 32, '', '44 kg', '', 4, 1, '2014-02-21 06:47:50', NULL),
(74, 17, 46, '', 'test', 'test.\r\ntest2', 4, 1, '2014-02-21 06:51:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_test_summary`
--

CREATE TABLE IF NOT EXISTS `patient_test_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examination_date` date NOT NULL,
  `reporting_date` datetime DEFAULT NULL,
  `klt_no` varchar(30) DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `panel_id` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `discount_percent` float DEFAULT NULL,
  `urgent_charges` float DEFAULT NULL,
  `payment` float NOT NULL DEFAULT '0',
  `balance` float NOT NULL DEFAULT '0',
  `remarks` text,
  `patient_test_status` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`),
  KEY `panel_id` (`panel_id`),
  KEY `user_id` (`user_id`),
  KEY `panel_id_2` (`panel_id`),
  KEY `patient_id_2` (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `patient_test_summary`
--

INSERT INTO `patient_test_summary` (`id`, `examination_date`, `reporting_date`, `klt_no`, `patient_id`, `panel_id`, `price`, `discount`, `discount_percent`, `urgent_charges`, `payment`, `balance`, `remarks`, `patient_test_status`, `user_id`, `created_date`, `updated_date`) VALUES
(1, '2014-02-20', '2014-02-25 00:00:00', '91200034', 1, 2, 3000, 200, 10, 0, 1800, 0, '', 1, 1, '2014-02-20 09:14:40', '2014-02-21 06:15:06'),
(2, '2014-02-20', '2014-02-26 00:00:00', '', 2, 3, 5000, 0, 0, 500, 5500, 0, '', 2, 1, '2014-02-20 18:42:33', '2014-02-21 15:25:32'),
(3, '2014-02-20', '2014-02-24 00:00:00', '', 3, 4, 4500, 225, 5.55556, 0, 4275, 0, 'FIT', 1, 1, '2014-02-20 19:27:19', '2014-02-20 21:00:34'),
(4, '2014-02-21', '2014-02-21 00:00:00', '', 4, 2, 3000, 0, 0, 0, 3000, 0, '', 1, 1, '2014-02-21 06:46:44', NULL),
(5, '2014-02-21', '2014-02-21 00:00:00', '', 5, 1, 2000, 200, 10, 500, 2300, 0, '', 1, 1, '2014-02-21 16:09:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_type`
--

CREATE TABLE IF NOT EXISTS `patient_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `patient_type`
--

INSERT INTO `patient_type` (`id`, `name`) VALUES
(1, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `referrer`
--

CREATE TABLE IF NOT EXISTS `referrer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `address` text,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `referrer`
--

INSERT INTO `referrer` (`id`, `name`, `address`, `phone`, `fax`, `email`, `user_id`, `created_date`, `updated_date`) VALUES
(1, 'Self', 'N/A', '', '', '', 1, NULL, NULL),
(2, 'Saga International', 'Blue area, Islamabad', '03455445117', '', '', 1, NULL, NULL),
(3, 'Western Global Services (Pvt) LTD', '', '', '', '', 1, NULL, NULL),
(4, 'Sinopec InterPetroleum', '', '', '', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `value` varchar(50) NOT NULL,
  `text` varchar(50) NOT NULL,
  `fieldtype` varchar(15) DEFAULT NULL,
  `htmlcode` text,
  `settingsection_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unit` (`unit`),
  KEY `settings_ibfk_1` (`settingsection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `unit`, `description`, `value`, `text`, `fieldtype`, `htmlcode`, `settingsection_id`) VALUES
(1, 'taxcontrol', 'Tax Controll', '2', '2', NULL, NULL, 10),
(2, 'lang1', 'Language Selection Through Model', '5', 'B.B.Q', 'dropDownList', '{"data":{"model":"Menu","condition":"","id":"id","name":"name"},"html_options":[]}', 10),
(3, 'language', 'Language Selection Through Code', 'en', 'English', 'dropDownCode', '{"data":{"ar":"Arabic","en":"English"},"html_options":[]} ', 10),
(4, 'lang3', 'Language Selection Through Text Box', 'as', 'as', 'textField', '{"html_options":{"size":10,"maxlength":2}} ', 10),
(5, 'order_detail', 'KOT Detail Allow', '0', 'No', 'dropDownCode', '{"data":{"1":"Yes","0":"No"},"html_options":[]}', 1),
(6, 'closetime', 'Closing Time(00-23)', '03', '03', 'textField', '{"html_options":{"size":10,"maxlength":2}} ', 1),
(7, 'gender', 'Gender Types', '1', 'Male', 'dropDownCode', '{"data":{"1":"Male","2":"Female"},"html_options":[]}', 1),
(8, 'currency', 'Currency Unit', 'Rs.', 'Rs.', 'dropDownCode', '{"data":{"Rs.":"PKR","$":"USD"},"html_options":[]}', 1),
(9, 'captcha', 'Display Captcha at Login Form', '0', 'No', 'dropDownCode', '{"data":{"1":"Yes","0":"No"},"html_options":[]}', 1),
(10, 'defaultgst', 'Gst Default Option', '1', 'Yes', 'dropDownCode', '{"data":{"1":"Yes","0":"No"},"html_options":[]}', 1),
(11, 'gst', 'GST Value', '16', '16', 'textField', '{"html_options":{"size":10,"maxlength":2}} ', 1),
(12, 'examinationtype', 'examination type ', '1', 'Laboratory', 'dropDownCode', '{"data":{"1":"Laboratory","0":"Physical"},"html_options":[]}', 1),
(13, 'patient_type', 'patient types', '1', 'Regular', 'dropDownCode', '{"data":{"1":"Regular","2":"Special"},"html_options":[]}', 1),
(14, 'marital_status', 'Marital Status of the Patient', '1', 'Single', 'dropDownCode', '{"data":{"1":"---","2":"Single","3":"Married","4":"Divorced","5":"Widowed"},"html_options":[]}', 1),
(15, 'visa_type', 'Visa Type', '1', 'Work', 'dropDownCode', '{"data":{"":"Select","1":"Work","2":"Student"},"html_options":[]}', 1),
(16, 'physician', 'Doctor name', 'Dr. Mohammad Munir', '', NULL, NULL, 1),
(17, 'patient_test_status', 'test status of patient', '1', 'Normal', 'dropDownCode', '{"data":{"1":"Normal","2":"Urgent"},"html_options":[]}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settingsection`
--

CREATE TABLE IF NOT EXISTS `settingsection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `settingsection`
--

INSERT INTO `settingsection` (`id`, `name`) VALUES
(1, 'Setting 1'),
(10, 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `main_id` int(11) DEFAULT NULL,
  `panel_id` int(11) DEFAULT NULL,
  `normal_reading` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `main_id` (`main_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `main_id`, `panel_id`, `normal_reading`, `user_id`, `created_date`, `updated_date`) VALUES
(1, 'Height', 1, 1, '', 1, NULL, NULL),
(2, 'Weight', 1, 1, '', 1, NULL, NULL),
(3, 'Rt Eye', 2, 1, '', 1, NULL, NULL),
(4, 'Lt Eye', 2, 1, '', 1, NULL, NULL),
(5, 'Colour Vision', 2, 1, '', 1, NULL, NULL),
(6, 'Rt - Ear (Hearing)', 3, 1, '', 1, NULL, NULL),
(7, 'Lt - Ear (Hearing)', 3, 1, '', 1, NULL, NULL),
(8, 'Arms/Hands (Rt / Lt)', 4, 1, '', 1, NULL, NULL),
(9, 'Legs / Feet (Rt / Lt)', 4, 1, '', 1, NULL, NULL),
(10, 'Waist', 4, 1, '', 1, NULL, NULL),
(11, 'Blood Pressure', 5, 1, '', 1, NULL, NULL),
(12, 'Heart', 5, 1, '', 1, NULL, NULL),
(13, 'Respiratory (Lungs)', 5, 1, '', 1, NULL, NULL),
(14, 'Abdomen', 5, 1, '', 1, NULL, NULL),
(15, 'CNS (Mental illness)', 5, 1, '', 1, NULL, NULL),
(16, 'Chest X-RAY PA view', 6, 1, '', 1, NULL, NULL),
(17, 'Urine Glucose', 7, 1, '', 1, NULL, NULL),
(18, 'Urine Protein / Albumin', 7, 1, '', 1, NULL, NULL),
(19, 'Blood in Urine', 7, 1, '', 1, NULL, NULL),
(20, 'Hemoglobin', 8, 1, '', 1, NULL, NULL),
(21, 'Hematocrit', 8, 1, '', 1, NULL, NULL),
(22, 'ABO', 8, 1, '', 1, NULL, NULL),
(23, 'Rh Factor', 8, 1, '', 1, NULL, NULL),
(24, 'Cholesterol', 8, 1, '', 1, NULL, NULL),
(25, 'Serum GPT', 9, 1, '', 1, NULL, NULL),
(26, 'Serum GOT', 9, 1, '', 1, NULL, NULL),
(27, 'VDRL/TPHA', 9, 1, '', 1, NULL, NULL),
(28, 'Hepatitis B Virus (HBsAg)', 10, 1, '', 1, NULL, NULL),
(29, 'Hepatitis C Virus (Anti HCV)', 10, 1, '', 1, NULL, NULL),
(30, 'HIV / AIDS Antibody I/II', 11, 1, '', 1, NULL, NULL),
(31, 'Height', 12, 2, '', 1, NULL, NULL),
(32, 'Weight', 12, 2, '', 1, NULL, NULL),
(33, 'Rt Eye', 13, 2, '', 1, NULL, NULL),
(34, 'Lt Eye', 13, 2, '', 1, NULL, NULL),
(35, 'Colour Vision', 13, 2, '', 1, NULL, NULL),
(36, 'Rt - Ear (Hearing)', 14, 2, '', 1, NULL, NULL),
(37, 'Lt - Ear (Hearing)', 14, 2, '', 1, NULL, NULL),
(38, 'Arms/Hands (Rt / Lt)', 15, 2, '', 1, NULL, NULL),
(39, 'Legs / Feet (Rt / Lt)', 15, 2, '', 1, NULL, NULL),
(40, 'Waist', 15, 2, '', 1, NULL, NULL),
(41, 'Blood Pressure', 16, 2, '', 1, NULL, NULL),
(42, 'Heart', 16, 2, '', 1, NULL, NULL),
(43, 'Respiratory (Lungs)', 16, 2, '', 1, NULL, NULL),
(44, 'Abdomen', 16, 2, '', 1, NULL, NULL),
(45, 'CNS (Mental illness)', 16, 2, '', 1, NULL, NULL),
(46, 'Chest X-RAY PA view', 17, 2, '', 1, NULL, NULL),
(47, 'Urine Glucose', 18, 2, '', 1, NULL, NULL),
(48, 'Urine Protine / Albumin', 18, 2, '', 1, NULL, NULL),
(49, 'Blood in Urine', 18, 2, '', 1, NULL, NULL),
(50, 'Hemoglobin', 19, 2, '', 1, NULL, NULL),
(51, 'Hematocrit', 19, 2, '', 1, NULL, NULL),
(52, 'ABO', 19, 2, '', 1, NULL, NULL),
(53, 'Rh Factor', 19, 2, '', 1, NULL, NULL),
(54, 'Cholesterol', 19, 2, '', 1, NULL, NULL),
(55, 'Serum GPT', 20, 2, '', 1, NULL, NULL),
(56, 'Serum GOT', 20, 2, '', 1, NULL, NULL),
(57, 'VDRL/TPHA', 20, 2, '', 1, NULL, NULL),
(58, 'Hepatitus B Virus (HBsAg)', 21, 2, '', 1, NULL, NULL),
(59, 'Hepatitus C Virus (Anti HCV)', 21, 2, '', 1, NULL, NULL),
(60, 'HIV / AIDS Antibody I/II', 22, 2, '', 1, NULL, NULL),
(61, 'Height', 23, 3, '', 1, NULL, NULL),
(62, 'Weight', 23, 3, '', 1, NULL, NULL),
(63, 'Vision (Rt Eye)', 24, 3, '', 1, NULL, NULL),
(64, 'Vision (Lt Eye)', 24, 3, '', 1, NULL, NULL),
(65, 'Pulse', 26, 3, '', 1, NULL, NULL),
(66, 'Blood Pressure', 26, 3, '', 1, NULL, NULL),
(67, 'Hearing (Rt Ear)', 25, 3, '', 1, NULL, NULL),
(68, 'Hearing (Lt Ear)', 25, 3, '', 1, NULL, NULL),
(69, 'Chest X-RAY', 27, 3, '', 1, NULL, NULL),
(70, 'Blood CP & ESR', 28, 3, '', 1, NULL, NULL),
(71, 'Hepatitis "B" (By Kit Method)', 29, 3, '', 1, NULL, NULL),
(72, 'Hepatitis "C" (By Kit Method)', 29, 3, '', 1, NULL, NULL),
(73, 'Blood Group', 30, 3, '', 1, NULL, NULL),
(74, 'VIAG', 31, 3, '', 1, NULL, NULL),
(75, 'Sugar', 32, 3, '', 1, NULL, NULL),
(76, 'Protine', 32, 3, '', 1, NULL, NULL),
(77, 'Blood', 32, 3, '', 1, NULL, NULL),
(78, 'Ova', 33, 3, '', 1, NULL, NULL),
(79, 'Cyst', 33, 3, '', 1, NULL, NULL),
(80, 'Blood', 33, 3, '', 1, NULL, NULL),
(81, 'Mucus', 33, 3, '', 1, NULL, NULL),
(82, 'Vacination', 34, 3, '', 1, NULL, NULL),
(83, 'Remarks', 35, 3, '', 1, NULL, NULL),
(84, 'Height', 36, 4, '', 1, NULL, NULL),
(85, 'Weight', 36, 4, '', 1, NULL, NULL),
(86, 'Blood Pressure', 37, 4, '', 1, NULL, NULL),
(87, 'Pulse', 37, 4, '', 1, NULL, NULL),
(88, 'Vision (Rt Eye)', 38, 4, '', 1, NULL, NULL),
(89, 'Vision (Lt Eye)', 38, 4, '', 1, NULL, NULL),
(90, 'Other', 39, 4, '', 1, NULL, NULL),
(91, 'X-Ray Lumbar Spine', 40, 4, '', 1, NULL, NULL),
(92, 'Full Blood Count', 41, 4, '', 1, NULL, NULL),
(93, 'ESR', 41, 4, '', 1, NULL, NULL),
(94, 'Blood Group', 41, 4, '', 1, NULL, NULL),
(95, 'Rh Factor', 41, 4, '', 1, NULL, NULL),
(96, 'ECG', 42, 4, '', 1, NULL, NULL),
(97, 'Glucose', 43, 4, '', 1, NULL, NULL),
(98, 'Protine', 43, 4, '', 1, NULL, NULL),
(99, 'Blood', 43, 4, '', 1, NULL, NULL),
(100, 'Other Findings', 43, 4, '', 1, NULL, NULL),
(101, 'Remarks', 43, 4, '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_main`
--

CREATE TABLE IF NOT EXISTS `test_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `examination_type_id` int(11) NOT NULL,
  `panel_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `examination_type_id` (`examination_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `test_main`
--

INSERT INTO `test_main` (`id`, `name`, `examination_type_id`, `panel_id`) VALUES
(1, 'Physical', 1, 1),
(2, 'Eye', 1, 1),
(3, 'Ear', 1, 1),
(4, 'Physical Disabilities', 1, 1),
(5, 'Systemic Examination', 1, 1),
(6, 'Chest X-Ray PA', 1, 1),
(7, 'Urinalysis', 2, 1),
(8, 'Blood', 2, 1),
(9, 'Liver Function Test', 2, 1),
(10, 'Elisa', 2, 1),
(11, 'HIV / AIDS', 2, 1),
(12, 'Physical', 1, 2),
(13, 'Eye', 1, 2),
(14, 'Ear', 1, 2),
(15, 'Physical Disabilities', 1, 2),
(16, 'Systemic Examination', 1, 2),
(17, 'Chest X-Ray PA', 1, 2),
(18, 'Urinalysis', 2, 2),
(19, 'Blood', 2, 2),
(20, 'Liver Function Test', 2, 2),
(21, 'Elisa', 2, 2),
(22, 'HIV / AIDS', 2, 2),
(23, 'Physical', 1, 3),
(24, 'Eye', 1, 3),
(25, 'Ear', 1, 3),
(26, 'Systemic Examination', 1, 3),
(27, 'X-RAY', 1, 3),
(28, 'Blood', 2, 3),
(29, 'Elisa', 2, 3),
(30, 'Blood Group', 2, 3),
(31, 'VIAG', 2, 3),
(32, 'Urine (R/E)', 2, 3),
(33, 'Stool (R/E)', 2, 3),
(34, 'Vacination', 2, 3),
(35, 'Remarks', 2, 3),
(36, 'Physical', 1, 4),
(37, 'Systemic Examination', 1, 4),
(38, 'Eye', 1, 4),
(39, 'Other', 1, 4),
(40, 'X-RAY', 1, 4),
(41, 'Blood', 2, 4),
(42, 'Cardiac', 2, 4),
(43, 'Urine', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `outlet_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `store_id`, `outlet_id`, `section_id`) VALUES
(1, 'imdad', 'admin', 'admin', NULL, NULL, NULL),
(2, 'Front Desk', 'frontoffice', 'frontoffice', 1, 1, NULL),
(3, 'Manager', 'backoffice', 'backoffice', 1, 1, NULL),
(4, 'Zahid Hussain', 'zahid', '123', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`country`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`country_applied_for`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `patient_ibfk_3` FOREIGN KEY (`panel_id`) REFERENCES `panel` (`id`),
  ADD CONSTRAINT `patient_ibfk_5` FOREIGN KEY (`referrer_id`) REFERENCES `referrer` (`id`);

--
-- Constraints for table `patient_test_detail`
--
ALTER TABLE `patient_test_detail`
  ADD CONSTRAINT `patient_test_detail_ibfk_4` FOREIGN KEY (`test_summary_id`) REFERENCES `patient_test_summary` (`id`),
  ADD CONSTRAINT `patient_test_detail_ibfk_5` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`),
  ADD CONSTRAINT `patient_test_detail_ibfk_6` FOREIGN KEY (`test_main_id`) REFERENCES `test_main` (`id`);

--
-- Constraints for table `patient_test_summary`
--
ALTER TABLE `patient_test_summary`
  ADD CONSTRAINT `patient_test_summary_ibfk_2` FOREIGN KEY (`panel_id`) REFERENCES `panel` (`id`),
  ADD CONSTRAINT `patient_test_summary_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`settingsection_id`) REFERENCES `settingsection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`main_id`) REFERENCES `test_main` (`id`);

--
-- Constraints for table `test_main`
--
ALTER TABLE `test_main`
  ADD CONSTRAINT `test_main_ibfk_1` FOREIGN KEY (`examination_type_id`) REFERENCES `examination_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
