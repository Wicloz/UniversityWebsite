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
(1, 'Home', 'index.php?page=home', '', '', '', ''),
(2, 'Subjects', '', 'Fundmanetele Informatica, Programmeermethoden, Studeren & Presenteren, Moleculaire Genetica, Basispracticum', 'index.php?page=subject_I_fi1, index.php?page=subject_I_pm, index.php?page=subject_I_stpr, index.php?page=subject_B_cf, index.php?page=subject_B_bp', 'Subjects', ''),
(3, 'Semester Overview', 'index.php?page=semester-overview', 'Semester Overview, Exams, Assignments', 'index.php?page=semester-overview, index.php?page=exams, index.php?page=assignments', 'Overview', ''),
(5, 'Schedule I&B', 'index.php?page=schedule', '', '', '', ''),
(6, 'Notes', 'https://onedrive.live.com/view.aspx?resid=7A26A4E50EEC48CB!401&ithint=onenote%2c&app=OneNote&authkey=!ALF9KqGbBDdyK_M', '', '', '', '_blank');

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
