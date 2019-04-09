-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 06:56 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbacms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `customer` varchar(50) DEFAULT NULL COMMENT 'customer''s username',
  `employee` varchar(50) DEFAULT NULL COMMENT 'employee''s username',
  `service_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(25) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `customer`, `employee`, `service_id`, `date`, `time`, `status`) VALUES
(1, 'username', 'apolinariom', 1, '2019-03-21', '03:00:00', 'Pending'),
(2, 'username', 'apolinariom', 1, '2019-03-21', '03:00:00', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL COMMENT 'customer''s username',
  `rating` varchar(2) DEFAULT NULL,
  `feedback` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(19) DEFAULT NULL,
  `service_type` int(11) DEFAULT NULL,
  `service_description` varchar(120) DEFAULT NULL,
  `price` varchar(25) DEFAULT NULL,
  `hs_price` varchar(25) NOT NULL,
  `average_time` varchar(25) NOT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_name`, `service_type`, `service_description`, `price`, `hs_price`, `average_time`, `archive`) VALUES
(1, 'Threadings', 2, 'Service description.', '150', '', '15', 0),
(4, 'Test Service', 1, 'Service description.', '123', '', '1', 1),
(5, 'Test Service', 1, 'Service description.', '123', '', '1', 1),
(6, 'Test Service', 1, 'Service description.', '123', '', '1', 1),
(7, 'Test Service', 1, 'Service description.', '123', '', '1', 1),
(8, 'Test Service', 1, 'Service description.', '123', '', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `service_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`id`, `service_type`) VALUES
(1, 'Hair Service'),
(2, 'Brow Service'),
(3, 'Nail Service'),
(4, 'Waxing Service'),
(5, 'Event Service');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `type` varchar(25) NOT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`username`, `email`, `password`, `type`, `archive`) VALUES
('andresb', 'andresb@email.com', '$2y$10$boYBdNWZXgeGmT74eSigieJVMBeGCDI7S6tQrnyHVHVeAataazzvS', 'Admin', 0),
('apolinariom', 'apolinariom@email.com', '$2y$10$boYBdNWZXgeGmT74eSigieJVMBeGCDI7S6tQrnyHVHVeAataazzvS', 'Employee', 0),
('joserizal', 'joser@email.com', '$2y$10$boYBdNWZXgeGmT74eSigieJVMBeGCDI7S6tQrnyHVHVeAataazzvS', 'Customer', 0),
('kendallb', 'kendall@email.com', '$2y$10$boYBdNWZXgeGmT74eSigieJVMBeGCDI7S6tQrnyHVHVeAataazzvS', 'Manager', 0),
('test', 'test@mail.com', '$2y$10$e9Dc2o3fzutQmygaiXwUJO8IewTQkgy0hkproRcrv4ZLtThg/BAJS', 'Customer', 0),
('username', 'lysle@mail.com', '$2y$10$/RcaF/tNQNxJ5CLnPquvSOWyuPaub..mWCZt0H8aG.rGJue0aWubq', 'Customer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `username` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`username`, `first_name`, `last_name`, `address`, `contact_no`) VALUES
('andresb', 'Andres', 'Bonifacio', 'Sample Address', '09123456789'),
('apolinariom', 'Apolinario', 'Mabini', 'Address', '09123456789'),
('joserizal', 'Jose', 'Rizal', 'Address', '09123456789'),
('kendallb', 'Kendall Dave', 'Balas', 'Address', '09123456789'),
('username', 'Lysle', 'B', '123 Address, City, Province', '09123456789'),
('test', 'Test', 'Test', '123 Address, City, Province', '09123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custId` (`customer`),
  ADD KEY `employeeId` (`employee`),
  ADD KEY `serviceId` (`service_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`customer`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_type` (`service_type`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_address` (`email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`customer`) REFERENCES `user_info` (`username`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`employee`) REFERENCES `user_info` (`username`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `user_account` (`username`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`service_type`) REFERENCES `service_type` (`id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_account` (`username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
