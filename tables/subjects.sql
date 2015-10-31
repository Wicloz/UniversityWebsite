-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 okt 2015 om 17:27
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
  `content` text NOT NULL,
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

INSERT INTO `subjects` (`id`, `name`, `abbreviation`, `section`, `content`, `active`, `link_home`, `link_powerpoints`, `link_schedule`, `link_assignments`, `link_marks`) VALUES
(1, 'Studeren & Presenteren', 'stpr', 'informatica', '', 1, 'http://liacs.leidenuniv.nl/~wolstencroftkj/ssp.html', 'http://liacs.leidenuniv.nl/~wolstencroftkj/ssp.html#Lectures', 'http://liacs.leidenuniv.nl/~wolstencroftkj/SSPTimetable.pdf', 'http://liacs.leidenuniv.nl/~wolstencroftkj/ssp.html#Assignments', ''),
(2, 'Programmeermethoden', 'pr', 'informatica', '', 1, 'http://liacs.leidenuniv.nl/~kosterswa/pm/', 'http://liacs.leidenuniv.nl/~kosterswa/pm/college.php', 'http://liacs.leidenuniv.nl/~kosterswa/pm/inhoud.php', 'http://liacs.leidenuniv.nl/~kosterswa/pm/opdrachten.php', 'http://liacs.leidenuniv.nl/~kosterswa/pm/cijf/res.html'),
(3, 'Fundamentele Informatica 1', 'fi1', 'informatica', '', 1, 'http://liacs.leidenuniv.nl/~hoogeboomhj/fi1/', 'http://liacs.leidenuniv.nl/~hoogeboomhj/fi1/', 'http://liacs.leidenuniv.nl/~hoogeboomhj/fi1/', '', ''),
(4, 'Basispracticum', 'bp', 'biologie', '', 1, 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/modulepage/view?course_id=_157670_1&cmp_tab_id=_114874_1&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_157670_1&content_id=_3302925_1&mode=reset', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3302933-dt-content-rid-3037697_1/courses/4031BBPIB-1516FWN/HANDL%2020%20juli%202015.pdf', '', ''),
(5, 'Microbiologie', 'mi', 'biologie', '', 1, '', '', '', '', ''),
(6, 'Celfysiologie', 'cf', 'biologie', '', 1, 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_155462_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_155462_1&content_id=_3344439_1', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3345291-dt-content-rid-3087777_1/xid-3087777_1', '', ''),
(7, 'Celbiologie', 'cb', 'biologie', '', 1, '', '', '', '', ''),
(8, 'Moleculaire Genetica', 'mg', 'biologie', '', 0, 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_155460_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_155460_1&content_id=_3229624_1&mode=reset', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_155460_1&content_id=_3229624_1&mode=reset', '', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3380511-dt-content-rid-3203012_1/courses/40211MG10-1516FWN/Cohort%20Informatica%20%20Biologie%20toets%20Moleculaire%20Genetica%202015-2016%20.pdf');

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
