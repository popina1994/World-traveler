-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2016 at 07:31 PM
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

-- --------------------------------------------------------


--
-- Dumping data for table `pitanje`
--

INSERT INTO `pitanje` (`IdPit`, `IdNiv`, `IDObl`, `IDKor`, `BrTacno`, `BrNetacno`) VALUES
(226, 2, 32, 1, 0, 0),
(227, 2, 30, 1, 0, 0),
(228, 2, 28, 1, 0, 0),
(229, 2, 29, 1, 0, 0),
(230, 2, 27, 1, 0, 0),
(231, 2, 31, 1, 0, 0);

-- --------------------------------------------------------


--
-- Dumping data for table `slika_pitanje`
--

INSERT INTO `slika_pitanje` (`IDPit`, `Postavka`, `Slika`, `Odgovor1`, `Odgovor2`, `Odgovor3`, `Odgovor4`, `TacanOdgovor`) VALUES
(226, 'Koji grad je na slici?', '226.jpg', 'Melburn', 'Sidnej', 'Kanbera', 'Velington', '2'),
(227, 'Koja ptica predstavlja nacionalni simbol Novog Zelanda?', '227.jpg', 'Kivi', 'Emu', 'Noj', 'VetruÅ¡ka', '1'),
(228, 'Koja je prva nota himne Filipina?', '228.jpg', 'C', 'D', 'FIS', 'G', '4'),
(229, 'Koje sazveÅ¾Ä‘e predstavljaju zvezde na zastavi drÅ¾ave Papua Nova Gvineja?', '229.gif', 'JuÅ¾ni krst', 'Mali medved', 'Kompas', 'Å tit', '1'),
(230, 'Koje indoneÅ¾ansko ostrvo je prirodno staniÅ¡te Å¾ivotinje sa slike, po kome nosi ime?', '230.jpg', 'Java', 'Bali', 'Komodo', 'Lomboka', '3'),
(231, 'Kako se zove Å¾ivotinja sa slike, koja naseljava gotovo celu Australiju, uprkos tome Å¡to ne potiÄe iz Australije?', '231.jpg', 'Gebril', 'Dingo', 'Galago', 'Geko', '2');

-- --------------------------------------------------------


--
-- Dumping data for table `vredi_putnika`
--

INSERT INTO `vredi_putnika` (`IDNiv`, `IDObl`, `BrPlus`, `BrMinus`) VALUES
(2, 2, 4, 3),
(2, 27, 4, 2),
(2, 28, 4, 1),
(2, 29, 5, 3),
(2, 30, 4, 1),
(2, 31, 3, 1),
(2, 32, 3, 2);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
