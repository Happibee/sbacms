-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 03:28 PM
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
  `appId` int(11) NOT NULL,
  `custId` int(11) DEFAULT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `serviceId` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `serviceName` varchar(20) DEFAULT NULL,
  `price` int(6) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `address` varchar(90) NOT NULL,
  `contactNo` int(13) NOT NULL,
  `emailAdd` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custId`, `firstName`, `lastName`, `userName`, `address`, `contactNo`, `emailAdd`, `password`) VALUES
(3, 'Ken', 'Balas', 'Kendall', '', 0, 'k@gmail.com', 'ken123'),
(4, 'John', 'Derick', 'Jaydee', '', 0, 'jd@gmail.com', 'jd123'),
(5, 'sharmaine', 'rufino', 'sharmaine', '', 0, 'sharmainerufino@gmai', 'sharmaine123'),
(6, 'john', 'de vera', 'Jddevera', '', 0, 'sampleemail@yahoo.co', 'bliss123');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeId` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `userName` varchar(18) NOT NULL,
  `address` varchar(90) NOT NULL,
  `contactNo` int(13) NOT NULL,
  `emailAdd` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `accLvl` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeId`, `firstName`, `lastName`, `userName`, `address`, `contactNo`, `emailAdd`, `password`, `type`, `accLvl`) VALUES
(1, 'John', 'Wick', 'JohnWick', '', 0, 'john@gmail.com', 'jw123', 'admin', 0),
(2, 'Joaquin', 'Cortez', 'jaycee', '', 0, 'jc@gmail.com', 'jc123', 'Employee', 0),
(5, 'Roselia', 'Cruz', 'Rose', '', 0, 'rose@email.com', 'rose123', 'Manager', 0),
(6, 'Jasmine', 'Mendoza', 'Jess', '', 0, 'jess@email.com', 'jess123', 'Employee', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `rating` varchar(2) DEFAULT NULL,
  `feedback` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedId` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceId` int(11) NOT NULL,
  `serviceName` varchar(19) NOT NULL,
  `serviceType` varchar(20) NOT NULL,
  `serviceDescription` varchar(120) NOT NULL,
  `price` int(4) NOT NULL,
  `averageTime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceId`, `serviceName`, `serviceType`, `serviceDescription`, `price`, `averageTime`) VALUES
(1, 'Hair Service', '', 'Hair Service Description				', 100, '10-15 Minutes'),
(2, 'Brow Service', '', 'Brow Service Description', 100, '5-10 Minutes'),
(3, 'Nail Service', '', 'Nail Service Description Here	', 100, '8-10 Minutes'),
(4, 'Waxing Service', '', 'Waxing Service Description', 100, '10-15 Minutes'),
(5, 'Event Service', '', 'Event Service Description		', 5000, '1-3 Hours');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `typeId` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`typeId`, `type`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appId`),
  ADD KEY `custId` (`custId`),
  ADD KEY `employeeId` (`employeeId`),
  ADD KEY `serviceId` (`serviceId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custId`),
  ADD UNIQUE KEY `firstName` (`firstName`,`lastName`,`userName`,`emailAdd`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `userId` (`custId`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedId`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`custId`) REFERENCES `customer` (`custId`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`serviceId`) REFERENCES `service` (`serviceId`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`custId`) REFERENCES `customer` (`custId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
