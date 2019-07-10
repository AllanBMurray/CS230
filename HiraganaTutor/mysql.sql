-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2019 at 06:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql`
--
CREATE DATABASE IF NOT EXISTS `mysql` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mysql`;

-- --------------------------------------------------------

--
-- Table structure for table `hiragana_db`
--

CREATE TABLE `hiragana_db` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `corrects` text NOT NULL,
  `attempts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hiragana_db`
--

INSERT INTO `hiragana_db` (`username`, `password`, `corrects`, `attempts`) VALUES
('Allan', 'pw', '1,0,4,1,0,3,1,1,0,1,2,2,1,1,0,2,0,1,0,0,1,2,1,2,1,2,1,0,1,0,2,0,2,1,1,1,1,2,0,1,2,2,2,2,0,0,1,1', '2,1,5,3,2,4,3,2,2,2,2,2,2,1,0,2,0,1,0,0,1,3,1,2,1,3,1,1,2,0,2,0,3,1,1,3,2,2,0,2,2,2,3,2,0,1,2,1'),
('Bridget', 'pw', '0,0,0,0,0,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,1,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,1,0,0,1,0,0,0,0,0,0,0,1,0,1,0,0,0,0,0,0,1,1,1,0,0'),
('Conor', 'pw', '0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,1,0,0,0,0,0,0,0,0,1,1,1,0,0,0,0,0,0,1,0,1,0,0,0,1,0,0,0,0,0,0', '0,2,0,0,1,0,1,0,0,1,1,2,0,1,1,0,1,1,1,0,1,0,1,0,0,1,1,1,1,1,0,0,0,0,0,2,1,1,0,0,0,1,1,1,1,0,1,1'),
('Kieran', 'pw', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'),
('Larry', 'pw', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'),
('Michele', 'pw', '1,1,1,1,0,0,1,1,0,0,0,1,1,1,0,1,1,1,0,1,0,0,1,1,1,0,1,1,3,0,1,0,2,2,0,0,0,1,1,2,0,0,1,1,0,1,3,0', '2,1,1,1,1,1,2,2,0,1,0,2,1,2,1,2,1,1,1,2,0,1,1,1,1,0,1,2,3,1,1,1,3,3,0,1,0,1,1,2,1,1,2,2,1,1,3,0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hiragana_db`
--
ALTER TABLE `hiragana_db`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
