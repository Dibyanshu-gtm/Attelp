-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2019 at 06:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `att`
--

-- --------------------------------------------------------

--
-- Table structure for table `atte`
--

CREATE TABLE `atte` (
  `regno` varchar(9) NOT NULL,
  `name` text NOT NULL,
  `subid` varchar(7) NOT NULL,
  `date` date NOT NULL,
  `atten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atte`
--

INSERT INTO `atte` (`regno`, `name`, `subid`, `date`, `atten`) VALUES
('17BCE1220', 'Serena', 'CSE1002', '2019-03-13', 'Present'),
('17BEC1120', 'Wendy', 'CSE1002', '2019-03-13', 'Absent'),
('17BEC1170', 'Terence S', 'CSE1002', '2019-03-13', 'Absent'),
('17BEE1006', 'Ronald', 'CSE1002', '2019-03-13', 'Absent'),
('17BCE1100', 'Arsh', 'CSE1004', '2019-03-14', 'Present'),
('17BCE1220', 'Serena', 'CSE1004', '2019-03-14', 'Present'),
('17BCE1229', 'Jean', 'CSE1004', '2019-03-14', 'Absent'),
('17BCE1328', 'Dibyanshu Gautam', 'CSE1004', '2019-03-14', 'Present'),
('17BEC1120', 'Wendy', 'CSE1004', '2019-03-14', 'Absent'),
('17BEC1170', 'Terence S.', 'CSE1004', '2019-03-14', 'Absent'),
('17BEE1006', 'Ronald', 'CSE1004', '2019-03-14', 'Absent'),
('17BCE1100', 'Arsh ', 'CSE2006', '2019-03-14', 'Absent'),
('17BCE1229', 'Jean', 'CSE2006', '2019-03-14', 'Present'),
('17BCE1328', 'Dibyanshu Gautam', 'CSE2006', '2019-03-14', 'Present'),
('17BCE1100', 'Arsh', 'CSE1004', '2019-03-16', 'Present'),
('17BCE1220', 'Serena', 'CSE1004', '2019-03-16', 'Present'),
('17BCE1229', 'Jean', 'CSE1004', '2019-03-16', 'Absent'),
('17BCE1328', 'Dibyanshu Gautam', 'CSE1004', '2019-03-16', 'Absent'),
('17BEC1120', 'Wendy', 'CSE1004', '2019-03-16', 'Present'),
('17BEC1170', 'Terence S.', 'CSE1004', '2019-03-16', 'Absent'),
('17BEE1006', 'Ronald', 'CSE1004', '2019-03-16', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `subid` varchar(7) NOT NULL,
  `subname` text NOT NULL,
  `empno` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`subid`, `subname`, `empno`) VALUES
('CSE1002', 'Digital Logic', 'TEA1002'),
('CSE1004', 'Networking', 'TEA1001'),
('CSE2006', 'Microprocessors', 'TEA1001');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `regno` varchar(9) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`regno`, `name`, `password`) VALUES
('17BCE1328', 'Dibyanshu Gautam', 'Cristiano@7');

-- --------------------------------------------------------

--
-- Table structure for table `login1`
--

CREATE TABLE `login1` (
  `empno` varchar(7) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login1`
--

INSERT INTO `login1` (`empno`, `name`, `password`) VALUES
('TEA1001', 'Martin Garrix', 'b'),
('TEA1002', 'Marshmello', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `regno` varchar(9) NOT NULL,
  `name` text NOT NULL,
  `subid` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`regno`, `name`, `subid`) VALUES
('17BCE1328', 'Dibyanshu Gautam', 'CSE2006'),
('17BCE1328', 'Dibyanshu Gautam', 'CSE1004'),
('17BEC1170', 'Terence S', 'CSE1002'),
('17BEC1170', 'Terence S.', 'CSE1004'),
('17BCE1220', 'Serena', 'CSE1004'),
('17BCE1100', 'Arsh', 'CSE1004'),
('17BCE1229', 'Jean', 'CSE1004'),
('17BEC1120', 'Wendy', 'CSE1004'),
('17BEE1006', 'Ronald', 'CSE1004'),
('17BCE1100', 'Arsh ', 'CSE2006'),
('17BCE1220', 'Serena', 'CSE1002'),
('17BCE1229', 'Jean', 'CSE2006'),
('17BEC1120', 'Wendy', 'CSE1002'),
('17BEE1006', 'Ronald', 'CSE1002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`regno`);

--
-- Indexes for table `login1`
--
ALTER TABLE `login1`
  ADD PRIMARY KEY (`empno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
