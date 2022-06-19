-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 07:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--
CREATE DATABASE IF NOT EXISTS `baza` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `baza`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(2, 'antun', 'kalacic', 'antunkalacic', '$2y$10$kiKF5PUl/RZEspDEJSQBZuitoxMzSYYJ4YEgp6rKn6CxQsJIGpTdu', 0),
(3, 'marko', 'sever', 'msever', '$2y$10$q7he1aduwgA6A9yf/V.ZMerq/VDOJ7Hr.PD/BIZZDLt7gCtxAXs9m', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(14, '19.06.2022.', 'Lorem ipsum dolor sit amet', 'Ut vestibulum vitae ante vitae semper.', 'Ut vestibulum vitae ante vitae semper. Etiam non eros nibh. Proin lacinia sem nec dictum mollis. Etiam in purus sit amet orci fringilla malesuada vitae nec dolor. Proin mi dolor, sodales eu fringilla eget, ultricies nec ante.', 'slika1.jpg', 'Sport', 0),
(15, '19.06.2022.', 'Lorem ipsum dolor sit amet', 'Ut vestibulum vitae ante vitae semper.', 'Ut vestibulum vitae ante vitae semper. Etiam non eros nibh. Proin lacinia sem nec dictum mollis. Etiam in purus sit amet orci fringilla malesuada vitae nec dolor. Proin mi dolor, sodales eu fringilla eget, ultricies nec ante.', 'slika2.jpg', 'Sport', 0),
(16, '19.06.2022.', 'Lorem ipsum dolor sit amet', 'Ut vestibulum vitae ante vitae semper.', 'Ut vestibulum vitae ante vitae semper. Etiam non eros nibh. Proin lacinia sem nec dictum mollis. Etiam in purus sit amet orci fringilla malesuada vitae nec dolor. Proin mi dolor, sodales eu fringilla eget, ultricies nec ante.', 'slika3.jpg', 'Sport', 0),
(17, '19.06.2022.', 'Lorem ipsum dolor sit amet', 'Ut vestibulum vitae ante vitae semper.', 'Ut vestibulum vitae ante vitae semper. Etiam non eros nibh. Proin lacinia sem nec dictum mollis. Etiam in purus sit amet orci fringilla malesuada vitae nec dolor. Proin mi dolor, sodales eu fringilla eget, ultricies nec ante.', 'slika4.jpg', 'Sport', 0),
(18, '19.06.2022.', 'Lorem ipsum dolor sit amet', 'Ut vestibulum vitae ante vitae semper.', 'Ut vestibulum vitae ante vitae semper. Etiam non eros nibh. Proin lacinia sem nec dictum mollis. Etiam in purus sit amet orci fringilla malesuada vitae nec dolor. Proin mi dolor, sodales eu fringilla eget, ultricies nec ante.', 'slika5.jpg', 'Politik', 0),
(19, '19.06.2022.', 'Ut vestibulum vitae', 'Ut vestibulum vitae ante vitae semper.', 'Ut vestibulum vitae ante vitae semper. Etiam non eros nibh. Proin lacinia sem nec dictum mollis. Etiam in purus sit amet orci fringilla malesuada vitae nec dolor. Proin mi dolor, sodales eu fringilla eget, ultricies nec ante.', 'slika6.jpg', 'Politik', 0),
(20, '19.06.2022.', 'Ut vestibulum vitae ante', 'Ut vestibulum vitae ante vitae semper. Etiam non eros nibh.', 'Ut vestibulum vitae ante vitae semper. Etiam non eros nibh. Proin lacinia sem nec dictum mollis. Etiam in purus sit amet orci fringilla malesuada vitae nec dolor. Proin mi dolor, sodales eu fringilla eget, ultricies nec ante.', 'slika1.jpg', 'Politik', 0),
(21, '19.06.2022.', 'Lorem ipsum dolor sit amet', 'Ut vestibulum vitae ante vitae semper.', 'Ut vestibulum vitae ante vitae semper. Etiam non eros nibh. Proin lacinia sem nec dictum mollis. Etiam in purus sit amet orci fringilla malesuada vitae nec dolor. Proin mi dolor, sodales eu fringilla eget, ultricies nec ante. Aliquam erat volutpat. Sed congue est eu elit interdum feugiat. Nullam tincidunt augue sit amet lectus placerat, quis feugiat diam fermentum. Nam condimentum arcu hendrerit placerat maximus. In id aliquet sem, sit amet commodo tellus.', 'slika2.jpg', 'Politik', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
