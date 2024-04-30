-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 03:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ops`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `AdminID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`AdminID`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `Username`, `Password`) VALUES
(1, 'RUKUNDO', 'Germaine', 'germaine', '078676655', 'germ', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `permissionapprovals`
--

CREATE TABLE `permissionapprovals` (
  `ApprovalID` int(11) NOT NULL,
  `PermissionID` int(11) DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `ApprovalStatus` enum('Accept','Deny') DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `PermissionID` int(11) NOT NULL,
  `RegNo` varchar(50) DEFAULT NULL,
  `Reason` varchar(255) DEFAULT NULL,
  `LeaveStartDate` date DEFAULT NULL,
  `LeaveEndDate` date DEFAULT NULL,
  `Status` enum('Pending','Accepted','Denied','Terminated') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`PermissionID`, `RegNo`, `Reason`, `LeaveStartDate`, `LeaveEndDate`, `Status`) VALUES
(1, 'BIT222013696', 'sick', '2024-04-26', '2024-04-27', 'Terminated');

-- --------------------------------------------------------

--
-- Table structure for table `studentaccounts`
--

CREATE TABLE `studentaccounts` (
  `StudentAccountID` int(11) NOT NULL,
  `RegNo` varchar(60) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentaccounts`
--

INSERT INTO `studentaccounts` (`StudentAccountID`, `RegNo`, `Username`, `Password`) VALUES
(222013696, 'BIT222013696', 'Emile ', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `RegNo` varchar(50) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`RegNo`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `Address`, `DateOfBirth`, `Department`) VALUES
('BIT222013696', 'NIYOGUSHIMWA', 'Emile', 'niyogushimwaemile@gmail.com', '0782203457', 'huye', '0000-00-00', 'BIT');

-- --------------------------------------------------------

--
-- Table structure for table `superadmins`
--

CREATE TABLE `superadmins` (
  `SuperAdminID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmins`
--

INSERT INTO `superadmins` (`SuperAdminID`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `Username`, `Password`) VALUES
(1, 'KABANDA', 'Jackon', 'jack@gmail.com', '07645544263', 'kabanda', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- Indexes for table `permissionapprovals`
--
ALTER TABLE `permissionapprovals`
  ADD PRIMARY KEY (`ApprovalID`),
  ADD KEY `PermissionID` (`PermissionID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`PermissionID`),
  ADD KEY `RegNo` (`RegNo`);

--
-- Indexes for table `studentaccounts`
--
ALTER TABLE `studentaccounts`
  ADD PRIMARY KEY (`StudentAccountID`),
  ADD KEY `RegNo` (`RegNo`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`RegNo`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- Indexes for table `superadmins`
--
ALTER TABLE `superadmins`
  ADD PRIMARY KEY (`SuperAdminID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissionapprovals`
--
ALTER TABLE `permissionapprovals`
  MODIFY `ApprovalID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `PermissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentaccounts`
--
ALTER TABLE `studentaccounts`
  MODIFY `StudentAccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222013697;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissionapprovals`
--
ALTER TABLE `permissionapprovals`
  ADD CONSTRAINT `permissionapprovals_ibfk_1` FOREIGN KEY (`PermissionID`) REFERENCES `permissions` (`PermissionID`),
  ADD CONSTRAINT `permissionapprovals_ibfk_2` FOREIGN KEY (`AdminID`) REFERENCES `administrators` (`AdminID`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `students` (`RegNo`);

--
-- Constraints for table `studentaccounts`
--
ALTER TABLE `studentaccounts`
  ADD CONSTRAINT `studentaccounts_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `students` (`RegNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
