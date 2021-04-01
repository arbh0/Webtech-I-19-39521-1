-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 12:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `Name` text NOT NULL,
  `User Name` text NOT NULL,
  `Email` text NOT NULL,
  `Address` text NOT NULL,
  `Password` text NOT NULL,
  `Shift` text NOT NULL,
  `Gender` text NOT NULL,
  `Date Of Birth` date NOT NULL,
  `Adminreq` text NOT NULL,
  `Mobile` int(20) NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`, `User Name`, `Email`, `Address`, `Password`, `Shift`, `Gender`, `Date Of Birth`, `Adminreq`, `Mobile`, `Image`) VALUES
(4, 'Rezaul Karim', 'rez_a', 'r.k@gmail.com', '26/2, Dhaka', '$2y$12$Jb0NKevAKaDtvVwpiI.Q0OxO7EP1c26CQz0TvRHPGuXfikJqRPauu', 'Night (4PM -12PM)', 'Male', '1997-12-29', 'on', 1819017932, 'brochure-flyer-paper-poster-logo-trademark-text-building-office-buildi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
