-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 21, 2014 at 08:27 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `theglitc_facebookApps`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `client_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `duration` int(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `client_id`, `user_id`, `start_date`, `end_date`, `duration`, `description`, `remarks`) VALUES
(1, 3, 1, '2014-10-20 14:35:00', '2014-10-20 18:25:00', 230, 'bending over', 'taking it deep'),
(2, 2, 1, '2014-10-20 12:15:00', '2014-10-20 13:35:00', 80, 'getting boned', 'all day err day');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`) VALUES
(1, 'Lakme'),
(2, 'Domex'),
(3, 'John Abraham'),
(4, 'Set Wet'),
(5, 'Marico');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`) VALUES
(1, 'brand'),
(2, 'video'),
(3, 'entertainment'),
(4, 'global');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `team` varchar(20) NOT NULL,
  `reporting_to` varchar(30) NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `is_active` int(2) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `salt` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `team`, `reporting_to`, `type`, `created_by`, `date`, `is_active`, `first_name`, `last_name`, `salt`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '4', '0', 'admin', '', '2014-05-23 18:51:39', 1, 'Boris', 'Grishenko', ''),
(2, 'super', '5f4dcc3b5aa765d61d8327deb882cf99', '4', '0', 'super', '', '2014-05-23 18:51:42', 1, 'Clark', 'Kent', ''),
(3, 'sandeep', 'b95291eb00bd0a653c9a0e4af7d97e14', '4', '0', 'admin', 'admin', '2014-05-23 19:07:29', 1, 'Sandeep', 'Gangani', ''),
(4, 'johnathon', '887ac657751fa572188ca0934dcac9e6', '1', '0', 'lead', 'admin', '2014-05-29 19:03:15', 1, 'Johnathon', 'Shmonathon', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
