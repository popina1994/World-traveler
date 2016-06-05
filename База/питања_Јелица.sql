-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 07:12 PM
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

-- --------------------------------------------------------

--
-- Dumping data for table `licnost_pitanje`


--

INSERT INTO `licnost_pitanje` (`IDPit`, `Licnost`, `Slika`, `Podatak1`, `Podatak2`, `Podatak3`, `Podatak4`, `Podatak5`, `Podatak6`) VALUES
(234, 'Novak ÄokoviÄ‡', '234', 'Poznati teniser', '64 osvojena turnira', 'Trener - Boris Beker', '6 puta je osvojio Otvoreno prvenstvo Australije', 'Srbin', 'Prvi teniser Sveta'),
(289, 'Marija Kiri', '289.jpg', 'Poznata fiziÄarka', 'Imala je i francusko i poljsko drÅ¾avljanstvo', 'Otkrila je radijum i polonijum', 'OsnivaÄica nove grane u hemiji - raiohemije', 'Rad na teoriji radioaktivnosti', 'Dvostruka dobitnica Nobelove nagrade'),
(290, 'Marija Kiri', '290.jpg', 'Poznata fiziÄarka', 'Imala je i francusko i poljsko drÅ¾avljanstvo', 'Otkrila je radijum i polonijum', 'OsnivaÄica nove grane u hemiji - raiohemije', 'Rad na teoriji radioaktivnosti', 'Dvostruka dobitnica Nobelove nagrade'),
(291, 'Lejton Hjuit', '291.jpg', 'Poznati teniser', 'NekadaÅ¡nji prvi reket sveta', 'NajmlaÄ‘i teniser koji je bio rangiran na prvom mestu', 'Osvojio je Vimbldon 2002.godine', 'Osnojen Dejvis kup 2002.godien', 'Rodjen je 1981.godine'),
(292, 'Nik Kirgios', '292.jpg', 'Rodjen je 1995.godine', 'Poznati teniser', 'Igra desnom rukom', '2003.godine je osvojio Otvoreno prvenstvo Australije za juniore', 'Trenutno je 19-ti igraÄ sveta', 'Poznat je po tome Å¡to nije fer-plej igraÄ');

-- --------------------------------------------------------

--
-- Dumping data for table `pitanje`


--

INSERT INTO `pitanje` (`IdPit`, `IdNiv`, `IDObl`, `IDKor`, `BrTacno`, `BrNetacno`) VALUES
(233, 3, 11, 31, 0, 0),
(234, 1, 19, 31, 0, 0),
(284, 1, 20, 31, 0, 0),
(285, 1, 20, 31, 0, 0),
(286, 2, 20, 31, 0, 0),
(287, 2, 20, 31, 0, 0),
(288, 3, 20, 31, 0, 0),
(289, 2, 20, 31, 0, 0),
(290, 3, 20, 31, 0, 0),
(291, 2, 32, 31, 0, 0),
(292, 2, 31, 31, 0, 0),
(293, 1, 16, 31, 0, 0),
(294, 2, 16, 31, 0, 0),
(295, 2, 19, 31, 0, 0),
(296, 1, 12, 31, 0, 0),
(297, 2, 12, 31, 0, 0),
(298, 1, 40, 31, 0, 0),
(299, 2, 12, 31, 0, 0),
(300, 3, 15, 31, 0, 0),
(301, 2, 15, 31, 0, 0);

-- --------------------------------------------------------


--
-- Dumping data for table `slika_pitanje`


--

INSERT INTO `slika_pitanje` (`IDPit`, `Postavka`, `Slika`, `Odgovor1`, `Odgovor2`, `Odgovor3`, `Odgovor4`, `TacanOdgovor`) VALUES
(233, 'U kom mesecu se odrÅ¾ava poznati karneval u Rio de Å½eneiru?', '233', 'Jul', 'Jun', 'Decembar', 'Februar', '4'),
(287, 'Koji se kompozitor nalazi na slici?', '287.jpg', 'Frederik Å open', 'Johan Sebastian Bah', 'Stevan StojanoviÄ‡ Mokranjac', 'Frnac Å ubert', '1'),
(288, 'Koji kompozitor se nalazi na slici?', '288.jpg', 'Frederik Å open', 'Johan Sebastian Bah', 'Stevan StojanoviÄ‡ Mokranjac', 'Frnac Å ubert', '1'),
(293, 'Koja se gradjevina nalazi na slici?', '293.jpg', 'Big Ben', 'Koloseum', 'Hram Svetog Save', 'Toranj u Pizi', '1'),
(294, 'Koja se gradjevina nalazi na slici?', '294.jpg', 'Big Ben', 'Koloseum', 'Hram Svetog Save', 'Toranj u Pizi', '1'),
(295, 'Koja se gradjevina nalazi na slici?', '295.jpg', 'Big Ben', 'Koloseum', 'Hram Svetog Save', 'Toranj u Pizi', '2'),
(299, 'Å ta se nalazi na slici?', '299.jpg', 'Sveti grad Inka MaÄu PikÄu', 'Kineski zid', 'TadÅ¾ Mahal', 'Tikal', '1');

-- --------------------------------------------------------

--
-- Dumping data for table `tekst_pitanje`


--

INSERT INTO `tekst_pitanje` (`IDPit`, `Postavka`, `Odgovor1`, `Odgovor2`, `Odgovor3`, `Odgovor4`, `TacanOdgovor`) VALUES
(284, 'Koji je glavni grad Poljske?', 'VarÅ¡ava', 'Beograd', 'Novi Sad', 'Minhen', '1'),
(285, 'Koje su boje na zastavi Poljske?', 'crna i bela', 'Å¾uta i zelena', 'crvena i bela', 'plava', '3'),
(286, 'Koje su boje na zastavi Poljske?', 'crna i bela', 'Å¾uta i zelena', 'crvena i bela', 'plava', '3'),
(296, 'Koji je glavni grad Perua?', 'Brazilija', 'Lima', 'Rim', 'London', '2'),
(297, 'Koji je glavni grad Perua?', 'Brazilija', 'Lima', 'Rim', 'London', '2'),
(298, 'Å ta se od ovoga nalazi u Kini?', 'Sveti grad Inka MaÄu PikÄu', 'Kineski zid', 'TadÅ¾ Mahal', 'Tikal', '2'),
(300, 'Kada je Islad dobio nezavisnost?', '1918-te', '1919-te', '1915-te', '1920-te', '1'),
(301, 'Island je bio kolonija koje od sledeÄ‡ih zemalja?', 'Danska', 'Francuska', 'NemaÄka', 'Rusija', '1');

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
