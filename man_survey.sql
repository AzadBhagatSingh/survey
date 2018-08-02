-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 06:03 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `man_survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Question` text NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QId`, `UserId`, `Question`, `Status`, `CreatedAt`) VALUES
(1, 1, 'What is your mother name? What is your mother name? What is your mother name?', 1, '2018-07-24 07:49:57'),
(2, 1, 'What is your hobbies?', 1, '2018-07-23 10:52:05'),
(3, 1, 'What is your Father Name?', 1, '2018-07-24 04:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `survey_result`
--

CREATE TABLE `survey_result` (
  `Id` int(11) NOT NULL,
  `TestId` int(11) NOT NULL,
  `MinMarks` int(11) NOT NULL,
  `MaxMarks` int(11) NOT NULL,
  `ResultUrl` text NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_result`
--

INSERT INTO `survey_result` (`Id`, `TestId`, `MinMarks`, `MaxMarks`, `ResultUrl`, `Status`, `CreatedAt`) VALUES
(1, 4, 1, 12, 'http://localhost/Survey/test', 1, '2018-07-25 04:01:25'),
(2, 4, 1, 14, 'http://localhost/Survey/test', 1, '2018-07-25 04:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `survey_test`
--

CREATE TABLE `survey_test` (
  `Id` int(11) NOT NULL,
  `TestName` varchar(255) NOT NULL,
  `CreatedForUser` int(11) NOT NULL,
  `QuestionIds` varchar(255) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_test`
--

INSERT INTO `survey_test` (`Id`, `TestName`, `CreatedForUser`, `QuestionIds`, `CreatedBy`, `Status`, `CreatedAt`) VALUES
(1, 'Test1', 3, '3,2,1', 1, 1, '2018-07-25 03:47:53'),
(2, 'Test2', 2, '3,2,1', 1, 1, '2018-07-25 03:51:37'),
(3, 'Test3', 2, '3,2,1', 1, 1, '2018-07-25 03:51:55'),
(4, 'New Test', 2, '3,2,1', 1, 1, '2018-07-25 04:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `UserType` tinyint(4) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FullName`, `UserName`, `Password`, `UserType`, `Status`, `CreatedAt`) VALUES
(1, 'Admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2018-07-23 04:15:55'),
(2, 'Manmohan Sahu', 'mannysahu', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '2018-07-24 04:22:32'),
(3, 'Azad Bhagat Singh', 'azad', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '2018-07-24 04:52:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QId`);

--
-- Indexes for table `survey_result`
--
ALTER TABLE `survey_result`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `survey_test`
--
ALTER TABLE `survey_test`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey_result`
--
ALTER TABLE `survey_result`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `survey_test`
--
ALTER TABLE `survey_test`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
