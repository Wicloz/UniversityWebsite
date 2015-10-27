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
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(11) NOT NULL,
  `page` varchar(30) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page`, `content`) VALUES
(1, 'semester-overview', 'table_events, table_assignments, table_exams'),
(2, 'exams', 'article_calendars_exams, table_exams'),
(3, 'assignments', 'table_assignments'),
(4, 'assignments_item', 'item_assignment'),
(5, 'home', ''),
(6, 'contact', ''),
(7, 'schedule', 'article_calendars_schedule, article_calendars_schedule_1ejrnaj, article_calendars_schedule_1ejrvoorj'),
(8, 'edit-entry', 'form_editItem'),
(9, 'login', 'form_login, article_forms_bblogin'),
(10, 'list-entries', 'list_dataItems'),
(11, 'upload', 'form_uploadAny'),
(12, 'subjects_I_fi1', 'article_subjects_fi1'),
(13, 'subjects_I_pm', 'article_subjects_pm'),
(14, 'subjects_I_stpr', 'article_subjects_stpr'),
(15, 'subjects_B_bp', 'article_subjects_bp'),
(16, 'subjects_B_cf', 'article_subjects_cf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
