-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2019 at 07:57 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ReadingList`
--
CREATE DATABASE IF NOT EXISTS `ReadingList` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ReadingList`;

-- --------------------------------------------------------

--
-- Table structure for table `ReadingListTable`
--

CREATE TABLE `ReadingListTable` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `theDate` date NOT NULL,
  `name` varchar(60) NOT NULL,
  `URL` varchar(300) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ReadingListTable`
--

INSERT INTO `ReadingListTable` (`ID`, `theDate`, `name`, `URL`, `description`) VALUES
(1, '2019-05-01', 'Book', 'www.readinglist.com', 'Book Overview Updated'),
(2, '2019-04-25', 'Book', 'www.readinglist.ie', 'Irish Overview Updated'),
(11, '2019-04-30', 'The Internet', 'www.google.com', 'Guide book'),
(12, '2019-04-30', 'Pride and Predujice', 'www.janeaustin.com', 'Classic Literature'),
(17, '2019-04-30', 'War and Peace', 'www.tolstoy.ru', 'Classic Literature'),
(18, '2019-04-30', 'Javascript', 'www.oreilly.com', 'Computer Science'),
(19, '0000-00-00', 'The Devils', 'www.dostoevsky.ru', 'Russian Literature'),
(20, '2019-05-01', 'Dubliners', 'www.joyce.ie', 'Irish Literature'),
(21, '2019-05-01', 'Learn Java', 'www.test.com', 'Computer Science'),
(22, '2019-05-01', 'Book', 'www.author.com', 'A novel.'),
(24, '2019-05-01', 'Book', 'www.onlineresource.co.uk', 'UK novel.'),
(25, '2019-05-02', 'Anna Karenin', 'www.tolstoy.ru', 'Russian Literature'),
(26, '2019-05-02', 'Ulysses', 'www.joyce.ie', 'Irish Literature');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ReadingListTable`
--
ALTER TABLE `ReadingListTable`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ReadingListTable`
--
ALTER TABLE `ReadingListTable`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
