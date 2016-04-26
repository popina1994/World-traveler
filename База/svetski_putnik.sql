-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2016 at 11:50 AM
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

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `IDKor` bigint(20) NOT NULL,
  PRIMARY KEY (`IDKor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `igra`
--

DROP TABLE IF EXISTS `igra`;
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

DROP TABLE IF EXISTS `licnost_pitanje`;
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

DROP TABLE IF EXISTS `moderator`;
CREATE TABLE IF NOT EXISTS `moderator` (
  `IDKor` bigint(20) NOT NULL,
  PRIMARY KEY (`IDKor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nivo_tezine`
--

DROP TABLE IF EXISTS `nivo_tezine`;
CREATE TABLE IF NOT EXISTS `nivo_tezine` (
  `IDNiv` bigint(20) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(20) NOT NULL,
  PRIMARY KEY (`IDNiv`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oblast`
--

DROP TABLE IF EXISTS `oblast`;
CREATE TABLE IF NOT EXISTS `oblast` (
  `IDObl` bigint(20) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(50) NOT NULL,
  PRIMARY KEY (`IDObl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `osvajanje`
--

DROP TABLE IF EXISTS `osvajanje`;
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

DROP TABLE IF EXISTS `pitanje`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reg_korisnik`
--

DROP TABLE IF EXISTS `reg_korisnik`;
CREATE TABLE IF NOT EXISTS `reg_korisnik` (
  `IDKor` bigint(20) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`IDKor`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `se_granici_sa`
--

DROP TABLE IF EXISTS `se_granici_sa`;
CREATE TABLE IF NOT EXISTS `se_granici_sa` (
  `IDObl1` bigint(20) NOT NULL,
  `IDObl2` bigint(20) NOT NULL,
  PRIMARY KEY (`IDObl1`,`IDObl2`),
  KEY `se_granici_sa_ibfk_2` (`IDObl2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slika_pitanje`
--

DROP TABLE IF EXISTS `slika_pitanje`;
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

DROP TABLE IF EXISTS `takmicar`;
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

DROP TABLE IF EXISTS `tekst_pitanje`;
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

DROP TABLE IF EXISTS `vredi_putnika`;
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
