-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 okt 2015 om 17:43
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
-- Tabelstructuur voor tabel `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `abbreviation` varchar(6) NOT NULL,
  `section` varchar(20) NOT NULL,
  `substance` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `link_home` text NOT NULL,
  `link_powerpoints` text NOT NULL,
  `link_schedule` text NOT NULL,
  `link_assignments` text NOT NULL,
  `link_marks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `abbreviation`, `section`, `substance`, `active`, `link_home`, `link_powerpoints`, `link_schedule`, `link_assignments`, `link_marks`) VALUES
(1, 'Studeren & Presenteren', 'stpr', 'informatica', '', 1, '', '', '', '', ''),
(2, 'Programmeermethoden', 'pr', 'informatica', '', 1, '', '', '', '', ''),
(3, 'Fundamentele Informatica 1', 'fi1', 'informatica', '', 1, '', '', '', '', ''),
(4, 'Basispracticum', 'bp', 'biologie', '', 1, '', '', '', '', ''),
(5, 'Microbiologie', 'mi', 'biologie', '', 1, '', '', '', '', ''),
(6, 'Celfysiologie', 'cf', 'biologie', '', 1, '', '', '', '', ''),
(7, 'Celbiologie', 'cb', 'biologie', '', 1, '', '', '', '', ''),
(8, 'Moleculaire Genetica', 'mg', 'biologie', '', 0, '', '', '', '', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
