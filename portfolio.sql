-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2013 at 02:43 p.m.
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
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`id`, `firstName`, `lastName`, `email`, `address`, `password`, `admin`) VALUES
(1, 'Tester', 'Test0', 'test@test.test', 'Test St\r\nTest\r\nAuckland', 'test', 0),
(2, '', 'Test', 'save@test.test', '62 waterlane test st', '12345', 0),
(3, 'Update', 'Test', 'save@test.test', '62 waterlane test st', '12345', 0),
(4, 'Tester', 'Blah', 'testing1@gmail.com', 'address whatever', 'ebed0b3cdab2b486495be207bbc0ec47', 0),
(10, 'Tom', 'Greensdale', 'tester1@gmail.com', 'Test St\r\nRemuera\r\nAuckland', 'ebed0b3cdab2b486495be207bbc0ec47', 1),
(11, 'bdh', 'tjj', 'tester2@gmail.com', 'tergbg', 'ebed0b3cdab2b486495be207bbc0ec47', 0),
(12, 'Seth', 'Miles', 'tester3@gmail.com', 'Some St\r\nSort\r\nAuckland', 'ebed0b3cdab2b486495be207bbc0ec47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tborder`
--

CREATE TABLE IF NOT EXISTS `tborder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `totalPrice` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customerId` (`customerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tborder`
--

INSERT INTO `tborder` (`id`, `customerId`, `orderDate`, `totalPrice`) VALUES
(1, 1, '2013-07-08', 0),
(2, 3, '0000-00-00', 0),
(3, 3, '0000-00-00', 0),
(4, 12, '2013-07-23', 0),
(5, 12, '2013-07-23', 0),
(6, 12, '2013-07-23', 0),
(7, 12, '2013-07-23', 0),
(8, 12, '2013-07-23', 0),
(9, 12, '2013-07-23', 0),
(10, 12, '2013-07-23', 0),
(11, 12, '2013-07-23', 0),
(12, 12, '2013-07-23', 0),
(13, 12, '2013-07-23', 0),
(14, 10, '2013-07-25', 0),
(15, 12, '2013-07-25', 0),
(16, 12, '2013-07-26', 0),
(17, 12, '2013-07-26', 33),
(18, 12, '2013-07-26', 33),
(19, 12, '2013-07-26', 33),
(20, 12, '2013-07-26', 33),
(21, 12, '2013-07-26', 33.49),
(22, 12, '2013-07-26', 33.49),
(23, 10, '2013-07-26', 33.49),
(24, 10, '2013-07-26', 33.49);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tborderline`
--

INSERT INTO `tborderline` (`id`, `orderId`, `projectId`, `quantity`) VALUES
(1, 1, 1, 2),
(2, 2, 2, 4),
(4, 5, 1, 1),
(5, 5, 1, 1),
(6, 5, 12, 1),
(7, 5, 7, 2),
(8, 9, 1, 1),
(9, 10, 11, 1),
(10, 11, 12, 1),
(11, 12, 11, 1),
(12, 13, 12, 1),
(13, 13, 1, 1),
(14, 14, 11, 1),
(15, 15, 11, 1),
(16, 15, 7, 2),
(17, 16, 1, 1),
(18, 17, 11, 1),
(19, 18, 1, 1),
(20, 19, 11, 1),
(21, 20, 7, 1),
(22, 21, 1, 1),
(23, 22, 1, 1),
(24, 23, 1, 1),
(25, 24, 12, 1);

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
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `name` (`name`),
  FULLTEXT KEY `description` (`description`),
  FULLTEXT KEY `name_2` (`name`,`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbproject`
--

INSERT INTO `tbproject` (`id`, `name`, `date`, `description`, `image`, `product`, `price`, `deleted`) VALUES
(1, 'Husky Illustration', '2013-05-21', 'An illustration of husky puppies playing together for a personal project. Drawn by hand and completed with Illustrator and Photoshop.', 'huskypuppies.jpg', 1, 30, 0),
(2, 'Updated', '0000-00-00', 'this is a test description right here. blah blah.', '1373501514-Updated.jpg', 1, 0, 1),
(3, 'Testing', '0000-00-00', 'grnegoenwgtn', '1373503094-Test.jpg', 1, 85, 1),
(4, 'kryk', '2013-07-11', 'kuk', '1373501520-kryk.jpg', 0, 0, 1),
(5, 'hreh', '2013-07-11', '5yht', '2013-07-11-1373501336-hreh.jpg', 0, 0, 1),
(6, 'reh', '2013-07-11', 'htrjt', '1373503390-reh.jpg', 1, 67, 1),
(7, 'Bunny Illustration', '2013-07-22', 'This was created as part of a gift shop product range featuring animal illustrations.', '1374456975-Bunny Illustration.jpg', 1, 30, 0),
(8, 'Dried Fruit Packaging', '2013-07-22', 'Student work rebrand of Alison''s Pantry packaging for selling pre-packaged dried fruit. The aim was to give it a touch of class and quality, as well as making it unique and stand out to the buyer.', '1374457130-Dried Fruit Packaging.jpg', 0, 0, 0),
(9, 'Wedding Memories Package', '2013-07-22', 'This is an example of one of the packages available. It consists of a card, and 2 DVDs for photos and videos.', '1374457309-Wedding Memories Package.jpg', 0, 0, 0),
(10, 'Antique Auto Poster', '2013-07-22', 'Black and white poster created for an event called Antique Auto which shows off retro cars from the 1920s - 1950s.', '1374458142-Antique Auto Poster.jpg', 0, 0, 0),
(11, 'Wolves Illustration', '2013-07-22', 'This was created as part of a gift shop product range featuring animal illustrations.', '1374458892-Wolves Illustration.jpg', 1, 30, 0),
(12, 'Red Panda Illustration', '2013-07-22', 'This was created as part of a gift shop product range featuring animal illustrations.', '1374458920-Red Panda Illustration.jpg', 1, 30, 0),
(13, 'Bellbird Identity', '2013-07-22', 'Business card, letter head, and style guide for a gift shop business called Bellbird.', '1374459264-Bellbird Identity.jpg', 0, 0, 0),
(14, 'Relax in Auckland Brochure', '2013-07-22', 'A small four-page brochure showing off a few places in Auckland to relax. The brief called for the paper to be A4 in size, and have a unique diecut.', '1374459454-Relax in Auckland Brochure.jpg', 0, 0, 0),
(15, 'Waitomo Glowworm Caves', '2013-07-22', 'A two-colour magazine advert promoting the glowworm caves in Waitomo, New Zealand.', '1374459569-Waitomo Glowworm Caves.jpg', 0, 0, 0);

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
  ADD CONSTRAINT `tborderline_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `tborder` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
