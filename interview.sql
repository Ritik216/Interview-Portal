-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 02:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `emailID` varchar(255) NOT NULL,
  `scheduled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`emailID`, `scheduled`) VALUES
('ritikbansal921@gmail.com', 0),
('ashishsaini338680@gmail.com', 0),
('ritikbansal921@gmail.com', 0),
('ashishsaini338680@gmail.com', 0),
('riteshthakur01@gmail.com', 0),
('abhishekdimri07@gmail.com', 0),
('riteshthakur01@gmail.com', 0),
('abhishekdimri07@gmail.com', 0),
('ayushigoyal452@gmail.com', 0),
('ayushigoyal452@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `interviewer`
--

CREATE TABLE `interviewer` (
  `emailID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interviewer`
--

INSERT INTO `interviewer` (`emailID`) VALUES
('yamini.kadakol@scaler.com'),
('yamini.kadakol@scaler.com'),
('saurabh.pandey@interviewbit.com'),
('sahil@interviewbit.com'),
('saurabh.pandey@interviewbit.com'),
('sahil@interviewbit.com');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meetingName` text NOT NULL,
  `mdate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `candidate` text NOT NULL,
  `interviewer` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meetingName`, `mdate`, `startTime`, `endTime`, `candidate`, `interviewer`, `id`) VALUES
('Ashish', '2022-03-31', '18:38:00', '18:41:00', 'ashishsaini338680@gmail.com', 'yamini.kadakol@scaler.com', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
