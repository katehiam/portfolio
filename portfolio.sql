-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2013 at 01:48 p.m.
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

CREATE TABLE IF NOT EXISTS `tbcustomer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`id`, `firstName`, `lastName`, `email`, `address`, `password`) VALUES
(1, 'Tester', 'Test0', 'test@test.test', 'Test St\r\nTest\r\nAuckland', 'test'),
(2, '', 'Test', 'save@test.test', '62 waterlane test st', '12345'),
(3, 'Update', 'Test', 'save@test.test', '62 waterlane test st', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tborder`
--

CREATE TABLE IF NOT EXISTS `tborder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customerId` (`customerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tborder`
--

INSERT INTO `tborder` (`id`, `customerId`, `orderDate`) VALUES
(1, 1, '2013-07-08'),
(2, 3, '0000-00-00'),
(3, 3, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tborderline`
--

CREATE TABLE IF NOT EXISTS `tborderline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orderId` (`orderId`,`projectId`),
  KEY `projectId` (`projectId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tborderline`
--

INSERT INTO `tborderline` (`id`, `orderId`, `projectId`, `quantity`) VALUES
(1, 1, 1, 2),
(2, 2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbproject`
--

CREATE TABLE IF NOT EXISTS `tbproject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `product` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbproject`
--

INSERT INTO `tbproject` (`id`, `name`, `date`, `description`, `image`, `product`, `price`) VALUES
(1, 'Husky Illustration', '2013-05-21', 'An illustration of husky puppies playing together for a personal project. Drawn by hand and completed with Illustrator and Photoshop.', 'huskypuppies.jpg', 1, 20),
(2, 'Updated Name', '0000-00-00', 'this is a test description right here. blah blah.', 'testimage.jpg', 0, 0),
(3, 'Test Product', '0000-00-00', 'this is a test description right here. blah blah.', 'testimage.jpg', 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tborder`
--
ALTER TABLE `tborder`
  ADD CONSTRAINT `tborder_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `tbcustomer` (`id`);

--
-- Constraints for table `tborderline`
--
ALTER TABLE `tborderline`
  ADD CONSTRAINT `tborderline_ibfk_2` FOREIGN KEY (`projectId`) REFERENCES `tbproject` (`id`),
  ADD CONSTRAINT `tborderline_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `tborder` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
