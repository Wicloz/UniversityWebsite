-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: putter.vuw.leidenuniv.nl:3306
-- Generation Time: Oct 27, 2015 at 10:53 AM
-- Server version: 5.5.45-log
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `s1704362`
--

-- --------------------------------------------------------

--
-- Table structure for table `tentamens`
--

CREATE TABLE IF NOT EXISTS `tentamens` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `weight` varchar(20) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `mark` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tentamens`
--

INSERT INTO `tentamens` (`id`, `date`, `weight`, `subject`, `mark`) VALUES
(1, '2015-09-21', 'Toets', 'Moleculaire Genetica', 7.1),
(2, '2015-10-16', 'Tentamen', 'Moleculaire Genetica', 7.5),
(3, '2015-10-19', 'Toets', 'Fundamentele Informatica 1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tentamens`
--
ALTER TABLE `tentamens`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tentamens`
--
ALTER TABLE `tentamens`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
