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
-- Tabelstructuur voor tabel `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `page` varchar(30) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`id`, `page`, `content`) VALUES
(1, 'semester-overview', 'list_subjectOverview, table_events'),
(2, 'exams', 'table_exams, table_planning_exams, article_calendars_exams'),
(3, 'assignments', 'table_assignments, table_planning_assignments'),
(4, 'assignments_item', 'item_assignment'),
(5, 'home', 'article_text_introduction, table_today, table_planning_future, table_nearfuture, article_calendars_agenda'),
(6, 'contact', ''),
(7, 'schedule', 'article_calendars_schedule, article_calendars_schedule_1ejrnaj, article_calendars_schedule_1ejrvoorj'),
(8, 'edit-entry', 'form_editItem'),
(9, 'login', 'form_login, article_forms_bblogin'),
(10, 'list-entries', 'list_dataItems'),
(11, 'upload', 'form_uploadAny'),
(12, 'subjects', 'subjectPage'),
(18, 'exams_item', 'item_exam'),
(19, 'planning', 'table_planning');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
