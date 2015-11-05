-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 nov 2015 om 19:15
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
  `subject` varchar(40) NOT NULL,
  `duration` time NOT NULL,
  `goal` text NOT NULL,
  `finished_on` datetime NOT NULL,
  `done` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `planning`
--

INSERT INTO `planning` (`id`, `parent_table`, `parent_id`, `date_start`, `date_end`, `subject`, `duration`, `goal`, `finished_on`, `done`) VALUES
(2, 'assignments', 5, '2015-10-31', '2015-11-01', 'Studeren & Presenteren', '00:00:00', 'Work on the webpage to meet the requirements for the assignment', '2015-11-01 22:00:00', 1),
(3, 'assignments', 5, '2015-11-01', '2015-11-01', 'Studeren & Presenteren', '00:00:00', 'Make entries easier to insert and edit, especcially for the planning.', '2015-11-01 22:00:00', 1),
(4, 'subjects', 4, '2015-11-03', '2015-11-04', 'Basispracticum', '02:00:00', 'Voorbereiden practicum fotosynthese', '2015-11-05 00:37:01', 1),
(5, 'subjects', 6, '2015-11-02', '2015-11-02', 'Celfysiologie', '00:00:15', 'Lees: Hs10.1; Hs11', '2015-11-02 22:47:30', 1),
(6, 'subjects', 6, '2015-11-04', '2015-11-05', 'Celfysiologie', '00:15:00', 'Lees: Hs10.4; Hs11', '2015-11-04 17:18:19', 1),
(7, 'subjects', 3, '2015-11-03', '2015-11-08', 'Fundamentele Informatica 1', '01:00:00', 'Maak opgavenblad talen', '0000-00-00 00:00:00', 0),
(8, 'assignments', 3, '2015-11-04', '2015-11-04', 'Programmeermethoden', '02:00:00', 'Maken verslag Life', '2015-11-04 19:20:26', 1),
(10, 'subjects', 2, '2015-11-04', '2015-11-08', 'Programmeermethoden', '00:45:00', 'Maak opgavenblad werkcollege', '0000-00-00 00:00:00', 0),
(11, 'assignments', 5, '2015-11-05', '2015-11-05', 'Studeren & Presenteren', '00:30:00', 'Create introduction article', '2015-11-05 19:14:04', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
