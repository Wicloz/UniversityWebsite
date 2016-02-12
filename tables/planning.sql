-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: putter.vuw.leidenuniv.nl:3306
-- Generation Time: Feb 12, 2016 at 10:44 AM
-- Server version: 5.5.46-log
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
-- Table structure for table `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
`id` int(11) NOT NULL,
  `parent_table` varchar(20) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `subject` varchar(40) NOT NULL,
  `duration` time NOT NULL,
  `goal` text NOT NULL,
  `finished_on` datetime NOT NULL,
  `done` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `planning`
--

INSERT INTO `planning` (`id`, `parent_table`, `parent_id`, `date_start`, `date_end`, `subject`, `duration`, `goal`, `finished_on`, `done`) VALUES
(2, 'assignments', 5, '2015-10-31', '2015-11-01', 'Studeren & Presenteren', '00:00:00', 'Work on the webpage to meet the requirements for the assignment', '2015-11-01 22:00:00', 1),
(3, 'assignments', 5, '2015-11-01', '2015-11-01', 'Studeren & Presenteren', '00:00:00', 'Make entries easier to insert and edit, especcially for the planning', '2015-11-01 22:00:00', 1),
(4, 'subjects', 4, '2015-11-03', '2015-11-04', 'Basispracticum', '02:00:00', 'Voorbereiden practicum fotosynthese', '2015-11-05 00:37:01', 1),
(5, 'subjects', 6, '2015-11-02', '2015-11-02', 'Celfysiologie', '00:00:15', 'Lees: Hs10.1; Hs11', '2015-11-02 22:47:30', 1),
(6, 'subjects', 6, '2015-11-04', '2015-11-05', 'Celfysiologie', '00:15:00', 'Lees: Hs10.4; Hs11', '2015-11-04 17:18:19', 1),
(8, 'assignments', 3, '2015-11-04', '2015-11-04', 'Programmeermethoden', '02:00:00', 'Maken verslag Life', '2015-11-04 19:20:26', 1),
(10, 'subjects', 2, '2015-11-04', '2015-11-08', 'Programmeermethoden', '00:45:00', 'Maak opgavenblad werkcollege', '2015-11-06 16:45:16', 1),
(11, 'assignments', 5, '2015-11-05', '2015-11-05', 'Studeren & Presenteren', '00:30:00', 'Create introduction article', '2015-11-05 19:14:04', 1),
(13, 'tentamens', 8, '2015-11-07', '2015-11-07', 'Celfysiologie', '00:45:00', 'Lees samenvattingen hoofdstukken door', '2015-11-07 22:08:39', 1),
(15, 'tentamens', 8, '2015-11-07', '2015-11-10', 'Celfysiologie', '02:00:00', 'Kijk verzamelde video''s', '2015-11-10 23:14:44', 1),
(18, 'subjects', 4, '2015-11-14', '2015-11-14', 'Basispracticum', '02:00:00', 'Afschrijven labjournaal dag 1', '2015-11-14 22:45:33', 1),
(19, 'subjects', 4, '2015-11-15', '2015-11-15', 'Basispracticum', '01:00:00', 'Schrijven en voorbereiden proeven dag 2', '2015-11-15 17:43:43', 1),
(20, 'subjects', 5, '2015-11-13', '2015-11-14', 'Microbiologie', '02:00:00', 'Lees: Campbell Hs5.3, Hs8.1, Hs27.1; Syllabus H2, H3, H4', '2015-11-15 13:18:39', 1),
(21, 'subjects', 5, '2015-11-14', '2015-11-14', 'Microbiologie', '02:00:00', 'Lees: Campbell Hs27.1, Hs27.3; Syllabus H1', '2015-11-15 16:44:23', 1),
(22, 'subjects', 5, '2015-11-15', '2015-11-15', 'Microbiologie', '02:00:00', 'Lees: Campbell Hs27.6; Syllabus H6, H7, H8', '2015-12-07 13:33:01', 1),
(23, 'subjects', 5, '2015-11-16', '2015-11-16', 'Microbiologie', '02:00:00', 'Lees: Campbell Hs7.2, Hs25.3, Hs31', '2015-11-21 13:13:42', 1),
(24, 'subjects', 5, '2015-11-21', '2015-11-22', 'Microbiologie', '02:00:00', 'Lees: Campbell Hs10, Hs18, Hs55.4, Hs37.3, Hs27.5', '2015-11-22 10:23:01', 1),
(25, 'subjects', 5, '2015-11-30', '2015-11-30', 'Microbiologie', '01:00:00', 'Lees: Syllabus H5', '2015-12-01 11:10:59', 1),
(26, 'subjects', 3, '2015-11-23', '2015-11-23', 'Fundamentele Informatica 1', '01:00:00', 'Lees tentamen maart 2015 door', '2015-11-23 16:18:14', 1),
(27, 'assignments', 7, '2015-11-19', '2015-11-19', 'Studeren & Presenteren', '04:00:00', 'Work on presentation Human Microbiome', '2015-11-19 14:30:47', 1),
(28, 'assignments', 7, '2015-11-23', '2015-11-23', 'Studeren & Presenteren', '01:00:00', 'Prepare for presentation', '2015-11-23 17:00:48', 1),
(30, 'subjects', 7, '2015-11-28', '2015-11-29', 'Celbiologie', '01:00:00', 'Bestudeer powerpoints kern', '2015-11-30 13:00:04', 1),
(31, 'tentamens', 4, '2015-12-08', '2015-12-08', 'Microbiologie', '03:00:00', 'Lees Campbell + Maak meerkeuzevragen', '2015-12-09 17:41:30', 1),
(32, 'tentamens', 4, '2015-12-10', '2015-12-10', 'Microbiologie', '03:00:00', 'Lees syllabus + Herhaal notities en rest slides', '2015-12-11 10:01:21', 1),
(33, 'tentamens', 4, '2015-12-09', '2015-12-09', 'Microbiologie', '01:30:00', 'Herhaal gedeelte powerpoints colleges', '2015-12-10 11:03:12', 1),
(34, 'tentamens', 5, '2015-12-12', '2015-12-12', 'Celbiologie', '01:30:00', 'Neem presentaties cytoskelet, signaling en kanker door', '2015-12-12 23:37:23', 1),
(35, 'tentamens', 5, '2015-12-13', '2015-12-13', 'Celbiologie', '03:00:00', 'Lees samenvattingen hoofdstukken Campbell', '2015-12-13 17:03:17', 1),
(36, 'tentamens', 5, '2015-12-14', '2015-12-14', 'Celbiologie', '02:30:00', 'Herhaal eerste 3 powerpoints + gemiste colleges', '2015-12-14 22:21:42', 1),
(37, 'tentamens', 5, '2015-12-15', '2015-12-15', 'Celbiologie', '02:30:00', 'Herhaal college 7 en 8', '2015-12-15 18:55:04', 1),
(38, 'subjects', 9, '2016-02-08', '2016-02-09', 'Biochemie', '01:00:00', 'Maak excel sheet NADH/BSA', '2016-02-09 15:48:00', 1),
(39, 'subjects', 12, '2016-02-09', '2016-02-12', 'Logica', '02:30:00', 'Lees 1.4: Semantics of propositional logic', '2016-02-12 09:25:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `planning`
--
ALTER TABLE `planning`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `planning`
--
ALTER TABLE `planning`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
