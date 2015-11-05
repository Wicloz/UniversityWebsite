-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 nov 2015 om 19:16
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
-- Tabelstructuur voor tabel `tentamens`
--

CREATE TABLE IF NOT EXISTS `tentamens` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `weight` varchar(20) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `substance` text NOT NULL,
  `link` text NOT NULL,
  `mark` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tentamens`
--

INSERT INTO `tentamens` (`id`, `date`, `weight`, `subject`, `substance`, `link`, `mark`) VALUES
(1, '2015-09-21', 'Toets', 'Moleculaire Genetica', '', '', 7.1),
(2, '2015-10-16', 'Tentamen', 'Moleculaire Genetica', '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_155460_1&handle=announcements_entry&mode=view#anonymous_element_13', 7.8),
(3, '2015-10-19', 'Toets', 'Fundamentele Informatica 1', '', '', 0),
(4, '2015-12-11', 'Tentamen', 'Microbiologie', '', '', 0),
(5, '2015-12-17', 'Tentamen', 'Celbiologie', '', '', 0),
(6, '2015-12-22', 'Tentamen', 'Fundamentele Informatica 1', '', '', 0),
(7, '2016-01-05', 'Tentamen', 'Programmeermethoden', '', '', 0),
(8, '2015-11-11', 'Tentamen', 'Celfysiologie', '', '', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tentamens`
--
ALTER TABLE `tentamens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tentamens`
--
ALTER TABLE `tentamens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
