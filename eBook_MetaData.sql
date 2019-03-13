-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2019 at 01:49 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `eBook_MetaData`
--

CREATE TABLE `eBook_MetaData` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creator` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `identifier` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `language` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eBook_MetaData`
--

INSERT INTO `eBook_MetaData` (`id`, `creator`, `title`, `type`, `identifier`, `date`, `language`, `description`) VALUES
(1, 'John Smith', 'Book Title', 'Fiction', 'ISBN0007', '2019-03-03', 'English', 'Description of the book.'),
(2, 'Jane Doe', 'Jaws II', 'Fiction', 'ISBN009', '2018-04-04', 'French', 'Le Description'),
(12, 'Barry', 'titel', 'factual', '', '2019-03-06', '', ''),
(23, 'Voltaire', 'Pangloss', '', 'ISBM94875', '1788-03-04', 'French', ''),
(24, 'Goethe', 'Faust', '', '', '1831-03-09', 'German', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eBook_MetaData`
--
ALTER TABLE `eBook_MetaData`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eBook_MetaData`
--
ALTER TABLE `eBook_MetaData`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
