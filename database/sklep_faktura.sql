-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 03:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep_faktura`
--
CREATE DATABASE IF NOT EXISTS `sklep_faktura` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sklep_faktura`;

-- --------------------------------------------------------

--
-- Table structure for table `asortyment`
--

CREATE TABLE `asortyment` (
  `id` int(10) UNSIGNED NOT NULL,
  `stawki_vat_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `towar` varchar(255) NOT NULL,
  `cena` decimal(16,2) DEFAULT NULL,
  `opis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asortyment`
--

INSERT INTO `asortyment` (`id`, `stawki_vat_id`, `towar`, `cena`, `opis`) VALUES
(1, 7, 'Komoda', '332.00', 'Ładna komoda'),
(2, 1, 'Krzesło zielone z plastiku CORSA', '24.00', ''),
(3, 1, 'Obrus przezroczysty na stół', '11.00', ''),
(4, 1, 'Dywan duży 300x200', '199.00', NULL),
(5, 1, 'Mikrofalówka Zelmer ZW-321', '499.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `informacje`
--

CREATE TABLE `informacje` (
  `id` int(11) NOT NULL,
  `KRS` char(10) NOT NULL,
  `REGON` char(9) NOT NULL,
  `BDO` char(9) NOT NULL,
  `stopka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `informacje`
--

INSERT INTO `informacje` (`id`, `KRS`, `REGON`, `BDO`, `stopka`) VALUES
(1, '0000099999', '999999999', '000099999', 'Kapiał zakładowy 1 000 000');

-- --------------------------------------------------------

--
-- Table structure for table `stawki_vat`
--

CREATE TABLE `stawki_vat` (
  `id` int(10) UNSIGNED NOT NULL,
  `stawka` decimal(5,4) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stawki_vat`
--

INSERT INTO `stawki_vat` (`id`, `stawka`) VALUES
(1, '0.2300'),
(2, '0.0800'),
(3, '0.0500'),
(4, '0.0000'),
(5, '0.0300'),
(6, '0.0400'),
(7, '0.0700'),
(8, '0.2200');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asortyment`
--
ALTER TABLE `asortyment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asortyment_FKIndex1` (`stawki_vat_id`);

--
-- Indexes for table `informacje`
--
ALTER TABLE `informacje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stawki_vat`
--
ALTER TABLE `stawki_vat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asortyment`
--
ALTER TABLE `asortyment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stawki_vat`
--
ALTER TABLE `stawki_vat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asortyment`
--
ALTER TABLE `asortyment`
  ADD CONSTRAINT `asortyment_ibfk_1` FOREIGN KEY (`stawki_vat_id`) REFERENCES `stawki_vat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
