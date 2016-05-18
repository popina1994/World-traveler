-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2016 at 03:46 PM
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
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `IDKor` bigint(20) NOT NULL,
  PRIMARY KEY (`IDKor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `igra`
--

CREATE TABLE IF NOT EXISTS `igra` (
  `IDIgr` bigint(20) NOT NULL AUTO_INCREMENT,
  `Poeni` int(11) NOT NULL,
  `Putnici` int(11) NOT NULL,
  `Status` char(1) NOT NULL,
  `IDNiv` bigint(11) NOT NULL,
  `IDKor` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`IDIgr`),
  KEY `IDNiv` (`IDNiv`),
  KEY `IDKor` (`IDKor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `licnost_pitanje`
--

CREATE TABLE IF NOT EXISTS `licnost_pitanje` (
  `IDPit` bigint(20) NOT NULL,
  `Licnost` varchar(50) NOT NULL,
  `Slika` varchar(50) NOT NULL,
  `Podatak1` varchar(200) NOT NULL,
  `Podatak2` varchar(200) NOT NULL,
  `Podatak3` varchar(200) NOT NULL,
  `Podatak4` varchar(200) NOT NULL,
  `Podatak5` varchar(200) NOT NULL,
  `Podatak6` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IDPit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE IF NOT EXISTS `moderator` (
  `IDKor` bigint(20) NOT NULL,
  PRIMARY KEY (`IDKor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`IDKor`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `nivo_tezine`
--

CREATE TABLE IF NOT EXISTS `nivo_tezine` (
  `IDNiv` bigint(20) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(20) NOT NULL,
  PRIMARY KEY (`IDNiv`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nivo_tezine`
--

INSERT INTO `nivo_tezine` (`IDNiv`, `Naziv`) VALUES
(1, 'Beba'),
(2, 'Skolarac'),
(3, 'Svetstki putnik');

-- --------------------------------------------------------

--
-- Table structure for table `oblast`
--

CREATE TABLE IF NOT EXISTS `oblast` (
  `IDObl` bigint(20) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(50) NOT NULL,
  PRIMARY KEY (`IDObl`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oblast`
--

INSERT INTO `oblast` (`IDObl`, `Naziv`) VALUES
(1, 'Aljaska'),
(2, 'Severozapadne teritorije'),
(3, 'Grenland'),
(4, 'Alberta'),
(5, 'Ontario'),
(6, 'Kvebek'),
(7, 'Zapad(SAD)'),
(8, 'Istok(SAD)'),
(9, 'Meksiko'),
(10, 'Kolumbija'),
(11, 'Brazil'),
(12, 'Peru'),
(13, 'Patagonija'),
(14, 'Skandinavija'),
(15, 'Island'),
(16, 'Velika Britanija'),
(17, 'Zapadna Evropa'),
(18, 'Ukrajina'),
(19, 'JuÅ¾na Evropa'),
(20, 'IstoÄna Evropa'),
(21, 'Egipat'),
(22, 'Severna Afrika'),
(23, 'Kongo'),
(24, 'IstoÄna Afrika'),
(25, 'JuÅ¾na Afrika'),
(26, 'Madagaskar'),
(27, 'Indonezija'),
(28, 'Filipini'),
(29, 'Nova Gvineja'),
(30, 'Novi Zeland'),
(31, 'Zapadna Australija'),
(32, 'IstoÄna Australija'),
(33, 'Ural'),
(34, 'Sibir'),
(35, 'Jakutsk'),
(36, 'Irkutsk'),
(37, 'Mongolija'),
(38, 'Japan'),
(39, 'Kazahstan'),
(40, 'Kina'),
(41, 'Bliski Istok'),
(42, 'Indija'),
(43, 'Tajland'),
(44, 'KamÄatka');

-- --------------------------------------------------------

--
-- Table structure for table `osvajanje`
--

CREATE TABLE IF NOT EXISTS `osvajanje` (
  `IDIgr` bigint(20) NOT NULL,
  `IDObl` bigint(20) NOT NULL,
  `Status` char(1) NOT NULL,
  PRIMARY KEY (`IDIgr`,`IDObl`),
  KEY `IDObl` (`IDObl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pitanje`
--

CREATE TABLE IF NOT EXISTS `pitanje` (
  `IdPit` bigint(20) NOT NULL AUTO_INCREMENT,
  `IdNiv` bigint(20) NOT NULL,
  `IDObl` bigint(20) NOT NULL,
  `IDKor` bigint(20) NOT NULL,
  `BrTacno` int(11) DEFAULT NULL,
  `BrNetacno` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdPit`),
  KEY `IdNiv` (`IdNiv`),
  KEY `IDObl` (`IDObl`),
  KEY `IDKor` (`IDKor`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reg_korisnik`
--

CREATE TABLE IF NOT EXISTS `reg_korisnik` (
  `IDKor` bigint(20) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`IDKor`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_korisnik`
--

INSERT INTO `reg_korisnik` (`IDKor`, `Username`, `Password`) VALUES
(1, 'User', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `se_granici_sa`
--

CREATE TABLE IF NOT EXISTS `se_granici_sa` (
  `IDObl1` bigint(20) NOT NULL,
  `IDObl2` bigint(20) NOT NULL,
  PRIMARY KEY (`IDObl1`,`IDObl2`),
  KEY `se_granici_sa_ibfk_2` (`IDObl2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `se_granici_sa`
--

INSERT INTO `se_granici_sa` (`IDObl1`, `IDObl2`) VALUES
(2, 1),
(4, 1),
(44, 1),
(1, 2),
(3, 2),
(4, 2),
(5, 2),
(2, 3),
(5, 3),
(15, 3),
(1, 4),
(2, 4),
(5, 4),
(7, 4),
(2, 5),
(3, 5),
(4, 5),
(6, 5),
(7, 5),
(8, 5),
(5, 6),
(8, 6),
(4, 7),
(5, 7),
(8, 7),
(9, 7),
(5, 8),
(6, 8),
(7, 8),
(9, 8),
(7, 9),
(8, 9),
(10, 9),
(9, 10),
(11, 10),
(12, 10),
(10, 11),
(12, 11),
(13, 11),
(22, 11),
(10, 12),
(11, 12),
(13, 12),
(11, 13),
(12, 13),
(15, 14),
(18, 14),
(3, 15),
(14, 15),
(16, 15),
(15, 16),
(17, 16),
(16, 17),
(19, 17),
(20, 17),
(22, 17),
(14, 18),
(19, 18),
(20, 18),
(33, 18),
(39, 18),
(41, 18),
(17, 19),
(18, 19),
(20, 19),
(41, 19),
(17, 20),
(18, 20),
(19, 20),
(22, 21),
(24, 21),
(41, 21),
(11, 22),
(17, 22),
(21, 22),
(23, 22),
(24, 22),
(22, 23),
(24, 23),
(25, 23),
(21, 24),
(22, 24),
(23, 24),
(25, 24),
(23, 25),
(24, 25),
(26, 25),
(25, 26),
(28, 27),
(29, 27),
(32, 27),
(43, 27),
(27, 28),
(27, 29),
(32, 30),
(32, 31),
(27, 32),
(30, 32),
(31, 32),
(18, 33),
(34, 33),
(39, 33),
(40, 33),
(33, 34),
(35, 34),
(36, 34),
(37, 34),
(40, 34),
(34, 35),
(36, 35),
(44, 35),
(34, 36),
(35, 36),
(37, 36),
(44, 36),
(34, 37),
(36, 37),
(38, 37),
(40, 37),
(44, 37),
(37, 38),
(44, 38),
(18, 39),
(33, 39),
(40, 39),
(41, 39),
(42, 39),
(33, 40),
(34, 40),
(37, 40),
(39, 40),
(42, 40),
(43, 40),
(18, 41),
(19, 41),
(21, 41),
(39, 41),
(42, 41),
(39, 42),
(40, 42),
(41, 42),
(43, 42),
(27, 43),
(40, 43),
(42, 43),
(1, 44),
(35, 44),
(36, 44),
(37, 44),
(38, 44);

-- --------------------------------------------------------

--
-- Table structure for table `slika_pitanje`
--

CREATE TABLE IF NOT EXISTS `slika_pitanje` (
  `IDPit` bigint(20) NOT NULL,
  `Postavka` varchar(200) NOT NULL,
  `Slika` varchar(50) NOT NULL,
  `Odgovor1` varchar(50) NOT NULL,
  `Odgovor2` varchar(50) NOT NULL,
  `Odgovor3` varchar(50) NOT NULL,
  `Odgovor4` varchar(50) NOT NULL,
  `TacanOdgovor` char(1) NOT NULL,
  PRIMARY KEY (`IDPit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `takmicar`
--

CREATE TABLE IF NOT EXISTS `takmicar` (
  `IDKor` bigint(20) NOT NULL,
  `Ime` varchar(20) NOT NULL,
  `Prezime` varchar(20) NOT NULL,
  `Slika` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDKor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tekst_pitanje`
--

CREATE TABLE IF NOT EXISTS `tekst_pitanje` (
  `IDPit` bigint(20) NOT NULL,
  `Postavka` varchar(200) NOT NULL,
  `Odgovor1` varchar(50) NOT NULL,
  `Odgovor2` varchar(50) NOT NULL,
  `Odgovor3` varchar(50) NOT NULL,
  `Odgovor4` varchar(50) NOT NULL,
  `TacanOdgovor` char(1) NOT NULL,
  PRIMARY KEY (`IDPit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vredi_putnika`
--

CREATE TABLE IF NOT EXISTS `vredi_putnika` (
  `IDNiv` bigint(20) NOT NULL,
  `IDObl` bigint(20) NOT NULL,
  `BrPlus` int(11) NOT NULL,
  `BrMinus` int(11) NOT NULL,
  PRIMARY KEY (`IDNiv`,`IDObl`),
  KEY `IDObl` (`IDObl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`IDKor`) REFERENCES `reg_korisnik` (`IDKor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `igra`
--
ALTER TABLE `igra`
  ADD CONSTRAINT `igra_ibfk_1` FOREIGN KEY (`IDNiv`) REFERENCES `nivo_tezine` (`IDNiv`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `igra_ibfk_2` FOREIGN KEY (`IDKor`) REFERENCES `takmicar` (`IDKor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `licnost_pitanje`
--
ALTER TABLE `licnost_pitanje`
  ADD CONSTRAINT `licnost_pitanje_ibfk_1` FOREIGN KEY (`IDPit`) REFERENCES `pitanje` (`IdPit`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `moderator`
--
ALTER TABLE `moderator`
  ADD CONSTRAINT `moderator_ibfk_1` FOREIGN KEY (`IDKor`) REFERENCES `reg_korisnik` (`IDKor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `osvajanje`
--
ALTER TABLE `osvajanje`
  ADD CONSTRAINT `osvajanje_ibfk_1` FOREIGN KEY (`IDIgr`) REFERENCES `igra` (`IDIgr`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `osvajanje_ibfk_2` FOREIGN KEY (`IDObl`) REFERENCES `oblast` (`IDObl`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pitanje`
--
ALTER TABLE `pitanje`
  ADD CONSTRAINT `pitanje_ibfk_1` FOREIGN KEY (`IdNiv`) REFERENCES `nivo_tezine` (`IDNiv`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pitanje_ibfk_2` FOREIGN KEY (`IDObl`) REFERENCES `oblast` (`IDObl`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pitanje_ibfk_3` FOREIGN KEY (`IDKor`) REFERENCES `moderator` (`IDKor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `se_granici_sa`
--
ALTER TABLE `se_granici_sa`
  ADD CONSTRAINT `se_granici_sa_ibfk_1` FOREIGN KEY (`IDObl1`) REFERENCES `oblast` (`IDObl`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `se_granici_sa_ibfk_2` FOREIGN KEY (`IDObl2`) REFERENCES `oblast` (`IDObl`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `slika_pitanje`
--
ALTER TABLE `slika_pitanje`
  ADD CONSTRAINT `slika_pitanje_ibfk_1` FOREIGN KEY (`IDPit`) REFERENCES `pitanje` (`IdPit`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `takmicar`
--
ALTER TABLE `takmicar`
  ADD CONSTRAINT `takmicar_ibfk_1` FOREIGN KEY (`IDKor`) REFERENCES `reg_korisnik` (`IDKor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tekst_pitanje`
--
ALTER TABLE `tekst_pitanje`
  ADD CONSTRAINT `tekst_pitanje_ibfk_1` FOREIGN KEY (`IDPit`) REFERENCES `pitanje` (`IdPit`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `vredi_putnika`
--
ALTER TABLE `vredi_putnika`
  ADD CONSTRAINT `vredi_putnika_ibfk_1` FOREIGN KEY (`IDNiv`) REFERENCES `nivo_tezine` (`IDNiv`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `vredi_putnika_ibfk_2` FOREIGN KEY (`IDObl`) REFERENCES `oblast` (`IDObl`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
