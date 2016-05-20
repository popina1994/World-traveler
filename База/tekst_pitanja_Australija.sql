-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2016 at 06:17 PM
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
(225, 3, 29, 1, 0, 0);


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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
