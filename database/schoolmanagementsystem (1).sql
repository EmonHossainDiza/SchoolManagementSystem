-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2016 at 07:19 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schoolmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
('ad-01', 'rumi', 'rumi123'),
('ad-02', 'emon', 'emon123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendedid` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `attendedid`) VALUES
(31, '2016-08-27', 'te-01'),
(32, '2016-08-27', 'st-02'),
(33, '2016-08-27', 'sta-01'),
(43, '2016-08-27', 'te-02'),
(46, '2016-08-28', 'sta-02'),
(47, '2016-08-28', 'te-01'),
(48, '2016-09-01', 'te-01'),
(49, '2016-09-01', 'sta-01');

-- --------------------------------------------------------

--
-- Table structure for table `availablecourse`
--

CREATE TABLE IF NOT EXISTS `availablecourse` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `classid` varchar(30) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `availablecourse`
--

INSERT INTO `availablecourse` (`id`, `name`, `classid`) VALUES
(1, 'Bangla 1st', '1'),
(2, 'Bangla 1st', '2'),
(3, 'Bangla 1st', '3'),
(4, 'Bangla 1st', '4'),
(5, 'Bangla 1st', '5'),
(6, 'Bangla 1st', '6'),
(7, 'Bangla 1st', '7'),
(8, 'Bangla 1st', '8'),
(9, 'Bangla 1st', '9'),
(10, 'Bangla 1st', '10'),
(11, 'Bangla 2nd', '1'),
(12, 'Bangla 2nd', '2'),
(13, 'Bangla 2nd', '3'),
(14, 'Bangla 2nd', '4'),
(15, 'Bangla 2nd', '5'),
(16, 'Bangla 2nd', '6'),
(17, 'Bangla 2nd', '7'),
(18, 'Bangla 2nd', '8'),
(19, 'Bangla 2nd', '9'),
(20, 'Bangla 2nd', '10'),
(21, 'English 1st', '1'),
(22, 'English 1st', '2'),
(23, 'English 1st', '3'),
(24, 'English 1st', '4'),
(25, 'English 1st', '5'),
(26, 'English 1st', '6'),
(27, 'English 1st', '7'),
(28, 'English 1st', '8'),
(29, 'English 1st', '9'),
(30, 'English 1st', '10'),
(31, 'English 2nd', '1'),
(32, 'English 2nd', '2'),
(33, 'English 2nd', '3'),
(34, 'English 2nd', '4'),
(35, 'English 2nd', '5'),
(36, 'English 2nd', '6'),
(37, 'English 2nd', '7'),
(38, 'English 2nd', '8'),
(39, 'English 2nd', '9'),
(40, 'English 2nd', '10');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `room` varchar(20) NOT NULL,
  `section` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `room`, `section`) VALUES
('1A', 'One', '101', 'A'),
('1B', 'One', '101', 'B'),
('2A', 'Two', '201', 'A'),
('2B', 'Two', '202', 'B'),
('3A', 'Three', '301', 'A'),
('3B', 'Three', '302', 'B'),
('4A', 'Four', '401', 'A'),
('4B', 'Four', '402', 'B'),
('5A', 'Five', '501', 'A'),
('5B', 'Five', '502', 'B'),
('6A', 'Six', '601', 'A'),
('6B', 'Six', '602', 'B'),
('7A', 'Seven', '701', 'A'),
('7B', 'Seven', '702', 'B'),
('8A', 'Eight', '801', 'A'),
('8B', 'Eight', '802', 'B'),
('9A', 'Nine', '901', 'A'),
('9B', 'Nine', '902', 'B'),
('10S', 'Ten', '1001', 'Science'),
('10A', 'Ten', '1002', 'Arts'),
('10C', 'Ten', '1002', 'Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `teacherid` varchar(20) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `teacherid`, `studentid`, `classid`) VALUES
('1', 'Bangla 1st', 'te-124-1', 'st-123-1', '1A'),
('1', 'Bangla 1st', 'te-124-1', 'st-124-1', '1A'),
('1', 'Bangla 1st', 'te-124-1', 'st-123-1', '1A'),
('1', 'Bangla 1st', 'te-124-1', 'st-124-1', '1A'),
('1', 'ansdknl', 'te-01', 'st-01', '1A');

-- --------------------------------------------------------

--
-- Table structure for table `examschedule`
--

CREATE TABLE IF NOT EXISTS `examschedule` (
  `id` varchar(20) NOT NULL,
  `examdate` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `courseid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examschedule`
--

INSERT INTO `examschedule` (`id`, `examdate`, `time`, `courseid`) VALUES
('ex-01', '2016-08-30', '9-9', '10');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
`id` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `courseid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
  `id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fathername` varchar(20) NOT NULL,
  `mothername` varchar(20) NOT NULL,
  `fatherphone` varchar(13) NOT NULL,
  `motherphone` varchar(13) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `password`, `fathername`, `mothername`, `fatherphone`, `motherphone`, `address`) VALUES
('pa-01', '123', 'akmsok', 'okm', 'okmo', 'kmom', 'oimo'),
('pa-02', 'mkmok', 'ook', 'mokm', 'omokm', 'm', 'o');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`id` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `amount` double NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
`reportid` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `teacherid` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL,
  `courseid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `hiredate` date NOT NULL,
  `address` varchar(30) NOT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `password`, `phone`, `email`, `gender`, `dob`, `hiredate`, `address`, `salary`) VALUES
('sta-01', 'weof', '123', 'qfmkwm', 'sagdukygsd', 'Male', '1998-06-08', '2016-08-27', 'nkneof', 10000),
('sta-02', 'wkodnfwk', '123', 'ioni', 'no', 'Male', '1998-08-04', '2016-08-27', 'wijndfn', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `addmissiondate` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `parentid` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `password`, `phone`, `email`, `gender`, `dob`, `addmissiondate`, `address`, `parentid`, `classid`) VALUES
('sf', '', 'df', '5436', 'dg', 'Male', '0000-00-00', '2029-08-16', 'dfg', 'df', 'dgf'),
('st-01', 'rumi', '123', 'uhml', 'knlml;', 'Male', '0000-00-00', '2027-08-16', 'sdj', 'pa-01', '5A'),
('st-02', 'emon', '123', 'kkm', 'hgkjhkjhku@com', 'Male', '1993-09-09', '2027-08-16', 'asuhfd', 'pa-02', '5B'),
('tvgv', 'hfkuh', 'gfkh', 'ghgc', 'yfkyu', 'Male', '0000-00-00', '2029-08-16', 'hvjh', 'yfk', 'tfk');

-- --------------------------------------------------------

--
-- Table structure for table `takencoursebyteacher`
--

CREATE TABLE IF NOT EXISTS `takencoursebyteacher` (
`id` int(11) NOT NULL,
  `courseid` varchar(20) NOT NULL,
  `teacherid` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `takencoursebyteacher`
--

INSERT INTO `takencoursebyteacher` (`id`, `courseid`, `teacherid`) VALUES
(2, '11', 'te-01'),
(1, '1', 'te-01');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `hiredate` date NOT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `password`, `phone`, `email`, `address`, `gender`, `dob`, `hiredate`, `salary`) VALUES
('te-01', 'Abul 1', '123', '135487', 'rumi@yahoo.com', 'km;m', 'Male', '1998-09-09', '0000-00-00', 20000),
('te-02', 'abul 2', '123', 'adrqj', 'JJ', 'IOJOPUJ', 'Male', '1999-09-07', '0000-00-00', 20000),
('tefh', 'gfh', '123', '435', 'ghjgf', '', 'Male', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`, `type`) VALUES
('ad-01', 'rumi123', 'admin'),
('ad-02', 'emon123', 'admin'),
('te-02', '123', 'teacher'),
('pa-01', '123', 'parent'),
('pa-02', 'mkmok', 'parent'),
('st-01', '123', 'student'),
('st-02', '123', 'student'),
('sta-01', '123', 'staff'),
('sta-02', '123', 'staff'),
('sf', 'df', 'student'),
('tvgv', 'gfkh', 'student'),
('tefh', '123', 'teacher'),
('te-01', '123', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availablecourse`
--
ALTER TABLE `availablecourse`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
 ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `takencoursebyteacher`
--
ALTER TABLE `takencoursebyteacher`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
 ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `availablecourse`
--
ALTER TABLE `availablecourse`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
MODIFY `reportid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `takencoursebyteacher`
--
ALTER TABLE `takencoursebyteacher`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
