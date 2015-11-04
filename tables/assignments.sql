-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 04 nov 2015 om 13:39
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
-- Tabelstructuur voor tabel `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `subject` varchar(40) NOT NULL,
  `desc_short` varchar(100) NOT NULL,
  `desc_full` text NOT NULL,
  `link_assignment` text NOT NULL,
  `link_repository` text NOT NULL,
  `link_report` text NOT NULL,
  `team` varchar(100) NOT NULL,
  `completion` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `assignments`
--

INSERT INTO `assignments` (`id`, `start_date`, `end_date`, `end_time`, `subject`, `desc_short`, `desc_full`, `link_assignment`, `link_repository`, `link_report`, `team`, `completion`) VALUES
(1, '2015-09-02', '2015-09-18', '17:00:00', 'Programmeermethoden', 'Programmeeropdracht 1: Beta', 'Deze opgave probeert te bepalen of iemand geschikt is voor een studie aan de universiteit: de loting wordt immers afgeschaft. Daartoe moeten enkele vragen beantwoord worden; zo moet de kandidaat weten op welke dag hij/zij geboren is. En als je denkt dat 1/3 + 1/4 gelijk is aan 2/7, is een beta-studie misschien niet verstandig.', 'http://liacs.leidenuniv.nl/~kosterswa/pm/op1pm.php', 'https://github.com/Wicloz/PMPO_Beta', '', 'David Nieuwenhuizen', 1),
(2, '2015-09-23', '2015-10-09', '17:00:00', 'Programmeermethoden', 'Programmeeropdracht 2: Geheim', 'Staan er geheime boodschappen in teksten? En wat voor getallen staan in die boodschappen? Deze vragen gaan we beantwoorden!', 'http://liacs.leidenuniv.nl/~kosterswa/pm/op2pm.php', 'https://github.com/Wicloz/PMPO_Geheim', '', 'Martijn Blokker', 1),
(3, '2015-10-14', '2015-11-06', '17:00:00', 'Programmeermethoden', 'Programmeeropdracht 3: Life', 'Het is de bedoeling om een C++-programma te maken dat de gebruiker in staat stelt Life te spelen via een menu-systeem. Dat betekent dat de gebruiker van het programma kan kiezen uit een aantal mogelijkheden, de zogeheten opties. Er is ï¿½ï¿½n submenu, waarin ook weer enkele opties zijn. De bedoeling is dat het hele menu op ï¿½ï¿½n regel staat, onder de wereld (zie verderop). De opties worden gekozen door de eerste letter van de betreffende optie in te toetsen (gevolgd door Enter), bijvoorbeeld een s of S om te stoppen. Uiteraard wordt een en ander duidelijk en ondubbelzinnig aan de gebruiker meegedeeld. Gebruik geen recursie!', 'http://liacs.leidenuniv.nl/~kosterswa/pm/op3pm.php', 'https://github.com/Wicloz/PMPO_Life', '', '', 0),
(4, '2015-09-28', '2015-10-15', '23:59:00', 'Basispracticum', 'Bacterial Growth', 'Beantwoord vragen op het stencil betreffende bacterial growth. Zie blackboard voor downloadlink.', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3364455-dt-content-rid-3137349_1/xid-3137349_1', '', '', '', 1),
(5, '2015-09-22', '2015-11-06', '17:00:00', 'Studeren & Presenteren', 'Semester study timetable', 'Produce a semester study timetable that contains: 1. A semester overview, which displays all your classes, the assignment deadlines for each class and exam dates for each class. 2. A detailed weekly planning schedule for the week before your first exam until your last exam. The semester timetable and weekly plans should have an interactive web front-end.  Classes, deadlines, exams and dates should be served from a mySQL database. Deadlines and classes should link to further details on LIACS course websites and the semester overview should link to the weekly plans. Weekly plans should also include other events and activities that you need to plan in the same time periods (e.g. Christmas holidays, part-time jobs, etc).', 'http://liacs.leidenuniv.nl/~wolstencroftkj/Assignment1_SSP.pdf', 'https://github.com/Wicloz/UniversityWebsite', '', '', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
