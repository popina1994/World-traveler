-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 08:12 AM
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
-- Dumping data for table `oblast`
--


UPDATE `oblast` SET `IDObl` = 7,`Naziv` = 'Zapad-SAD' WHERE `oblast`.`IDObl` = 7;
UPDATE `oblast` SET `IDObl` = 8,`Naziv` = 'Istok-SAD' WHERE `oblast`.`IDObl` = 8;
UPDATE `oblast` SET `IDObl` = 18,`Naziv` = 'IstoÄna Evropa' WHERE `oblast`.`IDObl` = 18;
UPDATE `oblast` SET `IDObl` = 20,`Naziv` = 'Centralna Evropa' WHERE `oblast`.`IDObl` = 20;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
