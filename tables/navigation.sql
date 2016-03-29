-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: putter.vuw.leidenuniv.nl:3306
-- Generation Time: Mar 29, 2016 at 08:32 PM
-- Server version: 5.5.47-log
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
-- Table structure for table `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `url` text NOT NULL,
  `sub_names` text NOT NULL,
  `sub_urls` text NOT NULL,
  `header` varchar(20) NOT NULL,
  `target` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `url`, `sub_names`, `sub_urls`, `header`, `target`) VALUES
(1, 'Home', '?page=home', '', '', '', ''),
(2, 'Semester Overview', '?page=semester-overview', 'Semester Overview, Assignments, Exams, Planning', '?page=semester-overview, ?page=assignments, ?page=exams, ?page=planning', 'Overview', ''),
(3, 'Subjects', '%SUBJECTS%', '', '', 'Subjects', ''),
(5, 'Schedule I&B', '?page=schedule', '', '', '', ''),
(6, 'Notes', 'https://onedrive.live.com/redir?resid=7A26A4E50EEC48CB!487&authkey=!AAWHeOocCttgeYQ&ithint=onenote%2c', '', '', '', '_blank');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
