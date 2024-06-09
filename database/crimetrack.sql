-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 05:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crimetrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `Log_Id` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `contactno` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `utype` varchar(200) NOT NULL,
  `design` varchar(200) NOT NULL,
  `addrs` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `Log_Id`, `name`, `contactno`, `email`, `username`, `password`, `date`, `utype`, `design`, `addrs`, `photo`) VALUES
(1, 'AKL0021542786003', 'Crime', '9847011216', 'crime@gmail.com', 'crimetrack', 'crimetrack', '2023-04-09', 'Administrator', 'E C', 'Kochi', 'person-08-big.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `case_reg`
--

CREATE TABLE `case_reg` (
  `case_id` int(11) NOT NULL,
  `Log_Id` text NOT NULL,
  `aadharno` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `cntno1` varchar(20) NOT NULL,
  `cntno2` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `addr` text NOT NULL,
  `state` varchar(200) NOT NULL,
  `dstrct` varchar(200) NOT NULL,
  `pncth` varchar(200) NOT NULL,
  `pcode` varchar(200) NOT NULL,
  `adate` date NOT NULL,
  `station` varchar(200) NOT NULL,
  `pcntno` text NOT NULL,
  `date` date NOT NULL,
  `caser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `msg_id` int(11) NOT NULL,
  `Log_Id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `cntno` varchar(200) NOT NULL,
  `subjct` varchar(200) NOT NULL,
  `poli_station` varchar(100) NOT NULL,
  `descp` text NOT NULL,
  `date` date NOT NULL,
  `reply` text NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `cand_id` int(11) NOT NULL,
  `Log_Id` text NOT NULL,
  `aadharno` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `cntno1` varchar(20) NOT NULL,
  `cntno2` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `addr` text NOT NULL,
  `state` varchar(200) NOT NULL,
  `dstrct` varchar(200) NOT NULL,
  `pncth` varchar(200) NOT NULL,
  `pcode` varchar(200) NOT NULL,
  `adate` date NOT NULL,
  `station` varchar(200) NOT NULL,
  `pcntno` text NOT NULL,
  `date` date NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `Log_Id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `subjct` varchar(200) NOT NULL,
  `descp` text NOT NULL,
  `date` date NOT NULL,
  `reply` text NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `subjct` varchar(200) NOT NULL,
  `descp` text NOT NULL,
  `date` date NOT NULL,
  `tme` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `peop_id` int(11) NOT NULL,
  `Log_Id` text NOT NULL,
  `aadharno` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `cntno` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `addr` text NOT NULL,
  `dstrct` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `pcode` varchar(200) NOT NULL,
  `pncth` varchar(200) NOT NULL,
  `wrd` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `utype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pl_station`
--

CREATE TABLE `pl_station` (
  `poli_id` int(11) NOT NULL,
  `Log_Id` text NOT NULL,
  `sname` text NOT NULL,
  `locatin` varchar(200) NOT NULL,
  `addr` text NOT NULL,
  `stat` varchar(200) NOT NULL,
  `dist` varchar(200) NOT NULL,
  `area` varchar(20) NOT NULL,
  `scname` varchar(200) NOT NULL,
  `cntno1` varchar(200) NOT NULL,
  `cntno2` varchar(200) NOT NULL,
  `email` text NOT NULL,
  `photo` text NOT NULL,
  `jdate` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `about` text NOT NULL,
  `utype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warning_cr`
--

CREATE TABLE `warning_cr` (
  `wrng_id` int(11) NOT NULL,
  `Log_Id` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `aadharno` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `cntno` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `dstrct` varchar(200) NOT NULL,
  `pncth` varchar(200) NOT NULL,
  `sidate` date NOT NULL,
  `sitm` varchar(200) NOT NULL,
  `stat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wrngtemp`
--

CREATE TABLE `wrngtemp` (
  `vot_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sidate` date NOT NULL,
  `sitm` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `case_reg`
--
ALTER TABLE `case_reg`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`cand_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`peop_id`);

--
-- Indexes for table `pl_station`
--
ALTER TABLE `pl_station`
  ADD PRIMARY KEY (`poli_id`);

--
-- Indexes for table `warning_cr`
--
ALTER TABLE `warning_cr`
  ADD PRIMARY KEY (`wrng_id`);

--
-- Indexes for table `wrngtemp`
--
ALTER TABLE `wrngtemp`
  ADD PRIMARY KEY (`vot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_reg`
--
ALTER TABLE `case_reg`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crime`
--
ALTER TABLE `crime`
  MODIFY `cand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `peop_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pl_station`
--
ALTER TABLE `pl_station`
  MODIFY `poli_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warning_cr`
--
ALTER TABLE `warning_cr`
  MODIFY `wrng_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wrngtemp`
--
ALTER TABLE `wrngtemp`
  MODIFY `vot_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
