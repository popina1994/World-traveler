-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2016 at 12:21 PM
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

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`IDKor`) VALUES
(3);

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `igra`
--

INSERT INTO `igra` (`IDIgr`, `Poeni`, `Putnici`, `Status`, `IDNiv`, `IDKor`) VALUES
(1, 2760, 273, 't', 1, 2);

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

--
-- Dumping data for table `licnost_pitanje`
--

INSERT INTO `licnost_pitanje` (`IDPit`, `Licnost`, `Slika`, `Podatak1`, `Podatak2`, `Podatak3`, `Podatak4`, `Podatak5`, `Podatak6`) VALUES
(232, 'Ernest Raderford', '232.jpg', 'Roditelji su mu bili farmeri, koji su emigrirali na Novi Zeland.', 'Radio je kao profesor na Univerzitetu u Montrealu.', 'Nobelovu nagradu za hemiju dobio je 1908. godine.', 'Zajedno sa Sodijem uveo je pojam vreme poluraspada i formulisao zakone radioaktivnog raspada.', 'Hemijski element raderfordijum po njemu nosi ime.', 'Po njemu je nazvana jedinica za merenje radioaktivnosti - raderford.');

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

DROP TABLE IF EXISTS `moderator`;
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

DROP TABLE IF EXISTS `nivo_tezine`;
CREATE TABLE IF NOT EXISTS `nivo_tezine` (
  `IDNiv` bigint(20) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(20) NOT NULL,
  PRIMARY KEY (`IDNiv`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nivo_tezine`
--

INSERT INTO `nivo_tezine` (`IDNiv`, `Naziv`) VALUES
(1, 'Beba'),
(2, 'Å kolarac'),
(3, 'Svetski putnik');

-- --------------------------------------------------------

--
-- Table structure for table `oblast`
--

DROP TABLE IF EXISTS `oblast`;
CREATE TABLE IF NOT EXISTS `oblast` (
  `IDObl` bigint(20) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(50) NOT NULL,
  PRIMARY KEY (`IDObl`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

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
(7, 'Zapad-SAD'),
(8, 'Istok-SAD'),
(9, 'Meksiko'),
(10, 'Kolumbija'),
(11, 'Brazil'),
(12, 'Peru'),
(13, 'Patagonija'),
(14, 'Skandinavija'),
(15, 'Island'),
(16, 'Velika Britanija'),
(17, 'Zapadna Evropa'),
(18, 'IstoÄna Evropa'),
(19, 'JuÅ¾na Evropa'),
(20, 'Centralna Evropa'),
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

DROP TABLE IF EXISTS `osvajanje`;
CREATE TABLE IF NOT EXISTS `osvajanje` (
  `IDIgr` bigint(20) NOT NULL,
  `IDObl` bigint(20) NOT NULL,
  `Status` char(1) NOT NULL,
  PRIMARY KEY (`IDIgr`,`IDObl`),
  KEY `IDObl` (`IDObl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `osvajanje`
--

INSERT INTO `osvajanje` (`IDIgr`, `IDObl`, `Status`) VALUES
(1, 1, 'o'),
(1, 2, 'o'),
(1, 3, 'o'),
(1, 4, 'o'),
(1, 5, 'o'),
(1, 6, 'o'),
(1, 7, 'o'),
(1, 8, 'o'),
(1, 9, 'o'),
(1, 10, 'o'),
(1, 11, 'o'),
(1, 12, 'o'),
(1, 13, 'o'),
(1, 14, 'o'),
(1, 15, 'o'),
(1, 16, 'o'),
(1, 17, 'o'),
(1, 18, 'o'),
(1, 19, 'o'),
(1, 20, 'o'),
(1, 21, 'o'),
(1, 22, 'o'),
(1, 23, 'o'),
(1, 24, 'o'),
(1, 25, 'o'),
(1, 26, 'o'),
(1, 27, 'o'),
(1, 28, 'o'),
(1, 29, 'o'),
(1, 31, 'o'),
(1, 32, 'o'),
(1, 33, 'o'),
(1, 34, 'o'),
(1, 35, 'o'),
(1, 36, 'o'),
(1, 37, 'o'),
(1, 38, 'o'),
(1, 39, 'o'),
(1, 40, 'o'),
(1, 41, 'o'),
(1, 42, 'o'),
(1, 43, 'o'),
(1, 44, 'o');

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
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pitanje`
--

INSERT INTO `pitanje` (`IdPit`, `IdNiv`, `IDObl`, `IDKor`, `BrTacno`, `BrNetacno`) VALUES
(200, 2, 30, 1, 0, 0),
(201, 3, 30, 1, 0, 0),
(202, 1, 30, 1, 0, 0),
(204, 1, 4, 1, 0, 0),
(205, 3, 28, 1, 0, 0),
(206, 2, 28, 1, 0, 0),
(207, 1, 28, 1, 0, 0),
(208, 2, 32, 1, 0, 0),
(209, 2, 31, 1, 0, 0),
(210, 2, 32, 1, 0, 0),
(212, 1, 32, 1, 0, 0),
(213, 1, 31, 1, 0, 0),
(214, 3, 32, 1, 0, 0),
(215, 3, 31, 1, 0, 0),
(216, 3, 27, 1, 0, 0),
(217, 2, 27, 1, 0, 0),
(218, 2, 27, 1, 0, 0),
(219, 1, 27, 1, 0, 0),
(220, 2, 27, 1, 0, 0),
(221, 1, 27, 1, 0, 0),
(222, 2, 27, 1, 0, 0),
(223, 2, 29, 1, 0, 0),
(224, 1, 29, 1, 0, 0),
(225, 3, 29, 1, 0, 0),
(226, 2, 32, 1, 0, 0),
(227, 2, 30, 1, 0, 0),
(228, 2, 28, 1, 0, 0),
(229, 2, 29, 1, 0, 0),
(230, 2, 27, 1, 0, 0),
(231, 2, 31, 1, 0, 0),
(232, 2, 30, 1, 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_korisnik`
--

INSERT INTO `reg_korisnik` (`IDKor`, `Username`, `Password`) VALUES
(1, 'User', 'Pass'),
(2, 'Takmicar', 'Takmicar'),
(3, 'Admin', 'Admin');

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
(20, 14),
(3, 15),
(14, 15),
(16, 15),
(15, 16),
(17, 16),
(20, 16),
(16, 17),
(18, 17),
(19, 17),
(22, 17),
(17, 18),
(19, 18),
(20, 18),
(17, 19),
(18, 19),
(20, 19),
(41, 19),
(14, 20),
(16, 20),
(18, 20),
(19, 20),
(33, 20),
(39, 20),
(41, 20),
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
(26, 24),
(41, 24),
(23, 25),
(24, 25),
(26, 25),
(24, 26),
(25, 26),
(28, 27),
(29, 27),
(31, 27),
(32, 27),
(43, 27),
(27, 28),
(29, 28),
(27, 29),
(28, 29),
(30, 29),
(32, 29),
(29, 30),
(32, 30),
(27, 31),
(32, 31),
(27, 32),
(29, 32),
(30, 32),
(31, 32),
(20, 33),
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
(20, 39),
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
(19, 41),
(20, 41),
(21, 41),
(24, 41),
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

--
-- Dumping data for table `takmicar`
--

INSERT INTO `takmicar` (`IDKor`, `Ime`, `Prezime`, `Slika`) VALUES
(2, 'Tamkicar', 'Takmicar', NULL);

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

--
-- Dumping data for table `tekst_pitanje`
--

INSERT INTO `tekst_pitanje` (`IDPit`, `Postavka`, `Odgovor1`, `Odgovor2`, `Odgovor3`, `Odgovor4`, `TacanOdgovor`) VALUES
(200, 'Koji je najveÄ‡i grad Novog Zelanda?', 'Velington', 'Okland', 'KrajstÄerÄ', 'Brizbejn', '2'),
(201, 'Koji je najveÄ‡i grad na JuÅ¾nom ostrvu Novog Zelanda?', 'Kajkora', 'Rotorua', 'Velington', 'KrajstÄerÄ', '4'),
(202, 'U kom okeanu se nalazi Novi Zeland?', 'Tihi okean', 'Indijski okean', 'Atlantski okean', 'ArktiÄki okean', '1'),
(205, 'Koji od navedenih gradova nije luka?', 'Davao', 'Manila', 'Zamboanga', 'Kezon Siti', '4'),
(206, 'Na kom ostrvu se nalazi Manila?', 'Luzon', 'Mindanao', 'Manila', 'Å ikoku', '1'),
(207, 'Koji je glavni grad Filipina?', 'Luzon', 'Manila', 'Palau', 'Malezija', '2'),
(208, 'U kom gradu se nalazi opera u obliku Å¡koljki?', 'Kanbera', 'Brizbejn', 'Sidnej', 'Adelejd', '3'),
(209, 'Koliko je puta (pribliÅ¾no) Australija veÄ‡a od Grenlanda?', 'isti su', '1.5', '4', '6', '3'),
(210, 'Koliko je puta (pribliÅ¾no) Australija veÄ‡a od Grenlanda?', '1.5', '4', '6', 'nije veÄ‡a', '2'),
(212, 'Koje Å¾ivotinje su izabrane kao simboli na australijskom grbu?', 'kengur i emu', 'kengur i koala', 'dingo i kengur', 'koala i ovca', '1'),
(213, 'Koje Å¾ivotinje su izabrane kao simboli na australijskom grbu?', 'kengur i koala', 'kengur i emu', 'dingo i kengur', 'koala i ovca', '2'),
(214, 'Na obali kog mora se nalazi grad Darvin?', 'Tasmanovo more', 'Timorsko more', 'Solomonovo more', 'Vedelovo more', '2'),
(215, 'U kom gradu Australije se nalazi Kings Park, jedan od najvecÌih unutraÅ¡njih gradskih parkova u svetu?', 'Geraldton', 'Darvin', 'Hobart', 'Pert', '4'),
(216, 'Koji od navedenih gradova se ne nalazi u Indoneziji?', 'Semarang', 'Bandung', 'Medan', 'Tauranga', '4'),
(217, 'Koje od navedenih ostrva ne pripada Indoneziji?', 'Sumatra', 'Itaka', 'Java', 'Bali', '2'),
(218, 'Sa kojom od navedenih drÅ¾ava Indonezija nema kopnenu granicu?', 'Malezija', 'IstoÄni Timor', 'Papua Nova Gvineja', 'Filipini', '4'),
(219, 'Koliko boja ima na zastavi Indonezije?', '1', '2', '3', '4', '2'),
(220, 'Koje su boje na zastavi Indonezije?', 'crvena i bela', 'crvena i crna', 'plava, Å¾uta, bela i crvena', 'crvena, crna, bela i Å¾uta', '1'),
(221, 'Å ta treba uraditi sa zastavom Poljske da bi se dobila zastava Indonezije?', 'ukloniti plavi deo', 'okrenuti je naopako', 'dodati crvenu boju', 'zameniti plavi deo crvenim', '2'),
(222, 'Å ta treba uraditi sa zastavom Singapura da bi se dobila zastava Indonezije?', 'ukloniti zvezde i mesec', 'okrenuti je naopako', 'dodati zvezde i mesec', 'niÅ¡ta, iste su', '1'),
(223, 'Koja od navedenih boja se ne nalazi na zastavi drÅ¾ave Papua Nova Gvineja?', 'crna', 'Å¾uta', 'crvena', 'plava', '4'),
(224, 'U kom delu ostrva Nova Gvineja se nalazi drÅ¾ava Papua Nova Gvineja?', 'zapadnom', 'istoÄnom', 'ne nalazi se', 'zauzima celo ostrvo', '2'),
(225, 'Koja od navedenih reka se nalazi na ostrvu Nova Gvineja?', 'Flaj', 'FiÅ¡', 'Darling', 'Hejstings', '1');

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
-- Dumping data for table `vredi_putnika`
--

INSERT INTO `vredi_putnika` (`IDNiv`, `IDObl`, `BrPlus`, `BrMinus`) VALUES
(1, 1, 7, 3),
(1, 2, 3, 3),
(1, 3, 8, 4),
(1, 4, 7, 3),
(1, 5, 7, 2),
(1, 6, 6, 1),
(1, 7, 8, 2),
(1, 8, 3, 3),
(1, 9, 8, 4),
(1, 10, 5, 4),
(1, 11, 7, 1),
(1, 12, 5, 2),
(1, 13, 7, 3),
(1, 14, 3, 2),
(1, 15, 8, 1),
(1, 16, 3, 2),
(1, 17, 5, 1),
(1, 18, 7, 2),
(1, 19, 5, 4),
(1, 20, 5, 4),
(1, 21, 4, 1),
(1, 22, 5, 4),
(1, 23, 7, 3),
(1, 24, 5, 1),
(1, 25, 5, 2),
(1, 26, 6, 2),
(1, 27, 3, 2),
(1, 28, 6, 1),
(1, 29, 4, 4),
(1, 30, 5, 4),
(1, 31, 7, 2),
(1, 32, 8, 3),
(1, 33, 8, 3),
(1, 34, 4, 3),
(1, 35, 7, 2),
(1, 36, 8, 2),
(1, 37, 7, 2),
(1, 38, 3, 1),
(1, 39, 6, 1),
(1, 40, 6, 4),
(1, 41, 8, 1),
(1, 42, 6, 1),
(1, 43, 5, 4),
(1, 44, 5, 2),
(2, 1, 5, 4),
(2, 2, 3, 5),
(2, 3, 3, 4),
(2, 4, 4, 4),
(2, 5, 4, 5),
(2, 6, 5, 3),
(2, 7, 2, 5),
(2, 8, 5, 3),
(2, 9, 2, 5),
(2, 10, 3, 3),
(2, 11, 5, 5),
(2, 12, 5, 5),
(2, 13, 3, 4),
(2, 14, 2, 3),
(2, 15, 3, 4),
(2, 16, 5, 4),
(2, 17, 4, 5),
(2, 18, 4, 5),
(2, 19, 3, 4),
(2, 20, 3, 4),
(2, 21, 2, 5),
(2, 22, 2, 4),
(2, 23, 3, 5),
(2, 24, 2, 4),
(2, 25, 3, 3),
(2, 26, 4, 3),
(2, 27, 3, 4),
(2, 28, 4, 5),
(2, 29, 3, 5),
(2, 30, 3, 5),
(2, 31, 2, 3),
(2, 32, 2, 5),
(2, 33, 3, 5),
(2, 34, 5, 5),
(2, 35, 3, 3),
(2, 36, 5, 5),
(2, 37, 4, 3),
(2, 38, 2, 4),
(2, 39, 3, 3),
(2, 40, 2, 5),
(2, 41, 3, 5),
(2, 42, 4, 4),
(2, 43, 5, 5),
(2, 44, 5, 4),
(3, 1, 2, 5),
(3, 2, 3, 3),
(3, 3, 2, 6),
(3, 4, 2, 4),
(3, 5, 2, 3),
(3, 6, 1, 3),
(3, 7, 2, 3),
(3, 8, 3, 5),
(3, 9, 1, 3),
(3, 10, 3, 4),
(3, 11, 3, 6),
(3, 12, 3, 4),
(3, 13, 3, 6),
(3, 14, 1, 3),
(3, 15, 3, 5),
(3, 16, 1, 5),
(3, 17, 3, 4),
(3, 18, 2, 5),
(3, 19, 2, 3),
(3, 20, 1, 6),
(3, 21, 1, 3),
(3, 22, 2, 6),
(3, 23, 2, 3),
(3, 24, 2, 6),
(3, 25, 2, 4),
(3, 26, 1, 4),
(3, 27, 2, 4),
(3, 28, 3, 4),
(3, 29, 2, 3),
(3, 30, 1, 5),
(3, 31, 3, 5),
(3, 32, 2, 5),
(3, 33, 1, 6),
(3, 34, 1, 4),
(3, 35, 1, 6),
(3, 36, 2, 5),
(3, 37, 3, 5),
(3, 38, 3, 6),
(3, 39, 1, 4),
(3, 40, 3, 5),
(3, 41, 3, 6),
(3, 42, 1, 6),
(3, 43, 1, 4),
(3, 44, 2, 6);

--
-- Constraints for dumped tables
--

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
