-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 08:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctordata`
--

CREATE TABLE `doctordata` (
  `id` int(255) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `phoneno` int(255) NOT NULL,
  `speciality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `batch` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medname`, `company`, `expdate`, `batch`) VALUES
('Napa Tablet 500 mg', 'Beximco', '2022-07-23', 0),
('Napa Extend Tablet 65 mg', 'Beximco', '2022-07-23', 0),
('Ace 125 mg', 'Square', '2021-12-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patientdata`
--

CREATE TABLE `patientdata` (
  `id` int(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `phoneno` int(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `gender` text NOT NULL,
  `age` int(4) NOT NULL,
  `dob` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientdata`
--

INSERT INTO `patientdata` (`id`, `pname`, `email`, `password`, `phoneno`, `address`, `gender`, `age`, `dob`) VALUES
(1, 'shomik', 'abc@a.com', '123', 0, '', '', 0, 0),
(2, 'Shomik', 'fardin@gmail.com', '123', 0, '', '', 0, 0),
(3, '1997-11-11', 'fardin@gmail.com', '123', 0, '', '', 0, 0),
(4, '1997-11-11', 'fardin@gmail.com', '123', 0, '', 'male', 0, 0),
(5, '1997-11-11', 'fardin@gmail.com', '123', 0, '', 'male', 0, 0),
(6, 'Fardin', 'fardin@gmail.com', '123', 17465873, 'Basaboo', 'male', 26, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacistdata`
--

CREATE TABLE `pharmacistdata` (
  `id` int(255) NOT NULL,
  `pharname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacistdata`
--

INSERT INTO `pharmacistdata` (`id`, `pharname`, `email`, `password`) VALUES
(1, 'Mr. Nice Guy', 'niceguy@gmail.com', 'niceguy123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctordata`
--
ALTER TABLE `doctordata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientdata`
--
ALTER TABLE `patientdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacistdata`
--
ALTER TABLE `pharmacistdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctordata`
--
ALTER TABLE `doctordata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patientdata`
--
ALTER TABLE `patientdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pharmacistdata`
--
ALTER TABLE `pharmacistdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
