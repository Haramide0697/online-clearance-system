-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2021 at 10:08 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `polyclear`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'Admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad');

-- --------------------------------------------------------

--
-- Table structure for table `clear`
--

CREATE TABLE IF NOT EXISTS `clear` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `for_id` bigint(20) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `matric` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `bac` varchar(255) NOT NULL,
  `hostel` varchar(255) NOT NULL,
  `sport` varchar(255) NOT NULL,
  `library` varchar(255) NOT NULL,
  `vesc` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `clear`
--

INSERT INTO `clear` (`id`, `for_id`, `sname`, `fname`, `mname`, `matric`, `dept`, `sex`, `faculty`, `bac`, `hostel`, `sport`, `library`, `vesc`, `department`, `passport`, `date`) VALUES
(9, 6, 'Oreoluwa', 'Oladeji', 'Emma', '2014070501195', 'Computer', 'male', 'science', '512895800 ', 'daf16cdfd86849c2f39bcb973f40e55162c9cd4c.jpg', '12345', 'daf16cdfd86849c2f39bcb973f40e55162c9cd4c.jpg', 'daf16cdfd86849c2f39bcb973f40e55162c9cd4c.jpg', 'daf16cdfd86849c2f39bcb973f40e55162c9cd4c.jpg', 'daf16cdfd86849c2f39bcb973f40e55162c9cd4c.jpg', 'Thursday Sep 05, 2019 08:46'),
(10, 8, 'lawal', 'Rukayat', 'Oluwaseun', '2012235020164', 'Computer', 'female', 'science', '1187332908', 'daf16cdfd86849c2f39bcb973f40e55162c9cd4c.jpg', '12345', 'daf16cdfd86849c2f39bcb973f40e55162c9cd4c.jpg', 'daf16cdfd86849c2f39bcb973f40e55162c9cd4c.jpg', 'daf16cdfd86849c2f39bcb973f40e55162c9cd4c.jpg', 'bd2188f7a47a414f6c4c9fccc9de47164f2dec18.jpg', 'Friday Sep 20, 2019 13:45'),
(11, 9, 'Oreoluwa', 'Oladeji', 'Abigael', '2014070501199', 'Computer', 'male', 'science', '123456', '2b01d58e76049e53f03a1a252f57478f54eda894.jpg', '12345', '4809c6aaa5750993d642779b79c8509c2f6ac7bf.jpg', '6f5b70ad466e57b850f5b648b4672cee3402c764.jpg', '8eb1dcdf99012cf026867e13ed54daaee06bcf9c.jpg', 'bd2188f7a47a414f6c4c9fccc9de47164f2dec18.jpg', 'Friday Sep 20, 2019 14:41');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `trans_id` varchar(255) NOT NULL,
  `payment_by` varchar(255) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `trans_id`, `payment_by`, `amount`, `date`) VALUES
(8, '512895800', '6', 5000, 'Thu Sep, 2019. 08:43:54'),
(9, '1187332908', '8', 5000, 'Thu Sep, 2019. 10:55:51'),
(10, '36017600', '9', 5000, 'Fri Sep, 2019. 14:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `matric` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `sname`, `fname`, `mname`, `matric`, `dept`, `sex`, `faculty`, `password`, `date`) VALUES
(6, 'Oreoluwa', 'Oladeji', 'Emma', '2014070501195', 'Computer', 'male', 'science', '93a42a92a5373352bae4cee03fbae546d8cf10a1', 'Thu Sep, 2019. 08:32:08'),
(7, 'Gbenga', 'Gbenga', 'Gbenga', '2014070501199', 'Computer', 'male', 'science', '4faa7d3226d94497faece30a0033e034095ac0de', 'Thu Sep, 2019. 08:55:56'),
(8, 'lawal', 'Rukayat', 'Oluwaseun', '2012235020164', 'Computer', 'female', 'science', '11d7103f4fcfb4bb29b9d7be6cfd964d75ac16ff', 'Thu Sep, 2019. 10:52:39'),
(9, 'Oreoluwa', 'Oladeji', 'Abigael', '2014070501199', 'Computer', 'male', 'science', '4faa7d3226d94497faece30a0033e034095ac0de', 'Fri Sep, 2019. 14:06:20'),
(10, 'francis', 'peace', 'emem', '2012235020156', 'physics', 'female', 'science', '5aadd50a5326c2254d62c6935788cea2d149b5aa', 'Thu Nov, 2019. 06:00:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
