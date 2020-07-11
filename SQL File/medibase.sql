-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 02:52 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medibase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `adminusernm` varchar(255) NOT NULL,
  `adminpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`adminusernm`, `adminpassword`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `medidonate`
--

CREATE TABLE `medidonate` (
  `donorsid` varchar(50) NOT NULL,
  `medicinenm` varchar(50) NOT NULL,
  `donatedate` date NOT NULL,
  `expdate` date NOT NULL,
  `usedfor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medidonate`
--

INSERT INTO `medidonate` (`donorsid`, `medicinenm`, `donatedate`, `expdate`, `usedfor`) VALUES
('cse21062000', 'Corcin', '2020-05-14', '2020-05-14', 'Used to cure mild fever'),
('cse21062000', 'Antacid', '2020-05-07', '2020-05-07', 'used to cure acidity'),
('w3ddrr', 'strong viagra', '2020-07-03', '2020-06-25', 'Used to last forever in bed'),
('w3ddrr', 'insulin', '2020-07-03', '2020-07-01', 'Diabetes'),
('w3ddrr', 'insulin', '2020-07-03', '2020-07-01', 'Diabetes'),
('', 'insulin', '2020-07-03', '2020-07-01', 'Diabetes'),
('w3ddrr', 'nothin', '2020-07-09', '2020-07-09', 'nothin'),
('w3ddrr', 'fu', '2020-07-09', '2020-07-02', 'fu'),
('w3ddrr', 'nothing', '2020-07-03', '2020-07-08', 'nothin'),
('cse21062000', 'aa', '2020-07-09', '2020-07-10', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `memberinfo`
--

CREATE TABLE `memberinfo` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `memvalidadmin` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memberinfo`
--

INSERT INTO `memberinfo` (`firstname`, `lastname`, `user`, `email`, `phone`, `password`, `memvalidadmin`) VALUES
('Jay', 'Rathod', 'cse21062000', 'cse21062000@gmail.com', '9512710401', '00026012', 1),
('Prakruti', 'Rathod ', 'prakruti27052005', 'prakruti27052005@gmail.com', '8758598727', '746589@Jay', 1),
('Pranami', 'Rajput', 'pranami', '28dcs096@charusat.edu.in', '8160042463', '8160042463', 1),
('Darshan ', 'Raval', 'w3ddrr', '18dcs099@charusat.edu.in', '8898814643', '00026012', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ngoapp`
--

CREATE TABLE `ngoapp` (
  `ngoappname` varchar(255) NOT NULL,
  `ngoappemail` varchar(255) NOT NULL,
  `ngoappphone` varchar(11) NOT NULL,
  `ngoappurl` varchar(50) NOT NULL,
  `ngoappdesc` varchar(300) NOT NULL,
  `ngoappdate` date NOT NULL,
  `ngoappstatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngoapp`
--

INSERT INTO `ngoapp` (`ngoappname`, `ngoappemail`, `ngoappphone`, `ngoappurl`, `ngoappdesc`, `ngoappdate`, `ngoappstatus`) VALUES
('goonj', 'cse@gmail.com', '1234567890', 'http://localhost/S341/OUMDN/ngo/ngo_appointment.ph', 'hello appointment', '2020-06-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ngoinfo`
--

CREATE TABLE `ngoinfo` (
  `ngoname` varchar(255) NOT NULL,
  `ngoemail` varchar(255) NOT NULL,
  `ngophone` varchar(11) NOT NULL,
  `ngourl` varchar(50) NOT NULL,
  `location` varchar(250) NOT NULL,
  `ngopassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngoinfo`
--

INSERT INTO `ngoinfo` (`ngoname`, `ngoemail`, `ngophone`, `ngourl`, `location`, `ngopassword`) VALUES
('goonj', 'cse21062000@gmail.com', '9512710401', 'https://www.codeproject.com/Questions/1233256/What', 'India', '00026012'),
('jay', 'cse21062000@gmail.com', '1234567890', 'https://www.w3schools.com/php/php_syntax.asp', 'Gujarat', '123'),
('jayrathod', 'cse21062000@gmail.com', '1234567890', 'https://goonj.org/donate?gclid=CjwKCAjwxLH3BRApEiw', 'America', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`adminusernm`);

--
-- Indexes for table `memberinfo`
--
ALTER TABLE `memberinfo`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `ngoapp`
--
ALTER TABLE `ngoapp`
  ADD PRIMARY KEY (`ngoappname`);

--
-- Indexes for table `ngoinfo`
--
ALTER TABLE `ngoinfo`
  ADD PRIMARY KEY (`ngoname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
