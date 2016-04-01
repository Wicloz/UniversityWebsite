-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 02 apr 2016 om 00:19
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
  `subject` varchar(8) NOT NULL,
  `desc_short` varchar(100) NOT NULL,
  `desc_full` text NOT NULL,
  `link_assignment` text NOT NULL,
  `link_repository` text NOT NULL,
  `link_report` text NOT NULL,
  `team` varchar(100) NOT NULL,
  `completion` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `assignments`
--

INSERT INTO `assignments` (`id`, `start_date`, `end_date`, `end_time`, `subject`, `desc_short`, `desc_full`, `link_assignment`, `link_repository`, `link_report`, `team`, `completion`) VALUES
(1, '2015-09-02', '2015-09-18', '17:00:00', 'pr', 'Programmeeropdracht 1: Beta', 'Deze opgave probeert te bepalen of iemand geschikt is voor een studie aan de universiteit: de loting wordt immers afgeschaft. Daartoe moeten enkele vragen beantwoord worden; zo moet de kandidaat weten op welke dag hij/zij geboren is. En als je denkt dat 1/3 + 1/4 gelijk is aan 2/7, is een beta-studie misschien niet verstandig.', 'http://liacs.leidenuniv.nl/~kosterswa/pm/op1pm.php', 'https://github.com/Wicloz/PMPO/tree/master/PMPO_Beta/src', '', 'David Nieuwenhuizen', 1),
(2, '2015-09-23', '2015-10-09', '17:00:00', 'pr', 'Programmeeropdracht 2: Geheim', 'Staan er geheime boodschappen in teksten? En wat voor getallen staan in die boodschappen? Deze vragen gaan we beantwoorden!', 'http://liacs.leidenuniv.nl/~kosterswa/pm/op2pm.php', 'https://github.com/Wicloz/PMPO/tree/master/PMPO_Geheim', '', 'Martijn Blokker', 1),
(3, '2015-10-14', '2015-11-06', '17:00:00', 'pr', 'Programmeeropdracht 3: Life', 'Het is de bedoeling om een C++-programma te maken dat de gebruiker in staat stelt Life te spelen via een menu-systeem. Dat betekent dat de gebruiker van het programma kan kiezen uit een aantal mogelijkheden, de zogeheten opties. Er is ï¿½ï¿½n submenu, waarin ook weer enkele opties zijn. De bedoeling is dat het hele menu op ï¿½ï¿½n regel staat, onder de wereld (zie verderop). De opties worden gekozen door de eerste letter van de betreffende optie in te toetsen (gevolgd door Enter), bijvoorbeeld een s of S om te stoppen. Uiteraard wordt een en ander duidelijk en ondubbelzinnig aan de gebruiker meegedeeld. Gebruik geen recursie!', 'http://liacs.leidenuniv.nl/~kosterswa/pm/op3pm.php', 'https://github.com/Wicloz/PMPO/tree/master/PMPO_Life', '', '', 1),
(4, '2015-09-28', '2015-10-15', '23:59:00', 'bp', 'Bacterial Growth', 'Beantwoord vragen op het stencil betreffende bacterial growth. Zie blackboard voor downloadlink.', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3364455-dt-content-rid-3137349_1/xid-3137349_1', '', '', '', 1),
(5, '2015-09-22', '2015-11-06', '17:00:00', 'stpr', 'Semester study timetable', 'Produce a semester study timetable that contains: 1. A semester overview, which displays all your classes, the assignment deadlines for each class and exam dates for each class. 2. A detailed weekly planning schedule for the week before your first exam until your last exam. The semester timetable and weekly plans should have an interactive web front-end.  Classes, deadlines, exams and dates should be served from a mySQL database. Deadlines and classes should link to further details on LIACS course websites and the semester overview should link to the weekly plans. Weekly plans should also include other events and activities that you need to plan in the same time periods (e.g. Christmas holidays, part-time jobs, etc).', 'http://liacs.leidenuniv.nl/~wolstencroftkj/Assignment1_SSP.pdf', 'https://github.com/Wicloz/UniversityWebsite', '', '', 1),
(6, '2015-11-11', '2015-12-04', '17:00:00', 'pr', 'Programmeeropdracht 4: Othello', 'Het is de bedoeling om een C++-programma te maken dat de gebruiker in staat stelt het spel Othello (zie ook Reversi) te spelen via een eenvoudig menu. Othello-borden worden in het C++-programma gerepresenteerd door ingewikkelde pointer-structuren. Het is de bedoeling een klasse OthelloBord te maken, die onder meer memberfuncties heeft als afdrukken, spelerzet en computerzet. Uiteraard heeft deze klasse ook een constructor en een destructor. Verder moeten gedane zetten met behulp van een stapel ongedaan gemaakt kunnen worden, en kan het aantal vervolgpartijen worden uitgerekend.', 'http://liacs.leidenuniv.nl/~kosterswa/pm/op4pm.php', 'https://github.com/Wicloz/PMPO/tree/master/PMPO_Othello', '', 'Jevan Kolk', 1),
(7, '2015-11-17', '2015-11-24', '11:15:00', 'stpr', 'Presentation Human Microbiome', 'Each group of two will have ten minutes to explain their theory as an oral presentation. You can use slides and/or draw diagrams on the chalk boards available. During the presentation:<br>1. Explain the current theory, using diagrams and analogies if they are helpful.<br>2. Explain the origins and history of the theory (i.e. who proposed it and when, what was the prevailing theory before this was proposed, and are there any credible ideas that may contradict the current theory).<br>3. Briefly give your own opinion of the theory. Is it credible? Has it stood the test of time?<br>Both members of each team should be involved with researching and preparing the presentation and both members of the team should be involved with presenting.', 'http://liacs.leidenuniv.nl/~wolstencroftkj/Assignment2_SSP.pdf', 'https://drive.google.com/drive/folders/0B44Sn7Hnnnhhb3lib2hBZFZ0NlU', 'https://docs.google.com/presentation/d/1swmxPdS5kHq7Yv_6EO_p7YHtWSZGPKpV8A42M3h2LIQ/edit?usp=sharing', 'Martijn Blokker', 1),
(9, '2015-12-08', '2015-12-11', '17:00:00', 'stpr', 'Written article Human Microbiome', 'In groups of two, explain the same scientific theory as a written article of no more than 3 pages (one report per group of two).<br><br>In this exercise, imagine that you are a science journalist writing about this theory just after it has been proposed. You are writing for a general audience without much scientific knowledge, so you will need to engage their interest and help them understand why this discovery is important.<br>In your report, explain the theory, but also explain why this theory is important for society. Will it change the world? If so, how? How will this work influence future research? You might also wish to discuss whether or not the theory is controversial. If it is, who is it controversial for?', 'http://liacs.leidenuniv.nl/~wolstencroftkj/Assignment3_SSP.pdf', 'https://nl.sharelatex.com/project/5666b4b1182bc84705fe5f8b', 'https://nl.sharelatex.com/project/5666b4b1182bc84705fe5f8b/output/output.pdf', 'Martijn Blokker', 1),
(10, '0000-00-00', '2016-04-21', '09:00:00', 'bc', 'Presentatie', '', '', '', '', '', 0),
(12, '2016-02-16', '2016-02-23', '00:00:00', 'lo', 'Homework 1', '', 'http://liacs.leidenuniv.nl/~bonsanguemm/Logic/hw2016.1.pdf', '', '', '', 1),
(13, '2016-02-24', '2016-03-27', '23:59:00', 'db', 'Practical Assignment 1', 'This practical assignment consists of three parts and should be delivered by March 27th 23:59pm.', 'https://blackboard.leidenuniv.nl/bbcswebdav/pid-3497614-dt-content-rid-3488943_1/courses/4031DABA6-1516FWN/assignment.pdf', '', '', '', 1),
(14, '2016-02-15', '2016-03-21', '12:00:00', 'alg', 'Programmeeropdracht 1 (brute force)', 'Een mogelijke werkwijze bij het programmeren is:      Lees de opdracht helemaal door, want bijvoorbeeld vragen die je in het verslag moet beantwoorden, kunnen helpen bij de implementatie.     Toestand-actie-ruimtes zoals die in het verslag moeten komen, behandelen we bij het derde college, op vrijdag 19 februari 2016 en bij het werkcollege van donderdag 25 februari.     Implementeer achtereenvolgens:         constructor(s)         functie drukaf         functie eindstand         functie doezet(kolom), zowel voor gewoon vooruitzetten als voor slaan         recursieve functie winst (aantal)         functie doerandomzet         functie bestezet     Het is verstandig om in principe na elke nieuwe functie (of deel daarvan) te testen of het programma doet wat je verwacht, door de op dat moment geschreven functies aan te roepen vanuit main.cc.', 'http://liacs.leidenuniv.nl/~graafjmde/ALGO/een2016.pdf', 'https://github.com/Wicloz/ALGPO/tree/master/ALGPO_BruteForce', '', 'Jevan Kolk', 1),
(15, '2016-03-01', '2016-03-08', '00:00:00', 'lo', 'Homework 2', '', 'http://liacs.leidenuniv.nl/~bonsanguemm/Logic/hw2016.2.pdf', '', '', '', 1),
(16, '2016-03-15', '2016-03-22', '00:00:00', 'oib', 'Lees artikel door Ewen Callaway', '', 'https://app.perusall.com/courses/informatica-and-biologie/callaway-2011/dXdtWrYuymGPWZbxY', '', '', '', 1),
(17, '2016-03-14', '2016-05-30', '23:59:00', 'oo', '3 verslagen interviews inleveren', '', 'https://studiegids.leidenuniv.nl/courses/show/55111/onderzoek-onderzoekers', '', '', '', 0),
(18, '2016-03-14', '2016-06-13', '23:59:00', 'oo', 'Beoordeel de 3 verslagen', '', 'https://studiegids.leidenuniv.nl/courses/show/55111/onderzoek-onderzoekers', '', '', '', 0),
(19, '2016-03-22', '2016-04-03', '00:00:00', 'lo', 'Homework 3', '', 'http://liacs.leidenuniv.nl/~bonsanguemm/Logic/hw2016.3.pdf', '', '', '', 0),
(20, '2016-03-22', '2016-03-29', '11:15:00', 'oib', 'Doe de R cursus op DataCamp', '', 'https://www.datacamp.com/courses/free-introduction-to-r', '', '', '', 1),
(21, '0000-00-00', '2016-04-25', '13:00:00', 'bc', 'Verslag LDH inleveren', '', '', '', '', '', 0),
(22, '2016-03-24', '2016-04-18', '12:00:00', 'alg', 'Programmeeropdracht 2 (knock out)', 'Het programma en Makefile per e-mail sturen naar: j.m.de.graaf@liacs.leidenuniv.nl<br>Zorg dat het onderwerp van je mail begint met ”[ALGO]”, dat scheelt de docent een hoop gezoek. Het verslag (inclusief het programma) moet op papier worden ingeleverd in de daartoe bestemde doos met opschrift Algoritmiek in de postkamer van Informatica, kamer 156. Voor elke week te laat inleveren gaat er een punt van het cijfer af. Vermeld overal duidelijk de namen van de makers.', 'http://liacs.leidenuniv.nl/~graafjmde/ALGO/twee2016.pdf', '', '', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
