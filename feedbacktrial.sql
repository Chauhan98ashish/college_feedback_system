-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 08:48 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedbacktrial`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `admin_id`, `password`) VALUES
('admin', 'admin_akgec', 'admin_feedback');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `name` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name`, `branch`, `username`, `password`, `email`) VALUES
('Er. RADHIKA', 'EI', '016', 'c5180a7b80ff99360745a03ca1c78512', 'radhika@gmail.com'),
('Dr. CHARU', 'CS', '020', '3144bbacb4f09548fd1ed6a2ed4905e6', 'charu@gmail.com'),
('Dr. RAJEEV', 'CS', '027', 'c7a17dab86a0764b132e98d529a5f17c', 'rajeev@gmail.com'),
('Dr. SALONI', 'EN', '029', 'f58b0a10facde30cbe815404004cb1c2', 'saloni@gmail.com'),
('Er. ABDUL', 'EI', '031', '7dff02fabb5dedacfd4c42d252764882', 'abdul@gmail.com'),
('Er. HARISH', 'EC', '032', 'e9a5c026d9e816b3782d24b28a644f90', 'harish@gmail.com'),
('Dr. CHETANA', 'EC', '041', '32e4f1949724c8816f809cfbc40fcea7', 'chetana@gmail.com'),
('Dr. PRADEEP', 'ME', '051', 'b22eba40a68c3b52f1930aa645720efb', 'pradeep@gmail.com'),
('Dr. SHIMLI', 'ME', '056', '49a402524dfb45f295aa641e07699bdc', 'shimli@gmail.com'),
('Dr. MRIGNAINY', 'IT', '062', '12abb0c3b0ad99b8871bdef1b1caa1e6', 'mrignainy@gmail.com'),
('Dr. VIJAY', 'CE', '065', 'e66432628f96cf6a10a81c8c62558060', 'vijay@gmail.com'),
('Dr. SUNITA', 'CE', '068', 'd9e9e4c8b2ecfa8a384580b7ced2f60e', 'sunita@gmail.com'),
('Mr. MONTU', 'IT', '069', 'a7bf625167a2bcac7c390ba769b674c0', 'montu@gmail.com'),
('Dr. SACHIN', 'CS', '072', 'eee270c865bad6e4fd1297ba4a1c362c', 'sachin@gmail.com'),
('Dr. MAMTA', 'IT', '076', '950f6c15b86643ce7724fc02661859af', 'mamta@gmail.com'),
('Dr. RITU', 'EN', '094', '117a268e745908c9f683dda5bb2fb4c5', 'ritu@gmail.com'),
('Dr. NEETU', 'EC', '098', 'f0760f869d6d127a2671a380e0f6c90c', 'neetu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `fac_feed`
--

CREATE TABLE `fac_feed` (
  `username` varchar(50) NOT NULL,
  `rating` float NOT NULL,
  `no_std` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fac_feed`
--

INSERT INTO `fac_feed` (`username`, `rating`, `no_std`) VALUES
('020', 3.9, 2),
('027', 3.3, 2),
('072', 3.4, 2),
('032', 1.8, 1),
('041', 4.4, 1),
('098', 3.8, 1),
('065', 4.4, 1),
('068', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `stu_id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `rate1` int(5) NOT NULL,
  `rate2` int(5) NOT NULL,
  `rate3` int(5) NOT NULL,
  `rate4` int(5) NOT NULL,
  `rate5` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`stu_id`, `username`, `rate1`, `rate2`, `rate3`, `rate4`, `rate5`) VALUES
(1802713069, '020', 5, 4, 4, 5, 4),
(1802713069, '027', 5, 5, 5, 3, 3),
(1802713069, '072', 4, 5, 4, 5, 4),
(1802711075, '020', 4, 3, 4, 4, 2),
(1802711075, '027', 2, 2, 3, 4, 1),
(1802711075, '072', 1, 2, 2, 3, 4),
(1802713365, '032', 2, 2, 2, 1, 2),
(1802713365, '041', 4, 5, 4, 5, 4),
(1802713365, '098', 4, 5, 4, 3, 3),
(1802712956, '065', 5, 4, 3, 5, 5),
(1802712956, '068', 2, 2, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `roll_no` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll_no`, `name`, `year`, `username`, `password`, `mobile_no`) VALUES
('1802711065', 'PRIYA', '2', '1802711065', '788aedd9e07f89eaed515e11523e5524', '8651235789'),
('1802711075', 'NIHAL', '2', '1802711075', '4687a6544e953d5aac1f08b369b333f0', '6325987451'),
('1802712956', 'DAKSH', '2', '1802712956', 'a12c9e1502b4e5790bdce95b6f350604', '6951578952'),
('1802712981', 'AKASH', '2', '1802712981', 'd73cb4a662ad1890dbd36065d09d7fb2', '8563215485'),
('1802713026', 'ashish', '2', '1802713026', 'b3eb9ff6c6ef12c0548b2f0d9bb6bae4', '8485756256'),
('1802713069', 'NIMISH', '2', '1802713069', 'a4e0fe6d0349799da813549bf5f215c3', '6965315544'),
('1802713072', 'NIKUNJ', '2', '1802713072', '5c18ad67b1710f6d02f0eaa44b4bdb55', '8563214587'),
('1802713075', 'PRIYANSHU GOEL', '2', '1802713075', '9ad273688791aa604e74bb950b404a8b', '6398216904'),
('1802713098', 'NITIN', '2', '1802713098', '66581fdc4fb6e28164e3499c0ad42a38', '6932156489'),
('1802713365', 'AKARSHI', '2', '1802713365', 'd977cc729390cf215f1c0e2ebb38f0b5', '8563215987');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `roll_no` (`roll_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
