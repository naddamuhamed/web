-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 02:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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

CREATE TABLE `emp` (
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
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`firstname`, `lastname`, `pwd`, `email`, `age`, `gender`, `id`, `mobile`, `photo`, `type`, `ssn`, `address`, `salary`) VALUES
('xdfcgfvbhn', 'dcfvgbhnj', '4531', 'edfcghvb', 7845, 'frtgh', 25, 'gfhjfhg', 'dfhgjb', 'admin', 78451, 'tdrfhgv', 4512);

-- --------------------------------------------------------

--
-- Table structure for table `group rating`
--

CREATE TABLE `group rating` (
  `hid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `stars` int(11) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `timeslotfrom` datetime NOT NULL,
  `timeslotto` datetime DEFAULT NULL,
  `price` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `hiker` (
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
  `type` varchar(255) NOT NULL DEFAULT 'hiker'
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

CREATE TABLE `hikergroup` (
  `hikerid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `person` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `type` varchar(225) NOT NULL,
  `ssn` int(25) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `group rating`
--
ALTER TABLE `group rating`
  ADD KEY `hid` (`hid`),
  ADD KEY `gid` (`gid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiker`
--
ALTER TABLE `hiker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `hikergroup`
--
ALTER TABLE `hikergroup`
  ADD PRIMARY KEY (`capacity`),
  ADD KEY `hikerid` (`hikerid`),
  ADD KEY `groupid` (`groupid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`) USING BTREE;

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `hikergroup`
--
ALTER TABLE `hikergroup`
  MODIFY `capacity` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
