-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2012 at 05:42 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Event`
--

CREATE TABLE IF NOT EXISTS `Event` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `eventNm` varchar(50) NOT NULL,
  `eventOrg` varchar(40) NOT NULL,
  `eventType` varchar(20) NOT NULL,
  `eventLoc` varchar(30) NOT NULL,
  `eventDt` datetime NOT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Event`
--

INSERT INTO `Event` (`eventID`, `eventNm`, `eventOrg`, `eventType`, `eventLoc`, `eventDt`) VALUES
(1, 'SWSX Austin', 'iSchool Drexel', 'Educational', 'Austin, TX', '2012-03-22 10:16:07'),
(2, 'SWSX Silicon Valley', 'iSchool Drexel', 'Technical', 'Palo Alto, CA', '2012-03-31 10:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Pan Africa Market', '1521 1st Ave, Seattle, WA', 47.609035, -122.340019, 'restaurant'),
(2, 'Buddha Thai & Bar', '2222 2nd Ave, Seattle, WA', 47.613815, -122.345016, 'bar'),
(3, 'The Melting Pot', '14 Mercer St, Seattle, WA', 47.624718, -122.356133, 'restaurant'),
(4, 'Ipanema Grill', '1225 1st Ave, Seattle, WA', 47.606625, -122.338051, 'restaurant'),
(5, 'Sake House', '2230 1st Ave, Seattle, WA', 47.613277, -122.346107, 'bar'),
(6, 'Crab Pot', '1301 Alaskan Way, Seattle, WA', 47.606052, -122.341034, 'restaurant'),
(7, 'Mama''s Mexican Kitchen', '2234 2nd Ave, Seattle, WA', 47.613865, -122.345367, 'bar'),
(8, 'Wingdome', '1416 E Olive Way, Seattle, WA', 47.617588, -122.326584, 'bar'),
(9, 'Piroshky Piroshky', '1908 Pike pl, Seattle, WA', 47.609947, -122.342422, 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `profID` int(11) NOT NULL AUTO_INCREMENT,
  `profLName` varchar(50) NOT NULL,
  `profFName` varchar(50) NOT NULL,
  `profTitle` varchar(5) NOT NULL,
  `profBldg` varchar(20) NOT NULL,
  `profOffice` varchar(20) NOT NULL,
  `profPhone` varchar(15) NOT NULL,
  `profEmail` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`profID`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`profID`, `profLName`, `profFName`, `profTitle`, `profBldg`, `profOffice`, `profPhone`, `profEmail`, `id`) VALUES
(1, 'Hislop', 'Greg', '', '', '', '', '', 1),
(3, 'Dickinson', 'Yo', '', '', '', '', '', 3),
(4, 'Palisano', 'Wallo', '', '', '', '', '', 3),
(5, 'Abels', 'Eileen', 'Ph.D', 'Rush Building', 'Rush 411\r\n', '215 895-6274', '\r\neabels@drexel.edu', 0),
(6, 'Agosto', 'Denise', 'Ph.D', 'Rush Building', 'Rush 214B\r\n', '215 895-1930', '\r\ndea22@drexel.edu', 0),
(7, 'An', 'Yuan', 'Ph.D', 'Rush Building', 'Rush 410\r\n', '215 895-2633', '\r\nyuan.an@drexel.edu', 0),
(8, 'Atwood', 'Michael', 'Ph.D', 'Rush Building', 'Rush 426\r\n', '215 895-6273', '\r\natwood@drexel.edu', 0),
(9, 'Booker', 'Glenn', 'Ph.D', 'Rush Building', 'Rush 334\r\n', '215 895-1004', '\r\ngbooker@drexel.edu', 0),
(10, 'Chen', 'Chaomei', 'Ph.D', 'Rush Building', 'Rush 408\r\n', '215 895-6627', '\r\nchaomei.chen@drexel.edu', 0),
(11, 'Childers', 'Thomas', 'Ph.D', 'Rush Building', 'Rush 214A\r\n', '215 895-2479', '\r\nchildeta@drexel.edu', 0),
(12, 'Collins', 'Catherine', 'Ph.D', 'Rush Building', 'Rush 424\r\n', '215 895-1902', '\r\ncollins@drexel.edu', 0),
(13, 'Dalrymple', 'Prudence', 'Ph.D', 'Rush Building', 'Rush 410A\r\n', '215 895-2699', '\r\npdalrymple@drexel.edu', 0),
(14, 'Davis', 'Susan', 'Ph.D', 'Rush Building', 'Rush 335\r\n', '215 895-1738', '\r\nsedavis@drexel.edu', 0),
(15, 'Drott', 'Carl', 'Ph.D', 'Rush Building', 'Rush 336\r\n', '215 895-2487', '\r\ndrott@drexel.edu', 0),
(16, 'Fenske', 'David', 'Ph.D', 'Rush Building', 'Rush 306\r\n', '215 895-2475', '\r\nfenske@drexel.edu', 0),
(17, 'Forte', 'Andrea', 'Ph.D', 'Rush Building', 'Rush 417', '215 895-0543', 'andrea.forte@drexel.edu', 0),
(18, 'Garrison', 'Guy', 'Ph.D', 'Rush Building', 'Rush 214A\r\n', '215 895-1459', '\r\nguy.garrison@drexel.edu', 0),
(19, 'Gasson', 'Susan', 'Ph.D', 'Rush Building', 'Rush 331\r\n', '215 895-6398', '\r\nsgasson@drexel.edu', 0),
(20, 'Goggins', 'Sean', 'Ph.D', 'Rush Building', 'Rush 405B\r\n', '215 895-1570', '\r\nsgoggins@drexel.edu', 0),
(21, 'Grillo', 'Peter', 'Ph.D', 'Rush Building', 'Rush 210\r\n', '215 895-0492', '\r\nPg54@drexel.edu', 0),
(22, 'Grubesic', 'Tony', 'Ph.D', 'Rush Building', 'Rush 233A\r\n', '215 895-3601', '\r\ngrubesic@drexel.edu', 0),
(23, 'Hislop', 'Gregory', 'Ph.D', 'Rush Building', 'Rush 214C\r\n', '215 895-2179', '\r\nhislopg@drexel.edu', 0),
(24, 'Hu', 'Xiaohua', 'Ph.D', 'Rush Building', 'Rush 133\r\n', '215 895-0551', '\r\nXh29@drexel.edu', 0),
(25, 'Ke', 'Weimao', 'Ph.D', 'Rush Building', 'Rush 408\r\n', '215 895-5912', '\r\nwk@drexel.edu', 0),
(26, 'Khoo', 'Michael', 'Ph.D', 'Rush Building', 'Rush 406\r\n', '215 895-1230', '\r\nkhoo@drexel.edu', 0),
(27, 'Lewis', 'Alison', 'Ph.D', 'Rush Building', 'Rush 207\r\n', '215 895-5959', '\r\nalewis@drexel.edu', 0),
(28, 'Li', 'Jason', 'Ph.D', 'Rush Building', 'Rush 412\r\n', '215 895-1459', '\r\nJiexun.Li@drexel.edu', 0),
(29, 'Lin', 'Xia', 'Ph.D', 'Rush Building', 'Rush 415\r\n', '215 895-2482', '\r\nxlin@drexel.edu', 0),
(30, 'Mancall', 'Jacqueline', 'Ph.D', 'Rush Building', 'Rush 214A\r\n', '215 895-2473', '\r\njackie.mancall@drexel.edu', 0),
(31, 'Marion', 'Linda', 'Ph.D', 'Rush Building', 'Rush 216\r\n', '215 895-1532', '\r\nlinda.marion@drexel.edu', 0),
(32, 'McCain', 'Katherine', 'Ph.D', 'Rush Building', 'Rush 421\r\n', '215 895-2486', '\r\nmccainkw@drexel.edu', 0),
(33, 'McCain', 'Katherine', 'Ph.D', 'Rush Building', 'Rush 421\r\n', '215 895-2486', '\r\nmccainkw@drexel.edu', 0),
(34, 'Irvin Morris', 'Vanessa', 'M.S.L', 'Rush Building', 'Rush 208', '215 895-1263', 'vmorris@drexel.edu', 0),
(35, 'Neuman', 'Delia', 'Ph.D', 'Rush Building', 'Rush 419\r\n', '215 895-0474', '\r\ndneuman@drexel.edu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Prof_Event`
--

CREATE TABLE IF NOT EXISTS `Prof_Event` (
  `profEventID` int(11) NOT NULL AUTO_INCREMENT,
  `profID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  PRIMARY KEY (`profEventID`),
  KEY `profID` (`profID`,`eventID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Prof_Event`
--

INSERT INTO `Prof_Event` (`profEventID`, `profID`, `eventID`) VALUES
(1, 10, 1),
(10, 10, 2),
(2, 11, 1),
(3, 12, 2),
(4, 13, 2),
(5, 14, 1),
(6, 15, 2),
(7, 16, 1),
(8, 17, 2),
(9, 18, 1);
