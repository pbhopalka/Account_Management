-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2015 at 12:54 PM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `Bill_ID` int(11) NOT NULL,
  `Item` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill_record`
--

CREATE TABLE IF NOT EXISTS `bill_record` (
  `Bill_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE IF NOT EXISTS `customer_details` (
`Cust_ID` int(11) NOT NULL,
  `Cust_Name` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `State` varchar(50) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Pending_Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE IF NOT EXISTS `ledger` (
  `Date` date NOT NULL,
  `Bill_Amount` int(11) NOT NULL DEFAULT '0',
  `Payment_Received` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
`ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Role` varchar(20) NOT NULL DEFAULT 'Normal',
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`ID`, `Name`, `Role`, `Username`, `Password`) VALUES
(1, 'Piyush', 'Superuser', 'pbhopalka', 'pb'),
(2, 'Prabhav', 'Normal', 'prabhav', 'pb');

-- --------------------------------------------------------

--
-- Table structure for table `payment_record`
--

CREATE TABLE IF NOT EXISTS `payment_record` (
`Payment_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
 ADD PRIMARY KEY (`Bill_ID`,`Item`,`Price`);

--
-- Indexes for table `bill_record`
--
ALTER TABLE `bill_record`
 ADD PRIMARY KEY (`Bill_ID`), ADD KEY `Cust_ID` (`Cust_ID`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
 ADD PRIMARY KEY (`Cust_ID`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
 ADD PRIMARY KEY (`Date`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `payment_record`
--
ALTER TABLE `payment_record`
 ADD PRIMARY KEY (`Payment_ID`), ADD KEY `Cust_ID` (`Cust_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
MODIFY `Cust_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_record`
--
ALTER TABLE `payment_record`
MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `bill_record`
MODIFY `Bill_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`Bill_ID`) REFERENCES `bill_record` (`Bill_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill_record`
--
ALTER TABLE `bill_record`
ADD CONSTRAINT `bill_record_ibfk_1` FOREIGN KEY (`Cust_ID`) REFERENCES `customer_details` (`Cust_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_record`
--
ALTER TABLE `payment_record`
ADD CONSTRAINT `payment_record_ibfk_1` FOREIGN KEY (`Cust_ID`) REFERENCES `customer_details` (`Cust_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
