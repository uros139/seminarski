-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 11:01 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book1`
--

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

CREATE TABLE `autori` (
  `autor_id` int(10) NOT NULL,
  `autor_naziv` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`autor_id`, `autor_naziv`) VALUES
(1, 'Ivo Andric'),
(2, 'Milos Crnjanski'),
(3, 'Fjodor Dostojevski\r\n'),
(4, 'Lav Tolstoj'),
(5, 'Branko Copic'),
(6, 'Vilijam Sekspir\r\n'),
(7, 'Jovan Ducic'),
(8, 'Branislav Nusic'),
(9, 'Paulo Koeljo'),
(10, 'Milorad Pavic');

-- --------------------------------------------------------

--
-- Table structure for table `izdavaci`
--

CREATE TABLE `izdavaci` (
  `izdavac_id` int(10) NOT NULL,
  `izdavac_naziv` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `izdavaci`
--

INSERT INTO `izdavaci` (`izdavac_id`, `izdavac_naziv`) VALUES
(1, 'Dereta stampa'),
(2, 'Heliks Book'),
(3, 'Sezam Book'),
(4, 'Miba Book'),
(5, 'Meta physica'),
(6, 'Book print'),
(7, 'Laguna izdavastvo'),
(8, 'Delfi stampa'),
(9, 'Kairos Book'),
(10, 'Mascom print');

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `knjiga_id` int(10) NOT NULL,
  `knjiga_autor` int(10) NOT NULL,
  `knjiga_izdavac` int(10) NOT NULL,
  `knjiga_naziv` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `knjiga_cena` int(10) NOT NULL,
  `knjiga_opis` text COLLATE utf8_unicode_ci NOT NULL,
  `knjiga_image` text COLLATE utf8_unicode_ci NOT NULL,
  `knjiga_tag` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`knjiga_id`, `knjiga_autor`, `knjiga_izdavac`, `knjiga_naziv`, `knjiga_cena`, `knjiga_opis`, `knjiga_image`, `knjiga_tag`) VALUES
(1, 1, 1, 'Znakovi pored puta', 500, 'znakovi', 'znakovi.PNG', 'znakovi put'),
(2, 2, 2, 'Seobe', 800, 'seobe', 'seobe.PNG', 'seobe'),
(3, 3, 2, 'Zlocin i kazna', 1000, 'zlocin kazna', 'zlocin.PNG', 'zlocin kazna'),
(4, 4, 3, 'Rat i mir', 1200, 'rat mir', 'rat.PNG', 'rat mir'),
(5, 5, 4, 'Magarece godine', 600, 'magarece godine', 'magarece.PNG', 'magarece godine'),
(6, 6, 6, 'Hamlet', 850, 'hamlet', 'hamlet.PNG', 'hamlet hamlet'),
(7, 7, 5, 'Gradovi i himere', 900, 'grad himere', 'gradovi.PNG', 'grad himere himera'),
(8, 7, 4, 'Pesme zbirka', 1300, 'zbirka pesama pesme', 'pesme.PNG', 'zbirka pesama pesme'),
(9, 8, 7, 'Autobiografija', 1100, 'autobiografija', 'autobiografija.PNG', 'autobiografija'),
(10, 9, 8, 'Alhemicar', 700, 'alhemicar', 'alhemicar.PNG', 'alhemicar'),
(11, 9, 9, 'Brida', 600, 'brida', 'brida.PNG', 'vencanje'),
(12, 10, 8, 'Hazarski recnik', 1050, 'hazarski recnik', 'hazarski.PNG', 'hazarski recnik'),
(13, 10, 3, 'Istorija Beograda', 1500, 'istorija beograda', 'istorija.PNG', 'istorija beograda'),
(14, 1, 2, 'Na Drini cuprija', 1000, 'na drini cuprija', 'nadrini.PNG', 'na drini cuprija'),
(15, 2, 6, 'Itaka i komentari', 1000, 'itaka i komentari', 'itaka.PNG', 'itaka i komentari'),
(16, 6, 5, 'Romeo i Julija', 1200, 'romeo i julija', 'romeojulija.PNG', 'romeo i julija ljubav nesrecan kraj'),
(17, 7, 5, 'Blago Cara Radovana', 1200, 'blago cara radovana', 'blago.PNG', 'blago cara radovana'),
(18, 8, 3, 'Hajduci', 900, 'hajduci', 'hajduci.PNG', 'hajduci'),
(19, 4, 1, 'Jevandjelje', 750, 'jevandjelje', 'jevandjelje.PNG', 'jevandjelje'),
(20, 4, 4, 'Hadzi Murat', 700, 'hadzi murat ', 'murat.PNG', 'hadzi murat '),
(21, 5, 8, 'Osma ofanziva', 1100, 'osma ofanziva', 'ofanziva.PNG', 'osma ofanziva');

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `id_` int(10) NOT NULL,
  `knjiga_id` int(10) NOT NULL,
  `ip_add` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `knjiga_naziv` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `knjiga_image` text COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(10) NOT NULL,
  `cena` int(10) NOT NULL,
  `ukupan_iznos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`id_`, `knjiga_id`, `ip_add`, `user_id`, `knjiga_naziv`, `knjiga_image`, `qty`, `cena`, `ukupan_iznos`) VALUES
(36, 2, '0', 1, 'Seobe', 'seobe.PNG', 3, 800, 2400),
(41, 5, '0', 1, 'Magarece godine', 'magarece.PNG', 1, 600, 600),
(47, 3, '0', 1, 'Zlocin i kazna', 'zlocin.PNG', 1, 1000, 1000),
(48, 3, '0', 1, 'Zlocin i kazna', 'zlocin.PNG', 1, 1000, 1000),
(56, 2, '0', 1, 'Seobe', 'seobe.PNG', 3, 800, 2400),
(57, 3, '0', 1, 'Zlocin i kazna', 'zlocin.PNG', 1, 1000, 1000),
(65, 2, '0', 1, 'Seobe', 'seobe.PNG', 3, 800, 2400),
(66, 1, '0', 1, 'Znakovi pored puta', 'znakovi.PNG', 1, 500, 500),
(67, 4, '0', 1, 'Rat i mir', 'rat.PNG', 1, 1200, 1200),
(68, 6, '0', 1, 'Hamlet', 'hamlet.PNG', 1, 850, 850);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`) VALUES
(1, 'Aleksandar', 'Devic', 'vicde@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0644560426', 'Cara Dusana 17'),
(2, 'Aleksandar', 'Devic', 'email@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1234567890', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autori`
--
ALTER TABLE `autori`
  ADD PRIMARY KEY (`autor_id`);

--
-- Indexes for table `izdavaci`
--
ALTER TABLE `izdavaci`
  ADD PRIMARY KEY (`izdavac_id`);

--
-- Indexes for table `knjige`
--
ALTER TABLE `knjige`
  ADD PRIMARY KEY (`knjiga_id`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`id_`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autori`
--
ALTER TABLE `autori`
  MODIFY `autor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `izdavaci`
--
ALTER TABLE `izdavaci`
  MODIFY `izdavac_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `knjiga_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `id_` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
