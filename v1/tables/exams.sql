-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 02 apr 2016 om 00:18
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
-- Tabelstructuur voor tabel `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `weight` varchar(20) NOT NULL,
  `subject` varchar(8) NOT NULL,
  `substance` text NOT NULL,
  `link` text NOT NULL,
  `mark` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `exams`
--

INSERT INTO `exams` (`id`, `date`, `weight`, `subject`, `substance`, `link`, `mark`) VALUES
(1, '2015-09-21', 'Toets', 'mg', '', '', 7.1),
(2, '2015-10-16', 'Tentamen', 'mg', '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_155460_1&handle=announcements_entry&mode=view#anonymous_element_13', 7.8),
(3, '2015-10-19', 'Toets', 'fi1', '', '', 9),
(4, '2015-12-11', 'Tentamen', 'mi', 'H27.1, H27.3<br>H5.3, H8.1<br>PP. 629<br>H27.6<br>H7.2, H25.3, H31<br>H10, H18, H55.4<br>H37.3, H27.5<br><br>Syllabus, powerpoints, notities', '', 6.14),
(5, '2015-12-17', 'Tentamen', 'cb', 'Campbell:<br>H5<br>H6<br>H7<br>H8<br>H9<br>H10, tot 10.4<br>H12<br>H18.5', '', 10),
(6, '2015-12-22', 'Tentamen', 'fi1', '', '', 9.5),
(7, '2016-01-05', 'Tentamen', 'pr', '', '', 9),
(8, '2015-11-11', 'Tentamen', 'cf', 'Biochemische reacties: (Thermodynamica, Vrije energie, Biochemische reacties, Evenwichten)<br>- H6.1, H6.2, H6.3<br><br>Membraantransport: (Membraantransport, Diffusie, Transporteiwitten, Osmose)<br>- H8.2, H8.3, H8.4<br>- H36.2 (''Short-Distance Transport of Water Across Plasma Membranes'')<br>- H48.2, H48.3 (behalve ''Evolution'')<br><br>Energietransformatie: (Redoxprocessen, Fotosystemen, Protonenpompen, Fosforylering)<br>- H10.1, H10.4<br>- H11<br><br>Powerpoints, Notities en Syllabus', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3345291-dt-content-rid-3087777_1/xid-3087777_1', 8.8),
(9, '2016-02-04', 'Toets', 'bc', '', '', 9.51),
(10, '2016-04-25', 'Tentamen', 'bc', '', '', 0),
(11, '2016-03-24', 'Toets', 'bc', '', '', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
