-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 okt 2015 om 20:55
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
  `done` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `planning`
--

INSERT INTO `planning` (`id`, `parent_table`, `parent_id`, `date_start`, `date_end`, `subject`, `duration`, `goal`, `done`) VALUES
(1, 'subjects', 6, '2015-10-31', '2015-10-31', 'Celfysiologie', '01:00:00', 'Read: CH6, to p153; CH8, p203 to p211; CH36, p846 to p849; CH48, p1132 to p1138', 0),
(2, 'assignments', 5, '2015-10-31', '2015-11-01', 'Studeren & Presenteren', '00:00:00', 'Work on the webpage to meet the requirements for the assignment', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
