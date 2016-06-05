-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 12:34 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svetski_putnik`
--

--
-- Dumping data for table `pitanje`
--

INSERT INTO `pitanje` (`IdPit`, `IdNiv`, `IDObl`, `IDKor`, `BrTacno`, `BrNetacno`) VALUES
(271, 2, 8, 1, 0, 0),
(272, 2, 1, 1, 0, 0),
(273, 2, 11, 1, 0, 0),
(274, 2, 11, 1, 0, 0),
(275, 2, 37, 1, 0, 0),
(276, 2, 23, 1, 0, 0),
(277, 2, 38, 1, 0, 0),
(278, 2, 14, 1, 0, 0),
(279, 2, 39, 1, 0, 0),
(280, 2, 1, 1, 0, 0),
(281, 2, 3, 1, 0, 0),
(282, 2, 19, 1, 0, 0),
(283, 2, 24, 1, 0, 0);

--
-- Dumping data for table `tekst_pitanje`
--

INSERT INTO `tekst_pitanje` (`IDPit`, `Postavka`, `Odgovor1`, `Odgovor2`, `Odgovor3`, `Odgovor4`, `TacanOdgovor`) VALUES
(271, 'Iz kog grada je hokejaÅ¡ki klub Bruinsi (Bruins)?', 'Njujork', 'Boston', 'Majami', 'Baltimor', '2'),
(272, 'Kome je pripadala Aljaska pre SAD?', 'Rusiji', 'Kini', 'Kanadi', 'Japanu', '1'),
(273, 'Koji je sluÅ¾beni jezik u Brazilu?', 'Engleski', 'Å panski', 'Portugalski', 'Brazilski', '3'),
(274, 'Koji grad u Brazilu ima najviÅ¡e stanovnika?', 'Rio de Å½aneiro', 'Belo Orizonte', 'Brazilija', 'Sao Paulo', '4'),
(275, 'Koje pismo je u zvaniÄnoj upotrebi u Mongoliji?', 'Tradicionalno vertikalno pismo', 'Ä†irilica', 'Latinica', 'NiÅ¡ta od navedenog', '2'),
(276, 'SluÅ¾beni jezik u Kongu je?', 'Francuski', 'NemaÄki', 'Å panski', 'Engleski', '1'),
(277, 'Koje je najveÄ‡e od japanskih ostrva?', 'Hokaido', 'KjuÅ¡u', 'HonÅ¡u', 'Å ikoku', '3'),
(278, 'NajveÄ‡i fjord u NorveÅ¡koj je?', 'Sognefjord', 'Gajrangerfjord', 'Oslofjord', 'Hardangerfjord', '1'),
(279, 'Koji je najveÄ‡i grad Kazahstana?', 'Almati', 'Karagandi', 'Å imkent', 'Astana', '1'),
(280, 'Za koliko novca je Rusija prodala Aljasku Sjedinjenim AmeriÄkim DrÅ¾avama?', '7,2 miliona dolara', '720 miliona dolara', '7,2 milijarde dolara', '720 milijardi dolara', '1'),
(281, 'Kojoj drÅ¾avi pripada Grenland?', 'NorveÅ¡koj', 'Kanadi', 'Danskoj', 'Velikoj Britaniji', '3'),
(282, 'U kom veku je sagraÄ‘en Koloseum?', '2. veku p. n. e.', '1. veku n. e.', '3. veku n. e.', '6. veku n. e.', '2'),
(283, 'Koje je povrÅ¡inski najveÄ‡e jezero u Africi?', 'Edvardovo jezero', 'Viktorijino jezero', 'Jezero Tanganjika', 'Albertovo jezero', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
