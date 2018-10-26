-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2018 at 05:05 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_pharmcy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `sb_ci_sessions`
--

CREATE TABLE IF NOT EXISTS `sb_ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sb_ci_sessions`
--

INSERT INTO `sb_ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('e23e35b4e8d5c4b6275778116fc11f6830445404', '103.47.44.159', 1519822110, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393832323038303b757365725f69647c693a3131313b656d61696c7c733a32333a2270617469656e7431406d61696c696e61746f722e636f6d223b757365725f6e616d657c733a31373a2270617469656e74312070617469656e7431223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a313b69735f61646d696e7c623a303b6d656d6265725f747970657c733a373a2250617469656e74223b706172656e745f757365725f69647c733a333a22313037223b),
('80162c2e44fc5b40e81b4295d7d477dadd40289a', '23.99.101.118', 1519822085, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393832323038353b),
('c79fc86740d02b57005c13e94560a17861983129', '103.47.46.90', 1519822145, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393832323132343b757365725f69647c693a3130373b656d61696c7c733a32313a22737461666631406d61696c696e61746f722e636f6d223b757365725f6e616d657c733a31333a2273746166663120737461666631223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a313b69735f61646d696e7c623a303b6d656d6265725f747970657c733a383a22456d706c6f796565223b706172656e745f757365725f69647c733a313a2230223b),
('4fdc60cc84277642a5c9815cf96653bf0dc033cd', '103.47.46.90', 1519822612, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393832323331363b757365725f69647c693a3131313b656d61696c7c733a32333a2270617469656e7431406d61696c696e61746f722e636f6d223b757365725f6e616d657c733a31373a2270617469656e74312070617469656e7431223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a313b69735f61646d696e7c623a303b6d656d6265725f747970657c733a373a2250617469656e74223b706172656e745f757365725f69647c733a333a22313037223b),
('41f79299cddb4e7eeeb297a86de4a4c3438d4782', '103.47.46.90', 1519823013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393832323834393b757365725f69647c693a3131313b656d61696c7c733a32333a2270617469656e7431406d61696c696e61746f722e636f6d223b757365725f6e616d657c733a31373a2270617469656e74312070617469656e7431223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a313b69735f61646d696e7c623a303b6d656d6265725f747970657c733a373a2250617469656e74223b706172656e745f757365725f69647c733a333a22313037223b),
('8acd8476751d592e74288021c20776adca202ab5', '103.47.46.90', 1519822664, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393832323632313b757365725f69647c693a3131313b656d61696c7c733a32333a2270617469656e7431406d61696c696e61746f722e636f6d223b757365725f6e616d657c733a31373a2270617469656e74312070617469656e7431223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a313b69735f61646d696e7c623a303b6d656d6265725f747970657c733a373a2250617469656e74223b706172656e745f757365725f69647c733a333a22313037223b),
('1b2d0510542359aacf41442c0426873f583702cd', '103.47.46.90', 1519824204, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393832343138393b757365725f69647c693a3131313b656d61696c7c733a32333a2270617469656e7431406d61696c696e61746f722e636f6d223b757365725f6e616d657c733a31373a2270617469656e74312070617469656e7431223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a313b69735f61646d696e7c623a303b6d656d6265725f747970657c733a373a2250617469656e74223b706172656e745f757365725f69647c733a333a22313037223b),
('7b9650b033fda9e4489f085f10495da554b9d928', '103.47.46.90', 1519826098, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393832353739383b757365725f69647c693a3131313b656d61696c7c733a32333a2270617469656e7431406d61696c696e61746f722e636f6d223b757365725f6e616d657c733a31373a2270617469656e74312070617469656e7431223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a313b69735f61646d696e7c623a303b6d656d6265725f747970657c733a373a2250617469656e74223b706172656e745f757365725f69647c733a333a22313037223b),
('b3b9bce415f800c6bd0df00f28336959e868b7b8', '103.47.46.90', 1519826225, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393832363132303b757365725f69647c693a3131313b656d61696c7c733a32333a2270617469656e7431406d61696c696e61746f722e636f6d223b757365725f6e616d657c733a31373a2270617469656e74312070617469656e7431223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a313b69735f61646d696e7c623a303b6d656d6265725f747970657c733a373a2250617469656e74223b706172656e745f757365725f69647c733a333a22313037223b),
('6c90bf7fe7af3727061e2d29659d3d626a679a21', '103.47.46.90', 1519826105, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393832363039393b757365725f69647c693a3131313b656d61696c7c733a32333a2270617469656e7431406d61696c696e61746f722e636f6d223b757365725f6e616d657c733a31373a2270617469656e74312070617469656e7431223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a313b69735f61646d696e7c623a303b6d656d6265725f747970657c733a373a2250617469656e74223b706172656e745f757365725f69647c733a333a22313037223b),
('2d87db9bfb5a51e08abd7e4feed17d713285054f', '103.47.46.90', 1519826166, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393832363135393b75726c7c733a35383a22687474703a2f2f64696e6573686d697474616c70726f6a656374732e636f2e756b2f506861726d6163792f6164646d796d656469636174696f6e223b757365725f69647c693a3131313b656d61696c7c733a32333a2270617469656e7431406d61696c696e61746f722e636f6d223b757365725f6e616d657c733a31373a2270617469656e74312070617469656e7431223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a313b69735f61646d696e7c623a303b6d656d6265725f747970657c733a373a2250617469656e74223b706172656e745f757365725f69647c733a333a22313037223b),
('e97c05c8b72e2e4d11724f80975adbadb69f74b3', '109.150.6.4', 1519900660, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393930303338333b757365725f69647c693a3130373b656d61696c7c733a32313a22737461666631406d61696c696e61746f722e636f6d223b757365725f6e616d657c733a31333a2273746166663120737461666631223b6c6f676765645f696e7c623a313b69735f636f6e6669726d65647c623a313b69735f61646d696e7c623a303b6d656d6265725f747970657c733a383a22456d706c6f796565223b706172656e745f757365725f69647c733a313a2230223b),
('8c1e9103fec6a0189734112364263d96df592138', '103.47.46.73', 1519900392, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393930303339323b),
('db50f3a1a4f60d7356fef39d488123d771165955', '109.150.6.4', 1519900686, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393930303638363b),
('b153528010cb0dbaeac285cd6bf803f5e760e751', '109.150.6.4', 1520164285, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303136333939303b75726c7c733a35323a22687474703a2f2f64696e6573686d697474616c70726f6a656374732e636f2e756b2f506861726d6163792f64617368626f617264223b),
('df38570200a919bd92374d3e42523d3589c8d324', '109.150.6.4', 1520164403, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303136343332363b75726c7c733a35323a22687474703a2f2f64696e6573686d697474616c70726f6a656374732e636f2e756b2f506861726d6163792f64617368626f617264223b);

-- --------------------------------------------------------

--
-- Table structure for table `sb_medication`
--

CREATE TABLE IF NOT EXISTS `sb_medication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `medication_id` int(11) NOT NULL,
  `medication_name` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `dosage` varchar(100) NOT NULL,
  `time_duration` varchar(100) NOT NULL,
  `use_of_direction` varchar(500) NOT NULL,
  `shipping_method` int(11) NOT NULL,
  `pickup_date` datetime NOT NULL,
  `is_deliever_soon` int(11) NOT NULL,
  `managed_repeat` int(11) NOT NULL,
  `medication_status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `sb_medication`
--

INSERT INTO `sb_medication` (`id`, `patient_id`, `medication_id`, `medication_name`, `quantity`, `dosage`, `time_duration`, `use_of_direction`, `shipping_method`, `pickup_date`, `is_deliever_soon`, `managed_repeat`, `medication_status`, `create_date`, `modified_date`) VALUES
(3, 111, 0, 'Medication1', '40', '4', '45', 'test', 1, '2018-01-31 00:00:00', 1, 0, 2, '2018-01-12 08:18:22', '2018-01-12 13:18:22'),
(4, 111, 0, 'Medication3', '22', '22', '22', 'test', 1, '2018-01-17 00:00:00', 1, 1, 0, '2018-01-12 08:18:52', '2018-01-12 13:18:52'),
(5, 111, 0, 'medication4', '3', '33', '33', 'test', 2, '0000-00-00 00:00:00', 0, 1, 4, '2018-01-12 08:31:17', '2018-01-12 13:31:17'),
(6, 111, 0, 'Medication4', '44', '44', '45', 'test', 2, '1969-12-31 19:00:00', 0, 0, 0, '2018-01-12 08:31:34', '2018-01-12 13:31:34'),
(7, 111, 0, 'Medication5', '33', '33', '33', 'tst', 1, '2018-01-17 00:00:00', 0, 0, 0, '2018-01-12 08:34:04', '2018-01-12 13:34:04'),
(8, 111, 0, 'Medication6', '88', '12', '45', 'test', 1, '2018-01-31 00:00:00', 1, 1, 4, '2018-01-15 04:24:00', '2018-01-15 09:24:00'),
(9, 111, 0, 'Medication7', '22', '2', '45', 'test', 1, '2018-01-31 00:00:00', 0, 1, 3, '2018-01-15 04:24:29', '2018-01-15 09:24:29'),
(10, 111, 0, 'New medication', '11', '11', '45', 'test', 2, '2018-01-29 00:00:00', 0, 0, 0, '2018-01-29 03:22:32', '2018-01-29 08:22:32'),
(11, 111, 0, 'medication222', '40', '10', '20 days', 'use of direction', 1, '2018-01-30 00:00:00', 1, 0, 0, '2018-01-29 03:52:45', '2018-01-29 08:52:45'),
(12, 111, 0, 'medication333', '22', '20', '20 days', 'test', 2, '2018-01-29 00:00:00', 0, 0, 0, '2018-01-29 04:12:20', '2018-01-29 09:12:20'),
(13, 111, 0, 'medication3331', '20', '12', '20 days', 'test', 1, '2018-01-31 00:00:00', 1, 0, 0, '2018-01-29 04:26:40', '2018-01-29 09:26:40'),
(14, 111, 0, 'medication newww', '12', '22', '20 days', 'test', 2, '2018-01-29 00:00:00', 0, 0, 0, '2018-01-29 04:33:44', '2018-01-29 09:33:44'),
(15, 111, 0, 'medication newww', '12', '22', '20 days', 'test', 2, '2018-01-29 00:00:00', 0, 0, 0, '2018-01-29 04:33:53', '2018-01-29 09:33:53'),
(16, 111, 0, 'test medication', '1', '33', '20 days', 'test', 2, '2018-01-29 00:00:00', 0, 0, 0, '2018-01-29 04:41:59', '2018-01-29 09:41:59'),
(17, 111, 0, 'medication test', '12', '2', '6', 'Two times a day', 2, '2018-02-06 00:00:00', 0, 0, 0, '2018-02-06 06:15:55', '2018-02-06 11:15:55'),
(18, 137, 0, 'Amlodipine', '28', '25mg', '28 days', 'One to be taken Four times a day', 2, '2018-02-06 00:00:00', 0, 1, 0, '2018-02-06 11:09:45', '2018-02-06 16:09:45'),
(19, 111, 3, 'Medication1', '5', '5', '5', '', 2, '2018-02-28 00:00:00', 0, 0, 0, '2018-02-28 07:57:01', '2018-02-28 12:57:01'),
(20, 111, 6, 'Amlodipine', '50', '20', '20 days', '', 2, '2018-03-01 00:00:00', 0, 0, 0, '2018-03-01 05:32:32', '2018-03-01 10:32:32'),
(21, 111, 6, 'Amlodipine', '28 Tablets', '25 mg', '2 months', '', 2, '2018-03-01 00:00:00', 0, 0, 0, '2018-03-01 05:33:00', '2018-03-01 10:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `sb_pharmacy_medication`
--

CREATE TABLE IF NOT EXISTS `sb_pharmacy_medication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medication_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dosage` varchar(100) NOT NULL,
  `use_of_direction` varchar(100) NOT NULL,
  `stock_available` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sb_pharmacy_medication`
--

INSERT INTO `sb_pharmacy_medication` (`id`, `medication_name`, `quantity`, `dosage`, `use_of_direction`, `stock_available`, `status`, `create_date`, `update_date`, `user_id`) VALUES
(3, 'Medication1', 2343, '243', 'test', '', 1, '2018-02-02 06:20:17', '2018-02-02 11:20:17', 107),
(4, 'medication2 e', 22, 'test', 'sfsdf ss', '', 1, '2018-02-02 06:20:37', '2018-02-02 11:20:37', 107),
(5, 'test123', 3, '3', '', '', 1, '2018-02-28 07:55:18', '2018-02-28 12:55:18', 107),
(6, 'Amlodipine', 28, '25 mg', '', '', 1, '2018-03-01 05:31:47', '2018-03-01 10:31:47', 107);

-- --------------------------------------------------------

--
-- Table structure for table `sb_users`
--

CREATE TABLE IF NOT EXISTS `sb_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `parent_user_id` int(11) NOT NULL,
  `nhs_number` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `forgot_pass_identity` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'noimagefound.jpg',
  `gender` tinyint(4) NOT NULL COMMENT '0:male,1:female',
  `title` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `rood` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `place` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `fax` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '1:admin;2:user',
  `member_type` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:inactive;1:active',
  `order_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:No;1:Yes',
  `is_confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=138 ;

--
-- Dumping data for table `sb_users`
--

INSERT INTO `sb_users` (`id`, `firstname`, `lastname`, `email`, `parent_user_id`, `nhs_number`, `password`, `forgot_pass_identity`, `avatar`, `gender`, `title`, `position`, `company`, `rood`, `number`, `zip`, `place`, `phone`, `fax`, `created_at`, `updated_at`, `is_admin`, `member_type`, `status`, `order_show`, `is_confirmed`, `is_deleted`) VALUES
(1, 'vikash', 'Rathore', 'vikash.r@cisinlabs.com', 0, '', '$2y$10$53/8qYJWi/h5HZnm5FOObOYBgNcSKBDPH306kgJJ9C84f0uh16wZi', '32c8f17245d277aaf6e63ecd0e25c90e', 'be12f20_depositphotos_12166038-Primary-school-stationery.jpg', 0, 'Mr.', 'Tester', 'bhdsbhdzhb', 'test', '12', '452003', '526523', 1234567890, 1234567890, '2017-06-28 05:12:52', '2017-08-22 04:03:17', 1, '', 1, 1, 1, 0),
(87, 'admin', 'admin', 'admin@mailinator.com', 0, '', '$2y$10$5zQlaonT7XM0Xs9anZaWDuDGWLgU1kIjmAGlNV/wDII2McXbJ9fyC', NULL, '8c23f96_CISLogo.png', 0, 'Title', 'Psition', 'demo', 'test', '113', '123456789a', 'city', 1234567890, 1234567896, '2017-11-09 09:49:10', '2018-02-01 23:34:34', 1, 'Gold', 1, 1, 1, 0),
(102, 'cisuser', 'cisuser', 'cisuser@mailinator.com', 0, '', '$2y$10$0bz4tT/6K85tht8B.UlbfO92t4aTBqR/kfnwxFJbJclyUEQ20sh4e', NULL, 'noimagefound.jpg', 0, '', '', '', '01234567896', '11', '1232', 'test', 1234567896, 1234567896, '2017-11-18 05:30:07', NULL, 0, 'Employee', 1, 1, 1, 0),
(103, 'cisuser1', 'cisuser1', 'cisuser1@mailinator.com', 0, '', '$2y$10$dzVHHFnNjTzOzVdPDqQpHe9jI28SEPUbSdTlhhxcqhNt35bWPT79a', NULL, 'noimagefound.jpg', 0, '', '', '', '01234567896', '11', '1232', 'test', 1234567896, 1234567896, '2017-11-18 05:31:54', NULL, 0, 'Employee', 1, 1, 1, 0),
(104, 'cisuse1', 'cisuse1', 'cisuse1@mailinator.com', 0, '', '$2y$10$aE2ujwQvU0oNV3LtvmGRnO0JYKd.2Y3ilo.ZW70gHiqQdS./2QVT.', NULL, 'noimagefound.jpg', 0, '', '', '', 'test', '113', '123456789', 'city', 1432356579, 1234567896, '2017-11-18 06:16:12', NULL, 0, 'Employee', 1, 1, 1, 0),
(105, 'cisuser11', 'cisuser11', 'cisuser11@mailinator.com', 0, '', '$2y$10$WTXXCDlZnzmozBbStIiiGe6BYMqnEeRaj3JRsceYsYoguWT.gZcu.', NULL, 'noimagefound.jpg', 0, '', '', '', '01234567896', '11', '1232', 'test', 1234567896, 1234567896, '2017-11-18 06:19:16', NULL, 0, 'Employee', 1, 1, 1, 0),
(106, 'cisuser2', 'cisuser2', 'cisuser2@mailinator.com', 0, '', '$2y$10$eyl4ddJ.fnuGrOhfDhuESeB7gAtbFboEen6DF4KO97OCDDwKOP1gK', NULL, 'noimagefound.jpg', 0, '', '', '', '01234567896', '11', '1232', 'test', 1234567896, 1234567896, '2017-11-18 06:20:24', NULL, 0, 'Employee', 1, 1, 1, 0),
(107, 'staff1', 'staff1', 'staff1@mailinator.com', 0, '', '$2y$10$89OoW15reQBC9cOAfNdgYuNOx4hFZnEDAWQ9qY3X7H6x2m6r11Q0u', NULL, 'noimagefound.jpg', 0, '', '', '', 'test', '113', '123456789', 'city', 1432356579, 1234567896, '2017-11-18 06:23:10', NULL, 0, 'Employee', 1, 1, 1, 0),
(108, 'staff2', 'staff2', 'staff2@mailinator.com', 0, '', '$2y$10$EyPB.ItapHQLq6Qb3x5GL.UO5xW18oRanODkYtI.b.fJabeSUY9e6', NULL, 'noimagefound.jpg', 0, '', '', '', 'test', '113', '45200', 'city', 1234567890, 1234567896, '2017-11-18 06:29:01', NULL, 0, 'Patient', 1, 1, 1, 0),
(109, 'staff3', 'staff3', 'staff3@mailinator.com', 0, '', '$2y$10$qyuiX.47t9Q3xo3Y9.0k6O9bfHrk/ejpaYwWfh1Q47YoWQYAm9UIm', NULL, 'noimagefound.jpg', 0, '', '', '', 'test', '113', '123456789', 'city', 1234567890, 1234567896, '2017-11-18 06:30:13', NULL, 0, 'Employee', 1, 1, 1, 0),
(110, 'Dinesh', 'Mittal', 'mittald@hotmail.co.uk', 0, '', '$2y$10$oIbzCrkuaO.JEMvXn5OQhu4LMcajnoy2V//oVHHdBXBzPlEZHSMc.', NULL, 'noimagefound.jpg', 0, '', '', '', 'The Knoll', '2', '4444', 'Leeds', 7732511703, 0, '2017-11-20 04:29:18', NULL, 0, 'Patient', 1, 1, 1, 0),
(111, 'patient1', 'patient1', 'patient1@mailinator.com', 107, 'patient1', '$2y$10$Q3GvWHxgRHU9ODJvt6xC9ejpO.o.rIdSQ5zfF0vl3Sne3qT7TZfcu', '458e355b1c46a6e939132919839d6f51', 'noimagefound.jpg', 0, '', '', '', 'test', '12', '12345', 'test', 12345678, 1234567896, '2018-01-29 09:12:44', NULL, 0, 'Patient', 1, 1, 1, 0),
(121, 'newstaff', 'newstaff', 'newstaff@mailinator.com', 0, '', '$2y$10$hkRlD8HUPjgPwERAIWSCYOjgIqR50iymBJ0FsJdR0PLGCJ0gBls.a', NULL, 'noimagefound.jpg', 0, '', '', '', 'test', '10', '12345', 'test', 1234567890, 1234567896, '2018-01-17 07:07:30', NULL, 0, 'Employee', 1, 1, 1, 0),
(123, 'patient01', 'patient01', 'patient01@mailinator.com', 107, 'patient01', '$2y$10$IpxywnZ5/cLfBZNopA9OXuzp8PkS.3shy25I3K0RMVdXlaFxaeFba', NULL, '6a69728_CISLogo.png', 0, '', '', '', 'test', '22', '12345', 'test', 123456678, 1234567896, '2018-01-24 05:19:43', NULL, 0, 'Patient', 1, 1, 1, 0),
(124, 'pharmacy1', 'pharmacy1', 'pharmacy1@mailinator.com', 0, '', '$2y$10$vhvxqE1Gqtd5XyJ/HOvOMOx2.jBp.W4dIZCIFSLqaOmQA8MxXnxV2', NULL, 'c713c22_CISLogo.png', 0, '', '', '', 'test', '12', '12345', 'city', 1234567890, 1234567896, '2018-01-29 01:49:18', NULL, 0, 'Employee', 1, 1, 1, 0),
(125, 'pharmacy2', 'pharmacy2', 'pharmacy2@mailinator.com', 0, '', '$2y$10$Aajl0ZC28D1rvn3AaPTFW.4G9Ra7obz3/N5AOsEXkbO.pCazLatQO', NULL, '2269e46_CISLogo.png', 0, '', '', '', 'test', '10', '12345', 'city', 1234567890, 1234567896, '2018-01-29 01:53:39', NULL, 0, 'Employee', 1, 1, 1, 0),
(126, 'pharmacy3', 'pharmacy3', 'pharmacy3@maiinator.com', 0, '', '$2y$10$W4MCHRtbrkRx57uReG.FbeWUeqJm3ZCyCwOoWpY5vWD237Eit5u7u', NULL, '711abe0_CISLogo.png', 0, '', '', '', 'test', '12', '12345', 'test', 1234567890, 42242525, '2018-01-29 01:55:21', NULL, 0, 'Employee', 1, 1, 1, 0),
(127, 'pharmacy4', 'pharmacy4', 'pharmacy4@mailinator.com', 0, '', '$2y$10$pvy0xTS7zDFRP.MZnYO6y.rKSEOc7XsWzHWoszbNB8AwpY5WKOpdS', NULL, 'noimagefound.jpg', 0, '', '', '', 'test', '12', '12345', 'city', 1234567890, 1234567896, '2018-01-29 01:56:37', NULL, 0, 'Employee', 1, 1, 1, 0),
(128, 'pharmacy5', 'pharmacy5', 'pharmacy5@mailinator.com', 0, '', '$2y$10$MBOpFMA50EjbqZvDLbqW..eGCNWySVb5G479A5Ez14pdwb6RGeSG.', NULL, 'noimagefound.jpg', 0, '', '', '', 'test', '20', '12345', 'city', 1234567890, 1234567896, '2018-01-29 01:58:54', NULL, 0, 'Employee', 1, 1, 1, 0),
(129, 'pharmacy6', 'pharmacy6', 'pharmacy6@mailinator.com', 0, '', '$2y$10$C4xo9q/N0jxKyjkHQxjXkOCLa9J980ko1nUplR/7TyJ8vM5XytvQy', NULL, 'cf2918f_CISLogo.png', 0, '', '', '', 'test', '12', '12345', 'city', 1234567890, 1234567896, '2018-01-29 02:00:09', NULL, 0, 'Employee', 1, 1, 1, 0),
(130, 'pharmacy7', 'pharmacy7', 'pharmacy7@mailinator.com', 0, '', '$2y$10$57GIUaf1vsoW7uFAYdFxy.GgVBE0jqemi.v6kxNQR6zQkw6DD64F.', NULL, 'noimagefound.jpg', 0, '', '', '', 'test', '113', '123456789', 'city', 1234567890, 1234567896, '2018-01-29 02:13:56', NULL, 0, 'Employee', 1, 1, 1, 0),
(131, 'pharmacy8', 'pharmacy8', 'pharmacy8@mailinator.com', 0, '', '$2y$10$Kxsnob7uf9QULeorq8fdO.VAMFuWHM/nIg0W5HT2weopB8PHK4KPy', NULL, 'noimagefound.jpg', 0, '', '', '', 'test', '113', '123456789', 'city', 1234567890, 1234567896, '2018-01-29 02:26:23', NULL, 0, 'Employee', 1, 1, 1, 0),
(132, 'patient11', 'patient11', 'patient11@mailinator.com', 107, 'patient11', '$2y$10$gutyNXWgk9zJq4ce6JYFrO8QZMrcQKZWaYSIvoDexIAhc1/iw2x06', NULL, 'noimagefound.jpg', 0, '', '', '', 'test', '12', '12345', 'city', 1234567896, 1234567896, '2018-01-29 06:18:34', NULL, 0, 'Patient', 1, 1, 1, 0),
(133, 'sonam', 'verma', 'sonam@mailinator.com', 107, '123455', '$2y$10$/7gkYLZapr3NIJM/9NJX0.8Mj0z/WJeP7MdL2.5ttyDsEcpOm0o.q', NULL, 'noimagefound.jpg', 0, '', '', '', 'test', '12', 'ASCN 1ZZ', 'test', 12346564789, 12346564789, '2018-02-02 02:18:28', NULL, 0, 'Patient', 1, 1, 1, 0),
(134, 'patientnew', 'patientnew', 'patientnew@mailinator.com', 107, 'patientnew', '$2y$10$7pifLp318F2fefy0uHRZWeBmapEVSzkyyDGZTveR/hIfR3nhXATJ.', NULL, '70cce6f_profilepic.jpeg', 1, '', '', '', 'test', '12', 'B4 7DA', 'sdfsdf', 12346564789, 12346564789, '2018-02-02 06:58:38', NULL, 0, 'Patient', 1, 1, 1, 0),
(135, 'Dinesh', 'Mittal', 'mittald1@hotmail.co.uk', 0, '', '$2y$10$uB2W.dFUAY5C8H8c1MXxDO3Z5lUk17tFrHBmBhvKm7tKi1mzTzYG6', NULL, '579dec1_angular.jpg', 0, '', '', '', '60 lig', '30', 'LS28 5FB', 'london', 9845554555, 2342342, '2018-02-06 05:46:11', '2018-02-06 18:05:04', 0, 'Employee', 1, 1, 1, 0),
(136, 'pravin', 'modi', 'pravin32.m@mailinator.com', 107, '256665', '$2y$10$umURpJkvQYebSS8kMn2lAe9T3g3YrXIBdoPVzKWvd6G98M4Y.3XNe', NULL, 'b62f898_gettyimages-505960600.jpg', 0, '', '', '', '60 lig', '25', 'LS28 5FB', 'london', 9827561223, 0, '2018-02-06 06:05:42', NULL, 0, 'Patient', 1, 1, 1, 0),
(137, 'Deepak', 'Mittal', 'dkmpharm1@hotmail.com', 135, '23423423', '$2y$10$bht9nTN4zB7Q9A2450X7xObiT8J.JKiYk1y35ISqIRHTs/zl4I.4a', NULL, 'noimagefound.jpg', 0, '', '', '', 'The Knoll', '2', 'LS28 5FB', 'Leeds', 312321321, 12312312, '2018-02-06 11:07:59', NULL, 0, 'Patient', 1, 1, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
