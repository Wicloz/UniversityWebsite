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
-- Tabelstructuur voor tabel `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `abbreviation` varchar(6) NOT NULL,
  `section` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `book_pdf` text NOT NULL,
  `link_home` text NOT NULL,
  `link_powerpoints` text NOT NULL,
  `link_schedule` text NOT NULL,
  `link_assignments` text NOT NULL,
  `link_marks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `abbreviation`, `section`, `content`, `active`, `book_pdf`, `link_home`, `link_powerpoints`, `link_schedule`, `link_assignments`, `link_marks`) VALUES
(1, 'Studeren & Presenteren', 'stpr', 'inf', '', 0, '', 'http://liacs.leidenuniv.nl/~wolstencroftkj/ssp.html', 'http://liacs.leidenuniv.nl/~wolstencroftkj/ssp.html#Lectures', 'http://liacs.leidenuniv.nl/~wolstencroftkj/SSPTimetable.pdf', 'http://liacs.leidenuniv.nl/~wolstencroftkj/ssp.html#Assignments', ''),
(2, 'Programmeermethoden', 'pr', 'inf', '', 0, 'media\\books\\AbsoluteC++.pdf', 'http://liacs.leidenuniv.nl/~kosterswa/pm/', 'http://liacs.leidenuniv.nl/~kosterswa/pm/college.php', 'http://liacs.leidenuniv.nl/~kosterswa/pm/inhoud.php', 'http://liacs.leidenuniv.nl/~kosterswa/pm/opdrachten.php', 'http://liacs.leidenuniv.nl/~kosterswa/pm/cijf/res.html'),
(3, 'Fundamentele Informatica 1', 'fi1', 'inf', '', 0, 'media\\books\\DS.pdf', 'http://liacs.leidenuniv.nl/~hoogeboomhj/fi1/', 'http://liacs.leidenuniv.nl/~hoogeboomhj/fi1/', 'http://liacs.leidenuniv.nl/~hoogeboomhj/fi1/', '', 'http://liacs.leidenuniv.nl/~hoogeboomhj/fi1/fi1-cijfers-dec-2015-site.pdf'),
(4, 'Basispracticum', 'bp', 'bio', '', 0, '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/modulepage/view?course_id=_157670_1&cmp_tab_id=_114874_1&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_157670_1&content_id=_3302925_1&mode=reset', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3302933-dt-content-rid-3037697_1/courses/4031BBPIB-1516FWN/HANDL%2020%20juli%202015.pdf', '', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3408273-dt-content-rid-3318406_1/courses/4031BBPIB-1516FWN/COHORT%202015-2016%20BLOK2%20BASISPRACTICUM%20voor%20I%26B%2024%20nov%20%20publicatie%20blackboard%202015%20.pdf'),
(5, 'Microbiologie', 'mi', 'bio', '', 0, 'media\\books\\Campbell Biology, 10h Edition - Reece, Urry, Cain et al.pdf', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_155463_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_155463_1&content_id=_3402648_1', '', '', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3439771-dt-content-rid-3384914_1/courses/4031BBPIB-1516FWN/Cijferlijst%2011%20dec%20%20Microbiologie%20voor%20Informatica%20%20Biologie%20voor%20publicatie%20blackboard%202015-2016.pdf'),
(6, 'Celfysiologie', 'cf', 'bio', '', 0, 'media\\books\\Campbell Biology, 10h Edition - Reece, Urry, Cain et al.pdf', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_155462_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_155462_1&content_id=_3344439_1', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3345291-dt-content-rid-3087777_1/xid-3087777_1', '', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3404299-dt-content-rid-3291856_1/courses/40212CF15-1516FWN/Cijferlijst%20Celfysiologie%20voor%20Informatica%20%20Biologie%202015-2016.pdf'),
(7, 'Celbiologie', 'cb', 'bio', '', 0, 'media\\books\\Campbell Biology, 10h Edition - Reece, Urry, Cain et al.pdf', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_157356_1&content_id=_3289911_1', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_157356_1&content_id=_3291631_1', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3291622-dt-content-rid-3268088_1/xid-3268088_1', '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_157356_1&content_id=_3441392_1'),
(8, 'Moleculaire Genetica', 'mg', 'bio', '', 0, 'media\\books\\Campbell Biology, 10h Edition - Reece, Urry, Cain et al.pdf', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_155460_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_155460_1&content_id=_3229624_1&mode=reset', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_155460_1&content_id=_3229624_1&mode=reset', '', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3380511-dt-content-rid-3203012_1/courses/40211MG10-1516FWN/Cohort%20Informatica%20%20Biologie%20toets%20Moleculaire%20Genetica%202015-2016%20.pdf'),
(9, 'Biochemie', 'bc', 'bio', '', 1, 'media\\books\\Manual Biochemistry I&B 2016.pdf', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_159672_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_159672_1&content_id=_3489702_1', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3462366-dt-content-rid-3426963_1/courses/4031IBBCH-1516FWN/Rooster%20Biochemie%20I%26B%20%28Blackboard%29.pdf', '', ''),
(10, 'Algoritmiek', 'alg', 'inf', '', 1, '', 'http://liacs.leidenuniv.nl/~graafjmde/ALGO/', 'http://liacs.leidenuniv.nl/~graafjmde/ALGO/', '', 'http://liacs.leidenuniv.nl/~graafjmde/ALGO/', ''),
(11, 'Databases', 'db', 'inf', '', 1, '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_158226_1&handle=announcements_entry&mode=view', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_158226_1&content_id=_3360722_1&mode=reset', '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/content/listContent.jsp?course_id=_158226_1&content_id=_3491070_1', ''),
(12, 'Logica', 'lo', 'inf', '', 1, 'media\\books\\M. Huth and M. Ryan, “Logic in Computer Science – Modeling and Reasoning about systems”, Second Edition, Cambridge University Press, 2004-Ref8.pdf', 'http://liacs.leidenuniv.nl/~bonsanguemm/logic.xhtml', '', '', '', ''),
(13, 'Orientatie I&B', 'oib', 'i&b', '', 1, '', '', '', '', '', ''),
(14, 'HC Bèta & Life Science', 'hcbls', 'hc', '', 1, '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_158114_1&handle=announcements_entry&mode=view', '', '', '', ''),
(15, 'Onderzoek & Onderzoekers', 'oo', 'hc', '', 1, '', 'https://blackboard.leidenuniv.nl/webapps/blackboard/execute/announcement?method=search&context=course_entry&course_id=_158211_1&handle=announcements_entry&mode=view', '', '', '', ''),
(16, 'Wetenschappelijke Uitdagingen voor 2050', 'wu50', 'hc', '', 1, '', '', '', '', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;