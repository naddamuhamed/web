-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2022 at 10:24 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiking`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

DROP TABLE IF EXISTS `emp`;
CREATE TABLE IF NOT EXISTS `emp` (
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `pwd` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `id` int(11) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ssn` int(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `penalty` int(11) NOT NULL,
  `reason` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`firstname`, `lastname`, `pwd`, `email`, `age`, `gender`, `id`, `mobile`, `photo`, `type`, `ssn`, `address`, `salary`, `penalty`, `reason`) VALUES
('xdfcgfvbhn', 'dcfvgbhnj', '4531', 'edfcghvb', 7845, 'frtgh', 25, 'gfhjfhg', 'dfhgjb', 'admin', 78451, 'tdrfhgv', 3512, 1000, '3abeet');

-- --------------------------------------------------------

--
-- Table structure for table `group rating`
--

DROP TABLE IF EXISTS `group rating`;
CREATE TABLE IF NOT EXISTS `group rating` (
  `hid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `stars` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  KEY `hid` (`hid`),
  KEY `gid` (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `timeslotfrom` datetime NOT NULL,
  `timeslotto` datetime DEFAULT NULL,
  `price` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`name`, `location`, `timeslotfrom`, `timeslotto`, `price`, `id`, `capacity`) VALUES
('gfdg ghjgh', 'maadi', '2022-01-15 23:57:00', '2022-01-13 13:57:00', 354, 2, 63546),
('fgfdsg', 'gsdgds', '2022-01-05 03:26:19', '2022-01-05 03:26:19', 12, 213, 2131);

-- --------------------------------------------------------

--
-- Table structure for table `hiker`
--

DROP TABLE IF EXISTS `hiker`;
CREATE TABLE IF NOT EXISTS `hiker` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `id` int(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'hiker',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiker`
--

INSERT INTO `hiker` (`firstname`, `lastname`, `pwd`, `id`, `photo`, `email`, `address`, `mobile`, `gender`, `age`, `type`) VALUES
('gfdg', 'ghjgh', 'Lk0+jhgyg', 4, 'Capture.PNG', 'naddamuhhamed1@gmail.com', 'hfgh', '12345678945', 'female', 20, 'hiker'),
('', '', '', 5, '', '', '', '', '', 0, 'hiker'),
('', '', '', 6, '', '', '', '', '', 0, 'hiker');

-- --------------------------------------------------------

--
-- Table structure for table `hikergroup`
--

DROP TABLE IF EXISTS `hikergroup`;
CREATE TABLE IF NOT EXISTS `hikergroup` (
  `hikerid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `capacity` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`capacity`),
  KEY `hikerid` (`hikerid`),
  KEY `groupid` (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investigation_requests`
--

DROP TABLE IF EXISTS `investigation_requests`;
CREATE TABLE IF NOT EXISTS `investigation_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auditor_name` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `issue_short_description` varchar(100) NOT NULL,
  `issue_details` text,
  `request_date` text NOT NULL,
  `status` text,
  `hr_investigations` text,
  `hr_action` text,
  `hr_action_date` text,
  `penalty` text,
  `comments` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_requests`
--

INSERT INTO `investigation_requests` (`id`, `auditor_name`, `admin_id`, `issue_short_description`, `issue_details`, `request_date`, `status`, `hr_investigations`, `hr_action`, `hr_action_date`, `penalty`, `comments`) VALUES
(1, 'Ahmed', 1, 'test short desc', 'test detailed description', '2022-01-19', 'closed', 'still tracking', 'asd', 'fake reporting', '0', 'no penalty'),
(2, 'Ahmed', 3, 'qwe', 'qwe', '', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Ahmed', 3, 'qwe', 'qwe', '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Ahmed', 3, 'qwe', 'qwjhajkfa', '', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Ahmed', 3, 'qwe', 'qwjhajkfa', '', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Ajk', 9, 'qwe', 'qaz', '', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Ajk', 9, 'qwe', 'qaz', '2022-01-20T12:09', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Ajk', 9, 'qwe', 'qaz', '2022-01-20T12:09', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Ajk', 9, 'qwe', 'qaz', '2022-01-20T12:09', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Mohamed', 4, 'zxcvb', 'zxcvbnm,', '2022-01-21T23:00', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'zxc', 7, 'asdffg', 'asfdsdgfgh', '2022-01-21T22:00', 'Under Investigation', 'we have called the admin', 'we have blocked the admin temp', '2022-01-21T23:00', '', ''),
(12, 'fgh', 98, 'tgb', 'rfv', '2022-01-21T16:00', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'fgh', 45, 'tgb', 'rfv', '2022-01-20T10:00', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'fgh', 53, 'tgb', 'rfv', '2022-01-20T14:00', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'fgh', 123, 'tgb', 'rfv', '2022-01-20T17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Ahmed', 25, 'qwertyu', 'qsc', '2022-01-21T22:00', '', '', '', '', '1000', '3abeet');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `code`, `photo`, `price`, `description`) VALUES
(1, 'FinePix Pro2 3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500, 'comes with more than one lens'),
(2, 'EXP Portable Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800, '1 terabyte'),
(3, 'Luxury Ultra thin Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300, 'very fashionable');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `type` varchar(225) NOT NULL,
  `ssn` int(25) NOT NULL,
  `salary` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`firstname`, `lastname`, `pwd`, `id`, `photo`, `email`, `address`, `mobile`, `gender`, `age`, `type`, `ssn`, `salary`) VALUES
('gfdg', 'ghjgh', 'Lk0+jhgyg', 3, 'Capture.PNG', 'naddamuhhamed1@gmail.com', 'hfgh', '12345678945', 'female', 20, 'hiker', 0, 0),
('gfdg', 'ghjgh', 'Lk0+jhgyg', 4, 'Capture.PNG', 'naddamuhhamed1@gmail.com', 'hfgh', '12345678945', 'female', 20, 'hiker', 0, 0),
('', '', '', 5, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 6, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 7, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 8, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 9, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 10, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 11, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 12, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 13, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 14, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 15, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 16, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 17, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 18, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 19, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 20, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 21, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 22, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 23, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 24, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 25, '', '', '', '', '', 0, 'hiker', 0, 0),
('', '', '', 26, '', '', '', '', '', 0, 'hiker', 0, 0),
('gfdg', 'ghjgh', 'dsfsdL453+', 27, '', 'naddamuhhamed1@gmail.com', 'hfgh31', '12345678996', 'male', 20, 'hiker', 0, 0),
('', '', '', 28, '', '', '', '', '', 0, 'hiker', 0, 0),
('gfdg', 'ghjgh', 'dsfsdL453+', 29, '', 'naddamuhhamed1@gmail.com', 'hfgh31', '12345678996', 'male', 2147483647, 'hiker', 0, 0),
('gfdg', 'ghjgh', 'dsfsdL453+', 30, '', 'naddamuhhamed1@gmail.com', 'hfgh31', '12345678996', 'male', 2147483647, 'hiker', 0, 0),
('gfdg', 'ghjgh', 'dsfsdL453+', 31, '', 'naddamuhhamed1@gmail.com', 'hfgh31', '12345678996', 'male', 2147483647, 'hiker', 0, 0),
('gfdg', 'ghjgh', 'dsfsdL453+', 32, 'hiking-header.jpg', 'naddamuhhamed1@gmail.com', 'hfgh31', '12345678996', 'male', 2147483647, 'hiker', 0, 0),
('gfdg', 'ghjgh', 'dsfsdL453+', 33, 'hiking-header.jpg', 'naddamuhhamed1@gmail.com', 'hfgh31', '12345678996', 'male', 2147483647, 'hiker', 0, 0),
('sdgfghh', 'rftgyhj', 'drftghj', 64, 'cgvhbjnkm', 'tfgyhjk', 'fghjhbjn', '', '', 0, 'admin', 0, 0),
('fvgbhnjk', 'tgyhjk', 'trfyghj', 65, 'dfghj', 'ftghbjn', 'drfghb', '45631', 'ftg', 45, 'admin', 456312, 56163);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emp`
--
ALTER TABLE `emp`
  ADD CONSTRAINT `id fk` FOREIGN KEY (`id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group rating`
--
ALTER TABLE `group rating`
  ADD CONSTRAINT `grid` FOREIGN KEY (`gid`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hikid` FOREIGN KEY (`hid`) REFERENCES `hiker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hiker`
--
ALTER TABLE `hiker`
  ADD CONSTRAINT `id fkey` FOREIGN KEY (`id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hikergroup`
--
ALTER TABLE `hikergroup`
  ADD CONSTRAINT `gid` FOREIGN KEY (`groupid`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hid` FOREIGN KEY (`hikerid`) REFERENCES `hiker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
