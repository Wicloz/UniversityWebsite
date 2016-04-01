-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 02 apr 2016 om 00:05
-- Serverversie: 5.6.26
-- PHP-versie: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
  `id` int(11) NOT NULL,
  `parent_table` varchar(20) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `duration` time NOT NULL,
  `goal` text NOT NULL,
  `finished_on` datetime NOT NULL,
  `done` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `planning`
--

INSERT INTO `planning` (`id`, `parent_table`, `parent_id`, `date_start`, `date_end`, `duration`, `goal`, `finished_on`, `done`) VALUES
(2, 'assignments', 5, '2015-10-31', '2015-11-01', '00:00:00', 'Work on the webpage to meet the requirements for the assignment', '2015-11-01 22:00:00', 1),
(3, 'assignments', 5, '2015-11-01', '2015-11-01', '00:00:00', 'Make entries easier to insert and edit, especcially for the planning', '2015-11-01 22:00:00', 1),
(4, 'subjects', 4, '2015-11-03', '2015-11-04', '02:00:00', 'Voorbereiden practicum fotosynthese', '2015-11-05 00:37:01', 1),
(5, 'subjects', 6, '2015-11-02', '2015-11-02', '00:00:15', 'Lees: Hs10.1; Hs11', '2015-11-02 22:47:30', 1),
(6, 'subjects', 6, '2015-11-04', '2015-11-05', '00:15:00', 'Lees: Hs10.4; Hs11', '2015-11-04 17:18:19', 1),
(8, 'assignments', 3, '2015-11-04', '2015-11-04', '02:00:00', 'Maken verslag Life', '2015-11-04 19:20:26', 1),
(10, 'subjects', 2, '2015-11-04', '2015-11-08', '00:45:00', 'Maak opgavenblad werkcollege', '2015-11-06 16:45:16', 1),
(11, 'assignments', 5, '2015-11-05', '2015-11-05', '00:30:00', 'Create introduction article', '2015-11-05 19:14:04', 1),
(13, 'exams', 8, '2015-11-07', '2015-11-07', '00:45:00', 'Lees samenvattingen hoofdstukken door', '2015-11-07 22:08:39', 1),
(15, 'exams', 8, '2015-11-07', '2015-11-10', '02:00:00', 'Kijk verzamelde video''s', '2015-11-10 23:14:44', 1),
(18, 'subjects', 4, '2015-11-14', '2015-11-14', '02:00:00', 'Afschrijven labjournaal dag 1', '2015-11-14 22:45:33', 1),
(19, 'subjects', 4, '2015-11-15', '2015-11-15', '01:00:00', 'Schrijven en voorbereiden proeven dag 2', '2015-11-15 17:43:43', 1),
(20, 'subjects', 5, '2015-11-13', '2015-11-14', '02:00:00', 'Lees: Campbell Hs5.3, Hs8.1, Hs27.1; Syllabus H2, H3, H4', '2015-11-15 13:18:39', 1),
(21, 'subjects', 5, '2015-11-14', '2015-11-14', '02:00:00', 'Lees: Campbell Hs27.1, Hs27.3; Syllabus H1', '2015-11-15 16:44:23', 1),
(22, 'subjects', 5, '2015-11-15', '2015-11-15', '02:00:00', 'Lees: Campbell Hs27.6; Syllabus H6, H7, H8', '2015-12-07 13:33:01', 1),
(23, 'subjects', 5, '2015-11-16', '2015-11-16', '02:00:00', 'Lees: Campbell Hs7.2, Hs25.3, Hs31', '2015-11-21 13:13:42', 1),
(24, 'subjects', 5, '2015-11-21', '2015-11-22', '02:00:00', 'Lees: Campbell Hs10, Hs18, Hs55.4, Hs37.3, Hs27.5', '2015-11-22 10:23:01', 1),
(25, 'subjects', 5, '2015-11-30', '2015-11-30', '01:00:00', 'Lees: Syllabus H5', '2015-12-01 11:10:59', 1),
(26, 'subjects', 3, '2015-11-23', '2015-11-23', '01:00:00', 'Lees tentamen maart 2015 door', '2015-11-23 16:18:14', 1),
(27, 'assignments', 7, '2015-11-19', '2015-11-19', '04:00:00', 'Work on presentation Human Microbiome', '2015-11-19 14:30:47', 1),
(28, 'assignments', 7, '2015-11-23', '2015-11-23', '01:00:00', 'Prepare for presentation', '2015-11-23 17:00:48', 1),
(30, 'subjects', 7, '2015-11-28', '2015-11-29', '01:00:00', 'Bestudeer powerpoints kern', '2015-11-30 13:00:04', 1),
(31, 'exams', 4, '2015-12-08', '2015-12-08', '03:00:00', 'Lees Campbell + Maak meerkeuzevragen', '2015-12-09 17:41:30', 1),
(32, 'exams', 4, '2015-12-10', '2015-12-10', '03:00:00', 'Lees syllabus + Herhaal notities en rest slides', '2015-12-11 10:01:21', 1),
(33, 'exams', 4, '2015-12-09', '2015-12-09', '01:30:00', 'Herhaal gedeelte powerpoints colleges', '2015-12-10 11:03:12', 1),
(34, 'exams', 5, '2015-12-12', '2015-12-12', '01:30:00', 'Neem presentaties cytoskelet, signaling en kanker door', '2015-12-12 23:37:23', 1),
(35, 'exams', 5, '2015-12-13', '2015-12-13', '03:00:00', 'Lees samenvattingen hoofdstukken Campbell', '2015-12-13 17:03:17', 1),
(36, 'exams', 5, '2015-12-14', '2015-12-14', '02:30:00', 'Herhaal eerste 3 powerpoints + gemiste colleges', '2015-12-14 22:21:42', 1),
(37, 'exams', 5, '2015-12-15', '2015-12-15', '02:30:00', 'Herhaal college 7 en 8', '2015-12-15 18:55:04', 1),
(38, 'subjects', 9, '2016-02-08', '2016-02-09', '01:00:00', 'Maak excel sheet NADH/BSA', '2016-02-09 15:48:00', 1),
(39, 'subjects', 12, '2016-02-09', '2016-02-12', '02:30:00', 'Lees 1.4: Semantics of propositional logic', '2016-02-12 12:21:04', 1),
(40, 'subjects', 12, '2016-02-16', '2016-02-19', '01:00:00', 'Lees 1.2: Natural deduction', '2016-02-18 16:11:57', 1),
(41, 'subjects', 9, '2016-02-20', '2016-02-21', '01:30:00', 'Werk excel sheets en labjournaal bij, print gegevens uit', '2016-02-21 15:47:32', 1),
(42, 'subjects', 12, '2016-02-20', '2016-02-20', '01:00:00', 'Maak opgaven 1.2', '2016-02-20 14:56:15', 1),
(43, 'assignments', 12, '2016-02-20', '2016-02-21', '00:15:00', 'Controleer antwoorden en lever in', '2016-02-21 15:47:33', 1),
(44, 'subjects', 9, '2016-03-12', '2016-03-13', '01:00:00', 'Bereid volgend practicum voor (begin labjournaal + maak schema)', '2016-03-12 17:32:33', 1),
(46, 'subjects', 11, '2016-02-27', '2016-02-27', '01:30:00', 'Maak opgaven eerste werkcollege', '2016-02-27 15:55:02', 1),
(47, 'subjects', 11, '2016-03-01', '2016-03-01', '01:30:00', 'Maak opgaven tweede werkcollege', '2016-03-01 15:48:26', 1),
(49, 'subjects', 12, '2016-03-01', '2016-03-01', '01:00:00', 'Lees 1.4.3 en 1.4.4', '2016-03-01 21:29:16', 1),
(50, 'subjects', 11, '2016-03-02', '2016-03-02', '00:30:00', 'Herhaal laatste gedeelte college', '2016-03-03 10:46:09', 1),
(51, 'subjects', 9, '2016-03-07', '2016-03-11', '05:00:00', 'Werk labjournaal bij', '2016-03-11 16:32:59', 1),
(52, 'assignments', 15, '2016-03-07', '2016-03-07', '00:30:00', 'Controleer antwoorden en lever in', '2016-03-07 17:38:18', 1),
(53, 'subjects', 12, '2016-03-15', '2016-03-17', '01:00:00', 'Lees 1.5.1 en 1.5.2', '2016-03-18 11:26:54', 1),
(54, 'assignments', 14, '2016-03-19', '2016-03-20', '00:30:00', 'Maak programma volledig af', '2016-03-19 15:38:06', 1),
(55, 'assignments', 14, '2016-03-19', '2016-03-20', '01:00:00', 'Schrijf stuk verslag over recursie', '2016-03-19 17:26:46', 1),
(57, 'assignments', 14, '2016-03-19', '2016-03-20', '01:30:00', 'Schrijf verslag af (met Jevan)', '2016-03-20 14:50:34', 1),
(58, 'subjects', 9, '2016-03-19', '2016-03-20', '01:00:00', 'Werk excel bestand bij (temparatuur, terugreactie en Lineweaver-Burk)', '2016-03-19 21:17:54', 1),
(59, 'assignments', 16, '2016-03-19', '2016-03-21', '01:00:00', 'Lees artikel op Perusall', '2016-03-21 15:18:34', 1),
(60, 'subjects', 10, '2016-03-24', '2016-03-28', '01:00:00', 'Haal werkcollege 24-03-2016 in', '2016-03-28 22:26:04', 1),
(61, 'subjects', 11, '2016-03-24', '2016-03-24', '01:30:00', 'Haal college 23-03-2016 in', '2016-03-24 13:01:08', 1),
(62, 'subjects', 12, '2016-03-24', '2016-03-24', '00:10:00', 'Lees 1.5.3: Horn Clauses', '2016-03-24 13:24:31', 1),
(63, 'subjects', 9, '2016-03-28', '2016-03-28', '00:15:00', 'Berijd practicum van disdag voor (Aanenten bacteriën)', '2016-03-29 08:41:59', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
