-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 feb 2016 om 16:46
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
-- Tabelstructuur voor tabel `discord_tokens`
--

CREATE TABLE IF NOT EXISTS `discord_tokens` (
  `id` int(11) NOT NULL,
  `client` text NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `discord_tokens`
--

INSERT INTO `discord_tokens` (`id`, `client`, `token`) VALUES
(12, 'default', 'MTQwNDY5OTc0OTIwNzI0NDgx.CZOuxw.bObnjgpxywNHmxwCeAbraHPyTI0');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `discord_tokens`
--
ALTER TABLE `discord_tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `discord_tokens`
--
ALTER TABLE `discord_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
