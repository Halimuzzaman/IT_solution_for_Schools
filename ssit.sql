-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 06:27 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssit`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(15) CHARACTER SET utf8 NOT NULL,
  `password` varchar(15) CHARACTER SET utf8 NOT NULL,
  `type` varchar(15) CHARACTER SET utf8 NOT NULL,
  `un_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `user_name`, `password`, `type`, `un_id`) VALUES
(1, 'srizon', '1111', 'Teacher', 225400),
(2, 'admin', 'admin', 'admin', 225586),
(3, 'solver', 'solver', 'technician', 225860),
(4, 'solver2', 'solver2', 'technician', 12456332);

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `problem_id` int(15) NOT NULL,
  `type` varchar(50) NOT NULL,
  `request_id` int(50) DEFAULT NULL,
  `technician_id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`problem_id`, `type`, `request_id`, `technician_id`, `status`) VALUES
(1, 'software', 1493299060, 225860, 'queue'),
(3, 'hardwRE', 1493235508, 225860, 'queue');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(50) NOT NULL,
  `institute_id` int(15) NOT NULL,
  `Problem_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Problem_Detail` text CHARACTER SET utf8 NOT NULL,
  `quantity` int(3) NOT NULL,
  `Sollution` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Feedback` varchar(100) NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `institute_id`, `Problem_type`, `Problem_Detail`, `quantity`, `Sollution`, `Feedback`, `posted_date`) VALUES
(1493235508, 2365895, 'hardwRE', 'need hardisc', 50, 'Not Available', 'Not Received', '2017-04-26 19:45:08'),
(1493299060, 2365895, 'software', 'windows 7', 10, 'Not Available', 'Not Received', '2017-04-27 13:18:20'),
(1493299228, 2365895, 'test', 'test', 200, '1493496959', 'Working', '2017-04-27 13:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE `solutions` (
  `solution_id` int(80) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `solv` varchar(200) CHARACTER SET utf8 NOT NULL,
  `technisian_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solutions`
--

INSERT INTO `solutions` (`solution_id`, `type`, `description`, `solv`, `technisian_id`) VALUES
(1493496959, 'test', 'idm for all browser', 'https://drive.google.com/drive/folders/0B_A6Zfr3vJ-9QVFCakZGaGtpaDg?usp=sharing', 12456332);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `division` varchar(16) NOT NULL,
  `district` varchar(20) NOT NULL,
  `institute_id` int(15) NOT NULL,
  `institute_name` varchar(100) NOT NULL,
  `access_id` int(100) NOT NULL,
  `institute_add` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`division`, `district`, `institute_id`, `institute_name`, `access_id`, `institute_add`) VALUES
('dhaka', 'kishoreganj', 2365895, 'Kishoreganj senior secondary school', 225400, '10/A, MAIN STREET, kishoreganj post office para');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`problem_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `institute_id` (`institute_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`institute_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `problem_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `queue`
--
ALTER TABLE `queue`
  ADD CONSTRAINT `queue_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `requests` (`request_id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`institute_id`) REFERENCES `users` (`institute_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
